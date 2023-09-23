<?php

class SellsController extends Controller
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
    
	public function actionIndex($paid = FALSE)
	{
   		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values                
                
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];                
               
                $model->partner_id = Yii::app()->user->id;
                
                $partner = $this->loadModel ($model->partner_id);
                
                if ($partner == FALSE) die ('Bad partner ID. Relogin, please, or contact administrator');
                $ppp = $model->partner_id;
                $ppp = trim ($ppp);
                if (empty ($ppp)) die ('Bad partner id. Relogin please or contact administrator');
                
                if ($paid) {
                    $model->paidOnly = TRUE;
                }

                //{KG}
		$this->render('index',array(
			'model'=>$model,
                        'partner' => $partner,
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