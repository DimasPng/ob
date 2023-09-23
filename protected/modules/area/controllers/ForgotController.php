<?php

class ForgotController extends Controller
{
	public function actionIndex()
	{
		$model=new AreaForgot;
		if(isset($_POST['AreaForgot']))
		{
			$model->attributes=$_POST['AreaForgot'];
			if($model->validate())
			{
				$auser = AreaUser::model ()->findAll (array (
                                    'condition' => 'email = :email',
                                    'params' => array (
                                        ':email' => $model->email,
                                    )
                                ));
                                
                                if (!$auser) {
                                    die ('Извините, но пользователя с таким e-mail нет в базе');
                                }
                                
                                //Найденные логины
                                $dd = '';
                                $nn = 1;
                                foreach ($auser as $one) {
                                    
                                    $dd .= 'Логин';
                                    if ($nn > 1) {
                                        $dd .= ' #'.$nn;
                                    }
                                    $dd .= ':' . $one->username . "\r\n";
                                    $dd .= 'Пароль: '.$one->password . "\r\n\r\n";
                                    
                                    $nn++;
                                }

				//Готовим данные для отправки
				$data = array (
					'data' => $dd,
				);

				Mail::letter ('forgot_area',$model->email,'User',$data);
				$this->redirect(array('forgot/sent'));

			}
                        
		}
                
                //{KG}

		$this->render('/forgot/index',array('model'=>$model));
	}

	public function actionSent()
	{
		$this->render('/forgot/sent');
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