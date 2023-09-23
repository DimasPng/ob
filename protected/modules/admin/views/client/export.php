<?php

$this->pageTitle = 'Экспорт клиентов';

$this->menu=array(
	array('label'=>'Список клиентов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
        array('label'=>'Импорт клиентов', 'url'=>array('import'), 'itemOptions' => array ('class' => 'rmenu_add')),        

);

?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Клиенты</h1>
                    <small class="text-muted">Экспорт клиентов</small>
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
                <br><p>На этой страничке Вы можете сформировать и получить список Ваших клиентов в заданном формате.</p>
                <form action="" method="post">
                <fieldset>
                        
                <legend>Данные</legend>
                <ol>
                <li>
                <label>Выберите товар:</label> </b><?=CHtml::dropDownList ('good',FALSE,Good::items (),array ('class' => 'select')); ?></li>
                    
                        <li><label>Формат:</label><?=CHtml::textField ('format','{email}||{uname}||{good_id}',array ('class' => 'text')); ?></li>

                </ol>
               </fieldset>
                    
                <p><br><label>&nbsp;</label><input type="submit" value="Показать список клиентов" class="submit btn m-b-xs  btn-primary btn-addon btn-lg"></p>
                    
                </form>

                <?php if (!empty ($data)): ?>

                <br>

                <div class="wide form">
                    
                    <p>Полученный список клиентов (<?=$dc ?> записей):<br>&nbsp;</p>

                <p><textarea class="textarea" rows="12" cols="70"><?=$data?></textarea>
                    
                </div>

                <?php endif; ?>


                <br><h3 style="margin-left:20px;">Подсказки по переменным</h2>

                <p><br>Пример формата:<br><br>
                    
                    <b>{email}||{uname}||{good_id}</b>

                    <br>&nbsp;</p>

                <p>- это обозначает возврат списка в виде: <b>E-mail||Имя||ID товара</b><br>&nbsp;</p>

                <p>Все возможные переменные:<br><br>
                    
                    <b>{good_id}</b> - ID товара<br>
                    <b>{uname}</b> - Имя клиента<br>
                    <b>{email}</b> - Основной e-mail клиента<br>
                    <b>{amail}</b> - альтернативный e-mail (если был указан)<br>
                    <b>{date}</b> - дата добавления в базу (ДД.ММ.ГГГГ)<br>
                    <b>{subscribe}</b> - подписан ли на рассылку (1 - да, 0 - нет)<br>

                
            </div>            

        </div>
    </div>
