<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/good/index.php */ ?>
<?

$this->pageTitle='Список товаров';

$this->menu=array(
	array('label'=>'Добавить товар', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),     
	array('label'=>'Категории', 'url'=>array('category/index'), 'itemOptions' => array ('class' => 'rmenu_add')),     
    array('label'=>'PIN-коды', 'url'=>array('pincat/index'), 'itemOptions' => array ('class' => 'rmenu_list')),        
    array('label'=>'Скидки', 'url'=>array('cupon/index'), 'itemOptions' => array ('class' => 'rmenu_access')), 
);

?>

	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Товары</h1>
                    <small class="text-muted">Список товаров</small>
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
                
            <?php $records = $model->findAll(); if($records) { ?>   
            <div class="panel panel-default">
				<table class="table" data-empty="Ничего не найдено" data-toggle-column="last" ui-jq="footable" ui-options='{
				    "paging": {
				      "enabled": true,
				      "size" : <?php echo Settings::item('adminPgGood'); ?>

				    },
				    "filtering": {
				      "enabled": false
				    },
				    "sorting": {
				      "enabled": false
				    }}'>
				    <thead>
				      <tr>
				        <th data-type="html">ID</th>
				        <th data-breakpoints="xs" data-type="html">Категория</th>
						<th  data-type="html">Название</th>
						<th data-breakpoints="xs" data-type="html">Цена</th>
						<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
				      </tr>
				    </thead>
				    <tbody>
				    
				     <?php foreach($records as $data){ ?>
				      <tr data-expanded="false">
				        <td><?php echo $data->id; ?></td>
				        <td><?php echo Category::item($data->category_id); ?></td>
				        <td><?php echo $data->title; ?></td>
				        <td><?php echo $data->price.H::valuta($data->currency); ?></td>
				        <td>
				        	<div>
				        		<a href="<?=Y::bua()?>good/view/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-success"><i class="fa fa-search"></i></a>
				        		<a href="<?=Y::bua()?>good/update/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-info"><i class="fa fa-edit"></i></a>
				        		<a href="<?=Y::bua()?>good/delete/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
				        		
				        </div></td>        
				      </tr>
				  	<?php } ?>

				  </tbody>
				</table>
			</div>
			<?php } ?>

        </div>
    </div>