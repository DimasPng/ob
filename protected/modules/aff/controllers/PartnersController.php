<?php

class PartnersController extends Controller
{
    
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
		        'actions'=>array('index'),
		        'users'=>array('@'),
		    ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}    
    
	public function actionIndex()
	{
               
                $pid = Yii::app()->user->id;
                
                $partner = $this->loadModel ($pid);
                
                if ($partner == FALSE) die ('Bad partner ID. Relogin, please, or contact administrator');
                
                //{KG}
		$this->render('index',array(			
                        'model' => $partner,
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