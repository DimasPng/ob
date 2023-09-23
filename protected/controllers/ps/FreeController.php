<?php

class FreeController extends Controller
{

    //Оповещение от платёжной системы Free
    public function actionIndex ()
    {

        if (!Settings::item('payFreekassaOn')) {
            die ('Error: способ отключен');
        }

        if (!$_POST) die ('Error'); //Пустые данные


		$sum = $_REQUEST['AMOUNT'];
		$way = 'FreeKassa';
		$bill_id = $_REQUEST['MERCHANT_ORDER_ID'];
		$type = 'rur'; //Рубли
		$merchant_secret = Settings::item('payFreekassaShoppass2');

		$hash = md5($_REQUEST['MERCHANT_ID'].':'.$_REQUEST['AMOUNT'].':'.$merchant_secret.':'.$_REQUEST['MERCHANT_ORDER_ID']);

        if ($_REQUEST['SIGN'] == $hash) { //Проверка хэша
            Bill::payBill($bill_id, $way, $sum, $type, $_REQUEST['CUR_ID']);
        } else {
            die ('Error: Неверная контрольная сумма');
        }
        
		/*$way = 'FreeKassa';
		$sum = 501;
		$type = 'rur'; //Рубли


		Bill::payBill(115, $way, $sum, $type, 112);*/

    }

    public function actionOk ()
    {
        $this->redirect (Y::bu().'f/ok/w/free');
    }

    public function actionFail ()
    {
        $this->redirect (Y::bu().'f/fail/w/free');
    }

	public function actionTest ()
    {
        die ('Test OK');
    }


}
