<!DOCTYPE html>
<html lang="ru" class="">

<head>
    <meta charset="utf-8" />
    <title><?= CHtml::encode($this->pageTitle); ?> - Панель Автора</title>
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

				<?php $flashmsg = Y::user()->getFlash ('author') ?>
				<?php if (!empty($flashmsg)): ?>

					<div class="wrap">
						<h3>Результат последнего действия</h3>
						<p align="center" id="resultMessage"><?= $flashmsg ?></p>
					</div>

				<?php endif; ?>

        <?php if (!Y::user()->isGuest): ?>

        <!-- <div class="wrap">
        
            <p align="center" style="font-size:14px;">
                &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                 <a href="<?=Y::bu()?>author">Главная</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="<?=Y::bu()?>author/bills">Заказы</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="<?=Y::bu()?>author/stat">Статистика</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                <a href="<?=Y::bu()?>author/default/logout">Выход</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
            </p>
        
        </div> -->

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
    <script src="https://cdn.jsdelivr.net/npm/table2csv@1.1.4/src/table2csv.min.js"></script>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <script>
        
       $(".excelexport").on("click", function (e) {
           // $('#table-edit').table2csv();

           $("#table-edit").table2excel({
                exclude: ".excludeThisClass",
                name: "Worksheet Name",
                filename: "ListOrders.xls", // do include extension
                preserveColors: false // set to true if you want background colors and font colors preserved
            });

        }); 


    </script>
</body>

</html>
