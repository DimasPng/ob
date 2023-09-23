<?php

class CheckoutController extends Controller
{
    
    //Оповещение CheckOut
    public function actionIndex ()
    {
		
        if (!Settings::item ('pay2checkoutOn')) {
			die ('Error: способ отключен');			
	}
		
	extract ($_POST,EXTR_SKIP);
        
	    $coid = Settings::item ('pay2checkoutId');
	    
	    $seckey = Settings::item ('pay2checkoutKey');
		
		if (empty ($key)) {
			die ('Error: Не переданы параметры');
		}
		
		$ornum = $order_number;
		
		if ($demo == 'Y' || ($ornum == 1)) {
			die ('Демо режим запрещён');
		}
		
		$str = "{$seckey}{$coid}{$ornum}{$total}";			
		
	    $crc = strtolower ($key);
            //{KG}
        if ($crc===md5 ($str))
	    {
	        if (!is_numeric ($order_number)) {
    	        die ('Order id must be numeric!');
       		}
       		
	        if (!is_numeric ($cart_id)) {
    	        die ('Cart id must be numeric!');
        	}
        	$bill_id = $merchant_order_id-1000;
	    	
	    	//Если карту обработали	    		 
	        if ($credit_card_processed == 'Y') 
    	    {
    	    	
    	    	//Защита от попыток обмана 2Checkout
    	    	$ocheck = substr ($ornum,5,6);
    	    	
                $cc = Checkout::model()->findByPk ((int) $ocheck);
                
    	    	if (!$cc)   {
                                $cc = new Checkout;
                                $cc->isNewRecord = TRUE;
                                $cc->id = $ocheck;
                                $cc->save (FALSE);
					
				}
				else {
					die ('Этот платёж уже обработан, проверьте Ваш e-mail. В случае не получения письма - обязательно свяжитесь с администратором');
				}
    	    	
		    	
		    	$sum = $total;
		    	
		    	$way = '2CheckOut';
		    	
	    	    Bill::payBill($bill_id,$way,$sum,'usd');
	    	    
	    	    $this->redirect (array('ps/checkout/ok'));
			}	
			//Иначе оповещаем админа что карта передана на ручную обработку    	
			else {
				
				Bill::err($bill_id,'Передан на ручную обработку 2CheckOut, оплатите счёт вручную после получения подтверждения от 2CheckOut');
				$this->redirect (array('ps/checkout/wait'));
			}
	    }
		else {
			die ('Error: Неверная контрольная сумма');
		}
        
    }
    
    public function actionOk ()
    {
        $this->redirect (Y::bu().'f/ok/w/checkout');
    }
    
    public function actionFail () 
    {
        $this->redirect (Y::bu().'f/fail/w/checkout');
    }
    
    
}
