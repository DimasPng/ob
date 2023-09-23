<?php $this->pageTitle='Просмотр Добавление категории рекламных материалов' ?><?php
$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Новая категория', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Изменить категорию', 'url'=>array('update', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
	array('label'=>'Удалить категорию', 'url'=>array('delete', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
);
?>
<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Категории рекламных материалов</h1>
                    <small class="text-muted">Просмотр категории #<?php echo $model->id; ?></small>
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
						'title',
						'description',
					),
				)); ?>
                
            </div>            

        </div>
    </div>

