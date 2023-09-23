<?php

//require $_SERVER["DOCUMENT_ROOT"].'/ob/protected/vendor/fondy/vendor/autoload.php';


class CloudController extends Controller
{
    private $autoSubmit = 0; //Автоматически отправлять форму с доп. странички ("Кнопка оплатить") - можно отключить и поставить 0 если что-то не так

    public function actionForm ()
    {

        header ("Content-type: text/html; charset=utf-8");
        /*if (!$_POST)
        {
            die ('Неизвестная ошибка, вернитесь обратно и нажмите, пожалуйста, ещё раз кнопку Продолжить оплату');            
        }
        
        if (!isset($_POST['bill_id']))
        {
            die ('Неизвестная ошибка, вернитесь обратно и нажмите, пожалуйста, ещё раз кнопку Продолжить оплату');            
        } */

        //Ищем счёт
        $bill_id = 44;
        $b = Bill::model()->findByPk ($bill_id);

        //Если не найден - ошибка
        if (!$b)
        {
            die ('Невозможно найти счёт. Вернитесь, пожалуйста, обратно или начните процесс заказа заново.');            
        }

        $ceny = Valuta::conv($b->sum, $b->valuta, $b->usdkurs, $b->eurkurs, $b->uahkurs);   
        $bu = Y::bu();
        $rur = $ceny['rur']; 

       

		$data = [
		        'order_desc' => "Oplata scheta #".$bill_id,
		        'currency' => 'RUB',
		        'amount' => $rur,
		        'response_url' => 'ps/fondy',
		        'server_callback_url' => 'ps/fondy',
		        'sender_email' => $b->email,
		        'lang' => 'ru',
		        'product_id' => $bill_id,
		        'lifetime' => 36000,		        
		];


		echo '<script src="https://widget.cloudpayments.ru/bundles/cloudpayments"></script>';

		echo "<script>
			this.pay = function () {
		    var widget = new cp.CloudPayments();
		    widget.charge({ // options
		            publicId: 'test_api_00000000000000000000001',  //id из личного кабинета
		            description: 'Oplata scheta #$bill_id', //назначение
		            amount: $rur, //сумма
		            currency: 'RUB', //валюта
		            invoiceId: '$bill_id', //номер заказа  (необязательно)
		            accountId: '$b->email', //идентификатор плательщика (необязательно)
		            skin: 'mini', //дизайн виджета		            
		        },
		        function (options) { // success
		            //действие при успешной оплате
		        },
		        function (reason, options) { // fail
		            //действие при неуспешной оплате
		        });
		};    
		
		</script><body><button id='checkout' onclick='pay()'>Кнопка</button></body>";

		

        /*$this->_ShopId = Settings::item("payYandexkassaShopid");
        $this->_ShopPassword = Settings::item ("payYandexkassaShoppass");
        $this->_Scid = Settings::item ("payYandexkassaScid"); 

        $this->taxSystem = Settings::item ("payYandexkassaTaxsystem");
        $this->tax = Settings::item ("payYandexkassaTax"); 
         
        
        $bill_id = (int) $_POST['bill_id'];
        $crc = trim($_POST['crc']);
        
        //Проверяем CRC
        $realcrc = trim(Bill::statusLink ($bill_id));
        
        //Для страховки http/https
        $realcrc = str_replace ('https://','',$realcrc);
        $realcrc = str_replace ('http://','',$realcrc);
        $crc = str_replace ('https://','',$crc);
        $crc = str_replace ('http://','',$crc);        
        
        if ($realcrc != $crc)
        {
            die ('Неизвестная ошибка контрольной суммы, вернитесь обратно и нажмите, пожалуйста, ещё раз кнопку Продолжить оплату');            
        }        
        
        //Ищем счёт
        $b = Bill::model()->findByPk ($bill_id);
        
        //Если не найден - ошибка
        if (!$b)
        {
            die ('Невозможно найти счёт. Вернитесь, пожалуйста, обратно или начните процесс заказа заново.');            
        }

        $ceny = Valuta::conv($b->sum, $b->valuta, $b->usdkurs, $b->eurkurs, $b->uahkurs);        

        $bu = Y::bu();

        $rur = number_format($ceny['rur'],  2, '.', '');       
        
        $json = array ();

        $json['customerContact'] = $b->email; //Контакты клиента - передаём e-mail
        $json['taxSystem'] = $this->taxSystem;

        $items = array ();

        $orders = $b->orders;

        $newsum = 0; //Новая сумма для передачи

        foreach ($orders as $order)
        {
            $item = array ();

            $item['quantity'] = 1; //По умолчанию одна позиция товара

            $ceny2 = Valuta::conv($order->cena, $order->valuta, $b->usdkurs, $b->eurkurs, $b->uahkurs);        
            $rur2 = number_format($ceny2['rur'],  2, '.', '');       

            $item['price'] = array ();
            $item['price']['amount'] = $rur2; //Цена за 1 товар такая же, т.к. всего 1 товар
            $item['tax'] = $this->tax; //НДС
            $item['text'] = $this->convertToUTF8 ($order->good->title);


            $newsum += $rur2;


            $items[] = $item;

        }

        $json['items'] = $items;


        $jsonStr = $this->jsonEncode ($json); //54-ФЗ данные

        echo '<form action="https://money.yandex.ru/eshop.xml" method="post" id="yandexkassa">
            <input name="shopId" value="'.$this->_ShopId.'" type="hidden"/>
            <input name="scid" value="'.$this->_Scid.'" type="hidden"/>
            <input name="sum" value="'.$newsum.'" type="hidden">
            <input name="customerNumber" value="'.$b->id.'" type="hidden"/>
            <input name="paymentType" value="" type="hidden"/>
            <input name="shopSuccessURL" value="'.$bu.'f/ok" type="hidden"/>
            <input name="shopFailURL" value="'.$bu.'f/fail" type="hidden"/>
            <input type="hidden" name="ym_merchant_receipt" value=\''.$jsonStr.'\'>
            <input type="submit" value="Перейти к оплате"/>
            </form>';*/

	    /*if ($this->autoSubmit)
	    {
	        echo '<script>
	            document.getElementById("yandexkassa").submit();
	        </script>';
	    }*/
        die ();
    }

    
    public function actionIndex ()
    {  	

    	/*В личном кабинете включите Check-уведомление на адрес: http://raten.raten.mcdir.ru/wc-api/wc_cloudpayments?action=check

		В личном кабинете включите Pay-уведомление на адрес: http://raten.raten.mcdir.ru/wc-api/wc_cloudpayments?action=pay

		В личном кабинете включите Refund-уведомление на адрес: http://raten.raten.mcdir.ru/wc-api/wc_cloudpayments?action=refund

		В личном кабинете включите Confirm-уведомление на адрес: http://raten.raten.mcdir.ru/wc-api/wc_cloudpayments?action=confirm*/

		if (!isset ($_GET['action'])) {
            die ('Error: Не переданы параметры');
        }
        if (!isset ($_POST)) {
            die ('Error: Не переданы параметры');
        }
		$action = $_GET['action'];
		$request = $_POST;

		// пароль из админки
		$api_pass = "123";
		$order_id = $request['InvoiceId'];

		if ($action == 'check')
		{
			
			$accesskey = trim($api_pass);
			//$sum = $request['Amount']; 

			if($this->CheckHMac($accesskey))
			{
				$data['CODE'] = 0;
			}
			else
            {
                $data['CODE']=5204;            
            }
		   	echo json_encode($data);
		    die();

		}
		
		else if ($action == 'pay')
		{
			$bill_id = $order_id;
			$sum = $request['Amount'];
			$type = 'rur'; //Валюта - рубли
			$way = 'CloudPayments';
			Bill::payBill($bill_id, $way, $sum, $type);


		    $data['CODE'] = 0;
		    echo json_encode($data);
		    die();
		}

		else if ($action == 'fail')
		{
		    
		    die();
		}


		else if ($action == 'refund')
		{
		    
		    die();
		}
		else if ($action == 'confirm')
		{
		   
		    die();
		}      
		else if ($action == 'Cancel')
		{
		   
		    die();
		} 
		else if ($action == 'void')
		{
		    
		    die();
		} 
		else
		{		    
		   
		    exit('{"code":0}');
		}



    	/*\Cloudipsp\Configuration::setMerchantId(1431724);
		\Cloudipsp\Configuration::setSecretKey('CHfE0Pm7STxjwGJSV9vnINuT7B5UkiVX');    	

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
	    }*/

        /*if (!isset ($_POST['action'])) {
            die ('Error: Не переданы параметры');
        }

        //Получаем ид магазина
        $shop_id = Settings::item("payYandexkassaShopid");    
        $shop_pass = Settings::item ("payYandexkassaShoppass");     

        //Получаем номер счёта
        $order_id = $_POST['customerNumber'];
        
        $bill_id = intval ($order_id); //Тот же номер счёта, но как число - для зачисления оплаты

        //Внутренний номер инвойса
        $invoice_id = $_POST['invoiceId'];

        //Дата в специальном формате
        $performedDatetime = date ('c');        


        //Код для случая - проверка платежа ДО оплаты, всегда возвращаем успешно
        if ($_POST['action'] == 'checkOrder')
        {


            print '<?xml version="1.0" encoding="UTF-8"?> 
            <checkOrderResponse performedDatetime="'.$performedDatetime.'" code="0" invoiceId="'.$invoice_id.'" shopId="'.$shop_id.'"/>';

            die ();


            //Другой код - AVISO URL - проверка статуса платежа и зачисление

        } elseif ($_POST['action'] == 'paymentAviso') {

            $str =  $_POST['action'].';'.$_POST['orderSumAmount'].';'.
                    $_POST['orderSumCurrencyPaycash'].';'.$_POST['orderSumBankPaycash'].';'.
                    $shop_id . ';' . $invoice_id.';'.
                    $_POST['customerNumber'].';'.$shop_pass;

            $md5 = strtoupper(md5($str));
                        

            if($md5 == $_POST['md5']) { //Проверка хэша

                $sum = floatval ($_POST['orderSumAmount']); //Сумма по факту для зачисления
                $type = 'rur'; //Валюта - рубли

                Bill::payBill($bill_id, $way, $sum, $type, 'Yandex.Kassa');

                //Ответ в браузер
                print '<?xml version="1.0" encoding="UTF-8"?>
                <paymentAvisoResponse performedDatetime="'.$performedDatetime.'" code="0" invoiceId="'.$invoice_id.'" shopId="'.$shop_id.'"/>';

                die ();

            } else {
                die ('Error: Неверная контрольная сумма');
            }


        } else {
            die ('Error: bad action');
        }*/


    }

