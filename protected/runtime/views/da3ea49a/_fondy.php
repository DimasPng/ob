<?php /* source file: /home/user/web/psi-in.ru/public_html/ob/protected/modules/admin/views/settings/paysystems/_fondy.php */ ?>
<fieldset>

<legend>Параметры платёжной системы Fondy</legend>

<a href="https://fondy.ua/ru/" target="_blank"><img src="<?=Y::bu()?>images/admin/pay/fondy.gif" style="    padding: 20px 42px;" ></a>

<ol>

    <li>    
        <?php echo $form->labelEx($model,'payFondyOn'); ?>
        <?php echo $form->checkBox($model,'payFondyOn',array('class' => 'checkbox','uncheckValue' => 0)); ?>    
    </li>
 
    <li>    
        <?php echo $form->labelEx($model,'payFondyId'); ?>
        <?php echo $form->textField($model,'payFondyId',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payFondyId'); ?>
    </li>   
     <li>    
        <?php echo $form->labelEx($model,'payFondyKey'); ?>
        <?php echo $form->textField($model,'payFondyKey',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payFondyKey'); ?>
    </li>     
    
</ol>

</fieldset>
<?=H::moredivAll('данные для настройки','fondy') ?>
<fieldset>
    <legend>Настройка уведомления на сайте Fondy</legend>
    <ol>       

        <li>
            <label>URL для успешного ответа:</label>
            <div class="systemlink"><?=Y::bu()?>ps/fondy/ok</div>
        </li>

        <li>
            <label>URL для неуспешного ответа:</label>
            <div class="systemparam"><?=Y::bu()?>ps/fondy/fail</div>
        </li>
         <li>
            <label>Server Callback URL:</label>
            <div class="systemlink"><?=Y::bu()?>ps/fondy</div>
        </li>     

    </ol>
</fieldset>
</div>