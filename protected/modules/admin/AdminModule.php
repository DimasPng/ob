<?php

class AdminModule extends CWebModule
{
	public function init()
	{


		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
                

		$this->setComponents(array(
			'user' => array(
				'class' => 'CWebUser',
				'allowAutoLogin'=>false,
			)
		));
                
                
		Yii::app()->user->setStateKeyPrefix("_{$this->id}");
		Yii::app()->user->loginUrl = Yii::app()->createUrl('admin/login');
                
                
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
        
        private function _lc () {

            //[CODEA]

            if (defined ('OM_LIC')) return TRUE;

            //[CODEB1]
            //Проверяем или есть key.php
            $f = './key.php';

                    if (!file_exists ($f)) exit ('Для использования скрипта необходимо загрузить файл лицензии key.php');

            //Проверяем ключ
            require ($f);

            //[/CODEB1]

            //[CODEB2]

            if (!isset ($omkey)) die ('Ключ повреждён');

            //Проверка по размеру
            $len = strlen($omkey);
            if ($len!=1664) die ('Ключ повреждён');
            //[/CODEB2]

            //Проверка на правильность адреса
            $host = strtolower ($_SERVER['HTTP_HOST']);
            if (substr ($host,0,4)=='www.') {
                $url = 'http://'.substr ($host,4).$_SERVER['REQUEST_URI'];                
                Header ("Location: $url");
                die ();
            }

            //[CODEB3]
            //Проверка CRC
            $omhost = getenv ('HTTP_HOST');

                    //Сам ключ
                    $jk = substr ($omkey,0,1600);
                    $keycrc = substr ($omkey,1600,64);
                    //[/CODEB3]
                    //[CODEB4]

            $crc = md5 ($jk.'omcrc1'.$omhost).md5 ($jk.'omcrc2'.$omhost);

            if ($keycrc!==$crc) die ('Ключ повреждён или лицензия для другого домена');

            //Устанавливаем константу
            if (!defined ('OM_LIC')) {
                    define ('OM_LIC',$jk);
            }
            //[/CODEB4]

            //[CODEB5]

            //И хост
            if (!defined ('OM_LIC_HOST')) {
                    define ('OM_LIC_HOST',$omhost);
            }           
               
            
            //[/CODEB5]

            //[/CODEA]

        }
                
        
}
