<?php

class ClientController extends Controller
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
				'actions' => StaffAccess::allowed('client'),
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
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');*/
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
            //{KG}
		$model=new Client('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];
                

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
		$model=Client::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        //Импорт клиентов
        public function actionImport ()
        {
            //{KG}
            if (!empty ($_POST))
            {
                if (empty ($_POST['list'])) die ('Не заполнен список клиентов');
                
                //Делаем анализ
                $good = $_POST['good'];
                $ls = trim ($_POST['list']);
                $f = trim ($_POST['format']);
                
                //Определяем разделитель
                $raz = H::cut_str ('}','{',$f);
                
                $em = FALSE;
                //Определяем что первое
                if (strpos ($f,'{email}')<2) {
                    $em = TRUE;
                }
                
                //Собственно цикл
                $ll = explode ("\n",$ls);
                
                $c = new Client; 
                $cc = 0;
                
                foreach ($ll as $one)
                {
                    $one = trim ($one);                    
                    $one = explode ($raz,$one);
                    
                    $c->isNewRecord = TRUE;
                    $c->id = FALSE;
                    if ($em) {
                        $c->email = trim ($one[0]);
                        $c->uname = trim ($one[1]);                        
                    } else {
                        $c->uname = trim ($one[0]);
                        $c->email = trim ($one[1]);
                    }
                    if (strpos ($c->email,'@')===FALSE) {
                        echo '<h2 align="center">Что-то неверно с форматом, т.к. система не нашла знак @ в одном из адресов - "'.$c->email.'"';
                        break;
                    }
                    
                    $c->subscribe = 1;
                    $c->good_id = $good;
                    $c->date = time ();
                    $c->save (FALSE);
                    $cc++;
                    
                }                
                
                Y::user()->setFlash ('admin','Клиенты внесены в базу. Записей добавлено: '.$cc .'.');
                
            }
            
            //{KG}
            
            $this->render ('import');
        }
        
        //Экспорт клиентов
        public function actionExport ()
        {
            $data = '';
            $dc = 0;
            
            if (!empty ($_POST)) {
                
                $g = $_POST['good'];
                $f = $_POST['format'];
                
                $cl = Client::model ()->findAll (array (
                    'condition' => 'good_id = :good_id',
                    'params' => array (
                        ':good_id' => $g,
                    )                    
                ));
                
                $f = str_replace ('{good_id}',$g,$f);
                
                foreach ($cl as $one) {
                    
                    $s = $f;
                    $s = str_replace ('{uname}',$one->uname,$s);
                    $s = str_replace ('{email}',$one->email,$s);
                    $s = str_replace ('{amail}',$one->amail,$s);
                    $s = str_replace ('{date}',date ('j.m.Y',$one->date),$s);
                    $s = str_replace ('{subscribe}',$one->subscribe,$s);
                    
                    $data .= $s . "\r\n";
                    $dc++;
                }
                    
                if (empty ($data)) {
                    $data = 'Для данного товара клиенты не найдены';
                } else {
                    $data = trim ($data);
                }
                
            }
            //{KG}
            $this->render ('export', array ('data' => $data, 'dc' => $dc));
        }
}
