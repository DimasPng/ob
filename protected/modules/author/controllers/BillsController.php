<?php

class BillsController extends Controller
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
	
        $model = $this->loadModel (Y::user()->id);
        $goods = $model->goods;	
	
            //{KG}
		if (empty ($goods)) die ('Извините, но администратор Вам не назначил товаров - поэтому доступ невозможен');	

		$orderss=Order::model()->findAll();

   		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values                
                
                
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];                

		$this->render('index',array(
			'model'=>$model, 'goods' => $goods
		));
	}
	
	public function loadModel($id)
	{
		$model=Author::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Автора с таким ID не существует.');
		return $model;
	}
	

}