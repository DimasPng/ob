<?php $this->pageTitle='Выплаты' ?>

<script type="text/javascript">

jQuery(function() {    
	
    jQuery('.confirm').click(function(evt) {     
        var a = confirm("Вы действительно хотите подтвердить выплату?");
		if(!a){
			 evt.preventDefault();
		}
       
    });    
    
});

</script>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Выплаты</h1>
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
            <div class="panel panel-default">
            	<?php $minsum = Settings::item ('affMin'); define ('A_MIN_SUM',$minsum); ?>
            	<h3 style="margin-left:16px;">Выплаты партнерам</h3>
				<table class="table" data-empty="Ничего не найдено" data-toggle-column="last" ui-jq="footable" ui-options='{
				    "paging": {
				     "enabled": true,
				      "size" : <?php echo Settings::item('adminPgPayout'); ?>
				    },
				    "filtering": {
				      "enabled": false
				    },
				    "sorting": {
				      "enabled": false
				    }}'>
				    <thead>
				      <tr>
				        <th data-type="html">RefID</th>
						<th data-breakpoints="xs" data-type="html">Способы выплаты</th>
						<th data-breakpoints="xs" data-type="html">Кошельки</th>
						<th  data-type="html">Сумма</th>
						<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
				      </tr>
				    </thead>
				    <tbody>
				     <?php $records = $model->findAll(); ?>
				     <?php foreach($records as $data){ if(H::mysum($data->total-$data->paid)!=0) {?>
				      <tr data-expanded="false">
				        <td><?php echo CHtml::link ($data->id,array("partner/view","id" => $data->id),array ("target" => "_blank")); ?></td>
				        <td><?php echo Payouta::ways ($data->wmz,$data->wmr,$data->rbkmoney,$data->yandex,$data->zpayment); ?></td>
				        <td><?php echo Payouta::koshelek($data->id); ?></td>
				        <td><?php echo H::mysum($data->total-$data->paid).' р.'; ?></td>
				        <td>
				        	<?php echo Payouta::pay_complete($data->id); ?>
				        	</td>        
				      </tr>
				  	<?php }} ?>

				  </tbody>
				</table>
			</div>

			<div class="panel panel-default">
				<h3 style="margin-left:16px;">Выплаты авторам</h3>	

				<table class="table" data-empty="Ничего не найдено" data-toggle-column="last" ui-jq="footable" ui-options='{
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
				        <th data-type="html">RefID</th>
						<th data-breakpoints="xs" data-type="html">Способы выплаты</th>
						<th data-breakpoints="xs" data-type="html">Кошельки</th>
						<th data-type="html">Сумма</th>
						<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
				      </tr>
				    </thead>
				    <tbody>
				     <?php $records =  Author::model()->findAll(); ?>
				     <?php foreach($records as $data){ if(H::mysum($data->total-$data->paid)!=0) {?>
				      <tr data-expanded="false">
				        <td><?php echo CHtml::link ($data->id,array("author/view","id" => $data->id),array ("target" => "_blank")); ?></td>
				        <td><?php echo Lookup::item("Purse",$data->kind); ?></td>
				        <td><?php echo Payouta::koshelek_a($data->id); ?></td>
				        <td><?php echo H::mysum($data->total-$data->paid).' р.'; ?></td>
				        <td>
				        	<?php echo Payouta::pay_complete_a($data->id); ?>
				        	</td>        
				      </tr>
				  	<?php }} ?>

				  </tbody>
				</table>
				
				
			</div>
			<div class="panel panel-default">
				<p style="margin-top:10px;"><?=CHtml::link ('Показать историю выплат',array ('payhistory/index')); ?></p>
			</div>
			

        </div>
    </div>
