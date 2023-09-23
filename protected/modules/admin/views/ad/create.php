<?php $this->pageTitle='Добавление рекламного материала' ?><?php
$this->menu=array(
	array('label'=>'Список баннеров', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
