<?php $this->pageTitle='Рассылка - Сообщение отправлено' ?>



<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Рассылка</h1>
                    <small class="text-muted">Рассылка - Сообщение отправлено</small>
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
                <p>&nbsp;</p>
    
				<p align="center"><img src="<?=Y::bu()?>images/m/mailed.gif" style="margin:25px;"></p>

				<p>&nbsp;</p>

				<p align="center" style="font-size:16px;"><b>Сообщение для <?=$count?> получателей - передано в очередь</b></p>    

				<p>&nbsp;</p>

				<p align="center"><a href="<?=Y::bu()?>cron/i<?

				$xxs = Settings::item('cronWord');
				 if (!empty($xxs)) {
				     
				    echo '/s/'.$xxs;
				    
				 } ?>" target="_blank">Вызвать строку для Крона самостоятельно сейчас (если не настроен Крон) для разовой отправки</a></p>

				<p>&nbsp;</p>

				<p align="center"><?=CHtml::link ('Просмотреть очередь',array ('queue/index')); ?></p>

				<p>&nbsp;</p>
			</div>
        </div>
    </div>
