<?php

class ReceiptController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/main';

	        //Права доступа
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user actions
				'users'=>array('@'),
				'actions' => StaffAccess::allowed(''),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionView($id)
	{
            //{KG}
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	

/*	public function actionIndex()
	{
		$this->render('index');
	}*/

	/**
	 * Manages all models.
	 */
	public function actionIndex($paid = FALSE,$send = FALSE, $wait = FALSE)
	{
		$model=new Receipt('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Receipt']))
			$model->attributes=$_GET['Receipt'];
			
			if (!empty($_POST)) {                
					$st = $_POST['operation'];					
					
					if ($st == 'check') {
						$orders = $_POST['orders'];
						$this->check ($orders);						
					}
					else if ($st == 'send') {
						$orders = $_POST['orders'];
						$this->send ($orders);						
					}
					else if ($st == 'back') {
						$orders = $_POST['orders'];
						$this->back ($orders);						
					}
					
				}                               
                
         
		$this->render('index',array(
			'model'=>$model,
                         'napis' => $napis,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Receipt::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
                
                //Проверяем страну
                $cn = StaffAccess::allowed ('country');
                
                if (!empty ($cn)) {
                    if ($cn[0]!='none') {
                        if (!in_array($model->strana,$cn)) {
                            die ('Вам не разрешено работать с данным счётом');
                        }
                    }
                }
                
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bill-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	 private function check ($orders) {
			 $message="";		 
             foreach ($orders as $b) {
					$bs = Receipt::model()->findByPk ($b);		
					if($bs->uuid==""){	
						$message.="Статус чека №".$b.": не возможно проверить чек, который не отправлен!<br>";
						continue;						
					}
					$receipt=Receipt::model()->findByPk($b);
					$pass_atol = Settings::item('pass_atol');
					$login_atol = Settings::item('login_atol');
					$code_group = Settings::item('code_group');

					$curl = curl_init("https://online.atol.ru/possystem/v3/getToken?login=".$login_atol."&pass=".$pass_atol);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
					$data = curl_exec($curl);
					curl_close($curl);
					$date = json_decode($data, true);

					if($date["code"]>=2)
					{							
						// выводим информацию об ошибки на страницу чеки
						$receipt->error_text = $date["text"];
						$receipt->save();

					}
					else
					{					
						
						$token = $date['token'];					
						$curl = curl_init("https://online.atol.ru/possystem/v3/".$code_group."/report/".$bs->uuid."?tokenid=".$token);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
						curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
						$data = curl_exec($curl);
						curl_close($curl);
						$sttttaat = json_decode($data, true);
						
						if($sttttaat["status"] == "done")
						{							
							$receipt->status='Регистрация успешно выполнена!';
							$receipt->error_text='';
							$receipt->receipt_datetime=$sttttaat["payload"]["receipt_datetime"];
							$receipt->save(); // сохраняем изменения
							$message.="Статус чека №".$b.": получили успех!<br>";
						}
						else if ($sttttaat["status"] == "fail")
						{

							$receipt->status='Регистрация не выполнена!';
							$receipt->error_text=$sttttaat["error"]["text"];
							$receipt->save(); // сохраняем изменения
							$message.="Статус чека №".$b.": ошибка - ".$sttttaat["error"]["text"]."<br>";
						}
						else if ($sttttaat["status"] == "wait")
						{
							$receipt->status='Ожидаем регистрацию';
							$receipt->error_text='';
							$receipt->save(); // сохраняем изменения
							$message.="Статус чека №".$b.": ожидаем регистрацию.<br>";
						}
					}			
					
			 }

			Y::user()->setFlash ('admin','Проверили состояние выбранных чеков:</br>'.$message);    
                
        }        


		 private function send ($orders) {
			 $message="";		
             foreach ($orders as $b) {
					$bs = Receipt::model()->findByPk ($b);	
					if($bs->uuid!=""){	
						$message.="Статус чека №".$b.": чек уже отправлен!<br>";
						continue;
						
					}
					$receipt=Receipt::model()->findByPk($b);
					$pass_atol = Settings::item('pass_atol');
					$login_atol = Settings::item('login_atol');
					$code_group = Settings::item('code_group');

					$curl = curl_init("https://online.atol.ru/possystem/v3/getToken?login=".$login_atol."&pass=".$pass_atol);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
					$data = curl_exec($curl);
					curl_close($curl);
					$date = json_decode($data, true);
					

					if($date["code"]>=2)
					{							
						// выводим информацию об ошибки на страницу чеки
						$receipt->error_text = $date["text"];
						$receipt->save();
					}
					else
					{
						$token = $date['token'];					
						// отправляем запрос на регистрацию чека в Атол
						$json2 = $receipt->text_query;
						$curl = curl_init("https://online.atol.ru/possystem/v3/".$code_group."/sell?tokenid=".$token);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
						curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($curl, CURLOPT_POST, true);
						curl_setopt($curl, CURLOPT_POSTFIELDS, $json2);
						$data = curl_exec($curl);
						curl_close($curl);
						// разбираем информацию и проверяем на ошибки
						$inform = json_decode($data, true);
						
						//если нету ошибок, обновляем данные чека
						if($inform["error"]=="null")
						{
							$receipt->uuid = $inform["uuid"];
							$receipt->time_pay = $inform["timestamp"];
							$receipt->status = "Ожидаем результат обработки документа";
							$receipt->error_text = "";
							$receipt->save();
							$message.="Статус чека №".$b.": успешная регистрация, ожидаем обработку документа.<br>";
						}
						else
						{							
							$receipt->uuid = $inform["uuid"];
							$receipt->time_pay = $inform["timestamp"];
							$receipt->status = "Ошибка регистрации документа";
							$receipt->error_text = $inform["error"]["text"];
							$receipt->save();		
							$message.="Статус чека №".$b.": ошибка в обработке - ".$inform["error"]["text"]."<br>";
						}
					}			
					
			 }

			Y::user()->setFlash ('admin','Повторно отправили выбранные чеки:</br>'.$message);
                   
        }        

		 private function back ($orders) {
			 $message="";		
             foreach ($orders as $b) {
					$bs = Receipt::model()->findByPk ($b);	
					if($bs->uuid==""){	
						$message.="Статус чека №".$b.": чек не отправлен!<br>";
						continue;						
					}
					$receipt=Receipt::model()->findByPk($b);
					$pass_atol = Settings::item('pass_atol');
					$login_atol = Settings::item('login_atol');
					$code_group = Settings::item('code_group');

					$curl = curl_init("https://online.atol.ru/possystem/v3/getToken?login=".$login_atol."&pass=".$pass_atol);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
					$data = curl_exec($curl);
					curl_close($curl);
					$date = json_decode($data, true);
					

					if($date["code"]>=2)
					{							
						// выводим информацию об ошибки на страницу чеки
						$receipt->error_text = $date["text"];
						$receipt->save();
					}
					else
					{
						$token = $date['token'];					
						// отправляем запрос на возврат чека в Атол
						$json2 = $receipt->text_query;

						
						$new_json = json_decode($json2, true);							
						$json_items = json_encode($new_json["receipt"]["items"]);
						$json2 = '{ 
									"external_id": "'.$new_json["external_id"].'1", 
									"receipt": { 
									"attributes": { 
										"email": "'.$new_json["receipt"]["attributes"]["email"].'", 										
										"sno": "'.$new_json["receipt"]["attributes"]["sno"].'" 
										}, 
										"items": '.$json_items.', 
										"payments": [ { 
											"sum": '.$new_json["receipt"]["payments"][0]["sum"].', 
											"type": 1 
											} ], 
										"total": '.$new_json["receipt"]["total"].' 
										}
									}
										';	


						$curl = curl_init("https://online.atol.ru/possystem/v3/".$code_group."/sell_refund?tokenid=".$token);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
						curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($curl, CURLOPT_POST, true);
						curl_setopt($curl, CURLOPT_POSTFIELDS, $json2);
						$data = curl_exec($curl);
						curl_close($curl);
						// разбираем информацию и проверяем на ошибки
						$inform = json_decode($data, true);
						
						//если нету ошибок, обновляем данные чека
						if($inform["error"]=="")
						{
							$receipt->uuid = $inform["uuid"];
							$receipt->time_pay = $inform["timestamp"];
							$receipt->status = "Оформили возврат";
							$receipt->error_text = "";
							$receipt->save();
							$message.="Статус чека №".$b.":возврат.<br>";
						}
						else
						{							
							$receipt->uuid = $inform["uuid"];
							$receipt->time_pay = $inform["timestamp"];
							$receipt->status = "Ошибка возврата документа";
							$receipt->error_text = $inform["error"]["text"];
							$receipt->save();		
							$message.="Статус чека №".$b.": ошибка в обработке - ".$inform["error"]["text"]."<br>";
						}
					}			
					
			 }

			Y::user()->setFlash ('admin','Оформили возврат выбранным чекам:</br>'.$message);
                   
        }        
        
    public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
                
                
	}

}
