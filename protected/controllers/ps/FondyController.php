<?php

require $_SERVER["DOCUMENT_ROOT"].'/ob/protected/vendor/fondy/vendor/autoload.php';


class FondyController extends Controller
{
    private $autoSubmit = 0; //Автоматически отправлять форму с доп. странички ("Кнопка оплатить") - можно отключить и поставить 0 если что-то не так

    public function actionForm ()
    {

        header ("Content-type: text/html; charset=utf-8");
        if (!$_POST)
        {
            die ('Неизвестная ошибка, вернитесь обратно и нажмите, пожалуйста, ещё раз кнопку Продолжить оплату');            
        }
        
        if (!isset($_POST['bill_id']))
        {
            die ('Неизвестная ошибка, вернитесь обратно и нажмите, пожалуйста, ещё раз кнопку Продолжить оплату');            
        } 

        //Ищем счёт
        $bill_id = $_POST['bill_id'];
        $b = Bill::model()->findByPk ($bill_id);

        //Если не найден - ошибка
        if (!$b)
        {
            die ('Невозможно найти счёт. Вернитесь, пожалуйста, обратно или начните процесс заказа заново.');            
        }


        $MerchantId = Settings::item ("payFondyId");
        $SecretKey = Settings::item ("payFondyKey");


        $ceny = Valuta::conv($b->sum, $b->valuta, $b->usdkurs, $b->eurkurs, $b->uahkurs);   
        $bu = Y::bu();
        $rur = $ceny['rur']*100; 

        \Cloudipsp\Configuration::setMerchantId($MerchantId);
		\Cloudipsp\Configuration::setSecretKey($SecretKey);

		$data = [
		        'order_desc' => "Оплата счета #".$bill_id,
		        'currency' => 'RUB',
		        'amount' => $rur,
		        'response_url' => 'ps/fondy',
		        'server_callback_url' => 'ps/fondy',
		        'sender_email' => $b->email,
		        'lang' => 'ru',
		        'product_id' => $bill_id,
		        'lifetime' => 36000,		        
		];

		$url = \Cloudipsp\Checkout::url($data);
		$data = $url->toCheckout();	
        die ();
    }

    
    public function actionIndex ()
    {  	
        $MerchantId = Settings::item ("payFondyId");
        $SecretKey = Settings::item ("payFondyKey");

    	\Cloudipsp\Configuration::setMerchantId($MerchantId);
        \Cloudipsp\Configuration::setSecretKey($SecretKey);

        try {

        	$result = new \Cloudipsp\Result\Result();
        	if ($result->getData())
        		if($result->isApproved())
        		{        		        		
					$return = $result->getData();		
        			$bill_id = $return['product_id'];
        			$sum = $return['amount']/100;
        			$type = 'rur'; //Валюта - рубли
        			$way = 'Fondy';
        			Bill::payBill($bill_id, $way, $sum, $type);
        		}
   			else
        		die('No data');
		} catch (\Exception $e) {
	        echo "Fail: " . $e->getMessage();
	    }

    }

    public function actionOk ()
    {
        $this->redirect (Y::bu().'f/ok/w/fondy');
    }

    public function actionFail ()
    {
        $this->redirect (Y::bu().'f/fail/w/fondy');
    }

    public function actionTest ()
    {
        die ('Test OK');
    }

}
?>