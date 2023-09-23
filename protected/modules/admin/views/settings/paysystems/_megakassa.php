<fieldset>

<legend>Параметры платёжной системы MegaKassa</legend>
<a href="https://megakassa.ru/" target="_blank"><img src="<?=Y::bu()?>images/admin/pay/megakassa.gif" style="padding:20px 25px;"></a>

<ol>

    <li>    
        <?php echo $form->labelEx($model,'payMegakassaOn'); ?>
        <?php echo $form->checkBox($model,'payMegakassaOn',array('class' => 'checkbox','uncheckValue' => 0)); ?>    
    </li>
	
 
    <li>    
        <?php echo $form->labelEx($model,'payMegakassaShopid'); ?>
        <?php echo $form->textField($model,'payMegakassaShopid',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payMegakassaShopid'); ?>
    </li>
    
    <li>
        <?php echo $form->labelEx($model,'payMegakassaShoppass'); ?>
        <?php echo $form->textField($model,'payMegakassaShoppass',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payMegakassaShoppass'); ?>
    </li>  
	

	
    
  
    
</ol>

</fieldset>

<br />

<br>
<?=H::moredivAll('данные для настройки','mega') ?>
<fieldset>
<legend>Для ввода в разделе &quot;Настройка сайта&quot; на сайте MegaKassa</legend>
<ol>



<li>
<label>URL успешной оплаты</label>
<div class="systemlink"><?=Y::bu()?>ps/mega/fail</div>
</li>


<li>
<label>URL неуспешной оплаты</label>
<div class="systemlink"><?=Y::bu()?>ps/mega/ok</div>
</li>

<li>
<label>URL обработчика:</label>
<div class="systemlink"><?=Y::bu()?>ps/mega</div>
</li>




</ol>
</fieldset>

</div>