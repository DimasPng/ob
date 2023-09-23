<?php

class ForgotController extends Controller
{
	public $layout = '/layouts/login';

	public function actionIndex()
	{
		$model=new AdminForgot;
		if(isset($_POST['AdminForgot']))
		{
			$model->attributes=$_POST['AdminForgot'];
			if($model->validate())
			{
				$admin = $this->loadModel ($model->id);

				//Проверяем емайл
				if ($admin->email!=$model->email) {
					throw new CHttpException(404,'Введённый Вами e-mail не соответствует этому логину');
				}

				//Готовим данные для отправки
				$data = array (
					'username' => $admin->username,
					'link'	 	 => Yii::app()->getBaseUrl(true).'/admin/forgot/newpass/id/'.$admin->username.'/hash/'.$this->_hashPass($admin->password),
					'time'		 => date ('j.m.Y H:i:s'),
					'ip'		 => Y::request()->userHostAddress,
				);

				Mail::letter ('admin_forgot_link',$admin->email,$admin->firstName,$data);
				$this->redirect(array('forgot/sent'));

			}
		}

                //{KG}
		$this->render('index',array('model'=>$model));
	}

	public function actionSent()
	{
		$this->render('/forgot/sent');
	}

	public function actionNewpass($id,$hash)
	{
		if (!preg_match ('/^[a-z0-9]+$/',$id)) {
			throw new CHttpException(404,'Недопустимые символы в ID');
		}

		if (!preg_match ('/^[a-z0-9]+$/',$hash)) {
			throw new CHttpException(404,'Неверный формат хэша');
		}

                //{KG}
		$admin = $this->loadModel ($id);

		if ($hash!=$this->_hashPass($admin->password)) {
			throw new CHttpException(404,'Данная ссылка недействительна или уже была использована');
		}                

		//Новый пароль
		$newpass = H::random_string('alnum',rand (8,11));

		//Сохраняем новый пароль
		$admin->password = $newpass;
		$admin->passwordRepeat = $admin->password;
		$admin->save ();

		//Готовим данные для отправки
		$data = array (
			'username' => $admin->username,
			'password' => $newpass,
		);

		Mail::letter ('admin_forgot_pass',$admin->email,$admin->firstName,$data);

		$this->render('/forgot/sent2');
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
		$model=Staff::model()->findByAttributes(array('username' => $id));
		if($model===null)
			throw new CHttpException(404,'Администратора/Оператора с таким логином не существует.');
		return $model;
	}

	private function _hashPass ($pass) {
		$str=md5($pass.'theForgotten');
		return md5 ('hash1'.$str). md5 ('hash2'.$str);
	}

}