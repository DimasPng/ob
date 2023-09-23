<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	/**
	 * Функции, вызываемые при иницилизации
	 */
	public function init ()
	{
		parent::init ();
                
	}

        
        //Переопределение рендера
        public function render ($file, $data = array (), $return = FALSE, $newtm = FALSE)
        {
            //Проверяем или есть переопределённый шаблон
            if ($newtm!==FALSE) {
                $fn = './protected/views/user/'.$newtm.'.php';
                
                if (file_exists ($fn)) {
                    $file = '//user/'.$newtm;
                }
            }
            
            return parent::render ($file, $data, $return);
        }


}