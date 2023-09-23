<?php

class DefaultController extends Controller
{

	/**
	 * @return array action filters
	 */
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
		    	'actions'=>array('login'),
		    	'users'=>array('*'),
			),
		    array('allow',
		        'actions'=>array('index','logout'),
		        'users'=>array('@'),
		    ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Anew', array(
                    'sort'  => array (
                        'defaultOrder' => 'createTime DESC',
                    ),
                    'pagination' => array (
                        'pageSize' => Settings::item ('anewPerPage'),
                    )
                ));
                
                //{KG}
               $id = Y::user()->id;               

		$this->render('/default/index', array(
                    'dataProvider'=>$dataProvider,
                    'aff' => $this->loadModel($id),
                ));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array ('/aff'));
		}
                //{KG}
		// display the login form
		$this->render('/default/login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array ('/aff'));
	}
        

	public function loadModel($id)
	{
		$model=Partner::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Такого партнёра не существует.');
		return $model;
	}
        

}