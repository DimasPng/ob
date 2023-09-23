<?php $this->pageTitle='Добавление категории купонов скидок' ?><?

$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
