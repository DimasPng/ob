<?php $this->pageTitle='Список клиентов' ?><?

$this->menu=array(
	array('label'=>'Экспорт клиентов', 'url'=>array('export'), 'itemOptions' => array ('class' => 'rmenu_list')),
        array('label'=>'Импорт клиентов', 'url'=>array('import'), 'itemOptions' => array ('class' => 'rmenu_add')),        

);


?>
<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Клиенты</h1>
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
				      "size" : <?php echo Settings::item('adminPgClient'); ?>
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
				        <th data-type="number">ID</th>
						<th data-breakpoints="xs"  data-type="text">Товар</th>
						<th  data-type="text">Имя</th>
						<th data-breakpoints="xs" data-type="text">E-mail</th>
						<th data-breakpoints="xs" data-type="date">Дата</th>
						<th data-breakpoints="xs" data-type="text">Получать рассылку?</th>
						<th data-breakpoints="xs" data-type="text">Номер счёта</th>
						<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
				      </tr>
				    </thead>
				    <tbody>
				     <?php foreach($records as $data){ ?>
				      <tr data-expanded="false">
				        <td><?php echo $data->id; ?></td>
				        <td><?php echo $data->good_id; ?></td>
				        <td><?php echo $data->uname; ?></td>

				        <td><?php echo $data->email; ?></td>
				        <td><?php echo H::date($data->date); ?></td>
				        <td><?php echo $data->subscribe==1?"Да":"Нет"; ?></td>

				        <td><?php echo $data->bill_id>0?CHtml::link($data->bill_id,array("bill/view","id" => $data->bill_id)):" "; ?></td>

				        <td>
				        	<div>
				        		<a href="<?=Y::bua()?>client/view/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-success"><i class="fa fa-search"></i></a>				        		
				        		<a href="<?=Y::bua()?>client/delete/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
				        		
				        </div></td>        
				      </tr>
				  	<?php } ?>

				  </tbody>
				</table>
			</div>
			<?php } ?>

        </div>
    </div>
