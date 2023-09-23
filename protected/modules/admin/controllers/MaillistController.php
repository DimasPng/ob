<?php


class MaillistController extends Controller
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
				'actions' => StaffAccess::allowed('maillist'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Rass;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rass']))
		{
			$model->attributes=$_POST['Rass'];
			if($model->save())
				$this->redirect(array ('maillist/index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        public function actionAdd ()
        {
            if (empty ($_POST)) die ();            
            Rass::addUser($_POST['rid'], $_POST['email'], $_POST['uname']);
            Y::user()->setFlash ('admin','Действие выполнено');
            $this->redirect (array ('maillist/index'));
        }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

                //{KG}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rass']))
		{
			$model->attributes=$_POST['Rass'];
			if($model->save())
				$this->redirect(array ('maillist/index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            
                $model = $this->loadModel($id);
                //Вместе с удалением рассылки удаляем всех подписчиков, записи все
                $rr = RassUser::model ()->findAll ('rass_id = '.$model->id);
                foreach ($rr as $one)
                {
                    $one->delete ();
                }

                $rr = RassSub::model ()->findAll ('rass_id = '.$id);
                foreach ($rr as $one)
                {
                    $one->delete ();
                }

                $rr = RassLetter::model ()->findAll ('rass_id = '.$id);
                foreach ($rr as $one)
                {
                    $one->delete ();
                }
            
		$model->delete();
		Y::user()->setFlash ('admin','Запись удалена');
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		/*if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Rass('search');
		$model->unsetAttributes();  // clear any default values
                
		if(isset($_GET['Rass']))
			$model->attributes=$_GET['Rass'];

                //{KG}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Rass the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Rass::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Rass $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rass-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
