<?php

class StaffaccessController extends Controller
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
				'actions' => StaffAccess::allowed(''),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionIndex($id)
	{
		$model=$this->loadModel($id);
		//Y::dump ($_POST['StaffAccess']);

		foreach ($model->attributes as $attr=>$value){
			if ($attr=='id') continue;
			if ($attr=='country') continue;

			$model->$attr = explode (',',$value);
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StaffAccess']))
		{
			//Сворачиваем
			foreach ($model->attributes as $attr=>$value){
				if ($attr == 'id') continue;
				$model->$attr = '';
				if ($attr=='country') $model->country = $_POST['StaffAccess'][$attr];

				if (isset($_POST['StaffAccess'][$attr])) {
					if (is_array($_POST['StaffAccess'][$attr])) {
						$model->$attr = implode (',',$_POST['StaffAccess'][$attr]);
					}
				}

			}

                        //{KG}
			//$model->attributes=$_POST['StaffAccess'];

			if($model->save()) {
				Y::user()->setFlash ('admin','Изменения сохранены');
				$this->redirect(array('staff/view','id'=>$model->id));
			}
		}
                
                

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=StaffAccess::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
