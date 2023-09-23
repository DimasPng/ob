<?php $this->pageTitle='Добавление купона скидки' ?>

<?php

$this->menu=array(
	array('label'=>'Список купонов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Добавить купон', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
