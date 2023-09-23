<?php $this->pageTitle='Профиль - Панель партнёра' ?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Профиль партнёра &quot;<?= $model->id ?>&quot;</h1>
                    <small class="text-muted">Просмотр #<?php echo $model->id; ?></small>
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
                 <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                        'id',
                        'firstName' => array ('label' => 'Имя','value' => $model->firstName),
                        'email' => array ('label' => 'E-mail','value' => $model->email),
                        'space' => array ('label' => '&nbsp;', 'value' => ' '),
                        'wmz' => array ('label' => 'WMZ', 'value' => $model->wmz, 'visible' => Settings::item('affWmz')),
                        'wmr' => array ('label' => 'WMR', 'value' => $model->wmr, 'visible' => Settings::item('affWmr')),
                        'rbkmoney' => array ('label' => 'Счёт RBK Money', 'value' => $model->rbkmoney, 'visible' => Settings::item('affRbk')),
                        'yandex' => array ('label' => 'Яндекс.Деньги','value' => $model->yandex, 'visible' => Settings::item('affYandex')),
                        //'zpayment' => array ('label' => 'Z-payment','value' => $model->zpayment, 'visible' => Settings::item('affZpayment')),
                        'space2' => array ('label' => '&nbsp;', 'value' => ' ', 'visible' => Settings::item('affCountry')),     
                        'country' => array ('label' => 'Страна', 'value' => $model->country, 'visible' => Settings::item('affCountry')),
                        'maillist' => array ('label' => 'Рассылка','value' => $model->maillist, 'visible' => Settings::item('affMaillist')),
                        'city' => array ('label' => 'Город', 'value' => $model->city, 'visible' => Settings::item('affCity')),
                        'url' => array ('label' => 'URL сайта','value' => $model->url, 'visible' => Settings::item('affUrl')),
                        'aboutProject' => array ('label' => 'Направление сайта','value' => $model->aboutProject, 'visible' => Settings::item('affAbout')),      
                        'space3' => array ('label' => '&nbsp;', 'value' => ' '),        
                         array(
                            'label'=>'Дата регистрации',
                            'value'=>date ('j.m.Y H:i',$model->createTime),
                        ),
                         array(
                            'label'=>'Дата изменения',
                            'value'=>$model->updateTime>0?date ('j.m.Y H:i',$model->updateTime):"не было изменений",
                        ),      
                    ),
                )); ?>

                <fieldset class="submit" style="margin-top:20px;">
                    <a href="<?= Y::bu() ?>aff/profile/edit" class="btn m-b-xs  btn-primary btn-addon btn-lg">Редактировать профиль</a>
                </fieldset>     

        </div>
    </div>

