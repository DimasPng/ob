<?php $this->pageTitle='Добавление автора' ?><?

$this->menu=array(
	array('label'=>'Список авторов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
