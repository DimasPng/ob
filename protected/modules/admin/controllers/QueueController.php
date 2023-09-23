<?php

class QueueController extends Controller
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
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{

		$this->loadModel($id)->delete();
		Y::user()->setFlash ('admin','Очередь удалена');
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
		$model=new Queue('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Queue']))
			$model->attributes=$_GET['Queue'];

                //{KG}
		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        //Очистка очереди
        public function actionClean ()
        {
            $cc = Yii::app()->db->createCommand ()->truncateTable ('{{queue}}');
            Y::user()->setFlash ('admin','Очередь очищена');
            $this->redirect (array ('index'));
        }
        
        //Принудительная рассылка
        public function actionSend ()
        {
            if (Queue::model()->count()>0) {
                    $t = time ();                    
                    //Обновляем время запуска
                    $this->_save ('cronRass',$t);

                    $xx = $this->_dorass();

            }
            
            Y::user()->setFlash ('admin','Отправлено '.$xx .' писем');
            $this->redirect (array ('index'));
        }
        

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Queue::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='queue-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
	//Сохранение нового значения в настройках
	private function _save ($key, $val) {
                   
           Yii::app()->db->createCommand()
                ->update('{{settings}}', array(
                    'value'=>$val,
                    ),'id=:id', array(':id'=>$key));		
	}        
        
	private function _dorass () {		
            
                $limit = Settings::item ('mailLimit');
                
                $criteria = new CDbCriteria;
                $criteria->limit = (int) $limit;
                $criteria->order = 'priority DESC';
                
                $res = Queue::model()->findAll ($criteria);
		
		foreach ($res as $r) {		
                    
                    $em = trim($r->email);
                    if (!empty ($em)) {
                        Mail::send ($r->email,'',$r->subject,$r->body,$r->format);    
                    }                    
                    //echo ($r->email);
			
                    $r->delete (); //Удаляем из очереди
                    
		}
		
		return count ($res);
		
	}               
}
