<?php

/**
 * Профиль партнёра
 *
 * @version $Id$
 * @copyright 2010
 */

class ProfileController extends Controller {

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
		    array('allow',
		        'actions'=>array('index','edit'),
		        'users'=>array('@'),
		    ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex ()
	{
		$id = Y::user()->id;

                //{KG}
		$this->render('/profile/index',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionEdit ()
	{
		$id = Y::user()->id;

		$model = $this->loadModel($id);
		$model->passwordRepeat = $model->password;

		if(isset($_POST['Partner']))
		{

			$allowed = array ('country','firstName','email','password','passwordRepeat','url','aboutProject','maillist',
							  'wmz','wmr','rbkmoney','yandex','zpayment','city');
			$fields = array ();

			foreach ($allowed as $one){
				$fields[$one] = $_POST['Partner'][$one];
			}


			$model->attributes=$fields;
			if($model->save()) {
				Y::user()->setFlash ('aff', Yii::t ('aff','Изменения сохранены'));
				$this->redirect (array ('/aff/profile'));
			}
		}

		$this->render('/profile/edit',array(
			'model'=>$model,
		));

	}


	public function loadModel($id)
	{
		$model=Partner::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Такого партнёра не существует.');
		return $model;
	}

}

?>