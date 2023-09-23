<?php $this->pageTitle='Просмотр рекламного материала' ?><?php
$this->menu=array(
	array('label'=>'Список баннеров', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Добавить баннер', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Изменить баннер', 'url'=>array('update', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
	array('label'=>'Удалить баннер', 'url'=>array('delete', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
);
?>



<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Рекламные материалы</h1>
                    <small class="text-muted">Просмотр баннера #<?php echo $model->id; ?></small>
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
							'good_id',
							'title',
							'code',
							'adcategory_id' => array (
					                    'label' => 'Категория',
					                    'value' => AdCategory::item ($model->adcategory_id),
					                ),
					                'position',
					                'showcode' => array (
					                    'label' => 'Поле с кодом',
					                    'value' => Lookup::item ('Visible',$model->showcode),
					                ),

						),
					)); ?>
                
            </div>            

        </div>
    </div>
