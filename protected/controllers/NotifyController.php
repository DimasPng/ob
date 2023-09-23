<?php

class NotifyController extends Controller
{
	public function actionIndex($b,$c)
	{
            
            //Проверяем по формату
            if (!is_numeric ($b)) die ('Bad bill ID');
            
            if (!preg_match ('/^[0-9a-z_]+$/',$c)) die ('Bad CRC');            
            
            if (Bill::notifyCrc($b)!=$c) {
                die ('Bad CRC');
            }
            
            //Получаем счёт
            $bill = Bill::model()->findByPk ($b);
            
            if (!$bill) die ('Счёт не найден'); 
            
            if (($bill->status_id!='waiting') AND ($bill->status_id!='nalozh_sent')) {
                throw new CHttpException (403,'Извините, но данный счёт уже был изменён ранее и не может быть повторно изменён');
            }
            
            $model=new NotifyForm;                        
            
            
            //Проверяем если заполнена форма
            if (isset($_POST['NotifyForm'])) {
                $model->attributes=$_POST['NotifyForm'];
		if($model->validate())
		{
                    //Если успешно - отправляем письмо и редирект                    
                    $d = array (
                        'bill_id' => $bill->id,
                        'status_link' => Bill::statusLink ($b),
                        'way' => $model->way,
                        'message' => $model->message,                        
                    );

                    //Сумма
                    $d['sum'] = H::mysum($bill->sum).H::valuta($bill->valuta);

                    //Ссылка на счёт в админке
                    $d['admin_link'] = Y::bu().'admin/bill/view/id/'.$b;

                    //Собственно отправка
                    Mail::sys ('admin_notify_paid',$d);
                    
                    
                    $this->redirect (array('notify/ok'));
                }

                
            }
            
            
            //Показ формы для уведомления ручной оплаты
            $this->render('index', array (
                'bill' => $bill,
                'model' => $model,
            ));
	}

	public function actionOk()
	{
		$this->render('ok');
	}

	public function actionUnsub($t,$i,$c)
	{
            if (!preg_match ('/^[a-z0-9_]+$/',$t)) die ('Bad link');
            if (!preg_match ('/^[a-z0-9_]+$/',$i)) die ('Bad link');
            if (!preg_match ('/^[a-z0-9_]+$/',$c)) die ('Bad link');
            
            //Проверка CRC
            if (Queue::unsubCrc ($t,$i)!=$c) die ('Bad crc');
            
            //Ищем запись
            if ($t=='p') {
                $r = Partner::model()->findByPk ($i);
                if (!$r) die ('Извините, такой записи не существует');
                
                if ($r->sub!=1) die ('Вы уже отписались ранее, нет необходимости делать это повторно');
                
                $r->sub = 0;
                $r->save (FALSE);
                
            } elseif ($t=='c') {
                
                $r = Client::model()->findByPk ($i);
                if (!$r) die ('Извините, такой записи не существует');
                
                if ($r->subscribe!=1) die ('Вы уже отписались ранее, нет необходимости делать это повторно');
                
                $r->subscribe = 0;
                $r->save (FALSE);
                
            } else {
                
                //Отменяем оповещения счёта
                $r = Bill::model()->findByPk ($i);
                if (!$r) die ('Извините, такой записи не существует');
                
                if ($r->notifySent>2) die ('Вы уже отписались ранее, нет необходимости делать это повторно');
                
                $r->notifySent = 3;
                $r->save (FALSE); 
                
            }
            //{KG}
            $this->render('unsub');
	}
        
        
        
	public function actionUnsubr($i,$c)	{
        
            if (!preg_match ('/^[a-z0-9_]+$/',$i)) die ('Bad link');
            if (!preg_match ('/^[a-z0-9_]+$/',$c)) die ('Bad link');
            
            //Проверка CRC
            if (Rass::unsubCrc ($i)!=$c) die ('Bad crc');
            
                $r = RassUser::model()->findByPk ($i);
                if (!$r) die ('Извините, такой записи не существует');
                
                if ($r->sub!=1) die ('Вы уже отписались ранее, нет необходимости делать это повторно');
                
                $r->sub = 0;
                $r->unsubdate = time ();                
                //Чистим очередь
                $rr = RassSub::model ()->findAll ('user_id = '.$r->id);
                foreach ($rr as $one)
                {
                    $one->delete ();
                }
                
                $r->save (FALSE);
                
                
            //{KG}
            $this->render('unsub');
	}        
        
	/**
	 * Указание action для каптчи
	 */
	public function actions(){
		return array(
		    'captcha'=>array(
		        'class'=>'MyCCaptchaAction',
		        'backColor'=>0xFFFFFF,
		    ),
		);
	}        

}