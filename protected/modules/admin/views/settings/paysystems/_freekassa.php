<fieldset>

<legend>Параметры платёжной системы FreeKassa</legend>
<a href="https://www.free-kassa.ru/" target="_blank"><img src="<?=Y::bu()?>images/admin/pay/freekassa.gif" style="padding: 20px 35px;
    width: 275px;"></a>

<ol>

    <li>    
        <?php echo $form->labelEx($model,'payFreekassaOn'); ?>
        <?php echo $form->checkBox($model,'payFreekassaOn',array('class' => 'checkbox','uncheckValue' => 0)); ?>    
    </li>
	
 
    <li>    
        <?php echo $form->labelEx($model,'payFreekassaShopid'); ?>
        <?php echo $form->textField($model,'payFreekassaShopid',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payFreekassaShopid'); ?>
    </li>
    
    <li>
        <?php echo $form->labelEx($model,'payFreekassaShoppass'); ?>
        <?php echo $form->textField($model,'payFreekassaShoppass',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payFreekassaShoppass'); ?>
    </li>  
	
	 <li>
        <?php echo $form->labelEx($model,'payFreekassaShoppass2'); ?>
        <?php echo $form->textField($model,'payFreekassaShoppass2',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payFreekassaShoppass2'); ?>
    </li>   

	
    
  
    
</ol>

</fieldset>


<br />

<br>
<?=H::moredivAll('данные для настройки','freekassa') ?>
<fieldset>
<legend>Для ввода в разделе &quot;Настройки&quot; на сайте FreeKassa</legend>
<ol>

<li>
<label>URL оповещения:</label>
<div class="systemlink"><?=Y::bu()?>ps/free</div>
</li>

<li>
<label>Метод оповещения:</label>
<div class="systemparam">POST</div>
</li>

<li>
<label>URL возврата в случае успеха:</label>
<div class="systemlink"><?=Y::bu()?>ps/free/ok</div>
</li>

<li>
<label>Метод оповещения:</label>
<div class="systemparam">POST</div>
</li>

<li>
<label>URL возврата в случае неудачи:</label>
<div class="systemlink"><?=Y::bu()?>ps/free/fail</div>
</li>

<li>
<label>Метод оповещения:</label>
<div class="systemparam">POST</div>
</li>

<li>
<label>Режим интеграции:</label>
<div class="systemparam">Нет</div>
</li>
<li>
<label>Подтверждение платежа:</label>
<div class="systemparam">Не требуется</div>
</li>


</ol>
</fieldset>
</div>
