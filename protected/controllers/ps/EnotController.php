<?php

class EnotController extends Controller
{
    
    //Оповещение от платёжной системы Enot
    public function actionIndex ()
    {
        
        if (!Settings::item ('payEnotOn')) {
            die ('Error: способ отключен');
        }
        
        extract ($_POST,EXTR_SKIP);
        
        $enotid = Settings::item('payEnotId');
        
        $enotkey = Settings::item('payEnotKey');
        $enotkey2 = Settings::item('payEnotKey2');
    
      
    
        $sign = md5($_REQUEST['merchant'].':'.$_REQUEST['amount'].':'.$enotkey2.':'.$_REQUEST['merchant_id']);
    
        if ($sign != $_REQUEST['sign_2']) {
            die ('Error: Неверная контрольная сумма');
        } else {
            $way = 'Enot.io';
            Bill::payBill($_REQUEST['merchant_id'],$way,$_REQUEST['amount'],'rur');
        }
    }
    public function actionOk ()
    {
        $this->redirect (Y::bu().'f/ok/w/enot');
    }
    
    public function actionFail ()
    {
        $this->redirect (Y::bu().'f/fail/w/enot');
    }
}
