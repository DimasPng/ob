<?php

class BillController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user actions
				'users'=>array('@'),
				'actions' => StaffAccess::allowed('bill'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id, $status = FALSE)
	{
            if($id=="img")
            {
                return false;
            }
            $b = $this->loadModel($id);
            
            if (!empty($_POST)) {
                
                
                //Если кроссел-добавление
                
                if (isset ($_POST['cross'])) {
                    
                    $gd = $_POST['good_id'];
                    
                    if (!empty ($gd)) {
                    
//                        $gg = Good::model ()->findByPk ($b->orders[0]->good_id);                        
                        $b->cross ($gd,$b->id,$b->orders[0]->good_id,false);
                        Y::user()->setFlash ('admin','Товар добавлен к заказу');    
                        $b = $this->loadModel($id);
                        $_POST = array ();
                    }
                }
                
            }
                
            if (!empty($_POST)) {                
                
                $st = $_POST['operation'];
                if (isset($_POST['number'])) {
                    $nm = $_POST['number'];
                } else {
                    $nm = '';
                }
                
                //Меняем статус
                $d = array (
                    'status_link' => Bill::statusLink ($b->id),
                    'bill_id' => $b->id,
                    'goods' => $b->lorders (),
                    'number' => '(недоступно)',
                );
                //{KG}
                
                //Проверяем нужно ли менять данные в базе
                $fields = array ('email','uname','amail','cupon','surname','otchestvo','strana','gorod','region','comment','phone','postindex','address','curier');
                
                $bp = $_POST['Bill'];
                //Проверяем
                foreach ($fields as $one)
                {
                    if ($bp[$one] != $b->$one) {
                        $b->$one = $bp[$one]; //Замена если отличается
                    }
                }
                
                
                
                
                switch ($st) {
                    
                    case 'approved':
                    case 'processing':
                        if ($b->status_id!='waiting') die ('Неверное действие');
                        Bill::payBill ($b->id);
                    break;

                    case 'nalozh_ok':
                        if ($b->status_id!='nalozh_sent') die ('Неверное действие');
                        Bill::payBill ($b->id,'Наложенный');
                    break;

                    case 'sent':
                        //Отправлен предоплаченный товар
                        if ($b->status_id!='processing') die ('Неверное действие');
                        
                        if (!empty ($nm)) {
                            $b->postNumber = $nm;
                            $d['number'] = $nm;
                        }
                        $b->status_id = 'sent';
                        $b->save (FALSE);
                        
                        //Отправляем письмо
                        Mail::letter ('sent_prepaid',$b->email,$b->uname,$d);
                        
                        
                    break;
                
                    case 'nalozh_sent':
                        //Отправлен заказ наложенным платежом
                        if ($b->status_id!='nalozh_confirmed') die ('Неверное действие');
                        
                        if (!empty ($nm)) {
                            $b->postNumber = $nm;
                            $d['number'] = $nm;
                        }
                        $b->status_id = 'nalozh_sent';
                        $b->save (FALSE);
                        
                        //Отправляем письмо
                        Mail::letter ('sent_nalozh',$b->email,$b->uname,$d);
                        
                        
                    break;
                    
                    case 'nalozh_confirmed':
                        
                        if ($b->status_id!='nalozh') die ('Неверное действие');
                        
                        $b->status_id = 'nalozh_confirmed';
                        
                        //Здесь если нужно - начисляем комиссионные
                        if ($b->affpaid == 0) {
                            $ords = $b->orders;
                        
                            foreach ($ords as $o)
                            {
                                $g = Good::model()->findByPk ($o->good_id);
                                if (!$g) continue; 

                                //Если начисление за подтверждённый заказ
                                if ($g->affOrder == 1 && $g->affOn == 1) {                                    
                                    Partner::doKomis ($o);
                                    $b->affpaid = 1;
                                }

                            }
                            
                            
                        }
                        
                        $b->save (FALSE);
                        
                        //Отправляем письмо
                        if ($b->curier) {
                            Mail::letter ('kurier_confirmed',$b->email,$b->uname,$d);
                        } else {
                            Mail::letter ('nalozh_confirmed',$b->email,$b->uname,$d);
                        }
                        
                        
                    break;

                    case 'nalozh_back':

                        if ($b->status_id!='nalozh_sent') die ('Неверное действие');
                        
                        $b->status_id = 'nalozh_back';
                        $b->save (FALSE);                        
                        
                    break;
                
                
                    case 'cancelled':
                        $b->notifySent = 3;
                        $b->status_id = 'cancelled';
                        $b->save (FALSE);
                    break;
                
                    case 'nothing':
                        $b->save (FALSE);
                    break;
                    
                }
                
                
                Y::user()->setFlash ('admin','Статус изменён, уведомления (где необходимо) отправлены');
                
                
                
            } elseif (!empty ($status)) {
            	
            	//Запрет исправления статуса
            	if (Y::user()->id == 1) {                    
                    $status = "";
                    if($_GET["status"]=="waiting")
                    {                        
                        $b->status_id = "waiting";
                    }
                    else if($_GET["status"]=="approved")
                    {
                        $b->status_id = "approved";
                    }
                    else if($_GET["status"]=="processing")
                    {
                        $b->status_id = "processing";
                    }
                    else if($_GET["status"]=="sent")
                    {
                        $b->status_id = "sent";
                    }
                    else if($_GET["status"]=="nalozh")
                    {
                        $b->status_id = "nalozh";
                    }
                    else if($_GET["status"]=="nalozh_confirmed")
                    {
                        $b->status_id = "nalozh_confirmed";
                    }
                    else if($_GET["status"]=="nalozh_sent")
                    {
                        $b->status_id = "nalozh_sent";
                    }
                    else if($_GET["status"]=="nalozh_ok")
                    {
                        $b->status_id = "nalozh_ok";
                    }
                    else if($_GET["status"]=="nalozh_back")
                    {
                        $b->status_id = "nalozh_back";
                    }
                    else if($_GET["status"]=="cancelled")
                    {
                        $b->status_id = "cancelled";
                    }
                    
                    $b->save (FALSE);
                    Y::user()->setFlash ('admin','Статус изменён');
                         
                	/*$b->status_id = $status;
                	$b->save (FALSE);
                	Y::user()->setFlash ('admin','Статус изменён');*/
                	
            	} else {
            		
            		Y::user()->setFlash ('admin','Статус не был исправлен, так как это действие доступно только Администратору');
            		
            	}
                
            }
                
                $bill = $this->loadModel($id);

               
            
                //Считаем комиссионные
                
                $ords = $bill->orders;
                
                $com1 = 0;
                $com2 = 0;
                $refs1 = array ();
                $refs2 = array ();
                
                foreach ($ords as $one) {
                    
                    $af = Affstats::model ()->findByPk ($one->id);
                    
                    if (!$af) continue;
                    
                    $com1 += $af->komis;
                    $com2 += $af->pkomis;
                    
                    if ($af->komis > 0) {
                        $refs1[] = CHtml::link ($af->partner_id, array ('partner/view/id/'.$af->partner_id),array ('target' => '_blank'));                        
                    }
                    
                    if ($af->pkomis > 0) {
                        $refs2[] = CHtml::link ($af->prefid, array ('partner/view/id/'.$af->prefid),array ('target' => '_blank'));                        
                    }
                    
                }
                
                $refs1 = implode (', ',$refs1);
                $refs2 = implode (', ',$refs2);
                
                if (!empty ($refs1)) {
                    $refs1 = '(' . $refs1 .')';
                }
                
                if (!empty ($refs2)) {
                    $refs2 = '(' . $refs2 .')';
                }
                
                   
		$this->render('view',array(
			'model'=> $bill,             
                        'com1' => $com1,
                        'com2' => $com2,
                        'refs1' => $refs1,
                        'refs2' => $refs2,
		));
	}
        
        public function actionRpo ($id)
        {
            //Ввод РПО для счёта
            if (!is_numeric ($id)) die ('Bad bill id');
            $pn = $_POST['rpo'];            
            
            $b = Bill::model ()->findByPk ($id);
            {
                if (!$b) die ('Bill not found');
                $b->notify = TRUE;
                $b->postNumber = $pn;
                $b->save (FALSE);
            }
            //{KG}
            Y::user()->setFlash ('admin','Номер почтового отправления успешно задан');
            $this->redirect (array('view', 'id' => $id));
        }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $b = $this->loadModel($id);
        $ord = $b->orders;
        foreach ($ord as $o) {
           $o->delete();
        }
    
        $b->delete();
        Y::user()->setFlash ('admin','Запись удалена');
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));


		/*if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
                        $b = $this->loadModel($id);
                        $ord = $b->orders;
                        foreach ($ord as $o) {
                           $o->delete();
                        }
                    
			             $b->delete();
                        

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax'])) {
				Y::user()->setFlash ('admin','Запись удалена');
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');*/
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex($paid = FALSE,$send = FALSE, $wait = FALSE)
	{
		$model=new Bill('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Bill']))
			$model->attributes=$_GET['Bill'];
                
                if ($paid) {
                    $model->paidOnly = TRUE;
                }
                if ($send) {
                    $model->sendOnly = TRUE;
                }
                
                if ($wait) {
                    $model->waitOnly = TRUE;
                }                
               
                //{KG}
                if (!empty($_POST)) {
                    if (isset ($_POST['bills']) || ($_POST['operation']=='excelall')) {
                        $bills = $_POST['bills'];
                        
                        switch ($_POST['operation']) {
                            
                            case 'excel':
                                $this->myexcel ($bills);
                            break;

                            case 'excelall':
                                $this->myexcel (false,true,$paid,$send);
                            break;                        
                        
                            //Выполняем рассылку
                            case 'mail':
                                
                                $bb = implode ('-',$bills);
                                
                                $this->redirect (array('rass/msg','bills' => $bb));
                                
                            break;
                        
                        
                            //Подтвежрдение отправки
                            case 'sent':
                                
                                foreach ($bills as $b) {
                                    $b = Bill::model()->findByPk($b);
                                    if ($b!=FALSE) {
                                        
                                        
                                        //Меняем статус
                                        $d = array (
                                            'status_link' => Bill::statusLink ($b->id),
                                            'bill_id' => $b->id,
                                            'goods' => $b->lorders (),
                                            'number' => '(неизвестен)',
                                        );
                                        
                                        
                                        switch ($b->status_id) {
                                            
                                        
                                            case 'processing':
                                                
                                                //Отправлен предоплаченный товар                                                
                                                $b->status_id = 'sent';
                                                $b->save (FALSE);

                                                //Отправляем письмо
                                                Mail::letter ('sent_prepaid',$b->email,$b->uname,$d);


                                            break;

                                            case 'nalozh_confirmed':
                                                
                                                //Отправлен заказ наложенным платежом

                                                $b->status_id = 'nalozh_sent';
                                                $b->save (FALSE);

                                                //Отправляем письмо
                                                Mail::letter ('sent_nalozh',$b->email,$b->uname,$d);


                                            break;
                                        
                                        }
                                        
                                        
                                    }
                                }                                
                                Y::user()->setFlash ('admin','Статус изменён (где возможно) и пользователям отправлены уведомления');
                                
                            break;                        
                        
                        
                            //Оплата счетов
                            case 'pay':
                                
                                foreach ($bills as $b) {
                                    $b = Bill::model()->findByPk($b);
                                    if ($b!=FALSE) {
                                        if (($b->status_id=='waiting') OR ($b->status_id=='nalozh_sent')) {
                                            Bill::payBill ($b->id);
                                        }
                                    }
                                }                                
                                Y::user()->setFlash ('admin','Поступление оплаты (где разрешено) зачислено и все начисления выполнены');
                                
                            break;                        
                        
                            //Отмена счетов
                            case 'cancel':
                                
                                foreach ($bills as $b) {
                                    $b = Bill::model()->findByPk($b);
                                    if ($b!=FALSE) {
                                        if ($b->status_id == 'waiting' || $b->status_id == 'nalozh' || $b->status_id == 'nalozh_confirmed') {                                            
                                            $b->status_id = 'cancelled';
                                            $b->notifySent = 3;
                                            $b->save (FALSE);
                                        }
                                    }
                                }                                
                                Y::user()->setFlash ('admin','Выбранные счета (где возможно) отменены');
                                
                            break;
                        
                            case 'delete':
                                
                                //Проверяем можно ли удалять счета оператору?
                                $alw = StaffAccess::allowed('bill');
                                if (in_array('index',$alw)) {
                                    if (!in_array('delete',$alw)) {
                                        Y::user()->setFlash ('admin','Извините, но администратор запретил Вам удалять счета');
                                        break;
                                    }
                                }
                                
                                foreach ($bills as $b) {
                                    $b = Bill::model()->findByPk($b);
                                    if ($b!=FALSE) {
                                        //Удаляем вначале все заказы
                                        $ord = $b->orders;
                                        foreach ($ord as $o) {
                                            $o->delete();
                                        }
                                        
                                        //Удаляем и счёт
                                        $b->delete ();
                                    }
                                }
                                Y::user()->setFlash ('admin','Выбранные счета удалены');
                                
                                
                            break;
                            
                        }
                        
                    } else {
                        Y::user()->setFlash ('admin','Не были выбраны счета');
                    }
                }
                
                $napis = 'все';
                
                if ($paid) {
                    $napis = 'все оплаченные';
                }
                
                if ($send) {
                    $napis = 'все неотправленные';
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
		$model=Bill::model()->findByPk((int)$id);
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
        
        private function myexcel ($bills,$all = FALSE, $paid = FALSE, $send = FALSE) {
                        
            //Формируем вначале список счетов
            $bs = array ();
            
            $efields = array ('ID','ФИО','Страна','Область','Город','Адрес','Индекс',
            'E-mail','Способ оплаты','Сумма оплаты','Партнер','Дата оплаты (заказа)','Телефон','Товары','Заказы','Статус','Примечание');
            
            //Если все - грузим список
            if ($all) {
                
                $criteria = new CDbCriteria;
                //Фильтры
                if ($paid) {                    

                    $criteria->compare('status_id','approved');
                    $criteria->compare('status_id','processing',FALSE,'OR');
                    $criteria->compare('status_id','sent',FALSE,'OR');
                    $criteria->compare('status_id','nalozh_ok',FALSE,'OR');                                        
                    
                } elseif ($send) {
                    $criteria->compare('status_id','processing');
                    $criteria->compare('status_id','nalozh_confirmed',FALSE,'OR');
                }
                
                $bs = Bill::model()->findAll ($criteria);
                
            } else {
                
                $bs = array ();
                foreach ($bills as $b) {
                    $bs[]=Bill::model()->findByPk ($b);
                }
                
            }
            
            $t = array (); //Всё
            // 
            
            //Спобственно формируем массив
            foreach ($bs as $b) {
                
                $ords = $b->orders;
                $gl = array();
                $ol = array();
                foreach ($ords as $o) {
                    $gl[]=$o->good_id;
                    $ol[]=$o->id;
                }
                
                $a = array (
                    $b->id,
                    $b->surname.' '.$b->uname.' '.$b->otchestvo,
                    $b->strana,
                    $b->region,
                    $b->gorod,
                    $b->address,
                    $b->postindex,
                    $b->email,
                    $b->way,
                    $b->sum.' '.strtoupper ($b->valuta),
                    $b->orders[0]->partner_id,
                    H::date(($b->payDate>0)?$b->payDate:$b->createDate),
                    $b->phone,
                    implode (',',$gl),
                    implode (',',$ol),
                    Lookup::item ('Status',$b->status_id),
                    $b->comment,
                    
                );
                
                $t[] = $a;
                
            }
            
            $fn = date ('Y_m_j_H_i').'.xls';
            
            Bill::excel ($efields,$t,$fn);
            
        }
        
        
}
