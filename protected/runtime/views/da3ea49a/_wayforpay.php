<?php /* source file: /home/user/web/psi-in.ru/public_html/ob/protected/modules/admin/views/settings/paysystems/_wayforpay.php */ ?>
<fieldset>

<legend>Параметры платёжной системы WayForPay</legend>

<a href="https://wayforpay.com/ru" target="_blank"><img src="<?=Y::bu()?>images/admin/pay/wfp.gif" style="    padding: 20px 42px;" ></a>

<ol>

    <li>    
        <?php echo $form->labelEx($model,'wayForPayOn'); ?>
        <?php echo $form->checkBox($model,'wayForPayOn',array('class' => 'checkbox','uncheckValue' => 0)); ?>    
    </li>
 
    <li>    
        <?php echo $form->labelEx($model,'wayForPayid'); ?>
        <?php echo $form->textField($model,'wayForPayid',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'wayForPayid'); ?>
    </li>   
     <li>    
        <?php echo $form->labelEx($model,'wayForPaykey'); ?>
        <?php echo $form->textField($model,'wayForPaykey',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'wayForPaykey'); ?>
    </li>     
    
</ol>

</fieldset>
<?=H::moredivAll('данные для настройки','wayforpay') ?>
<fieldset>
    <legend>Настройка уведомления на сайте WayForPay</legend>
    <ol>       

        <li>
            <label>URL для успешного ответа:</label>
            <div class="systemlink"><?=Y::bu()?>ps/wayforpay/ok</div>
        </li>

        <li>
            <label>URL для неуспешного ответа:</label>
            <div class="systemparam"><?=Y::bu()?>ps/wayforpay/fail</div>
        </li>
         <li>
            <label>Server Callback URL:</label>
            <div class="systemlink"><?=Y::bu()?>ps/wayforpay</div>
        </li>     

    </ol>
</fieldset>
</div>