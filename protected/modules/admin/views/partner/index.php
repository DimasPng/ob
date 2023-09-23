<?php $this->pageTitle='Список партнёров' ?><?


?>


<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Партнёры</h1>
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
				      "enabled": true
				    }}'>
				    <thead>
				      <tr>
				        <th data-type="text">RefID</th>
						<th  data-type="text">Имя</th>
						<th data-breakpoints="xs" data-type="date">Дата</th>
						<th data-breakpoints="xs" data-type="text">URL сайта</th>
						<th data-breakpoints="xs" data-type="number">Прибыль</th>
						<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
				      </tr>
				    </thead>
				    <tbody>
				     <?php foreach($records as $data){ ?>
				      <tr data-expanded="false">
				        <td><?php echo $data->id; ?></td>
				        <td><?php echo $data->firstName; ?></td>
				        <td><?php echo date('j.m.Y', $data->createTime); ?></td>
				        <td><?php echo $data->url; ?></td>
				        <td><?php echo H::mysum($data->total).' р.'; ?></td>				        
				        <td>
				        	<div>
				        		<a href="<?=Y::bua()?>partner/view/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-success"><i class="fa fa-search"></i></a>
				        		<a href="<?=Y::bua()?>partner/update/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-info"><i class="fa fa-edit"></i></a>
				        		<a href="<?=Y::bua()?>partner/delete/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
				        		
				        </div></td>        
				      </tr>
				  	<?php } ?>

				  </tbody>
				</table>

				<p><b>Ссылка на партнёрскую программу:</b> <a href="<?=Yii::app()->getBaseUrl (TRUE)?>/aff/" target="_blank"><?=Yii::app()->getBaseUrl (TRUE)?>/aff/</a></p>
			</div>
		<?php } ?>

        </div>
    </div>

