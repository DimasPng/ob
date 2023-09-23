<?php $this->pageTitle='Список вариантов оплаты' ?><?

$this->menu=array(
	array('label'=>'Добавить вариант', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
);

?>


	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Варианты оплаты</h1>
                    <small class="text-muted">Список вариантов оплаты</small>
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
				<table class="table" data-toggle-column="last" ui-jq="footable" ui-options='{
				    "paging": {
				      "enabled": false
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
						<th  data-type="html">Название</th>
				        <th data-breakpoints="xs" data-type="html">Категория</th>
						<th data-breakpoints="xs" data-type="html">Способы оплаты</th>
						<th data-breakpoints="xs" data-type="html">Позиция</th>
						<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
				      </tr>
				    </thead>
				    <tbody>
				     <?php $records = $model->findAll(); ?>
				     <?php foreach($records as $data){ ?>
				      <tr data-expanded="false">
				        <td><?php echo $data->plist_id; ?></td>
				        <td><?php echo $data->title; ?></td>				        
				        <td><?php echo $data->category; ?></td>
				        <td><?php echo $data->ways; ?></td>
				        <td><?php echo $data->position; ?></td>
				        <td>
				        	<div>
				        		<a href="<?=Y::bua()?>waylist/view/id/<?php echo $data->plist_id; ?>" class="btn btn-sm btn-icon btn-success"><i class="fa fa-search"></i></a>
				        		<a href="<?=Y::bua()?>waylist/update/id/<?php echo $data->plist_id; ?>" class="btn btn-sm btn-icon btn-info"><i class="fa fa-edit"></i></a>
				        		<a href="<?=Y::bua()?>waylist/delete/id/<?php echo $data->plist_id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
				        		
				        </div></td>        
				      </tr>
				  	<?php } ?>

				  </tbody>
				</table>
			</div>

        </div>
    </div>

