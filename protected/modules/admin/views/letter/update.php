<?php $this->pageTitle='Изменение письма' ?><?php
$this->breadcrumbs=array(
	'Letters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список писем', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Просмотр письма', 'url'=>array('view', 'id'=>$model->id),
    						'itemOptions' => array ('class' => 'rmenu_view')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
