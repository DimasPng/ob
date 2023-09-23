<?php $this->pageTitle='Просмотр варианта оплаты' ?><?

$this->menu=array(
	array('label'=>'Список вариантов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Добавить вариант', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Изменить вариант', 'url'=>array('update', 'id'=>$model->plist_id), 'itemOptions' => array ('class' => 'rmenu_edit')),
	array('label'=>'Удалить вариант', 'url'=>array('delete', 'id'=>$model->plist_id), 'itemOptions' => array ('class' => 'rmenu_edit')),
);
?>



<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Варианты оплаты</h1>
                    <small class="text-muted">>Просмотр варианта #<?php echo $model->plist_id; ?></small>
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
						'plist_id',
						'title',
				                'category',
						'url',
						'ways',		
						'position',
						'pic' => array (
				                    'label' => 'Картинка',
				                    'type' => 'raw',
				                    'value' => 'images/ways/'.$model->pic.'.gif',
				                ),            
					),
				)); ?>
				<p align="center"><br> <?=CHtml::image (Y::bu().'images/ways/'.$model->pic.'.gif','',array('style' => 'vertical-align:top')); ?></p>
        </div>
    </div>

