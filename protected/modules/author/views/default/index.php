<?php $this->pageTitle='Главная' ?>


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

                <ul class="nav navbar-nav navbar-right">
              
                   <li class="dropdown">
                       <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
                           <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                               <img src="<?= Y::baseUrl() ?>/img/a0.jpg" alt="...">
                               <i class="on md b-white bottom"></i>
                           </span>
                           <span class="hidden-sm hidden-md"><?=Y::user()->firstName ?></span> <b class="caret"></b>
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
                                        <strong class="font-bold text-lt"><?=Y::user()->firstName ?></strong>
                                        <b class="caret"></b>
                                    </span>
                                    <span class="text-muted text-xs block">Администратор</span>
                                </span>
                            </a>
                            <!-- dropdown -->
                            <ul class="dropdown-menu animated fadeInRight w hidden-folded">                              
                                <li>
                                    <a href="<?=Y::bu()?>author/default/logout">Выход</a>
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
                                <a href="<?=Y::bu()?>author" class="auto">
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
                                <a href="<?=Y::bu()?>author/bills" class="auto">
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
                                <a href="<?=Y::bu()?>author/stat">
                                  <i class="glyphicon glyphicon-signal"></i>
                                  <span>Статистика</span>
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


                        <div class="col">
                            <!-- main header -->
                            <div class="bg-light lter b-b wrapper-md">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12">
                                        <h1 class="m-n font-thin h3 text-black">Информация</h1>
                                        <small class="text-muted">Мини-статистика</small>
                                    </div>                                
                                </div>
                            </div>
                            <!-- / main header -->
                            <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                                           
                                <div class="panel panel-default">
                                     <fieldset>
    
                                        <legend>Информация</legend>
                                         <style>
                                            .oneitem {
                                                margin-bottom: 5px;
                                            }
                                        </style>
                    
                                        <ol>
                                            
                                            <li>
                                                <label>Имя:</label><div class="oneitem"><?=$model->uname?></div>
                                            </li>
                                            
                                            <li>
                                                <label>Логин:</label><div class="oneitem"><?=$model->id?></div>
                                            </li>
                                            

                                            <li>
                                                <label>E-mail:</label><div class="oneitem"><?=$model->email?></div>
                                            </li>

                                            
                                            
                                        </ol>
                                        
                                    </fieldset>

                                    <fieldset>
                                        
                                        <legend>Мини-статистика</legend>
                                        
                                        <ol>
                                            
                                            <li>
                                                <label>Товаров:</label><div class="oneitem"><?=count($model->goods)?></div>
                                            </li>
                                            
                                            <li>
                                                <label>Заработано всего:</label><div class="oneitem"><?=H::mysum($model->total)?> р.</div>
                                            </li>        
                                            
                                            <li>
                                                <label>Выплачено:</label><div class="oneitem"><?=H::mysum($model->paid)?> р.</div>
                                            </li>                
                                            
                                            <li>
                                                <label>Ожидает выплаты:</label><div class="oneitem"><?=H::mysum($model->total-$model->paid)?> р.</div>
                                            </li>        
                                            
                                            
                                        </ol>
                                        
                                    </fieldset>


                                </div>

                            </div>
                        </div>

                    
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






