<?php

class CuponController extends Controller
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
				'actions' => StaffAccess::allowed('cupon'),
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
	public function actionCreate()
	{
		$model=new Cupon;

                //{KG}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cupon']))
		{
			$model->attributes=$_POST['Cupon'];
                        $model->startDate = H::dateParse ($model->startDate);
                        $model->stopDate = H::dateParse ($model->stopDate);
						$model->partner_id = Y::user()->id;
                        
                        if($model->validate()) {
                        
                            if ($model->pack<1) {
                                if($model->save()) {
                                    Y::user()->setFlash ('admin','Запись добавлена');
                                    $this->redirect(array('view','id'=>$model->id));
                                }
                            } else {
                                
                                $cpid = $model->code;
                                
                                for ($i=1; $i<=$model->pack; $i++) 
                                {
                                    $mm = clone $model;
                                    $mm->code = $cpid . H::random_string('lower',15);
                                    $mm->save ();
                                }
                                
                                    Y::user()->setFlash ('admin','Купоны созданы');
                                    $this->redirect(array('cupon/index','Cupon[category_id]'=>$model->category_id));
                                
                                
                            }
                            
                            
			}  
                        $model->startDate = H::date ($model->startDate);
                        $model->stopDate = H::date ($model->stopDate);
		} else {
                    $model->pack = 0;
                }

                
                
		$this->render('create',array(
			'model'=>$model,
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
                $model->startDate = H::date ($model->startDate);
                $model->stopDate = H::date ($model->stopDate);                

		if(isset($_POST['Cupon']))
		{
			$model->attributes=$_POST['Cupon'];
                        $model->startDate = H::dateParse ($model->startDate);
                        $model->stopDate = H::dateParse ($model->stopDate);
                        
			if($model->save()) {
				Y::user()->setFlash ('admin','Изменения сохранены');
				$this->redirect(array('view','id'=>$model->id));
			}
                        $model->startDate = H::date ($model->startDate);
                        $model->stopDate = H::date ($model->stopDate);                
		}

                //{KG}
		$this->render('update',array(
			'model'=>$model,
		));                
                
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		Y::user()->setFlash ('admin','Купон удален');
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));

		/*if(Yii::app()->request->isPostRequest)
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
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');*/
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Cupon('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cupon']))
			$model->attributes=$_GET['Cupon'];

                //{KG}
		$this->render('index',array(
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
		$model=Cupon::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cupon-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
