<?php $this->pageTitle='Оформление заказа - Готово' ?>



<div class="container w-xxl w-auto-xs" id="change_pay_width">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
    <div class="m-b-lg" id="form_pay">
        <div class="wrapper text-center">
          <strong style="font-size: 20px;">Готово</strong>
        </div>

        <h1 class="text-center">Товар добавлен к заказу</h1>

        <div class="wrapper text-center">
			<img src="<?=Y::bu()?>images/m/fail.gif">
		</div>

		<p>&nbsp;</p>

		<p align="center"><img src="<?=Y::bu()?>images/m/ok.gif" style="margin:25px;"></p>

		<p>&nbsp;</p>
		<p>&nbsp;</p>

		<p align="center" style="font-size:16px;"><b>Выбранный Вами товар добавлен к заказу</b></p>

		<p>&nbsp;</p>
		<p>&nbsp;</p>

		<?php if (!empty ($slink)): ?>

		<p align="center">Постоянная ссылка для отслеживания состояния Вашего заказа:

		    <br><br>
		    
		    <a href="<?=$slink?>" target="_blank"><?=$slink?></a>

		</p>

		<?php endif; ?>


    </div>
    <div class="text-center">
        <p>
        <small class="text-muted"><a target="_blank" href="http://orderbro.ru/">ОрдерБро</a><br>&copy; 2019</small>
        </p>
    </div>
</div>
