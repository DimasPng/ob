<?php

$this->pageTitle = 'Просмотр очереди писем';



$this->menu=array(
        array('label'=>'Разослать сейчас', 'url'=>array('send'), 'itemOptions' => array ('class' => 'rmenu_base')),
	array('label'=>'Очистить очередь', 'url'=>array('clean'), 'linkOptions'=>array('submit'=>array('clean'),'confirm'=>'Очистить всю очередь? Эту процедуру отменить невозможно!'), 'itemOptions' => array ('class' => 'rmenu_del')),
);

?>


	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Очередь писем</h1>
                    <small class="text-muted">Очередь писем</small>
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
				        <th data-type="html">E-mail</th>
						<th data-breakpoints="xs"  data-type="html">Формат</th>
						<th data-breakpoints="xs" data-type="html">Тема</th>
						<th data-breakpoints="xs" data-type="html">Приоритет</th>
						<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
				      </tr>
				    </thead>
				    <tbody>
				    
				     <?php foreach($records as $data){ ?>
				      <tr data-expanded="false">
				        <td><?php echo $data->id; ?></td>
				        <td><?php echo $data->email; ?></td>
				        <td><?php echo($data->format=="html")?"HTML":"Обычный"; ?></td>
				        <td><?php echo $data->subject; ?></td>
				        <td><?php echo $data->priority; ?></td>
				        <td>
				        	<div>
				        		<a href="<?=Y::bua()?>queue/view/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-success"><i class="fa fa-search"></i></a>
				        		<a href="<?=Y::bua()?>queue/delete/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>				        		
				        	</div>
				        </td>        
				      </tr>
				  	<?php } ?>

				  </tbody>
				</table>
			</div>
			<?php } ?>

        </div>
    </div>
