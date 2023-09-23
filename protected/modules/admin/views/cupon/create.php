<?php $this->pageTitle='Добавление купона скидки' ?><?

$this->menu=array(
	array('label'=>'Список купонов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
