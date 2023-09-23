<?php $this->pageTitle='Добавление менеджеров' ?><?

$this->menu=array(
	array('label'=>'Список менеджеров', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
