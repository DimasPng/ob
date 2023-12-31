<!DOCTYPE html>
<html lang="ru" class="">

<head>
    <meta charset="utf-8" />
    <title><?= CHtml::encode($this->pageTitle); ?> - Панель Администратора - OrderBro</title>   
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="<?= Y::baseUrl() ?>favicon.ico">
    <script src="<?= Y::baseUrl() ?>libs/jquery/jquery/dist/jquery.js"></script>

    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/css/font.css" type="text/css" />
    <link rel="stylesheet" href="<?= Y::baseUrl() ?>/css/app.css" type="text/css" />


</head>

<body>
    <div class="app app-header-fixed ">
        <!-- header -->
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
                <!-- / buttons -->
                <!-- link and dropdown -->
                <!-- <ul class="nav navbar-nav hidden-sm">
                    <li class="dropdown pos-stc">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            <span>Mega</span>
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu wrapper w-full bg-white">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="m-l-xs m-t-xs m-b-xs font-bold">Pages <span class="badge badge-sm bg-success">10</span></div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <ul class="list-unstyled l-h-2x">
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Profile</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Post</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Search</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Invoice</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6">
                                            <ul class="list-unstyled l-h-2x">
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Price</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Lock screen</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Sign in</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Sign up</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 b-l b-light">
                                    <div class="m-l-xs m-t-xs m-b-xs font-bold">UI Kits <span class="label label-sm bg-primary">12</span></div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <ul class="list-unstyled l-h-2x">
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Buttons</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Icons <span class="badge badge-sm bg-warning">1000+</span></a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Grid</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Widgets</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6">
                                            <ul class="list-unstyled l-h-2x">
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Bootstap</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Sortable</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Portlet</a>
                                                </li>
                                                <li>
                                                    <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Timeline</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 b-l b-light">
                                    <div class="m-l-xs m-t-xs m-b-sm font-bold">Analysis</div>
                                    <div class="text-center">
                                        <div class="inline">
                                            <div ui-jq="easyPieChart" ui-options="{
                          percent: 65,
                          lineWidth: 50,
                          trackColor: '#e8eff0',
                          barColor: '#23b7e5',
                          scaleColor: false,
                          size: 100,
                          rotate: 90,
                          lineCap: 'butt',
                          animate: 2000
                        }">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            <i class="fa fa-fw fa-plus visible-xs-inline-block"></i>
                            <span translate="header.navbar.new.NEW">New</span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" translate="header.navbar.new.PROJECT">Projects</a></li>
                            <li>
                                <a href>
                                    <span class="badge bg-info pull-right">5</span>
                                    <span translate="header.navbar.new.TASK">Task</span>
                                </a>
                            </li>
                            <li><a href translate="header.navbar.new.USER">User</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href>
                                    <span class="badge bg-danger pull-right">4</span>
                                    <span translate="header.navbar.new.EMAIL">Email</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul> -->
                <!-- / link and dropdown -->
                <!-- search form -->
                <!-- <form class="navbar-form navbar-form-sm navbar-left shift" ui-shift="prependTo" data-target=".navbar-collapse" role="search" ng-controller="TypeaheadDemoCtrl">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" ng-model="selected" typeahead="state for state in states | filter:$viewValue | limitTo:8" class="form-control input-sm bg-light no-border rounded padder" placeholder="Search projects...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                </form> -->
                <!-- / search form -->
                <!-- nabar right -->
                <ul class="nav navbar-nav navbar-right">
                  <!--  <li class="dropdown">
                      <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                          <i class="icon-bell fa-fw"></i>
                          <span class="visible-xs-inline">Notifications</span>
                          <span class="badge badge-sm up bg-danger pull-right-xs">2</span>
                      </a>
                      dropdown
                      <div class="dropdown-menu w-xl animated fadeInUp">
                          <div class="panel bg-white">
                              <div class="panel-heading b-light bg-light">
                                  <strong>You have <span>2</span> notifications</strong>
                              </div>
                              <div class="list-group">
                                  <a href class="list-group-item">
                                      <span class="pull-left m-r thumb-sm">
                                          <img src="img/a0.jpg" alt="..." class="img-circle">
                                      </span>
                                      <span class="clear block m-b-none">
                                          Use awesome animate.css<br>
                                          <small class="text-muted">10 minutes ago</small>
                                      </span>
                                  </a>
                                  <a href class="list-group-item">
                                      <span class="clear block m-b-none">
                                          1.0 initial released<br>
                                          <small class="text-muted">1 hour ago</small>
                                      </span>
                                  </a>
                              </div>
                              <div class="panel-footer text-sm">
                                  <a href class="pull-right"><i class="fa fa-cog"></i></a>
                                  <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                              </div>
                          </div>
                      </div>
                     
                  </li> -->
                   <li class="dropdown">
                       <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
                           <!-- <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                               <img src="<?= Y::baseUrl() ?>/img/a0.jpg" alt="...">
                               <i class="on md b-white bottom"></i>
                           </span> -->
                           <span class="hidden-sm hidden-md"><?=Y::user()->firstName ?></span> <b class="caret"></b>
                       </a>                       
                       <ul class="dropdown-menu animated fadeInRight w">
                          <!--  <li class="wrapper b-b m-b-sm bg-light m-t-n-xs">
                              <div>
                                  <p>300mb of 500mb used</p>
                              </div>
                              <div class="progress progress-xs m-b-none dker">
                                  <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                              </div>
                          </li>
                          <li>
                              <a href>
                                  <span class="badge bg-danger pull-right">30%</span>
                                  <span>Settings</span>
                              </a>
                          </li>
                          <li>
                              <a ui-sref="app.page.profile">Profile</a>
                          </li>
                          <li>
                              <a ui-sref="app.docs">
                                  <span class="label bg-info pull-right">new</span>
                                  Help
                              </a>
                          </li> -->
                           <!-- <li class="divider"></li> -->
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
                                        <strong class="font-bold text-lt"><?=Y::user()->firstName ?></strong>
                                        <b class="caret"></b>
                                    </span>
                                    <span class="text-muted text-xs block">Администратор</span>
                                </span>
                            </a>
                            <!-- dropdown -->
                            <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                                <!-- <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                                    <span class="arrow top hidden-folded arrow-info"></span>
                                    <div>
                                        <p>300mb of 500mb used</p>
                                    </div>
                                    <div class="progress progress-xs m-b-none dker">
                                        <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                                    </div>
                                </li>
                                <li>
                                    <a href>Settings</a>
                                </li>
                                <li>
                                    <a href="page_profile.html">Profile</a>
                                </li>
                                <li>
                                    <a href>
                                        <span class="badge bg-danger pull-right">3</span>
                                        Notifications
                                    </a>
                                </li>
                                <li class="divider"></li> -->
                                <li>
                                    <a href="<?=Y::bua()?>default/logout">Выход</a>
                                </li>
                            </ul>
                            <!-- / dropdown -->
                        </div>
                        <div class="line dk hidden-folded"></div>
                    </div>
                    <!-- / user -->
                    <!-- nav -->
                    <nav ui-nav class="navi clearfix">
                        <ul class="nav">
                            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                                <span>Навигация</span>
                            </li>
                            <li>
                                <a href="<?=Y::bua()?>" class="auto">
                                    <span class="pull-right text-muted">
                                        <!-- <i class="fa fa-fw fa-angle-right text"></i> -->
                                       <!--  <i class="fa fa-fw fa-angle-down text-active"></i> -->
                                    </span>
                                    <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                                    <span class="font-bold">Главная</span>
                                </a>                               
                            </li>                           
                            <li class="line dk"></li>
                            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                                <span>Управление</span>
                            </li>
                            <li>
                                <a href class="auto">
                                    <span class="pull-right text-muted">
                                        <i class="fa fa-fw fa-angle-right text"></i>
                                        <i class="fa fa-fw fa-angle-down text-active"></i>
                                    </span>
                                    <!--  <b class="badge bg-info pull-right">3</b> -->
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Заказы</span>
                                </a>
                                <ul class="nav nav-sub dk">
                                    <li>
                                        <a href="<?=Y::bua()?>bill">
                                            <span>Заказы</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>receipt">
                                            <span>Кассовые чеки</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>stat">
                                            <span>Статистика</span>
                                        </a>
                                    </li>                                   
                                </ul>
                            </li>
                            <li>
                                <a href class="auto">
                                    <span class="pull-right text-muted">
                                        <i class="fa fa-fw fa-angle-right text"></i>
                                        <i class="fa fa-fw fa-angle-down text-active"></i>
                                    </span>
                                    <i class="glyphicon glyphicon-briefcase icon"></i>
                                    <span>Товары</span>
                                </a>
                                <ul class="nav nav-sub dk">
                                    <li>
                                        <a href="<?=Y::bua()?>good/index">
                                            <span>Список товаров</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>pincat">
                                            <span>PIN-коды</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>cupon">                                            
                                            <span>Скидки</span>
                                        </a>
                                    </li>                                                                   
                                </ul>
                            </li>
                            <li>
                                <a href class="auto">
                                    <span class="pull-right text-muted">
                                        <i class="fa fa-fw fa-angle-right text"></i>
                                        <i class="fa fa-fw fa-angle-down text-active"></i>
                                    </span>
                                    <i class="glyphicon glyphicon-list"></i>
                                    <span>Пользователи</span>
                                </a>
                                <ul class="nav nav-sub dk">
                                    <li>
                                        <a href="<?=Y::bua()?>client">
                                            <span>Клиенты</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>partner">
                                            <span>Партнеры</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>author">
                                            <span>Авторы</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>staff">
                                            <span>Менеджеры</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href class="auto">
                                    <span class="pull-right text-muted">
                                        <i class="fa fa-fw fa-angle-right text"></i>
                                        <i class="fa fa-fw fa-angle-down text-active"></i>
                                    </span>
                                    <i class="glyphicon glyphicon-edit"></i>
                                    <span>Рассылка</span>
                                </a>
                                <ul class="nav nav-sub dk">
                                	<li>
                                        <a href="<?=Y::bua()?>rass">
                                            <span>Рассылка</span>
                                        </a>
                                    </li>   
                                    <li>
                                        <a href="<?=Y::bua()?>maillist">
                                            <span>Серии писем</span>
                                        </a>
                                    </li>                                    
                                </ul>
                            </li>                            
                            <li>
                                <a href class="auto">
                                    <span class="pull-right text-muted">
                                        <i class="fa fa-fw fa-angle-right text"></i>
                                        <i class="fa fa-fw fa-angle-down text-active"></i>
                                    </span>
                                    <i class="glyphicon glyphicon-file icon"></i>
                                    <span>Партнерка</span>
                                </a>
                                <ul class="nav nav-sub dk">
                                    <!-- <li>
                                        <a href="<?=Y::bua()?>anew">
                                            <span>Новости</span>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="<?=Y::bua()?>ad">
                                            <span>Рекламные материалы</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>partnerpersonal">
                                            <span>Комиссионные</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>partnerauto">
                                            <span>Автокомиссионные</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>payouts">
                                            <span>Выплаты</span>
                                        </a>
                                    </li>                                                              
                                </ul>
                            </li>
                            <li class="line dk hidden-folded"></li>
                            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                                <span>Настройки</span>
                            </li>
                            <li>
                                <a href class="auto">
                                    <span class="pull-right text-muted">
                                        <i class="fa fa-fw fa-angle-right text"></i>
                                        <i class="fa fa-fw fa-angle-down text-active"></i>
                                    </span>
                                    <i class="glyphicon glyphicon-file icon"></i>
                                    <span>Настройки</span>
                                </a>
                                <ul class="nav nav-sub dk">
                                    <li>
                                        <a href="<?=Y::bua()?>settings/general">
                                            <span>Общие</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>settings/my">
                                            <span>Мои данные</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>settings/paysystems">
                                            <span>Платежные системы</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>way">
                                            <span>Способы оплаты</span>
                                        </a>
                                    </li> 
                                     <li>
                                        <a href="<?=Y::bua()?>waylist">
                                            <span>Варианты оплаты</span>
                                        </a>
                                    </li>   
                                    <li>
                                        <a href="<?=Y::bua()?>settings/partner">
                                            <span>Партнерская программа</span>
                                        </a>
                                    </li>                                   
                                    <li>
                                        <a href="<?=Y::bua()?>settings/atol">
                                            <span>Онлайн-касса</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Y::bua()?>letter">
                                            <span>Шаблоны писем</span>
                                        </a>
                                    </li> 
                                     <li>
                                        <a href="<?=Y::bua()?>templates">
                                            <span>Шаблоны страниц</span>
                                        </a>
                                    </li>  
                                    <li>
                                        <a href="<?=Y::bua()?>settings/interface">
                                            <span>Настройки интерфейса</span>
                                        </a>
                                    </li>    
                                    <li>
                                        <a href="<?=Y::bua()?>settings/up">
                                            <span>Обновление</span>
                                        </a>
                                    </li>                                                                  
                                </ul>
                            </li>
                            
                        </ul>
                    </nav>
                    <!-- nav -->
                    <!-- aside footer -->
                    <!-- <div class="wrapper m-t">
                        <div class="text-center-folded">
                            <span class="pull-right pull-none-folded">60%</span>
                            <span class="hidden-folded">Milestone</span>
                        </div>
                        <div class="progress progress-xxs m-t-sm dk">
                            <div class="progress-bar progress-bar-info" style="width: 60%;">
                            </div>
                        </div>
                        <div class="text-center-folded">
                            <span class="pull-right pull-none-folded">35%</span>
                            <span class="hidden-folded">Release</span>
                        </div>
                        <div class="progress progress-xxs m-t-sm dk">
                            <div class="progress-bar progress-bar-primary" style="width: 35%;">
                            </div>
                        </div>
                    </div> -->
                    <!-- / aside footer -->
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
                    <?= $content ?>  
                   

                    
                    <!-- / right col -->
                </div>
            </div>
        </div>
        <!-- /content -->
        <!-- footer -->
        <footer id="footer" class="app-footer" role="footer">
            <div class="wrapper b-t bg-light">
                <span class="pull-right">3.0.0 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
                Программное обеспечение: <a target="_blank" href="http://orderbro.ru/">OrderBro</a>. &copy; <?=date('Y')?>
            </div>
        </footer>
        <!-- / footer -->
    </div>
    
    <script src="<?= Y::baseUrl() ?>libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-load.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-jp.config.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-jp.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-nav.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-toggle.js"></script>
    <script src="<?= Y::baseUrl() ?>js/ui-client.js"></script>

        
    <script type="text/javascript">
    <!--
      jQuery(function() {
        var select_users = jQuery('.select_users');
        jQuery('input[name="type"]').change(function() {    
          if(jQuery(this).val()=="tovar_client"){
            select_users.show();
          }
          else if(jQuery(this).val()=="tovar_wait"){
            $('input[name="users[]"]').removeAttr("checked");
            select_users.show();
            
          }
          else{
            $('input[name="users[]"]').removeAttr("checked");
            select_users.hide();
          }
        }); 

       
        jQuery('.add_author').on('click',function(event){
            event.preventDefault();    
            if(jQuery(".author2").hasClass("active"))
            {
              jQuery(".author3").addClass("active");
              jQuery(this).hide();
            }  

            if(!jQuery(".author2").hasClass("active"))
            {
              jQuery(".author2").addClass("active");
            }  
            
          });

        $(".btn-danger").on('click',function(event){
            var isAdmin = confirm("Вы действительно хотите это сделать?");
            if(!isAdmin)
            {
               event.preventDefault(); 
            }
        });

        
    });


         /*(function () {
            $(".more a").click (function () {
                $(this).parent().next().next().toggle ("fast", function () {
                  if (this.style.display!="none") {
                     $("#more_'.$div_letter.' a").text ("'.$hidetext.'");
                    $("#more_'.$div_letter.' img").attr ("src", "'.Y::bu().'images/theme/btn/'.$hideimg.'");
                  } else {
                    $("#more_'.$div_letter.' a").text ("'.$showtext.'");
                    $("#more_'.$div_letter.' img").attr ("src", "'.Y::bu().'images/theme/btn/'.$showimg.'");
                  }
                });
              return false;
            });
          });*/


    //-->
    </script>
</body>

</html>


        

