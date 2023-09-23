<?php $this->pageTitle='Добавление автоустановки комиссии' ?><?

$this->menu=array(
	array('label'=>'Список записей', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
