<?php $this->pageTitle='Просмотр способа оплаты' ?><?

$this->menu=array(
	array('label'=>'Список способов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Добавить способ', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Изменить способ', 'url'=>array('update', 'id'=>$model->way_id), 'itemOptions' => array ('class' => 'rmenu_edit')),
	array('label'=>'Удалить способ', 'url'=>array('delete', 'id'=>$model->way_id), 'itemOptions' => array ('class' => 'rmenu_edit')),
);
?>


<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Способы оплаты</h1>
                    <small class="text-muted">Просмотр способа оплаты &quot;<?php echo $model->way_id; ?>&quot;</small>
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
						'way_id',
						'title',
						'code' => array (
				                    'label' => 'HTML-код',
				                    'type' => 'raw',
				                    'value' => nl2br(CHtml::encode($model->code)),
				                ),
					),
				)); ?>

        </div>
    </div>
