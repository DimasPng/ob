<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/settings/paysystems/_interkassa.php */ ?>
<fieldset>

<legend>Параметры Интеркассы</legend>

<a target="_blank" href="https://www.interkassa.com/"><img src="<?=Y::bu()?>images/admin/pay/interkassa.gif" style="    padding: 20px 40px;
    width: 275px;"></a>

<ol>

    <li>    
        <?php echo $form->labelEx($model,'payInterkassaOn'); ?>
        <?php echo $form->checkBox($model,'payInterkassaOn',array('class' => 'checkbox','uncheckValue' => 0)); ?>
    </li> 

    <li>
        <?php echo $form->labelEx($model,'payInterkassaId'); ?>
        <?php echo $form->textField($model,'payInterkassaId',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payInterkassaId'); ?>
    </li>

    <li>
        <?php echo $form->labelEx($model,'payInterkassaKey'); ?>
        <?php echo $form->textField($model,'payInterkassaKey',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payInterkassaKey'); ?>
    </li>


    
</ol>

</fieldset>

<br />

<br>
<?=H::moredivAll('данные для настройки','inter') ?>
<fieldset>
<legend>Настройка уведомления на сайте Интеркассы</legend>
<ol>

<li>
<label>Success URL:</label>
<div class="systemlink"><?=Y::bu()?>ps/interkassa/ok</div>
</li>

<li>
<label>Метод Success URL:</label>
<div class="systemparam">LINK</div>
</li>

<li>
<label>Fail URL:</label>
<div class="systemlink"><?=Y::bu()?>ps/interkassa/fail</div>
</li>

<li>
<label>Метод Fail URL:</label>
<div class="systemparam">LINK</div>
</li>


<li>
<label>Status URL:</label>
<div class="systemlink"><?=Y::bu()?>ps/interkassa</div>
</li>

<li>
<label>Метод Status URL:</label>
<div class="systemparam">POST</div>
</li>

<li>
<label>Валюта суммы:</label>
<div class="systemparam">доллар США</div>
</li>

<li>
<label>Курс валюты:</label>
<div class="systemparam">1</div>
</li>

</ol>
</fieldset>
</div>