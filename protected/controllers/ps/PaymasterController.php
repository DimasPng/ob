<?php

class PaymasterController extends Controller
{

    //Оповещение от платёжной системы Free
    public function actionIndex ()
    {

        if (!Settings::item('payMasterOn')) {
            die ('Error: способ отключен');
        }

		if (!$_POST) die ('Error'); //Пустые данные

        $LMI_MERCHANT_ID = Settings::item('payMasterShopid');

        //Получили номер заказа очень нам он нужен, смотрите ниже, что мы с ним будем вытворять
        $LMI_PAYMENT_NO = $_POST['LMI_PAYMENT_NO'];

        //Номер платежа в системе PayMaster
        $LMI_SYS_PAYMENT_ID = $_POST['LMI_SYS_PAYMENT_ID'];

        //Дата платежа
        $LMI_SYS_PAYMENT_DATE = $_POST['LMI_SYS_PAYMENT_DATE'];       

        $LMI_PAYMENT_AMOUNT = $_POST['LMI_PAYMENT_AMOUNT'];

        $LMI_CURRENCY = "RUB";

        $LMI_PAID_AMOUNT = $_POST['LMI_PAID_AMOUNT'];

        $LMI_PAID_CURRENCY = $_POST['LMI_PAID_CURRENCY'];

        $LMI_PAYMENT_SYSTEM = $_POST['LMI_PAYMENT_SYSTEM'];

        $LMI_SIM_MODE = $_POST['LMI_SIM_MODE'];

        $SECRET = Settings::item('payMasterShoppass');


        $string = $LMI_MERCHANT_ID . ";" . $LMI_PAYMENT_NO . ";" . $LMI_SYS_PAYMENT_ID . ";" . $LMI_SYS_PAYMENT_DATE . ";" . $LMI_PAYMENT_AMOUNT . ";" . $LMI_CURRENCY . ";" . $LMI_PAID_AMOUNT . ";" . $LMI_PAID_CURRENCY . ";" . $LMI_PAYMENT_SYSTEM . ";" . $LMI_SIM_MODE . ";" . $SECRET;

        $hash = base64_encode(hash("md5", $string, true));		

		$sum = $_POST['LMI_PAYMENT_AMOUNT'];
		$way = 'PayMaster';
		$bill_id = $_POST['LMI_PAYMENT_NO'];
		$type = 'rur'; //Рубли

        if ($_POST['LMI_HASH'] == $hash) { //Проверка хэша
            Bill::payBill($bill_id, $way, $sum, $type);
        } else {
            die ('Error: Неверная контрольная сумма');
        }
        die('ok');	

    }

    public function actionOk ()
    {
        $this->redirect (Y::bu().'f/ok/w/paymaster');
    }

    public function actionFail ()
    {
        $this->redirect (Y::bu().'f/fail/w/paymaster');
    }

	public function actionTest ()
    {
        die ('Test OK');
    }


}
