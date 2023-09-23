<?php

class TemplatesController extends Controller
{
        //Права доступа
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

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
    
	public function actionEdit()
	{
            if (empty($_GET)) {
                die ('Не переданы параметры');
            }
            
            //{KG}
            
            $module = $_GET['m'];
            $tm = $_GET['t'];
            if (!empty ($_GET['n'])) {
                $new = $_GET['n'];
            } else {
                $new = FALSE;
            }
            

            if ($module!='main') {
                $fn = './protected/modules/'.$module.'/views/'.$tm.'.php';
            } else {
                $fn = './protected/views/'.$tm.'.php';
            }         

            //Если шаблон на замену
            if (!empty ($new)) {
                
                $ffn = './protected/views/user/'.$new.'.php';
                if (file_exists ($ffn)) {
                    $fn = $ffn;
                }
                
            }            
            
            $fn2 = $fn;
            
            if (!empty ($new)) {
                $fn2=$ffn;
            }
            
            
            if (!file_exists ($fn)) die ('Файл с шаблоном не существует');
            
            if (!is_writeable($fn)) die ('К сожалению, на данный файл '.$fn.' не установлены права на запись (обычно это 766)');
            
            $template_data = file_get_contents ($fn);
            
            
            if ($_POST) {
                $template_data = $_POST['template_data'];
                
                if (!empty($new)) {
                     //Делаем копию файла
                    if (!file_exists ($ffn)) {                        
                       fclose (fopen ($ffn,'w'));                       
                    }
                }
                //Записываем в файл изменённый шаблон
                $fp = fopen ($fn2,'w');
                fwrite ($fp,$template_data);
                fclose ($fp);
                
                Y::user()->setFlash ('admin','Изменения сохранены');                
                
            }
            
            $this->render('edit',array (
                'template_data' => $template_data,
                'tmname' => $module.'/'.$tm,
            ));
	}

	public function actionIndex()
	{
		$this->render('index');
	}

}