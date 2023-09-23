<fieldset>

<legend>Параметры платёжной системы WebMoney</legend>

<img src="<?=Y::bu()?>images/admin/pay/webmoney.gif" style="padding:20px 25px;">

<ol>

    <li>    
        <?php echo $form->labelEx($model,'payRbkmoneyOn'); ?>
        <?php echo $form->checkBox($model,'payRbkmoneyOn',array('class' => 'checkbox','uncheckValue' => 0)); ?>
    </li> 

    <li>
        <?php echo $form->labelEx($model,'payRbkmoneyId'); ?>
        <?php echo $form->textField($model,'payRbkmoneyId',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payRbkmoneyId'); ?>
    </li>

    <li>
        <?php echo $form->labelEx($model,'payRbkmoneyKey'); ?>
        <?php echo $form->textField($model,'payRbkmoneyKey',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payRbkmoneyKey'); ?>
    </li>


    
</ol>

</fieldset>

<br />


<br />
