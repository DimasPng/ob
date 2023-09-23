<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/good/view.php */ ?>
<?php $this->pageTitle='Просмотр товара' ?><?

$this->menu=array(
	array('label'=>'Список товаров', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),        
        
	array('label'=>'Добавить товар', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
	array('label'=>'Изменить товар', 'url'=>array('update', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
	array('label'=>'Удалить товар', 'url'=>array('delete', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
                        
	array('label'=>'Выслать товар', 'url'=>array('send', 'id'=>$model->id),
    						'itemOptions' => array ('class' => 'rmenu_access')),        

                        
);
?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Товары</h1>
                    <small class="text-muted">Просмотр товара #<?php echo $model->id; ?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                <?php $flashmsg = Y::user()->getFlash ('admin') ?>
                <?php if (!empty($flashmsg)): ?>
                    <div class="alert alert-info">
                      <strong>Результат последнего действия</strong><br><?= $flashmsg ?>
                    </div>                    
                <?php endif; ?>         
            <div class="panel panel-default">
                 <?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
                array (
                    'label' => 'Ссылка на оплату',
                    'type' => 'raw',
                    'value' => CHtml::link (Y::bu().'ord/'.$model->id,array ('/ord/'.$model->id),array('target' => '_blank')),
                ),
        'category_id' => array (
                    'label' => 'Категория',
                    'value' => Category::item ($model->category_id),
                ),
       /* 'used' => array (
                    'label' => 'Показывать в каталоге',
                    'value' => Lookup::item ('Visible',$model->used),
                ),            */
        'title',
        'price'  => array (
                    'label' => 'Цена',
                    'value' => $model->price.H::valuta($model->currency),
                ),    
        'kind' => array (
                    'label' => 'Тип товара',
                    'value' => Lookup::item ('GoodKind',$model->kind),
                ),            
        'description',
        'image',
       /* 'catalog_on' => array (
                    'label' => 'Показывать в каталоге',
                    'value' => Lookup::item ('Visible',$model->catalog_on),
                ),*/
        'position',
        'affOn' => array (
                    'label' => 'Партнёрка включена',
                    'value' => Lookup::item ('Visible',$model->affOn),
                ),
        'affOrder' => array (
                    'label' => 'За что начислять',
                    'value' => Lookup::item ('KomisOrder',$model->affOrder),
                ),
            
        'affLink',
        'affKomis',
        'affKomisType' => array (
                    'label' => 'Тип комиссионных',
                    'value' => Lookup::item ('KomisType',$model->affKomisType),
                ),
        'affPkomis',
        'affPkomisType' => array (
                    'label' => 'Тип комиссии 2 уровня',
                    'value' => Lookup::item ('KomisType',$model->affPkomisType),
                ),
        'affShow' => array (
                    'label' => 'Показывать партнёру',
                    'value' => Lookup::item ('Visible',$model->affShow),
                ),
        'disabledWays',
       
        'getUrl',
        'dlink',
        'author_id' => array (
                    'label' => 'Автор',
                    'value' => Author::item($model->author_id),
                ),
       /* 'cartOn'  => array (
                    'label' => 'Корзина включена',
                    'value' => Lookup::item ('Visible',$model->cartOn),
                ),*/
      
            
    ),
)); ?>
                
            </div>

            <h3>Редактирование индивидуальных шаблонов для товара</h3>

            <p>В случае редактирования этих шаблонов - они сохранятся в папке <b>/protected/views/user/</b> (для этого поставьте права на запись для этой папки/подпапок) - и для этого товара будут показываться вместо имеющихся по умолчанию.</p>

            <br>

            <div class="link_yellow" style="margin-left:35px;">
                <style>
                    .link_yellow  a{
                        color: #DD5500;
                    }
                
                </style>

               <div class="btn btn-sm btn-icon link_yellow"><i class="fa fa-edit"></i></div><?=Way::templ ('Оформление заказа - Форма оплаты','order/index','main','order_form/'.$model->id) ?>
               <!--  <?=Way::templ ('Оформление заказа - Апселл 1 уровня','order/special1','main','order_upsell/'.$model->id) ?>
               <?=Way::templ ('Оформление заказа - Апселл 2 уровня','order/special2','main','order_tupsell/'.$model->id) ?> -->
               <div class="btn btn-sm btn-icon link_yellow"><i class="fa fa-edit"></i></div><?=Way::templ ('Оформление заказа - Корзина','order/cart','main','order_cart/'.$model->id) ?>
                <div class="btn btn-sm btn-icon link_yellow"><i class="fa fa-edit"></i></div><?=Way::templ ('Оформление заказа - Содержимое корзины','order/total','main','order_total/'.$model->id) ?>
                <!-- <?=Way::templ ('Оформление заказа - Кроссел (для наложенного платежа)','nl/special','main','order_cross/'.$model->id) ?>
                <?=Way::templ ('Оформление заказа - Подтверждение кроссела (для наложенного платежа)','nl/ok','main','order_cross_ok/'.$model->id) ?> -->

            </div>

        </div>
    </div>

