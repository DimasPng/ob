<?php $this->pageTitle='Установка OrderBro'; ?>

<div class="container w-xxl w-auto-xs" id="change_pay_width">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
    <div class="m-b-lg" id="form_pay">
      

        <h3 class="text-center">Установка OrderBro - Добро Пожаловать!</h3>

   

		<p>Сейчас будет импортирована стартовая База Данных</p>

		<p>&nbsp;</p>

		<p>Вам стоит указать некоторые данные перед установкой.</p><br>

		<p>Укажите Ваше имя и e-mail (будет использоваться для восстановления пароля администратора, этот e-mail не виден пользователям)</p>

		<p>&nbsp;</p>

		<p>Также (в целях безопасности) - Вам нужно ввести <b>Секретный Ключ</b>, который Вы прописали ранее в <b>config/main.php</b>.</p><br>
		
		<form method="post" enctype="multipart/form-data" action="?act=restore">
		
			<div class="list-group list-group-sm">

				<legend>Данные администратора</legend>

				<div class="list-group-item">
					<label for="uname">Имя администратора:</label>
					<input name="uname" type="text" class="text form-control" value="Admin">
				</div>

				<div class="list-group-item">
					<label for="email">E-mail администратора:</label>
					<input name="email" type="text" class="text form-control" value="@">
				</div>

				<div class="list-group-item">
					<label for="secret">Секретный ключ:</label>
					<input name="secret" type="text" class="text form-control" value="">
				</div>
				

				<fieldset class="submit">
					<input class="submit submit btn m-b-xs  btn-primary btn-addon btn-lg" type="submit" style=" margin: 0 auto;    display: block;    margin-top: 10px;" value="Выполнить установку" />
				</fieldset>

			</div>

		</form> 


    </div>
    <div class="text-center">
        <p>
        <small class="text-muted"><a target="_blank" href="http://orderbro.ru/">ОрдерБро</a><br>&copy; 2019</small>
        </p>
    </div>
</div>
