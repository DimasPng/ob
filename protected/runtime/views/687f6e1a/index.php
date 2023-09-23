<?php /* source file: /home/admin/web/psi-in.ru/public_html/ob/protected/views/status/index.php */ ?>
<?php $this->pageTitle='Состояние Вашего заказа #'.$model->id ?>

<div class="container w-xxl w-auto-xs" id="change_pay_width">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
    <div class="m-b-lg" id="form_pay">
        <div class="wrapper text-center">
          <strong style="font-size: 20px;">Информация о счёте</strong>
        </div>

        <h3 class="text-center">Состояние Вашего заказа №<?=$model->id?></h3>
  
        <p align="center" style="font-size:16px">Текущий статус счёта:<br><br>
        
        <img src="<?=Y::bu()?>images/status/<?=$model->status_id?>.gif"><br><br><b>&quot;<?=Lookup::item('Status',$model->status_id) ?>&quot;</b> </p>
        
        <br><br>    
        <p>Дата последнего изменения заказа: <span class="date"><?=($model->lastDate>0)?H::date($model->createDate):H::date($model->lastDate)?></span></p>
        
        <br><br>
        
        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(        
                'createDate' => array (
                            'label' => 'Дата создания',
                            'value' => H::date ($model->createDate),
                        ),
                'sum' => array (
                            'label' => 'На сумму',
                            'value' => H::mysum ($model->sum).H::valuta ($model->valuta),
                        ),            
                    
                        array (
                            'label' => 'Ссылка на оплату:',
                            'type'  => 'raw',
                            'value' => CHtml::link ('<b><u>>> Оплатить счёт <<</u></b>',Y::bu().'bill/index?bill_id='.$model->id.'&hash='.Bill::hashBill($model->id),array ('target' => '_blank')),
                            'visible' => ($model->status_id == 'waiting')?TRUE:FALSE,
                        ),
                        'sp0'=> array ('label' => '','type'=>'raw','value' => '&nbsp;'),
                array (
                            'label' => 'Оплата вручную',
                            'type' =>'raw',
                            'value' => '<a target="_blank" href="'.$notify.'">сообщить о совершении оплаты вручную прямым переводом</a>',
                            'visible' => ($model->status_id == 'waiting')?TRUE:FALSE,
                        ),                        
                        'sp1'=> array ('label' => '','type'=>'raw','value' => '&nbsp;','visible' => ($model->status_id == 'waiting')?TRUE:FALSE),
                'email',
                'amail',            
                
                        'sp'=> array ('label' => '','type'=>'raw','value' => '&nbsp;'),         

                'surname',
                'uname',            
                'otchestvo',
                    
                'strana',
                'region',
                'gorod',
                    
                'postindex',
                    
                'address',
                    
                'phone',
                    
                        'sp3'=> array ('label' => '','type'=>'raw','value' => '&nbsp;'),            
                'curier' => array (
                            'label' => 'Доставка курьером',
                            'value' => Lookup::item('Visible',$model->curier+0),
                        ),      
                        'comment' => array (
                            'label' => 'Комментарий',
                            'value' => $model->comment,
                        ),
                    
                'ip',            

                        'sp2'=> array ('label' => '','type'=>'raw','value' => '&nbsp;'),                        
                    
                'postNumber',            

                'orderCount',       
            ),
        )); ?>    
            
        
        <br><br>
        
        <p><b>Заказанные товары:</b></p>
        
        <?php $orders = $model->orders; ?>
        <ul>
        <?php foreach ($orders as $order): ?>
        
        <li><?=$order->good->title?></li>
        
        <?php endforeach; ?>
        </ul>


    </div>
    <div class="text-center">
        <p>
        <small class="text-muted"><a target="_blank" href="https://wayforpay.com/ru">WayForPay</a><br>&copy; 2020</small>
        </p>
    </div>
</div>

