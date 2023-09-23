<?php

class MainController extends Controller
{
	public function actionIndex()
	{
            //{START}
            
		$this->layout = '//layouts/main';                                
                
            //{KG}
                
		$this->render('/main/index');
                
            //{END}
                
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


}