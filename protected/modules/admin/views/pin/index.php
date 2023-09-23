<?php

$this->pageTitle = 'PIN-коды';

$this->menu=array(	
	array('label'=>'Список категорий', 'url'=>array('pincat/index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);

?>


<div class="col">
    <!-- main header -->
    <div class="bg-light lter b-b wrapper-md">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <h1 class="m-n font-thin h3 text-black">Управление PIN-кодами</h1>
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
			<table class="table" data-empty="Ничего не найдено" data-filter-connectors="false" data-toggle-column="last" ui-jq="footable" ui-options='{
			    "paging": {
			      "enabled": true,
				      "size" : 20
			    },
			    "filtering": {
			       "enabled": true,
				      "placeholder" : "Поиск"
			    },
			    "sorting": {
			      "enabled": false
			    }}'>
			    <thead>
			      <tr>
			        <th data-type="html">ID</th>
					<th  data-type="html">Категория</th>
					<th data-breakpoints="xs" data-type="html">Добавлен</th>
					<th data-breakpoints="xs" data-type="html">PIN-код</th>
					<th data-breakpoints="xs" data-type="html">Использован</th>
					<th data-breakpoints="xs" data-type="html">ID клиента</th>
					<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
			      </tr>
			    </thead>
			    <tbody>
			     <?php foreach($records as $data){ if($_GET["cat"]==$data->pincat_id) {?>
			      <tr data-expanded="false">
			        <td><?php echo $data->id; ?></td>
			        <td><?php echo Pincat::item($data->pincat_id); ?></td>
			        <td><?php echo date("j.m.Y H:i",$data->added); ?></td>
			        <td><?php echo $data->code; ?></td>
			        <td><?php echo Lookup::item("Visible",$data->used); ?></td>
			        <td><?php echo $data->client_id; ?></td>
			        <td>
			        	<div>			        		
			        		<a href="<?=Y::bua()?>pin/delete/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
			        		
			        </div></td>        
			      </tr>
			  	<?php }} ?>

			  </tbody>
			</table>
		</div>
		<?php } ?>

    </div>
</div>
