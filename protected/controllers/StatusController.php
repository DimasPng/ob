<?php

class StatusController extends Controller
{
	public function actionIndex($b,$c)
	{
            if (!is_numeric ($b)) die ('Bad number');
            
            if (!preg_match ('/^[0-9a-z]+$/',$c)) die ('Bad crc format');
            
            //Проверяем CRC
            if (Bill::statusCrc ($b)!==$c) die ('Bad CRC');            
            
            
            //Грузим счёт
            $model = Bill::model ()->findByPk ($b);
            
            if (!$model) die ('Данный счёт не существует');
            //{KG}
            
            
            $notify = Y::bu().'notify/index/b/'.$model->id.'/c/'.Bill::notifyCrc ($model->id);                   
            
            $this->render('index', array (
                'model' => $model,
                'notify' => $notify,
            ));
	}
        
}