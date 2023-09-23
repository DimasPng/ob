<?php

class OrderController extends Controller
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
				'actions' => StaffAccess::allowed('order'),
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
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];
                
                //{KG}
                                                                                                            
            if (!empty($_POST)) {                
                $st = $_POST['operation'];                
                
                if ($st == 'excel') {
                    $orders = $_POST['orders'];
                    $this->myexcel ($orders);
                    return TRUE;
                }
                
            }                                                                                                                       

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
		$model=Order::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
                
                //Проверяем страну
                $cn = StaffAccess::allowed ('country');
                
                if (!empty ($cn)) {
                    if ($cn[0]!='none') {
                        if (!in_array($model->country,$cn)) {
                            die ('Вам не разрешено работать с данным счётом');
                        }
                    }
                }
                
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        private function myexcel ($orders) {
                        
            //Формируем вначале список счетов
            $bs = array ();
            
            $efields = array ('ID заказа','ФИО','Страна','Область','Город','Адрес','Индекс',
            'E-mail','Способ оплаты','Сумма оплаты','Партнер','Дата оплаты (заказа)','Телефон','Товар','ID счёта','Статус','Примечание');
            
                
            $bs = array ();
            foreach ($orders as $b) {
                $bs[]=Order::model()->findByPk ($b);
            }
                
            
            $t = array (); //Всё
            // 
            
            //Спобственно формируем массив
            foreach ($bs as $or) {
                
                
                $b = Bill::model ()->findByPk ($or->bill_id);
                
                $a = array (
                    $or->id,
                    $b->surname.' '.$b->uname.' '.$b->otchestvo,
                    $b->strana,
                    $b->region,
                    $b->gorod,
                    $b->address,
                    $b->postindex,
                    $b->email,
                    $b->way,
                    $b->sum.' '.strtoupper ($b->valuta),
                    $b->orders[0]->partner_id,
                    H::date(($b->payDate>0)?$b->payDate:$b->createDate),
                    $b->phone,
                    $or->good_id,
                    $b->id,
                    Lookup::item ('Status',$b->status_id),
                    $b->comment,
                    
                );
                
                $t[] = $a;
                
            }
            
            $fn = 'orders_'.date ('Y_m_j_H_i').'.xls';
            
            Bill::excel ($efields,$t,$fn);
            
        }        
}
