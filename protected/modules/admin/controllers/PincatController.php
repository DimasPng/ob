<?php

class PincatController extends Controller
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
				'actions' => StaffAccess::allowed('pincat'),
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
		$model=new Pincat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pincat']))
		{
			$model->attributes=$_POST['Pincat'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
                //{KG}

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

		if(isset($_POST['Pincat']))
		{
			$model->attributes=$_POST['Pincat'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$this->loadModel($id)->delete();
		Y::user()->setFlash ('admin','Категория пин-кодов');
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));


		/*if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');*/
                
                
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Pincat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pincat']))
			$model->attributes=$_GET['Pincat'];

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
		$model=Pincat::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pincat-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        //Добавление пачки пин-кодов
        public function actionAddcodes ($id)
        {
            
            if (empty ($_POST)) {
                die ('Не переданы коды');                
            }
            
            //{KG}
            $codes = trim ($_POST['tbody']);
            
            if (empty ($codes)) die ('Не введены коды');
            
            $codes = str_replace ("\r\n","\n",$codes);
            $codes = str_replace ("\r","\n",$codes);
            
            $arr = explode ("\n",$codes);
            
            $nn = 0;
            foreach ($arr as $one)
            {
                $one = trim ($one);
                if (empty ($one)) continue; //Пропускаем лишние коды
                
                //Ищем нет ли такого пин-кода в базе
                $pp = Pin::model ()->find (array (
                    'condition' => 'pincat_id = :pincat_id AND code = :code',
                    'params' => array (
                        ':pincat_id' => $id+0,
                        ':code' => $one,
                    ),
                ));
                
                if ($pp) continue; //Если есть уже в базе - пропускаем этот код
                
                $pin = new Pin ();
                $pin->id = false;
                $pin->pincat_id = $id+0;
                $pin->isNewRecord = true;
                $pin->added = time ();
                $pin->used = 0;
                $pin->code = $one;
                $pin->save ();
                
                $nn++;
                
            }
            
            //Установить флэш
            Y::user()->setFlash ('admin','Добавлено '.$nn.' кодов');
            
            //Первести на просмотр категории
            $this->redirect (array ('pin/index','cat' => $id));
            
            
        }        
}
