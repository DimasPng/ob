<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/bill/index.php */ ?>
<?php $this->pageTitle='Список счетов';

?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Заказы</h1>
                    <small class="text-muted">Счета</small>
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
				
				
				<p style="margin-top:20px;"><img src="<?=Y::bu()?>images/status/approved.gif" style="vertical-align: middle;margin-right: 6px; "> <?=CHtml::link ('Показать только оплаченные счета',array ('bill/index/paid/1'))?></p>

            	<form method="post">

				<table class="table" data-empty="Ничего не найдено" data-filter-connectors="false" data-toggle-column="last" ui-jq="footable" ui-options='{
				    "paging": {						    			      
				      "enabled": true,
				      "size" : <?php echo Settings::item('adminPgOrder'); ?>,
				      "countFormat": "{CP} из {TP}"
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
				      	<th data-type="html"></th>
				        <th data-breakpoints="xs"  data-type="number">№</th>
				        <th data-breakpoints="xs" data-type="text" >Имя</th>
						<th  data-type="text">E-mail/телефон</th>

						<th data-breakpoints="xs" data-type="text">Товары</th>
						<th  data-type="number">Сумма</th>
						<th data-breakpoints="xs" data-type="date">Дата</th>

						<th data-breakpoints="xs" data-type="text">Статус</th>

						<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>


				      </tr>
				    </thead>
				    <tbody>
				     <?php 


				     if($_GET["paid"]!=1) { $records = $model->findAll(array('order'=>'id DESC')); } else {

				     	  $criteria = new CDbCriteria;
                          $criteria->condition = "status_id='approved' OR status_id='processing' OR status_id='sent' OR status_id='nalozh_ok'";
                          $criteria->order = 'id DESC';
							$records = $model->findAll($criteria); 
				     } ?>
				     <?php foreach($records as $data){  ?>
				      <tr data-expanded="false">
				      	<td><input class="checkbox" value="<?php echo $data->id; ?>"  type="checkbox" name="bills[]"></td>
				        <td><?php echo CHtml::link($data->id,array("bill/view/id/".$data->id),array("style"=>"color:#003366; font-weight:bold")); ?></td>				        
				        <td><?php echo trim($data->surname . " " .$data->uname . " " . $data->otchestvo); ?></td>
				        <td><?php echo nl2br(CHtml::encode(str_replace ("noemail@example.com\r\n","",$data->email."\r\n")))."<span style=\'color:#036\'>".trim (CHtml::encode(str_replace ("нет","",$data->phone)))."</span>"; ?></td>
						
						<td><?php echo H::compOrders ($data->orders); ?></td>
				        <td><?php echo $data->sum.H::valuta($data->valuta); ?></td>
						<td><?php echo date("j.m.Y H:i",$data->createDate); ?></td>
						<td><?php echo CHtml::image (Y::bu()."images/status/".$data->status_id.".gif",Lookup::item("Status",$data->status_id),array("title" => Lookup::item("Status",$data->status_id))); ?></td>

				        <td>
				        	<div>
				        		<a href="<?=Y::bua()?>bill/view/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-success"><i class="fa fa-search"></i></a>
				        		<!-- <a href="<?=Y::bua()?>bill/update/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-info"><i class="fa fa-edit"></i></a> -->
				        		<!-- <a href="<?=Y::bua()?>bill/delete/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a> -->
				        		
				        </div></td>        
				      </tr>
				  	<?php } ?>

				  </tbody>
				</table>
				
				<div style="margin-left:20px;  margin-right: 20px;">
					<select name="operation" class="select">
						<option value="excel">Экспортировать выбранные в Excel-файл</option>
						<option value="excelall">Экспортировать <?=$napis?> в Excel-файл</option>
						<option value="delete">Удалить выбранные счета</option>
					</select>
					<input style="margin-top:20px;" type="submit" class="submit btn m-b-xs  btn-primary btn-addon btn-lg xxxx"  value="Выполнить действие">	
				</div>			
				</form>
				
				<?=H::moredivAll('информацию о статусах','liq') ?>
					<?= $this->renderPartial('//main/_statuses'); ?>
				</div>


			</div>

        </div>
    </div>

