<?php

class FormController extends Controller
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
				'actions' => StaffAccess::allowed('form'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
        
        
        public function actionIndex ()
        {
            //{KG}
            $this->render ('index');
        }
        
        public function actionGenerate ()
        {
            $f = file_get_contents ('./protected/data/formgen.txt');
            
            $g = Good::model ()->findByPk ($_POST['goodid']); 
            
            if (!$g) die ('Товар с таким ID не найден в базе');
            
            //Основа
            $c = H::cut_str('{basic}', '{/basic}', $f);
            
            //Базовый адрес
            $c = str_replace ('{burl}',Y::bu(),$c);
            
            //Заголовок и ID
            $c = str_replace ('{goodname}',$g->title,$c);
            $c = str_replace ('{goodid}',$g->id,$c);
            
            //{KG}
            //Блок1
            $c = str_replace ('{block1}',$_POST['block1'],$c);
            
            //Блок 2
            $f = str_replace ('{block2}',$_POST['block2'],$f);
            
            
            //Формируем список
            $ls = array ();
            $fields = array ('email','uname','amail','cupon','surname','otchestvo','strana','gorod','region','comment','phone','postindex','address','block');
            
            $fp = $_POST['f']; //Поля чекбоксы
            $pp = $_POST['p']; //Позиции            
            
            foreach ($fields as $one)
            {
                if (isset ($fp[$one])) {
                    $ls[$one] = $pp[$one]+0;
                } else {
                    $no = 'нет';
                    if ($one == 'email') $no = 'noemail@example.com';
                    if ($one == 'amail') $no = '';
                    if ($one == 'cupon') $no = '';
                    $c .= '<input type="hidden" name="Bill['.$one.']" value="'.$no.'">'."\r\n";
                }
            }
            
            asort ($ls); //Сортировка массива
            
            foreach ($ls as $key=>$one)
            {
                $c .= H::cut_str('{b_'.$key.'}', '{/b_'.$key.'}', $f);
            }            
            
            //Конец
            $c .= H::cut_str('{basic2}', '{/basic2}', $f);
            
            $this->render ('generate',array ('code' => $c));
        }
    
}