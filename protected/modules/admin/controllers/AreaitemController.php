<?php

class AreaitemController extends Controller
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
				'actions' => StaffAccess::allowed('area_files'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

            //{KG}
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($a = 1)
	{
		$model=new AreaItem;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AreaItem']))
		{
			$model->attributes=$_POST['AreaItem'];
                        $model->uploadDate = time ();
			if($model->save()) {
				Y::user()->setFlash ('admin','Запись добавлена');
				$this->redirect(array('view','id'=>$model->id));
			}
		} else {
                    $model->area_id = $a;
                }
                //{KG}

		$this->render('create',array(
			'model'=>$model,
                        'area_id' => $a,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AreaItem']))
		{
			$model->attributes=$_POST['AreaItem'];
			if($model->save()) {
				Y::user()->setFlash ('admin','Изменения сохранены');
				$this->redirect(array('view','id'=>$model->id));
			}
		}     
                //{KG}
         
		$this->render('update',array(
			'model'=>$model,
                        'area_id' => $model->area_id,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax'])) {
				Y::user()->setFlash ('admin','Запись удалена');
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex($a = 1)
	{
		$model=new AreaItem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AreaItem']))
			$model->attributes=$_GET['AreaItem'];
                $model->area_id = $a;
                //{KG}

		$this->render('index',array(
			'model'=>$model,
                        'area_id' => $a,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=AreaItem::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='area-item-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
