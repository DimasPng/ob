<!DOCTYPE html>
<html lang="ru" class="">

<head>
    <meta charset="utf-8" />
    <title><?= CHtml::encode($this->pageTitle); ?></title>
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
	
		


 		<?php if (!Y::user()->isGuest): ?> 
 		<?php $this->pageTitle='Главная' ?>    
        <header id="header" class="app-header navbar" role="menu">
            <!-- navbar header -->
            <div class="navbar-header bg-dark">
                <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
                    <i class="glyphicon glyphicon-cog"></i>
                </button>
                <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
                    <i class="glyphicon glyphicon-align-justify"></i>
                </button>
                <!-- brand -->
                <a href="#/" class="navbar-brand text-lt">
                    <i class="fa fa-btc"></i>
                    <img src="img/logo.png" alt="." class="hide">
                    <span class="hidden-folded m-l-xs">OrderBro</span>
                </a>
                <!-- / brand -->
            </div>
            <!-- / navbar header -->
            <!-- navbar collapse -->
            <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
                <!-- buttons -->
                <div class="nav navbar-nav hidden-xs">
                    <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
                        <i class="fa fa-dedent fa-fw text"></i>
                        <i class="fa fa-indent fa-fw text-active"></i>
                    </a>
                   <!--  <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">
                       <i class="icon-user fa-fw"></i>
                   </a> -->
                </div>

                <ul class="nav navbar-nav navbar-right">
              
                   <li class="dropdown">
                       <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
                           <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                               <img src="<?= Y::baseUrl() ?>/img/a0.jpg" alt="...">
                               <i class="on md b-white bottom"></i>
                           </span>
                           <span class="hidden-sm hidden-md"><?php //echo Y::user()->firstName ?></span> <b class="caret"></b>
                       </a>                       
                       <ul class="dropdown-menu animated fadeInRight w">
                         
                           <li>
                               <a href="<?=Y::bua()?>default/logout">Выход</a>
                           </li>
                       </ul>
                       
                   </li>
               </ul>
                <!-- / navbar right -->
            </div>
            <!-- / navbar collapse -->
        </header>
        <!-- / header -->
        <!-- aside -->
        <aside id="aside" class="app-aside hidden-xs bg-dark">
            <div class="aside-wrap">
                <div class="navi-wrap">
                    <!-- user -->
                    <div class="clearfix hidden-xs text-center hide" id="aside-user">
                        <div class="dropdown wrapper">
                            <a href="app.page.profile">
                                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                                    <img src="<?= Y::baseUrl() ?>/img/a0.jpg" class="img-full" alt="...">
                                </span>
                            </a>
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                                <span class="clear">
                                    <span class="block m-t-sm">
                                        <strong class="font-bold text-lt"><?php //echo Y::user()->firstName ?></strong>
                                        <b class="caret"></b>
                                    </span>
                                    <span class="text-muted text-xs block">Администратор</span>
                                </span>
                            </a>
                            <!-- dropdown -->
                            <ul class="dropdown-menu animated fadeInRight w hidden-folded">                              
                                <li>
                                    <a href="<?= Y::bu() ?>aff/default/logout">Выход</a>
                                </li>
                            </ul>
                            <!-- / dropdown -->
                        </div>
                        <div class="line dk hidden-folded"></div>
                    </div>
                    <!-- / user -->
                    <!-- nav -->
                    <nav ui-nav class="navi clearfix">



        <!-- 

        div id="mainMenu">
            <ul id="navlist"  class="dropdown">
            <li><a href="<?= Y::bu() ?>aff/">Главная</a></li>
            <li><a href="<?= Y::bu() ?>aff/stat">Статистика</a></li>
            <li><a href="<?= Y::bu() ?>aff/sells">Заказы</a></li>
            <li><a href="<?= Y::bu() ?>aff/links">Реф-ссылки</a>
                    <ul class="sub_menu"><li><a href="<?= Y::bu() ?>aff/cupon">Купоны</a></li></ul>
                </li>
            <li><a href="<?= Y::bu() ?>aff/short">Короткие ссылки</a></li>
            <li><a href="<?= Y::bu() ?>aff/profile">Профиль</a></li>
            <li><a href="<?=Settings::item('siteUrl'); ?>" target="_blank">Сайт автора</a></li>
            <li><a href="<?= Y::bu() ?>aff/default/logout">Выход</a></li>

            </ul>

            </div>   -->



                        <ul class="nav">
                            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                                <span>Навигация</span>
                            </li>
                            <li>
                                <a href="<?= Y::bu() ?>aff/" class="auto">
                                    <!-- <span class="pull-right text-muted">
                                        <i class="fa fa-fw fa-angle-right text"></i>
                                        <i class="fa fa-fw fa-angle-down text-active"></i>
                                    </span> -->
                                    <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                                    <span class="font-bold">Главная</span>
                                </a>                               
                            </li>                           
                            <li class="line dk"></li>
                            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                                <span>Управление</span>
                            </li>
                            <li>
                                <a href="<?= Y::bu() ?>aff/sells" class="auto">
                                    <!-- <span class="pull-right text-muted">
                                        <i class="fa fa-fw fa-angle-right text"></i>
                                        <i class="fa fa-fw fa-angle-down text-active"></i>
                                    </span> -->
                                    <!--  <b class="badge bg-info pull-right">3</b> -->
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Заказы</span>
                                </a>                                
                            </li>   
                            <li>
                                <a href="<?= Y::bu() ?>aff/stat">
                                  <i class="glyphicon glyphicon-signal"></i>
                                  <span>Статистика</span>
                                </a>
                            </li>   

                            <li>
                                <a href="<?= Y::bu() ?>aff/links">
                                  <i class="glyphicon glyphicon-wrench"></i>
                                  <span>Реф-ссылки</span>
                                </a>
                            </li> 

                            <li>
                                <a href="<?= Y::bu() ?>aff/cupon">
                                  <i class="glyphicon glyphicon-modal-window"></i>
                                  <span>Купоны</span>
                                </a>
                            </li> 

                            <li>
                                <a href="<?= Y::bu() ?>aff/short">
                                  <i class="glyphicon glyphicon-link"></i>
                                  <span>Короткие ссылки</span>
                                </a>
                            </li> 

                            <li>
                                <a href="<?= Y::bu() ?>aff/profile">
                                  <i class="glyphicon glyphicon-user"></i>
                                  <span>Профиль</span>
                                </a>
                            </li>                                             
                            
                        </ul>
                    </nav>
                   
                </div>
            </div>
        </aside>
        <!-- / aside -->
        <!-- content -->
        <div id="content" class="app-content" role="main">
            <div class="app-content-body ">
                <div class="hbox hbox-auto-xs hbox-auto-sm">
                    <!-- main -->

                    <?php $sitems = $this->menu;?>
                    <?php if (!empty ($sitems)): ?>   
                    <div class="col w-md bg-light dk b-r bg-auto">        
                        <div class="wrapper " id="email-menu">
                          <?php $this->widget('zii.widgets.CMenu', array(
                                'items'=>$sitems,
                                'htmlOptions'=>array('class'=>'operations nav nav-pills nav-stacked nav-sm'),
                            )); ?>
                             <ul class="nav nav-pills nav-stacked nav-sm" style="margin-top:15px;">
                                <li>
                                   <a onclick="history.back(); return false;"><i class="fa fa-fw fa-circle text-primary"></i>Вернуться назад</a>
                                </li>                               
                              </ul>
                        </div>
                       

                    </div>
                    <?php endif; ?>    

                    <?=Hint::scr () ?>  
        

        <?php endif; ?>  


		<?= $content ?>

       
                        

        <?php if (!Y::user()->isGuest): ?>            
                    <!-- / right col -->
                </div>
            </div>
        </div>
        <!-- /content -->
        <!-- footer -->
        <footer id="footer" class="app-footer" role="footer">
            <div class="wrapper b-t bg-light">
                <span class="pull-right">3.0.0 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
                Программное обеспечение: OrderBro. &copy; <?=date('Y')?>
            </div>
        </footer>
        <!-- / footer -->

		<?php endif; ?>


				

        <?php if (!Y::user()->isGuest): ?>


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


