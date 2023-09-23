<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="ru">

<link href="<?= Y::baseUrl() ?>css/styles.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="<?= Y::baseUrl() ?>favicon.ico">
<!--[if IE]>
<link rel="stylesheet" type="text/css" media="all" href="<?= Y::baseUrl() ?>css/ie.css">
<link rel="stylesheet" type="text/css" media="all" href="<?= Y::baseUrl() ?>css/ieuser.css">
<![endif]-->

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<title><?= CHtml::encode($this->pageTitle); ?> - Закрытая Зона</title>

</head>

<body>


<div align="center" style="padding-top:15px;">

<table id="mainOblast" cellpadding="0" cellspacing="0">
    <tr>
    <td>
    <div id="mainContent">
    
<?php if (!Y::user()->isGuest): ?>

<div class="wrap">

    <h3>Сведения о пользователе</h3>    

    <table border="0" width="680">
    <tr>
        <td valign="top">
        <p>Пользователь: <b><?= Y::user()->getState ('username') ?></b></p>
        <p>E-mail: <b><?= Y::user()->email ?></b></p>
        <p>&nbsp;</p>
        <p>Оплачено до: <span style="color:<?php echo (Y::user()->getState('payTill')<time())?'red':'green'; ?>"><b><?= date ('j.m.Y H:i', Y::user()->getState('payTill')) ?></b></span></p>
        <br><p>
<?= CHtml::beginForm(array ('default/prolong')); ?>

<?php
    //Эта часть отвечает за список сроков оплаты
    $sroks = Y::user()->areaPaylist;
    $nsroks = array ();
    foreach ($sroks as $one) {
        $nsroks[$one->id] = $one->title;
    }

?>

<?= CHtml::dropDownList ('paylist_id','',$nsroks,array ('class' => 'select')) ?>
            
<?= CHtml::submitButton('Продлить', array ('class' => 'submit')); ?>
<?= CHtml::endForm(); ?>            <span style="font-size:9px">(после продления выполните новый вход)</span>
        </p>
        </td>
        <td width="150" align="right" valign="middle">
<?= CHtml::beginForm(array ('default/logout')); ?>
<?= CHtml::submitButton('Выход', array ('class' => 'submit','style' => 'height:60px; width:130px;')); ?>
<?= CHtml::endForm(); ?>
        </td>
    </tr>
    </table>

</div>


<?php endif; ?>
    
    		<?= $content ?>

				<?php $flashmsg = Y::user()->getFlash ('area') ?>
				<?php if (!empty($flashmsg)): ?>

					<div class="wrap">
						<h3>Результат последнего действия</h3>
						<p align="center" id="resultMessage"><?= $flashmsg ?></p>
					</div>

				<?php endif; ?>


            </div>            
           
        </td>

    </tr>
</table>
</div>

<div id="copyright">
Программное обеспечение: Система OrderBro &copy; <?= date('Y'); ?>
</div>
<br />

</body>
</html>