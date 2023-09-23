<?php

class WayforpayController extends Controller
{
	 protected $keysForResponseSignature = array(
            'merchantAccount',
            'orderReference',
            'amount',
            'currency',
            'authCode',
            'cardPan',
            'transactionStatus',
            'reasonCode'
        );

    //Оповещение от платёжной системы Yandex
    public function actionIndex ()
    {

        if (!Settings::item('wayForPayOn')) {
            die ('Error: способ отключен');
        }
        //Ключ для хэшей

        $key = trim (Settings::item('wayForPaykey'));
        $merchant_id = trim (Settings::item('wayForPayid'));

        $data = json_decode(file_get_contents("php://input"), true);
		//$data = json_decode($str_test, true);
		//print_r($data);

		$bill_id = $data["orderReference"];

		if($merchant_id!=$data["merchantAccount"]){
			 die ('Error: merchantAccount');
		}

		if("Approved"!=$data["transactionStatus"]){
			 die ('Error: transactionStatus not Approved');
		}

		$responseSignature = $data['merchantSignature'];

		if ($this->getResponseSignature($date, $key) != $responseSignature) {
            die('An error has occurred during payment. Signature is not valid.');
        }
        else
        {
        	$way = 'WayForPay';
        	$sum = $data['amount']; //Сумма по факту для зачисления
            $type = 'rur'; //Валюта - рубли

            Bill::payBill($bill_id, $way, $sum, $type, 'WayForPay');

        	echo $this->getAnswerToGateWay($data, $key);
        }        

    }

    public function actionOk ()
    {
        $this->redirect (Y::bu().'f/ok/w/wayforpay');
    }

    public function actionFail ()
    {
        $this->redirect (Y::bu().'f/fail/w/wayforpay');
    }

    public function actionTest ()
    {
        die ('Test OK');
    }

    public function getResponseSignature($options, $key)
    {
        return $this->getSignature($options, $this->keysForResponseSignature, $key);
    }

    public function getSignature($option, $keys, $key, $hashOnly = false)
    {
        $hash = array();
        foreach ($keys as $dataKey) {
            if (!isset($option[$dataKey])) {
                continue;
            }
            if (is_array($option[$dataKey])) {
                foreach ($option[$dataKey] as $v) {
                    $hash[] = $v;
                }
            } else {
                $hash [] = $option[$dataKey];
            }
        }
        $hash = implode(';', $hash);
        if ($hashOnly) {
			return base64_encode($hash);
	    } else {
            return hash_hmac('md5', $hash, $key);
	    }
    }

    public function getAnswerToGateWay($data, $key)
    {
        $time = time();
        $responseToGateway = array(
            'orderReference' => $data['orderReference'],
            'status' => 'accept',
            'time' => $time
        );
        $sign = array();
        foreach ($responseToGateway as $dataKey => $dataValue) {
            $sign [] = $dataValue;
        }
        $sign = implode(';', $sign);
        $sign = hash_hmac('md5', $sign, $key);
        $responseToGateway['signature'] = $sign;
        return json_encode($responseToGateway);
    }


}
