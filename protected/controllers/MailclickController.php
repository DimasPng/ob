<?php

class MailclickController extends Controller
{

	public function init ()
	{
		parent::init ();
		$this->layout = '//layouts/main';
	}

	public function actionIndex()
	{
		$get = $_GET; //Часть GET
		//echo "<pre>"; print_r($get); echo "<pre>";

			 
            
		//Ищем запись в таблице Mailclick запись с type=$get["type"] и email=$get["email"]
		/*$r = Mailclick::model ()->find (array (
			'condition' => 'type = :type AND email = :email',
			'params' => array (
				':type' => $get["type"],
				':email' => $get["email"]
			),
		));*/
		
		//Если найдено - увеличиваем число кликов и сохраняем
		/*if ($r) {
			$r->click++;
			$r->date_click = time ();
			$r->save (false);
		} else {*/
			$s = new Mailclick ();
			$s->id = false;
			$s->isNewRecord = true;
		
			$s->email = $get["email"];
			$s->ref_id = $get["ref_id"];
			$s->client_id = $get["client_id"];
			$s->type = $get["type"];
			$s->click = 1;
			$s->date_click = time ();	
			$s->save (false);
		/*}*/


		
		if($get["redirect"]!=""){
			$this->redirect ($get["redirect"]);
		}
		else{
			$this->redirect (array('/catalog/'));
		}

		

		//$this->redirect (array('/catalog/'));
		//$this->render('/mailclick/index',array());
                
                //{END}
				
	}
	
}