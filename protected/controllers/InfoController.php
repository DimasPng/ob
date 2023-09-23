<?php

class InfoController extends Controller
{
    public $layout = '//layouts/empty'; //Пусто
    
    public function actionGood ($id)
    {
        
        //{START}
        if (!preg_match ('/^[a-zA-Z0-9_]+$/',$id)) die ("Bad id");
        
        $od = Odno::model ()->find (array (
            'condition' => 'good_id = :good_id',
            'params' => array (':good_id' => $id),
        ));
        
        if (!$od) die ('Извините, товар не найден');
        
        //Плюс товар
        $gd = Good::model ()->findByPk ($od->good_id);
        
        //{KG}
        
        if (!$gd) die ('Извините, товар не найден');
        
        $name = 'good'; //Имя шаблона
        //Если в заголовке прописан шаблон
        if (strpos ($od->title,'||')!==false) {
            $title2 = explode ('||',$od->title);
            $od->title = trim ($title2[0]);
            $name = trim ($title2[1]);
        }
        
        if ($od->visible!=1) die ('Извините, но этот товар временно отключён');
        
        
        $this->render ($name,array (
                    'model' => $od,
        ));
        
        //{END}
        
    }
    
    //Оформление заказа наложенным платежом
    public function actionOrder ()
    {
        if (empty ($_POST)) die ('Не переданы данные');
        $id = $_POST['good_id'];
        
        if (!preg_match ('/^[a-zA-Z0-9_]+$/',$id)) die ("Bad id");
        
        $od = Odno::model ()->find (array (
            'condition' => 'good_id = :good_id',
            'params' => array (':good_id' => $id),
        ));
        
        //{START}
        
        if (!$od) die ('Извините, товар не найден');
        
        //Плюс товар
        $gd = Good::model ()->findByPk ($od->good_id);
        
        //{KG}
        
        if (!$gd) die ('Извините, товар не найден');
        
        $uname = trim ($_POST['uname']);
        $phone = trim ($_POST['uphone']);
        $email = 'noemail@example.com';
        $address = '';
        $comment = '';
        
        if (isset ($_POST['email'])) $email = $_POST['email'];
        if (isset ($_POST['address'])) $email = $_POST['address'];
        if (isset ($_POST['comment'])) $comment = $_POST['comment'];
        
        if (empty ($uname)) die ('Не заполнено имя');
        if (empty ($phone)) die ('Не указан телефон');
        
            $bill = new Bill ();
            $bill->id = NULL;
            $bill->isNewRecord = TRUE;  //Новая запись
            
            //{KG}

            $bill->uname = $uname;
            $bill->phone = $phone;            
            $bill->email = $email;
            $bill->address = $address;
            $bill->comment = $comment;
            $bill->createDate = time ();
            $bill->payDate = 0;
            $bill->status_id = 'nalozh';
            $bill->ip = Yii::app()->request->userHostAddress;
            $bill->way = 'Наложенный';
            $bill->kind = $gd->kind;
            $bill->orderCount = 1;
            $bill->postNumber = '';

            //Курсы валют
            $bill->usdkurs = Settings::item('kursUsd');
            $bill->eurkurs = Settings::item('kursEur');
            $bill->uahkurs = Settings::item('kursUah');
                
                $bill->valuta = $gd->currency;
                $bill->sum = $gd->price;
            

            //Сохраняем новый счёт
            if (!$bill->save (false)) {
                Yii::app()->session->destroy ();
                throw new CHttpException(403, 'Произошла неизвестная ошибка при формировании счёта. Пожалуйста, выпишите новый.');
            }

            $ord = new Order;


                $ord->id = NULL;
                $ord->isNewRecord = TRUE;
                $ord->bill_id = $bill->id;
                $ord->good_id = $gd->id;
                $ord->createDate = $bill->createDate;                
                $ord->cena = $gd->price;
                $ord->valuta = $gd->currency;
                $ord->status_id = $bill->status_id;
                $ord->partner_id = Partner::getAff($gd->id);

                if (!$ord->save ()) {
                    Yii::app()->session->destroy ();
                    throw new CHttpException(403, 'Произошла неизвестная ошибка при формировании заказа. Пожалуйста, сделайте новый заказ');
                }
            
            //{KG}
                
            //Здесь отправляем письмо о новом заказе
            $ar = array (
                'good_id' => $gd->id,
                'uname' => $bill->uname,
                'phone' => $bill->phone,
                'sum' => $bill->sum,
                'valuta' => $bill->valuta,
                'ip' => $bill->ip,
            );
            
            Mail::sys ('admin_odno',$ar);
            
            //Выбор разных страничек
            
            $fn = './protected/data/odno.txt';
            
            if (file_exists ($fn)) {
                $ff = file ($fn);
                foreach ($ff as $one) {
                    $one = explode ('||',$one);
                    $id = trim ($one[0]);
                    if ($id == $gd->id) {
                        $this->redirect (trim ($one[1]));
                    }
                }
            }
            
            //После того, как счёт выписан - подтверждение
            $this->redirect (Y::bu().'f/order');    
        
        //{END}
        
        
    }
    
}