<?php /* source file: /home/admin/web/psi-in.ru/public_html/ob/protected/views/order/total.php */ ?>
<?php $this->pageTitle='Оформление заказа - Ваша корзина' ?>

<?php echo StepBar::showBar(3) ?>

<div class="wrap wrap222">

<!-- Сюда писать текст какой-нибудь предварительный -->
<form method="post" class="totals">

<h1>Ваша Корзина</h1>

<?php $total=0; $i = 1; foreach ($goods as $good): ?>
<div class="item_order">
<div><?=$i?>. <?=$good->title?></div>
<div class="price"><?=H::mysum($good->newprice)?><?=H::valuta($good->currency); $total+=$good->rurcena; ?></div>
</div>
<?php $i++; endforeach; ?>



<div class="cart_btn">
	<input class="submit new_button new_button3" type="submit" name="submit" value="Всё верно, перейти к выбору способа оплаты" style="font-size:16px;"/>
	<p class="total_sum_cart">Итого: <span><?=H::mysum($total); echo H::valuta($good->currency);?></span></p>
</div>

</div>

<div class="text-center" style="margin-top:30px;">
        <p>
        <small class="text-muted" style="font-family: Open Sans;
font-style: normal;
font-weight: normal;
font-size: 13px;">Мы принимаем оплату на сайте при помощи системы "<a target="_blank" href="https://wayforpay.com/ru">WayForPay</a>"© 2020</small>
        </p>
    </div>
