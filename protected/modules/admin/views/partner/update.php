<?php $this->pageTitle='Изменение партнёра' ?><?php

$this->menu=array(
	array('label'=>'Список партнёров', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),	
	array('label'=>'Просмотр партнёра', 'url'=>array('view', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_view')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
