<?php

class GoodController extends Controller
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
				'actions' => StaffAccess::allowed('good'),
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
		$model=new Good;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                //{KG}
		if(isset($_POST['Good']))
		{
			$model->attributes=$_POST['Good'];
			if($model->save()) {
				Y::user()->setFlash ('admin','Запись добавлена');
				$this->redirect(array ('good/index'));
			}
		} else {
                    $model->used = 1;
                    
                    $let = Letter::model()->findByPk('good_default_letter');
                    if ($let!=FALSE) {
                        $model->letterSubject = $let->subject;
                        $model->letterType = $let->type;
                        $model->letterText = $let->message;
                    }
                    
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

                //{KG}
		if(isset($_POST['Good']))
		{
			$model->attributes=$_POST['Good'];
			if($model->save()) {
				Y::user()->setFlash ('admin','Изменения сохранены');
				$this->redirect(array ('good/index'));
			}
		}

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
		Y::user()->setFlash ('admin','Запись удалена');
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
			echo 1;*/
			//throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex($used = 1)
	{
            //{KG}
		$model=new Good('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Good']))
			$model->attributes=$_GET['Good'];
			
        $model->used = $used;        
                

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
		$model=Good::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='good-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        public function actionSend ($id) {
            
            $model = $this->loadModel($id);
            
            //{KG}
            if (!empty($_POST)) {
                
                $email = strtolower ($_POST['email']);
                //Проверяем формат E-mail:
                if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
                    die ('Неверный формат e-mail');
                }
                $uname = trim($_POST['uname']);
                
                //Выполняем функцию отправки товара
                $model->sendGood ($uname,$email);
               
                //Редирект на просмотр товара
                
		Y::user()->setFlash ('admin','Товар отправлен на e-mail '.$email);
		$this->redirect(array('view','id'=>$model->id));                
                
            }
            
            $this->render('send',array(
		'model'=>$model,
            ));
        }
        
}
