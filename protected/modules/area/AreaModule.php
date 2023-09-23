<?php

class AreaModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'area.models.*',
			'area.components.*',
		));

		$this->setComponents(array(
			'user' => array(
				'class' => 'CWebUser',
				'allowAutoLogin'=>true,
			)
		));

		 Yii::app()->user->setStateKeyPrefix("_{$this->id}");
		 Yii::app()->user->loginUrl = Yii::app()->createUrl('area/default/login');

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
        
        
}
