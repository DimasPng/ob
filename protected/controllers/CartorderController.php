<?php

class CartorderController extends Controller
{
	public function actionConfirm()
	{
            //{START}

            //Получаем заказы
            $cart = UsualCart::listGoods();

            if (empty ($cart)) {
                throw new CHttpException(404, 'Корзина пуста. Выберите товары для заказа');
            }

            //Получаем форму с заказом
            $bill = Yii::app()->session['thecartorder'];
            
            //{KG}

            if (!$bill) {
                throw new CHttpException(403, 'Не заполнена форма оплаты');
            }

            $cart2 = self::_goodList($cart, $bill->cupon, $bill->email);

            $this->render('confirm', array (
                'model' => $bill,
                'goods' => $cart2,
            ));
            
            //{END}

	}

	public function actionIndex()
	{
            //{START}
            
            if (Settings::item('usualCartOn')!=1) {
                throw new CHttpException (404,'Извините, но корзина отключена');
            }
            //Получаем заказы
            $cart = UsualCart::listGoods();

            if (empty ($cart)) {
                throw new CHttpException(404, 'Корзина пуста. Выберите товары для заказа');
            }

            $model = new Bill;
            $model->unsetAttributes ();
            $kind = UsualCart::checkKind();
            
            if ($kind=='disk') {
                $model->disk = TRUE;
            }
            $model->kind = $kind;
            
            //{KG}

            if(isset($_POST['Bill'])) {

                //Оставляем только разрешённые поля
                
                $bbb = $_POST['Bill'];
                $ballow = array ('email','uname','amail','cupon','surname','otchestvo','strana','gorod','region','street','comment','phone','postindex','address');
                
                foreach ($bbb as $bbkey=>$one) {
                    if (!in_array ($bbkey,$ballow)) {
                        unset ($bbb[$bbkey]);
                    }
                }
                $model->attributes = $bbb;

                if ($model->validate()) {
                    //Сохраняем в сессию
                    Yii::app()->session['thecartorder'] = $model;
                    //Редирект на вывод
                    $this->redirect (array('confirm'));
                }

            } else {
                if (($kind=='disk') && (Settings::item('phoneDisk')!=1)) {
                    $model->phone = 'нет';    
                }
                if (($kind!='disk') && (Settings::item('phoneEbook')!=1)) {
                    $model->phone = 'нет';    
                }
                
            }

            $this->render('index', array (
                'model' => $model,
                'kind' => $kind,
            ));
            
            //{END}
            
	}

        /*
         * Собственно формирование счетов и заказов
         */
        public function actionComplete () {

            //{START}
            //Получаем заказы
            $cart = UsualCart::listGoods();

            if (empty ($cart)) {
                throw new CHttpException(404, 'Корзина пуста. Выберите товары для заказа');
            }

            //Получаем форму с заказом
            $bill = Yii::app()->session['thecartorder'];

            if (!$bill) {
                throw new CHttpException(403, 'Не заполнена форма оплаты');
            }
            
            $cart2 = self::_goodList($cart, $bill->cupon);
            
            //Собственно формирование счёта и заказов

            //Вначале счёт
            $bill->id = NULL;
            $bill->isNewRecord = TRUE;  //Новая запись

            $bill->createDate = time ();
            $bill->payDate = 0;
            $bill->status_id = Bill::BILL_WAITING;
            $bill->ip = Yii::app()->request->userHostAddress;
            $bill->way = '';
            $bill->kind = UsualCart::checkKind();
            $bill->orderCount = count ($cart2);
            $bill->postNumber = '';

            //Курсы валют
            $bill->usdkurs = Settings::item('kursUsd');
            $bill->eurkurs = Settings::item('kursEur');
            $bill->uahkurs = Settings::item('kursUah');

            //Сумма
            $bill->valuta = 'rur';

            //Делаем подсчёт
            $total = 0;
            foreach ($cart2 as $one) {
                $total += $one->rurcena;
            }

            $bill->sum = $total;

            //Сохраняем новый счёт
            if (!$bill->save ()) {
                throw new CHttpException(403, 'Произошла неизвестная ошибка при формировании счёта. Пожалуйста, выпишите новый.');
            }

            $ord = new Order;
            
            //{KG}

            //Формируем заказы и сохраняем
            foreach ($cart2 as $good) {
                
                $ord->id = NULL;
                $ord->isNewRecord = TRUE;
                $ord->bill_id = $bill->id;
                $ord->good_id = $good->id;
                $ord->createDate = $bill->createDate;                
                $ord->cena = $good->newprice;
                $ord->valuta = $good->currency;                

                if (!$ord->save ()) {
                    throw new CHttpException(403, 'Произошла неизвестная ошибка при формировании заказа. Пожалуйста, сделайте новый заказ');
                }
                
            }

            //Когда счёт сформирован - можно очистить корзину и заказ
            Yii::app()->session['thecartorder'] = FALSE;
            UsualCart::emptyCart();
            
            //Готовим данные для отправки
            $data = array (
		'bill_id'   => $bill->id,
		'sum'       => H::mysum($bill->sum).H::valuta($bill->valuta),
                'status_link' => Y::bu().'status/index/b/'.$bill->id.'/c/'.Bill::statusCrc ($bill->id),
            );
            
            Mail::letter ('bill_new',$bill->email,$bill->uname,$data);            

            //Редирект на информацию о выписанном счёте            
            $this->redirect (array('bill/index','bill_id' => $bill->id, 'hash' => Bill::hashBill($bill->id)));

            //{END}
        }



        private static function _goodList ($cart, $kupon, $email = false) {

            $nc = array (); //Новый список            
            
            //Для каждого товара проверяем наличие
            foreach ($cart as $good) {

                //Поиск по ключу
                $gd = Good::model()->findByPk ($good['id']);

                if (!$gd) {
                    throw new CHttpException(404, 'К сожалению, один из товаров, помещённых в корзину, не существует. Сформируйте Корзину заново.');
                }

                //Формируем цену с учётом скидки
                if (!empty ($kupon)) {

                    if (Cupon::valid ($kupon,$email)!='') {
                        $gd->newprice = Cupon::goodCena ($kupon, $gd);
                    }
                    //Новая рублёвая цена
                } else {
                    $gd->newprice = $gd->price;
                }

                    $rurcena = (Valuta::conv($gd->newprice, $gd->currency));                    
                    $gd->rurcena = $rurcena['rur'];

                    $nc[] = $gd;

            }
            return $nc;
        }

}