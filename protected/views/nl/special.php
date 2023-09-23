<?php $this->pageTitle='Оформление заказа - Очень выгодное предложение' ?>



<div class="container w-xxl w-auto-xs" id="change_pay_width">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
    <div class="m-b-lg" id="form_pay">
        <div class="wrapper text-center">
          <strong style="font-size: 20px;">Заказ наложенным платежом подтверждён</strong>
        </div>

        <h1 class="text-center">Очень выгодное предложение</h1>

        <p>&nbsp;</p>

		<p align="center" style="font-size:16px;">Ваш заказ наложенным платёжом подтверждён</p>

		<p>&nbsp;</p>

		<?=$cross?>

		<p>&nbsp;</p>        
		<div align="center">
		<form action="<?=$okurl?>" method="post">
		    <input class="submit" type="submit" value="Добавить к заказу" style="font-size:16px;"/>
		</form>
		</div>


    </div>
    <div class="text-center">
        <p>
        <small class="text-muted"><a target="_blank" href="http://orderbro.ru/">ОрдерБро</a><br>&copy; 2019</small>
        </p>
    </div>
</div>
