<?php

class MegaController extends Controller
{

    //Оповещение от платёжной системы Free
    public function actionIndex ()
    {

        if (!Settings::item('payMegakassaOn')) {
            die ('Error: способ отключен');
        }

		// проверка на наличие обязательных полей
		// поля $payment_time и $debug могут дать true для empty() поэтому их нет в проверке
		foreach(array(
			'uid',
			'amount',
			'amount_shop',
			'amount_client',
			'currency',
			'order_id',
			'payment_method_title',
			'creation_time',
			'client_email',
			'status',
			'signature'
		) as $field) {
			if(empty($_REQUEST[$field])) {
				die('error');
			}
		}
		
		// ваш секретный ключ
		$secret_key	= Settings::item('payMegakassaShoppass');


		// нормализация данных
		$uid					= (int)$_REQUEST["uid"];
		$amount					= (double)$_REQUEST["amount"];
		$amount_shop			= (double)$_REQUEST["amount_shop"];
		$amount_client			= (double)$_REQUEST["amount_client"];
		$currency				= $_REQUEST["currency"];
		$order_id				= $_REQUEST["order_id"];
		$payment_method_id		= (int)$_REQUEST["payment_method_id"];
		$payment_method_title	= $_REQUEST["payment_method_title"];
		$creation_time			= $_REQUEST["creation_time"];
		$payment_time			= $_REQUEST["payment_time"];
		$client_email			= $_REQUEST["client_email"];
		$status					= $_REQUEST["status"];
		$debug					= (!empty($_REQUEST["debug"])) ? '1' : '0';
		$signature				= $_REQUEST["signature"];
		
		// проверка валюты
		if(!in_array($currency, array('RUB', 'USD', 'EUR'), true)) {
			die('error');
		}
		
		// проверка статуса платежа
		if(!in_array($status, array('success', 'fail'), true)) {
			die('error');
		}
		
		// проверка формата сигнатуры
		if(!preg_match('/^[0-9a-f]{32}$/', $signature)) {
			die('error');
		}
		
		// проверка значения сигнатуры
		$signature_calc = md5(join(':', array(
			$uid, $amount, $amount_shop, $amount_client, $currency, $order_id,
			$payment_method_id, $payment_method_title, $creation_time, $payment_time,
			$client_email, $status, $debug, $secret_key
		)));
		if($signature_calc !== $signature) {
			die('error');
		}

		$way = 'MegaKassa';
		$sum = $amount;
		$bill_id = $order_id;

		// обработка платежа
		switch($status) {
			case 'success':
				Bill::payBill($bill_id,$way,$sum,'rur');
				break;
			case 'fail':				
				 die ('Error: Неверная контрольная сумма');
		}		
		// успешный ответ для Мегакассы и завершение скрипта
		die('ok');
		

    }

    public function actionOk ()
    {
        $this->redirect (Y::bu().'f/ok/w/mega');
    }

    public function actionFail ()
    {
        $this->redirect (Y::bu().'f/fail/w/mega');
    }

	public function actionTest ()
    {
        die ('Test OK');
    }


}
