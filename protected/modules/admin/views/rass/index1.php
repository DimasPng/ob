<?php $this->pageTitle='Рассылка' ?>


<script type="text/javascript">
<!--
	jQuery(function() {
		var select_users = jQuery('.select_users');
		jQuery('input[name="type"]').change(function() {		
			if(jQuery(this).val()=="tovar_client"){
				select_users.show();
			}
			else if(jQuery(this).val()=="tovar_wait"){
				$('input[name="users[]"]').removeAttr("checked");
				select_users.show();
				
			}
			else{
				$('input[name="users[]"]').removeAttr("checked");
				select_users.hide();
			}
		});    
    
});
//-->
</script>

<div class="wrap">
    
    <h3>Рассылка</h3>
    
    <h1>Рассылка - Выбор получателей</h1>
    
<?=CHtml::form (array ('rass/msg'),'post'); ?>    
    
<fieldset>
<legend>Получатели</legend>

<ol>




<li  style="height:10px;">
<label for="format" style="width:300px;">Выберите, чтобы отправить партнерам:</label>
<input  style="margin-top:5px;" type="radio" name="type" value="refs">
</li>

<li  style="height:30px;">
<label for="format"  style="width:300px;">Выберите, чтобы отправить всем клиентам</label>
<input  style="margin-top:10px;" type="radio" name="type" value="all_client">
</li>

<li  style="height:30px;" class="tovar_client">
<label for="format"  style="width:300px;">Выберите, чтобы отправить всем клиентам по товарам</label>
<input  style="margin-top:10px;" type="radio" name="type" value="tovar_client">
</li>


<li style="height:30px;">
<label for="format"  style="width:300px;">Выберите, чтобы отправить всем не оплатившим клиентам:</label>
<input style="margin-top:10px;" type="radio" name="type" value="wait">
</li>

<li style="height:30px;" class="tovar_wait">
<label for="format"  style="width:300px;">Выберите, чтобы отправить всем не оплатившим клиентам по товарам:</label>
<input style="margin-top:10px;" type="radio" name="type" value="tovar_wait">
</li>




<li style="display:none;" class="select_users">
<!-- <select name="users[]" class="select" id="users" multiple size="20" style="height:300px;">-->
  <fieldset>
   <legend>Отметьте товар или несколько товаров:</legend>
<?php foreach ($goods as $one): ?>
<div style="display:block;width:100%;"><label style="width:100%;"><input  type="checkbox"  name="users[]" value="gd_<?=$one->id;?>"> <?=$one->title;?></label></div>
<?php endforeach; ?>
 </fieldset>
<!-- </select> -->
</li>


</ol>

</fieldset>

<fieldset class="submit">
<input class="submit" type="submit"
value="Продолжить" />
</fieldset>        

<?=CHtml::endForm()?>
    
    
</div>