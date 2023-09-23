<?php
require $_SERVER["DOCUMENT_ROOT"].'/ob/protected/vendor/autoload.php';

class RegController extends Controller
{
	public function actionIndex()
	{
            //{KG}
		$model=new Partner;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Partner']))
		{
			$model->attributes=$_POST['Partner'];
                        if ($model->id == 'obsys') die ('Извините, но этот логин запрещён к регистрации');
                        if ($model->id == 'admin') die ('Извините, но этот логин запрещён к регистрации');
						if ($model->id == '1') die ('Извините, но этот логин запрещён к регистрации');
			if($model->save()) {



					/* связь с маэйл рэй та*/					

					if(Settings::item('ml'))
					{
						
						$groupsApi = (new MailerLiteApi\MailerLite(Settings::item('ml')))->groups();

						if(Settings::item('mlp'))
						{
							$subscriber = array (
								'email' => $model->email,
								'fields' => array(
									'name' => $model->firstName
								)
							);

							$response = $groupsApi->addSubscriber(Settings::item('mlp'), $subscriber);

							//print_r($response);

							//$subscribers = $groupsApi->getSubscribers(Settings::item('mlp'));

							//print_r($subscribers);
						}
					}

					/* связь с Sendpulse*/		
					if(Settings::item('sendpulseID')!="" && Settings::item('sendpulseSecret')!="") 
					{
						if(Settings::item('sendpulsePartner')!="")
						{
							if(Settings::item('sendpulsePartner')!="0")
							{
								Sendpulse::addEmail(Settings::item('sendpulsePartner'), $model->email, $model->firstName);								
							}
						}
					}
					
					/**/




				$data = array (
					'partner_id' => $model->id,
					'password'	 => $model->password,
				);
                                
				Mail::letter ('affreg',$model->email,$model->firstName,$data);                                
                                
                                Log::add ('newpartner','Зарегистрирован новый партнёр "'.$model->id.'" с e-mail: '.$model->email.' и партнёром 2го уровня: "'.$model->parent_id.'"');                                
                                
				$this->redirect(array('reg/ok'));

			}

		}

		$this->render('/reg/index',array(
			'model'=>$model,
		));
	}

	public function actionOk()
	{
		$this->render('/reg/ok');
	}

	/**
	 * Указание action для каптчи
	 */
	public function actions(){
		return array(
		    'captcha'=>array(
		        'class'=>'MyCCaptchaAction',
		        'backColor'=>0xFFFFFF,
		    ),
		);
	}

}