<?php $this->pageTitle='Обновление' ?>

<div class="wrap">

    <h3>Обновление</h3>

    <h1>Обновление OrderBro</h1>

    <p style="font-size:16px">Текущая версия: <b><?=file_get_contents ('./protected/version.txt') ?></b></p>

    <br>
    <p><a href="http://orderbro.ru" target="_blank">Узнать текущую версию на официальном сайте скрипта ОрдерБро</a></p>

    <br>
    <p>Инструкции по обновлению - читайте в <a href="http://orderbro.ru/help2/" target="_blank">&quot;Справочном Центре&quot;</a></p>

    <br>

    <form method="POST">

<fieldset>
<legend>PHP-Код для установки обновления</legend>

<div class="shablon" align="center">

    <textarea name="code" rows="10" cols="50" class="textarea"></textarea>
    
</div>

</fieldset>

<fieldset class="submit_center">
<input class="submit_center" type="submit"
value="Выполнить код обновления" />
</fieldset>

</form>


</div>