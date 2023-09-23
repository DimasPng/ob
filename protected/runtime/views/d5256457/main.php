<?php /* source file: /home/user/web/psi-in.ru/public_html/ob/protected/views//layouts/main.php */ ?>
<!DOCTYPE html>
<html lang="ru" class=""  style="background-color:#fff; height:auto;">

<head>
    <meta charset="utf-8" />
    <title><?=CHtml::encode($this->pageTitle); ?></title>   
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="<?= Y::baseUrl() ?>favicon.ico">
        <script src="<?= Y::baseUrl() ?>libs/jquery/jquery/dist/jquery.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/css/font.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/css/app.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" type="text/css" />


</head>

<body style="background-color:#fff">
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

    <script src="<?= Y::baseUrl() ?>libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?= Y::baseUrl() ?>js/sweetalert.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-load.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-jp.config.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-jp.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-nav.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-toggle.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-client.js"></script>

    <script>
        function executeExample(){
            Swal.fire({
                  title: 'Вы подтверждаете правильность введённых Вами данных?',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Да, все правильно!',
                  cancelButtonText: 'Отмена'
                }).then((result) => {
                  if (result.value) {
                    console.log(123);
                    let form = document.getElementById("bill-form");
                    form.submit();
                  }                 
                })
            /*Swal.fire({
              title: 'Вы подтверждаете правильность введённых Вами данных?',
              text: 'asdf',
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Да, все правильно!'
              cancelButtonText: 'Отмена'
            }).then((result) => {
              if (result.value) {
                return true;
              }
              else
                {
                   return false; 
                }
            })*/
        }
    </script>
</body>

</html>

