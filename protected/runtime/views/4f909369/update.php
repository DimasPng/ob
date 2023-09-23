<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/way/update.php */ ?>
<?php $this->pageTitle='Изменение способа оплаты' ?><?php

$this->menu=array(
	array('label'=>'Список способов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Добавить способ', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Просмотр способа', 'url'=>array('view', 'id'=>$model->way_id),
    						'itemOptions' => array ('class' => 'rmenu_view')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
