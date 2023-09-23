<?php $this->pageTitle='Просмотр менеджера' ?><?

$this->menu=array(
	array('label'=>'Список менеджеров', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Добавить менеджера', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Изменить менеджера', 'url'=>array('update', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
	array('label'=>'Права доступа', 'url'=>array('staffaccess/index', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_access'),'visible'=> ($model->id!=1) ),    
	array('label'=>'Удалить менеджера', 'url'=>array('delete', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
    		
);
?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Менеджеры</h1>
                    <small class="text-muted">Просмотр менеджера &quot;<?php echo $model->username; ?>&quot;</small>
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
						'username',
						'firstName',
						'email',
						array ('label' => 'Роль','value' => ($model->id==1)?'Администратор':'Оператор'),
						'space3' => array ('label' => '&nbsp;', 'value' => ' '),
				         array(
				            'label'=>'Последний вход',
				            'value'=>date ('j.m.Y H:i',$model->lastLogin),
				        ),		
						'lastLoginIp',
					),
				)); ?>
                
            </div>            

        </div>
    </div>