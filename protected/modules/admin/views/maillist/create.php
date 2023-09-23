<?php $this->pageTitle='Новая серия писем' ?><?

$this->menu=array(
	array('label'=>'Список рассылок', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

