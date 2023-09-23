<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/good/create.php */ ?>
<?php $this->pageTitle='Добавление товара' ?><?

$this->menu=array(
	array('label'=>'Список товаров', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
