<?php $this->pageTitle='Список особых комиссий' ?><?

$this->menu=array(
	array('label'=>'Добавить запись', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
);

?>


<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Особые комиссии партнёра</h1>
                    <small class="text-muted"><?php echo $this->pageTitle; ?></small>
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
				<table class="table" data-empty="Ничего не найдено"  data-toggle-column="last" ui-jq="footable" ui-options='{
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
						<th  data-type="html">RefID партнёра</th>
						<th data-breakpoints="xs" data-type="html">Товар</th>
						<th data-breakpoints="xs" data-type="html">Размер комиссии</th>
						<th data-breakpoints="xs" data-type="html">Автоматически?</th>
						<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
				      </tr>
				    </thead>
				    <tbody>
				     
				     <?php foreach($records as $data){ ?>
				      <tr data-expanded="false">
				        <td><?php echo $data->id; ?></td>
				        <td><?php echo $data->partner_id; ?></td>
				        <td><?php echo $data->good_id; ?></td>
				        <td><?php echo $data->komis.(($data->komis_type_id=="fixed")?" (в валюте)":"%"); ?></td>
				        <td><?php echo Lookup::item("Visible",$data->auto); ?></td>
				        <td>
				        	<div>
				        		<a href="<?=Y::bua()?>partnerpersonal/view/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-success"><i class="fa fa-search"></i></a>
				        		<a href="<?=Y::bua()?>partnerpersonal/update/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-info"><i class="fa fa-edit"></i></a>
				        		<a href="<?=Y::bua()?>partnerpersonal/delete/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
				        		
				        </div></td>        
				      </tr>
				  	<?php } ?>

				  </tbody>
				</table>
			</div><?php } ?>

        </div>
    </div>
