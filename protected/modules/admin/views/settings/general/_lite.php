<fieldset>

<legend>Настройки для сервисов рассылок Mailerite</legend>

<ol>

    <li>    
    <div class="row" style="    padding-bottom: 30px;">
        <?php echo $form->labelEx($model,'ml'); ?>
        <?php echo $form->textField($model,'ml',array('size'=>60,'maxlength'=>50, 'class' => 'text')); ?>
        <?php echo $form->error($model,'ml'); ?> 
    </div>  </li>    
     <li> 
	<div class="row">
        <?php echo $form->labelEx($model,'mlp'); ?>
        <?php echo $form->textField($model,'mlp',array('size'=>60,'maxlength'=>50, 'class' => 'text')); ?>
        <?php echo $form->error($model,'mlp'); ?> 
    </div>   
    </li>       

</ol>

</fieldset>



<br />
