<?php $this->pageTitle='Просмотр чека' ?><?

$this->menu=array(
	array('label'=>'Список чеков', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list'))    
        
	

                        
);
?>

<div class="wrap">

<h3>Чеки</h3>

<h1>Просмотр чека #<?php echo $model->id; ?></h1>

<?php /*$this->widget('zii.widgets.CDetailView', array(
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
		'used' => array (
                    'label' => 'Показывать в каталоге',
                    'value' => Lookup::item ('Visible',$model->used),
                ),            
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
		'catalog_on' => array (
                    'label' => 'Показывать в каталоге',
                    'value' => Lookup::item ('Visible',$model->catalog_on),
                ),
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
		'securebook' => array (
                    'label' => 'SecureBook включён',
                    'value' => Lookup::item ('Visible',$model->securebook),
                ),
		'getUrl',
		'dlink',
		'author_id' => array (
                    'label' => 'Автор',
                    'value' => Author::item($model->author_id),
                ),
		'cartOn'  => array (
                    'label' => 'Корзина включена',
                    'value' => Lookup::item ('Visible',$model->cartOn),
                ),
		'upsellOn' => array (
                    'label' => 'Апселл 1 уровня',
                    'value' => Lookup::item ('Visible',$model->upsellOn),
                ),
		'tupsellOn' => array (
                    'label' => 'Апселл 2 уровня',
                    'value' => Lookup::item ('Visible',$model->tupsellOn),
                ),
		'nalozhOn'  => array (
                    'label' => 'Наложенный платёж',
                    'value' => Lookup::item ('Visible',$model->nalozhOn),
                ),
		'csellOn'  => array (
                    'label' => 'Кросселл',
                    'value' => Lookup::item ('Visible',$model->csellOn),
                ),
            
	),
)); */?>


</div>

</div>
