<?php

class DefaultController extends Controller
{

	/**
	 * @return array action filters
	 */
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
		    	'actions'=>array('login'),
		    	'users'=>array('*'),
			),
		    array('allow',
		        'actions'=>array('index','logout','prolong','end'),
		        'users'=>array('@'),
		    ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
            //Делаем проверку по сроку
            if (Y::user()->payTill<time()) {
                   $this->redirect (array ('end'));
            }

            $sections = $models=AreaSection::model()->findAll(array(
                'order'=>'position',
                'condition' => 'area_id=:id',
                'params' => array (':id' => Y::user()->areaId),
            ));
            
            //{KG}

            $this->render('index',array(
                'sections'=>$sections,
            ));
		
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array ('/area'));
		}
		// display the login form
		$this->render('/default/login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array ('/area'));
	}

        /*
         * Отображает страницу, когда срок закончился
         */
        public function actionEnd()
        {
            $this->render ('noaccess');
        }
        
        //Продление закрытой зоны
        public function actionProlong()
        {
            if (empty ($_POST)) die ('Не заполнена форма');
            
            $pid = $_POST['paylist_id'];
            if (!is_numeric ($pid)) die ('Неверный номер');
            
            //Получаем вариант продления
            $pl = AreaPaylist::model()->findByPk ($pid);
            
            if (!$pl) die ('Извините, но такой срок не найден');
            
            //Проверяем на соответствие закрытой зоне
            if ($pl->area_id!=Yii::app()->user->areaId) die ('Данный срок не относится к этой закрытой зоне');
            
            //Если всё в порядке - формируем счёт
            Bill::areaBill ($pl->area_id,Yii::app()->user->id,$pl->srok,$pl->price);
            
        }

        
        

}