<?php $this->pageTitle='Просмотр купона скидки' ?><?

$this->menu=array(
	array('label'=>'Список купонов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Добавить купон', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Изменить купон', 'url'=>array('update', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
	array('label'=>'Удалить купон', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),
    			'confirm'=>'Вы действительно хотите удалить эту запись?'),'itemOptions' => array ('class' => 'rmenu_del')),
);
?>



<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Купоны скидки</h1>
                    <small class="text-muted">Просмотр купона #<?php echo $model->id; ?></small>
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
                                'code',                
                                'good_id',      
                                'title',
                        'sum',            
                        'kind_id' => array (
                                    'label' => 'Тип скидки',
                                    'value' => Lookup::item ('CuponKind',$model->kind_id),
                                ),
                        'startDate' => array (
                                    'label' => 'Дата старта',
                                    'value' => H::date ($model->startDate),                    
                                ),
                        'stopDate' => array (
                                    'label' => 'Дата окончания',
                                    'value' => H::date ($model->stopDate),                    
                                ),

                    ),
                )); ?>
            

        </div>
    </div>



