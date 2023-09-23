<!DOCTYPE html>
<html lang="ru" class="">

<head>
    <meta charset="utf-8" />
    <title><?= CHtml::encode($this->pageTitle); ?> - Панель Администратора - OrderBro</title>   
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="<?= Y::baseUrl() ?>favicon.ico">

    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/css/font.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/css/app.css" type="text/css" />


</head>

<body>
    <div class="app app-header-fixed ">


    
    			<?= $content ?>

				<?php $flashmsg = Y::user()->getFlash ('mainFlash') ?>
				<?php if (!empty($flashmsg)): ?>

					<div class="wrap">
						<h3>Результат последнего действия</h3>
						<p align="center" id="resultMessage"><?= $flashmsg ?></p>
					</div>

				<?php endif; ?>


           </div>
    <script src="<?= Y::baseUrl() ?>libs/jquery/jquery/dist/jquery.js"></script>
    <script src="<?= Y::baseUrl() ?>libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-load.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-jp.config.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-jp.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-nav.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-toggle.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-client.js"></script>
</body>

</html>
