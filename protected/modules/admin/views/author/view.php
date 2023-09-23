<?php $this->pageTitle='Просмотр автора' ?><?

$this->menu=array(
	array('label'=>'Список авторов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Добавить автора', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Изменить автора', 'url'=>array('update', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
	array('label'=>'Удалить автора', 'url'=>array('delete', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
);
?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Авторы</h1>
                    <small class="text-muted">Просмотр автора #<?php echo $model->id; ?></small>
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
							'password',
							'email',
							'uname',
							'total' => array (
					                    'label' => 'Начислено',
					                    'value' => $model->total.' р.',
					                ),
							'paid' => array (
					                    'label' => 'Выплачено',
					                    'value' => $model->paid.' р.',
					                ),
							'purse',
							'kind' => array (
					                    'label' => 'Тип кошелька',
					                    'value' => Lookup::item ('Purse',$model->kind),
					                ),
						),
					)); ?>
                
            </div>            

        </div>
    </div>