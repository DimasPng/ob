

<fieldset>

<legend>Настройки для сервисов рассылок SendPulse</legend>
<p>Получить настройки можно по ссылке <a href="https://login.sendpulse.com/settings/#api" target="_blank">https://login.sendpulse.com/settings/#api</a></p>
<ol>

    <li>    
   		<div class="row">
	        <?php echo $form->labelEx($model,'sendpulseID'); ?>
	        <?php echo $form->textField($model,'sendpulseID',array('size'=>60,'maxlength'=>50, 'class' => 'text')); ?>
	        <?php echo $form->error($model,'sendpulseID'); ?> 
	    	</div>  
    </li>    

    <li> 
		<div class="row">
	        <?php echo $form->labelEx($model,'sendpulseSecret'); ?>
	        <?php echo $form->textField($model,'sendpulseSecret',array('size'=>60,'maxlength'=>50, 'class' => 'text')); ?>
	        <?php echo $form->error($model,'sendpulseSecret'); ?> 
	    </div>  
	 </li> 
		
	<?php if(Settings::item('sendpulseID')!="" && Settings::item('sendpulseSecret')!="") {?>
	<li>
	   <div class="row">
	        <label for="Setting_sendpulsePartner">Группа для партнеров</label>       

	        <select class="select" name="Setting[sendpulsePartner]" id="Setting_sendpulsePartner">	        	
				<option value="0">Сделайте выбор</option>
	        	<?php $lists =  Sendpulse::getLists(); 
	        		  if($lists) { foreach ($lists as $list) { ?>
	        		  	 <option <?php if(Settings::item('sendpulsePartner')==$list->id) { echo "selected"; } ?> value="<?php echo $list->id; ?>"><?php echo $list->name; ?></option>
	        		 <?php  }}
	        	?>

			</select>         
		 </div>
    </li>    
    <?php } ?>   

</ol>

</fieldset>

<br />
