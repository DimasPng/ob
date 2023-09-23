<?php /* source file: /home/admin/web/psi-in.ru/public_html/ob/protected/views/order/cart.php */ ?>
<?php $this->pageTitle='Оформление заказа - Выгодное предложение' ?>

<?php echo StepBar::showBar(2) ?>

<div class="wrap wrap222">

<div class="dig_procent">
	<div class="procent">
		-<?php echo $tgood->cartMinus; ?>%
	</div>
	<div class="text_procent">
		<p>На этой странице, вы можете добавить к своему заказу еще какие-либо товары с <?php echo $tgood->cartMinus; ?>% скидкой. </p> 
		<p>Если же вы ни чего не хотите добавлять, то просто спуститесь в самый низ данной страницы и нажмите на кнопку "Перейти в корзину"</p>
	</div>
</div>




<!-- Здесь можно вставить предварительный текст -->

<form method="post">

<?php foreach ($gl as $good): ?>

<div class="one_cart_item">

<h1><?=$good->title?></h1>

<?php $mgd = $good->id ?>

<div class="cart_descr">
<div class="img"><img src="<?=$good->image; ?>"><div>-<?php echo $tgood->cartMinus; ?>%</div></div>


<div class="cart_pos">

<p>

<?php  $np = Special::check($tgood->id, $good->id); ?>
            
<?php if (!empty ($np)): ?>

 Цена:<span class="cart_old_price"><?=H::mysum($good->price)?><?=H::valuta($good->currency);?></span><br />
Цена для вас:<span class="cart_price">
    
        <?=(H::mysum($np['sum'])); ?><?=H::valuta($np['valuta']);?></span>

   
    <?php elseif ($tgood->cartMinus>0): ?>
    
 Цена:<span class="cart_old_price"><?=H::mysum($good->price)?><?=H::valuta($good->currency);?></span><br />
Цена для вас:<span class="cart_price">
    
        <?=(H::mysum($good->price-(ceil($good->price*$tgood->cartMinus/100)))); ?><?=H::valuta($good->currency);?></span>

    <?php else: ?>
        
Цена:<span class="cart_price"><?=$good->price?><?=H::valuta($good->currency);?></span><br />    
    
    <?php endif; ?>
    
    
         
</p>

<p align="center" class="cart_nd"><span id="<?=$mgd?>_txt"></span></p>

<div class="cart_btn">
<input class="submit one" type="button" value="Добавить в корзину" id="<?=$mgd?>btn" />
<input class="submit three"   type="button" value="Успешно добавлен" id="<?=$mgd?>btn_off" style="display:none"/>
</div>


<script type="text/javascript">
<!--
	$(document).ready(function(){
							   
		$("#<?=$mgd?>btn").click (function () {														
				
				$("#<?=$mgd?>btn").hide ();
				$("#<?=$mgd?>btn_off").show ();
				
				$("#<?=$mgd?>_img").hide ();
				$("#<?=$mgd?>_img_full").show ();				
				
				$("#<?=$mgd?>_txt").html ('Товар добавлен <input type="hidden" name="goods[]" value="<?=$mgd?>" />');
				
				
			});
		
		$("#<?=$mgd?>btn_off").click (function () {														
				
				$("#<?=$mgd?>btn_off").hide ();
				$("#<?=$mgd?>btn").show ();
				
				$("#<?=$mgd?>_img_full").hide ();
				$("#<?=$mgd?>_img").show ();
				
				$("#<?=$mgd?>_txt").html('');				
				
			});
		

			   });

//-->
</script>

<div class="cart_btn">
<input id="subm " name="subm" class="submit  two" type="submit" value="Перейти в корзину"/>
</div>


</div>



</div>


<div align="left" class="left" style="white-space: pre-wrap;">

<?php print_r($good->cartText);?>
</div>

</div>

<p>&nbsp;</p>




<?php endforeach; ?>



<div class="cart_btn">
<input id="subm" name="subm" class="submit new_button new_button2" type="submit" value="Продолжить"/>
</div>

</form>


<div class="text-center">
        <p>
        <small class="text-muted" style="font-family: Open Sans;
font-style: normal;
font-weight: normal;
font-size: 13px;">Мы принимаем оплату на сайте при помощи системы "<a target="_blank" href="https://wayforpay.com/ru">WayForPay</a>"© 2020</small>
        </p>
    </div>

</div>

