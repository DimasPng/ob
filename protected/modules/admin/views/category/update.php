<?php $this->pageTitle='Изменение категории' ?><?php

$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Создать категорию', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Просмотр категории', 'url'=>array('view', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_view')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

