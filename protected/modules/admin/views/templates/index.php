<?php $this->pageTitle='HTML-шаблоны' ?>
<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Шаблоны</h1>
                    <small class="text-muted">Список HTML-шаблонов</small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                <?php $flashmsg = Y::user()->getFlash ('admin') ?>
                <?php if (!empty($flashmsg)): ?>
                    <div class="alert alert-info">
                      <strong>Результат последнего действия</strong><br><?= $flashmsg ?>
                    </div>                    
                <?php endif; ?>         
            <div class="panel panel-default">
               
                <br>   
                 <?=H::moredivAll('шаблоны основные','m') ?>
                <div style="margin-left:35px;">
                    
                    <?=Way::templ ('Главный шаблон','layouts/main','main') ?>
                    <?=Way::templ ('Ошибка','main/error','main') ?>
                   <!--  <?=Way::templ ('По умолчанию, когда отключён каталог','main/index','main') ?> -->
                    <?=Way::templ ('Список статусов','main/_statuses','main') ?>    
                    
                    <?=Way::templ ('Успешная оплата','f/ok','main') ?>
                    <?=Way::templ ('Неуспешная оплата','f/fail','main') ?>
                    <?=Way::templ ('Передано на ручную обработку','f/wait','main') ?>
                    <?=Way::templ ('Рассылка - Вы отписаны от сообщений','notify/unsub','main') ?>        
                    
                    
                </div>
                 </div>


               
               <?=H::moredivAll('шаблоны оформления заказа (по умолчанию)','order') ?>
                <br>   

                <div style="margin-left:35px;">
                    
                    <?=Way::templ ('Заказ - Форма заказа','order/index','main') ?>        
                 <!--    <?=Way::templ ('Заказ - Апселл 1 уровня','order/special1','main') ?>        
                 <?=Way::templ ('Заказ - Апселл 2 уровня','order/special2','main') ?>         -->
                    <?=Way::templ ('Заказ - Корзина','order/cart','main') ?>        
                    <?=Way::templ ('Заказ - Содержимое Корзины','order/total','main') ?>        
                    <?=Way::templ ('Счёт - Страничка оплаты','bill/index','main') ?>        
                    <?=Way::templ ('Счёт - Статус платежа','status/index','main') ?>        
                    <?=Way::templ ('Наложенный платёж - Отправлено сообщение','nl/index','main') ?>        
                    <?=Way::templ ('Наложенный платёж - Заказ подтверждён','nl/confirmed','main') ?>        
                  <!--   <?=Way::templ ('Наложенный платёж - Специальное предложение (кроссел)','nl/special','main') ?>        
                     <?=Way::templ ('Наложенный платёж - Специальный товар добавлен к заказу','nl/ok','main') ?>          -->   
                    <?=Way::templ ('Ручная оплата - Форма отправки','notify/index','main') ?>        
                    <?=Way::templ ('Ручная оплата - Уведомление отправлено','notify/ok','main') ?>        
                    

                </div></div>

             
              
             
                

               
                    
                <?=H::moredivAll('шаблоны партнёрской программы','aff') ?>
                <br>   

                <div style="margin-left:35px;">

                <?=Way::templ ('Основной шаблон','layouts/aff','aff') ?>

                <?=Way::templ ('Главная','default/index','aff') ?>
                <?=Way::templ ('Вход в аккаунт','default/login','aff') ?>

             <!--    <?=Way::templ ('Новости (одна новость)','default/_view','aff') ?> -->

                <?=Way::templ ('Восстановление забытого пароля','forgot/index','aff') ?>
                <?=Way::templ ('Восстановление забытого пароля - Отправлено','forgot/sent','aff') ?>

                <?=Way::templ ('Реф-ссылки - Список','links/index','aff') ?>
                <?=Way::templ ('Реф-ссылки - Просмотр рекламных материалов','links/ad','aff') ?>

                <?=Way::templ ('Профиль - Просмотр','profile/index','aff') ?>
                <?=Way::templ ('Профиль - Редактировать','profile/edit','aff') ?>

                <?=Way::templ ('Регистрация','reg/index','aff') ?>
                <?=Way::templ ('Регистрация завершена','reg/ok','aff') ?>

                <?=Way::templ ('Продажи','sells/index','aff') ?>

                <?=Way::templ ('Короткие ссылки','short/index','aff') ?>

                <?=Way::templ ('Статистика','stat/index','aff') ?>


                </div> </div>
     
            </div>

        </div>
    </div>

