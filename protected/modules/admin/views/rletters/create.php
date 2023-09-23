<?php $this->pageTitle='Новое письмо' ?><?

$this->menu=array(
	array('label'=>'Список рассылок', 'url'=>array('maillist/index'), 'itemOptions' => array ('class' => 'rmenu_list')),        
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
