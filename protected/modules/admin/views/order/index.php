<?php $this->pageTitle='Список заказов' ?><?

$this->menu=array(
	array('label'=>'Счета', 'url'=>array('bill/index'), 'itemOptions' => array ('class' => 'rmenu_list')),	
);

?>



	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Заказы</h1>
                    <small class="text-muted">Список заказов</small>
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
				        <th data-breakpoints="xs" data-type="html">Номер счета</th>
						<th  data-type="html">Товар</th>
						<th data-breakpoints="xs" data-type="html">E-mail</th>
						<th data-breakpoints="xs" data-type="html">Создан</th>
						<th data-breakpoints="xs" data-type="html">Цена</th>
						<th data-breakpoints="xs" data-type="html">Партнёр</th>
						<th data-breakpoints="xs" data-type="html">Статус</th>
				      </tr>
				    </thead>
				    <tbody>
				     <?php			               	

				      $records = $model->findAll(); ?>
				     <?php foreach($records as $data){ if($_GET['Order']['bill_id']==$data->bill_id) { ?>
				      <tr data-expanded="false">
				        <td><?php echo $data->id; ?></td>
				        <td><?php echo CHtml::link($data->bill_id,array("bill/view/id/".$data->bill_id)); ?></td>
				        <td><?php echo H::get_name_by_ID_good($data->good_id); ?></td>
				        <td><?php echo $data->bill->email; ?></td>	

				        <td><?php echo H::date($data->createDate); ?></td>		
				        <td><?php echo $data->cena.H::valuta($data->valuta); ?></td>		
				        <td><?php echo CHtml::link($data->partner_id,array ('partner/view/id/'.$data->partner_id),array('target' => '_blank')); ?></td>		
				        <td><?php echo CHtml::image (Y::bu()."images/status/".$data->status_id.".gif"); ?></td>					         
				      </tr>
				  	<?php }} ?>

				  </tbody>
				</table>
				<br><br>
				<?=H::moredivAll('информацию о статусах','liq') ?>
					<?= $this->renderPartial('//main/_statuses'); ?>
				</div>
			</div>
			

        </div>
    </div>


