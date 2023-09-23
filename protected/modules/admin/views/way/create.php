<?php $this->pageTitle='Добавление способа оплаты' ?><?

$this->menu=array(
	array('label'=>'Список способов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
