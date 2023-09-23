<?php $this->pageTitle='Изменение менеджера' ?><?php
$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список менеджеров', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Добавить менеджера', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Просмотр менеджера', 'url'=>array('view', 'id'=>$model->id),
    						'itemOptions' => array ('class' => 'rmenu_view')),							
	array('label'=>'Права доступа', 'url'=>array('staffaccess/index', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_access'),'visible'=> ($model->id!=1) ),    							
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
