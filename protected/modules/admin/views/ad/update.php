<?php $this->pageTitle='Изменение рекламного материала' ?><?php

$this->menu=array(
	array('label'=>'Список баннеров', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Добавить баннер', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Просмотр баннера', 'url'=>array('view', 'id'=>$model->id),
    						'itemOptions' => array ('class' => 'rmenu_view')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
