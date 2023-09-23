<?php /* source file: /home/admin/web/psi-in.ru/public_html/ob/protected/views/main/error.php */ ?>
<?php $this->pageTitle='Система WayForPay' ?>
<div class="container w-xxl w-auto-xs" id="change_pay_width">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
    <div class="m-b-lg" id="form_pay">
       

        <h3 class="text-center">Ошибка <?php echo $code; ?></h3>
  
		<div class="error">

		<p align="center"><img style="margin:25px;" src="<?= Y::bu() ?>images/theme/error_button.png" /></p>

		<p align="center"><span style="font-size:18px; font-weight:bold"><?php 
			if($message=="CDbConnection failed to open the DB connection.") {
				echo CHtml::encode("Проверьте правльность данных, для соединения с базой данных в файле config/main.php"); 	
			} else{
				echo CHtml::encode($message); 
			}
		 ?></span></p>

		<p align="center">&nbsp;</p>
		<p align="center">&nbsp;</p>

		<p align="center"><INPUT class="submit submit btn m-b-xs  btn-primary btn-addon btn-lg" style=" margin: 0 auto;    display: block;    margin-top: 10px;" TYPE="BUTTON" VALUE="Вернуться назад" 
		ONCLICK="history.go(-1)"></p>

		<p align="center">&nbsp;</p>
		<p align="center">&nbsp;</p>

		</div>


    </div>
    <div class="text-center">
        <p>
        <small class="text-muted"><a target="_blank" href="https://wayforpay.com">WayForPay</a><br>&copy; </small>
        </p>
    </div>
</div>
