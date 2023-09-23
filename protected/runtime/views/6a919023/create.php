<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/waylist/create.php */ ?>
<?php $this->pageTitle='Добавление варианта оплаты' ?><?

$this->menu=array(
	array('label'=>'Список вариантов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
