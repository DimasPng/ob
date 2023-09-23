<?php

class RassController extends Controller
{
        //Права доступа
	public function filters()
	{
		return array(
			'accessControl',
		);
	}



	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user actions
				'users'=>array('@'),
				'actions' => StaffAccess::allowed('rass'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
    
	public function actionIndex()
	{
            //{KG}
		$this->render('index', array (
                    'goods' => Good::model()->findAll('used=1'),
                ));
	}

	public function unique_multidim_array($array, $key) { 
		$temp_array = array(); 
		$i = 0; 
		$key_array = array(); 
		
		foreach($array as $val) { 
			if (!in_array($val[$key], $key_array)) { 
				$key_array[$i] = $val[$key]; 
				$temp_array[$i] = $val; 
			} 
			$i++; 
		} 
		return $temp_array; 
	} 

	public function actionMsg($bills = FALSE)
	{
				
                if ($bills != FALSE) {
                    $bl = explode ('-',$bills);
                    $u = array ();
                    
                    //Получаем список получателей
                    foreach ($bl as $b) {
                        $bb = Bill::model ()->findByPk ($b);
                        if ($bb!=FALSE) {
                            $bb->id = 'b'.$bb->id;
                            $u[] = $bb;
                        }
                    }
                    
            
                } else {
                    
                    if (!$_POST) die ('Не выбраны получатели');

                    //Сообственно формируем список получателей
                    $u = array ();
					$list_ids = "";
                    $type = $_POST['users'];
					$type_id = array();
	
					if ($type){
						foreach ($type as $id_tovar){
							$list_ids.=$id_tovar.", ";
							
							$llkl = str_replace ('gd_','',$id_tovar);
							$type_id[]=$llkl;
						}
					}

					$counter = 0;
					$delete_item;


                    if ($_POST['type']=="refs") {

                        //Получаем список всех активных партнёров
                        $u = Partner::model()->findAll ();
						$type="refs";

                    } elseif ($_POST['type']=="all_client") {

                        $u = Client::model()->findAll ('subscribe=1');
						$u = RassController::unique_multidim_array($u,'email'); 
					
					} elseif ($_POST['type']=="wait") {				
						
						$u = Bill::model()->findAll ("status_id='waiting'");
						$u = RassController::unique_multidim_array($u,'email'); 

                    } elseif($_POST['type']=="tovar_wait"){
						 
						 $u = Bill::model()->findAll ("status_id='waiting'");
						
						 //собрать массив только те которые имеют good_id в массиве $type
						 foreach ($u as $u_mas) {
							 $smile = Order::model()->findAll ("bill_id=".$u_mas->id);
							
							 foreach ($smile as $one_smile) {								
								
								// поосмтреть есть good_id в массиве выбранных								
								if (!in_array($one_smile->good_id, $type_id)) {
									$delete_item=true;
									// if($one_smile->bill_id==18){print_r("Нету в массиве");}
								}
								else{
									$delete_item=false;
									//if($one_smile->bill_id==18){print_r("Есть в массиве");}
									goto a;
								}
							 }
							 a:
							 if($delete_item)
							 {
								unset($u[$counter]);
							 }
							 $counter++;
						 }
						 
						 $u = RassController::unique_multidim_array($u,'email'); 
						 				 
					}					
					
					else {              
						$list_ids = '';
						foreach ($type_id as $id_tovar){
							$list_ids.="'".$id_tovar."', ";	
						}				

                        $gd = str_replace ('gd_','',$list_ids);
						$gd = substr($gd, 0, -2);						
                        $u = Client::model()->findAll ('subscribe=1 AND good_id IN ('.$gd.')');
						$u = RassController::unique_multidim_array($u,'email'); 
                    }
					
					

                    
                }
                
                $def = Letter::model()->findByPk ('rass_default');
                //{KG}
                
                if ($bills!=FALSE) {
                    $def->message = str_replace ('%unsub%','- это действие невозможно для счетов, удалите строчку из письма',$def->message);
                }
                
		$this->render('msg', array (
                    'users' => $u,
                    'type' => $type,
                    'msg' => $def->message,                    
                    'subj' => $def->subject,
                ));
	}

	



	public function actionSend()
	{
            
            if (!$_POST) die ('Не переданы даннные');
            
            $users = explode ("\n",trim($_POST['users']));
            
            $format = $_POST['format'];
            
            if ($format == 'plain') {
                $msg = $_POST['tbody'];
            } else {
                $msg = $_POST['hbody'];
            }
            
            $d = array ();
            $d['site_title'] = Settings::item ('siteName');
            $d['site_url'] = Settings::item ('siteUrl');
            
            $t = ($_POST['type']=='refs')?'p':'c';
            
            $q = new Queue;
            $subj = $_POST['subject'];
            $q->priority = $_POST['priority'];
            $q->format = $format;
            
            //{KG}
            //Добавляем сообщения в очередь
            foreach ($users as $u) {
                
                $u = explode ('||',trim ($u));
                
                //Имя и емайл
                
                $d['email'] = $u[1];
                $d['name'] = $u[2];
		$d['refid'] = $u[0];
                
                //Отписаться
                $d['unsub'] = Y::bu().'notify/unsub/t/'.$t.'/i/'.$u[0].'/c/'.Queue::unsubCrc($t,$u[0]);
                
                $q->isNewRecord = TRUE;
                $q->id = NULL;
                
                
                //Готовим сообщение
                $nsubj = $subj;
                foreach ($d as $k=>$v) {
                    $nsubj = str_replace ('%'.$k.'%',$v,$nsubj);
                }
                $q->subject = $nsubj;
                
                $nmsg = $msg;
                foreach ($d as $k=>$v) {
                    $nmsg = str_replace ('%'.$k.'%',$v,$nmsg);
                }
                $q->body = $nmsg;
                
                
                $q->email = $d['email'];
                
                $q->save (FALSE);
            }            
            
            $this->render('send', array (
                    'count' => count ($users),
            ));
	}


}