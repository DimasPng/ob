<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/settings/paysystems/_enot.php */ ?>
<fieldset>
    
    <legend>Параметры Интеркассы</legend>
    
    <a target="_blank" href="https://enot.io/"><img src="<?=Y::bu()?>images/admin/pay/enot.svg" style="    padding: 20px 40px;
    width: 275px;"></a>
    
    <ol>
        
        <li>
            <?php echo $form->labelEx($model,'payEnotOn'); ?>
            <?php echo $form->checkBox($model,'payEnotOn',array('class' => 'checkbox', 'uncheckValue' => 0)); ?>
        </li>
        
        <li>
            <?php echo $form->labelEx($model,'payEnotId'); ?>
            <?php echo $form->textField($model,'payEnotId',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
            <?php echo $form->error($model,'payEnoId'); ?>
        </li>
        
        <li>
            <?php echo $form->labelEx($model,'payEnotKey'); ?>
            <?php echo $form->textField($model,'payEnotKey',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
            <?php echo $form->error($model,'payEnotKey'); ?>
        </li>
        <li>
            <?php echo $form->labelEx($model,'payEnotKey2'); ?>
            <?php echo $form->textField($model,'payEnotKey2',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
            <?php echo $form->error($model,'payEnotKey2'); ?>
        </li>
    
    
    </ol>

</fieldset>
<br />

<br>
<?=H::moredivAll('данные для настройки','enot') ?>
<fieldset>
    <legend>Настройка уведомления на сайте enot.io</legend>
    <ol>

        <li>
            <label>Success URL:</label>
            <div class="systemlink"><?=Y::bu()?>ps/enot/ok</div>
        </li>

        <li>
            <label>Метод Success URL:</label>
            <div class="systemparam">LINK</div>
        </li>

        <li>
            <label>Fail URL:</label>
            <div class="systemlink"><?=Y::bu()?>ps/enot/fail</div>
        </li>

        <li>
            <label>Метод Fail URL:</label>
            <div class="systemparam">LINK</div>
        </li>

        <li>
            <label>URL calback:</label>
            <div class="systemlink"><?=Y::bu()?>ps/enot</div>
        </li>
        

        
    </ol>
</fieldset>
</div>
