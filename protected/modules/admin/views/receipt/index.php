<?php $this->pageTitle='Чеки';?>

	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Чеки</h1>
                    <small class="text-muted">Список всех чеков</small>
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
                 <?php $records = $model->findAll(); if($records) {?>
            <div class="panel panel-default">
            	<form method="post">
					<table class="table" data-empty="Ничего не найдено" data-toggle-column="last" ui-jq="footable" ui-options='{
					    "paging": {
					       "enabled": true,
				      	   "size" : 20
					    },
					    "filtering": {
					      "enabled": false
					    },
					    "sorting": {
					      "enabled": true
					    }}'>
					    <thead>
					      <tr>
					      	<th data-type="html"></th>
					        <th data-type="html" data-sorted="true"  data-direction="DESC">ID</th>

					        <th data-breakpoints="xs" data-type="html">UUID</th>
							<th data-breakpoints="xs" data-type="html">Время</th>
							<th data-breakpoints="xs" data-type="html">ID заказа</th>

							<th data-breakpoints="xs" data-type="html">Статус</th>
							<th data-breakpoints="xs" data-type="html">Дата регистрации</th>
							<th data-breakpoints="xs" data-type="html">Ошибка</th>

							<!-- <th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th> -->
					      </tr>
					    </thead>
					    <tbody>
					    
					     <?php foreach($records as $data){ ?>
					      <tr data-expanded="false">
					      	<td><input class="checkbox" value="<?php echo $data->id; ?>" type="checkbox" name="bills[]"></td>
					        <td><?php echo $data->id; ?></td>
					        
					        <td><?php echo $data->uuid; ?></td>
					        <td><?php echo $data->time_pay; ?></td>
					        <td><?php echo $data->external_id; ?></td>		

					        <td><?php echo $data->status; ?></td>
					        <td><?php echo $data->receipt_datetime; ?></td>
					        <td><?php echo $data->error_text; ?></td>		

					      </tr>
					  	<?php } ?>

					  </tbody>
					</table>
					
					<br>
					<div style="margin-left:20px;    margin-right: 20px;">
						<select name="operation" class="select">
							<option value="check">Проверить результат обработки документа</option>
							<option value="send">Повторно отправить чек в Атол</option>
							<option value="back">Оформить возврат</option>
						</select>
						<input type="submit" style="margin-top:15px;" class="submit btn m-b-xs  btn-primary btn-addon btn-lg xxxx" value="Выполнить действие">	
					</div>
				</form>
			</div><?php } ?>
        </div>
    </div>