    public function actionOk ()
    {
        $this->redirect (Y::bu().'f/ok/w/cloud');
    }

    public function actionFail ()
    {
        $this->redirect (Y::bu().'f/fail/w/cloud');
    }

    public function actionTest ()
    {
        die ('Test OK');
    }

    private function convertToUTF8($str) {
        $enc = mb_detect_encoding($str);

        if ($enc && $enc != 'UTF-8') {
            return iconv($enc, 'UTF-8', $str);
        } else {
            return $str;
        }
    }

    private function jsonEncode ($json)
    {
        $encoded = json_encode($json);
        $unescaped = preg_replace_callback('/\\\\u(\w{4})/', function ($matches) {
            return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
        }, $encoded);        

        return $unescaped;
    }


    private function CheckHMac($APIPASS)   //ok  
    {
        $headers = $this->detallheaders();   
                        
        if (isset($headers['Content-HMAC']) || isset($headers['Content-Hmac'])) 
        {            
            $message = file_get_contents('php://input');
            $s = hash_hmac('sha256', $message, $APIPASS, true);
            $hmac = base64_encode($s);             
            
            if ($headers['Content-HMAC']==$hmac) return true;
            else if($headers['Content-Hmac']==$hmac) return true;                                    
        }
        else return false;
    }
    
    private function detallheaders()  ///OK
    {
        if (!is_array($_SERVER)) {
            return array();
        }
        $headers = array();
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }

}
?>