<?php

class ForgotController extends Controller
{
	public function actionIndex()
	{
		$model=new AffForgot;
		if(isset($_POST['AffForgot']))
		{
			$model->attributes=$_POST['AffForgot'];
			if($model->validate())
			{
				$partner = $this->loadModel ($model->id);

				//Проверяем емайл
				if ($partner->email!=$model->email) {
					throw new CHttpException(404,'Введённый Вами e-mail не соответствует этому RefID.');
				}

				//Готовим данные для отправки
				$data = array (
					'partner_id' => $partner->id,
					'password'	 => $partner->password,
				);

				Mail::letter ('forgot_pass',$partner->email,$partner->firstName,$data);
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

	public function loadModel($id)
	{
		$model=Partner::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Партнёра с таким RefID не существует.');
		return $model;
	}

}