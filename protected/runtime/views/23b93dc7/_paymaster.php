<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/settings/paysystems/_paymaster.php */ ?>
<fieldset>

<legend>Параметры платёжной системы PayMaster</legend>
<a href="https://info.paymaster.ru/" target="_blank"><img src="<?=Y::bu()?>images/admin/pay/paymaster.gif" style="    padding: 20px 40px;
    width: 275px;"></a>

<ol>

    <li>    
        <?php echo $form->labelEx($model,'payMasterOn'); ?>
        <?php echo $form->checkBox($model,'payMasterOn',array('class' => 'checkbox','uncheckValue' => 0)); ?>    
    </li>
	
 
    <li>    
        <?php echo $form->labelEx($model,'payMasterShopid'); ?>
        <?php echo $form->textField($model,'payMasterShopid',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payMasterShopid'); ?>
    </li>
    
    <li>
        <?php echo $form->labelEx($model,'payMasterShoppass'); ?>
        <?php echo $form->textField($model,'payMasterShoppass',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payMasterShoppass'); ?>
    </li>
	  
    
</ol>

</fieldset>

<br />

<br>
<?=H::moredivAll('данные для настройки','paymaster') ?>
<fieldset>
<legend>В личном кабинете PayMaster необходимо зайти в Список сайтов – Настройки и в блоке «Технические параметры» настроить:</legend>

<p>Тип подписи – <strong>md5</strong></p>

<p>Секретный ключ – придумываете самостоятельно.</p>

<p>В блоке «Обратные вызовы» необходимо выбрать метод отсылки данных <strong>POST</strong>-запрос и указать следующие параметры:</p>
<ol>


<li>
<label>Payment notification: :</label>
<div class="systemlink"><?=Y::bu()?>ps/paymaster</div>
</li>

<li>
<label>Success redirect: </label>
<div class="systemlink"><?=Y::bu()?>ps/paymaster/fail</div>
</li>


<li>
<label>Failure redirect:</label>
<div class="systemlink"><?=Y::bu()?>ps/paymaster/ok</div>
</li>

Разрешена замена URL поставить галочку.

</ol>
</fieldset>
</div>