<?php $this->pageTitle='Список рассылок' ?><?

$this->menu=array(
	array('label'=>'Добавить рассылку', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),
);


?>


<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Рассылки</h1>
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
						<th data-breakpoints="xs" data-type="html">ID товара</th>
						<th data-breakpoints="xs" data-type="html">Активна?</th>
						<th data-breakpoints="xs" data-type="html">Ссылки</th>
						<th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
				      </tr>
				    </thead>
				    <tbody>
				     <?php foreach($records as $data){ ?>
				      <tr data-expanded="false">
				        <td><?php echo $data->id; ?></td>
				        <td><?php echo $data->title; ?></td>
				        <td><?php echo $data->good_id; ?></td>
				        <td><?php echo Lookup::item ("Visible",$data->active); ?></td>
				        <td><?php echo CHtml::link ("письма",array ("rletters/index","RassLetter[rass_id]" => $data->id))." &nbsp; &nbsp; ";
					                   ?>
					    </td>
				        <td>
				        	<div>				        		
				        		<a href="<?=Y::bua()?>maillist/update/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-info"><i class="fa fa-edit"></i></a>
				        		<a href="<?=Y::bua()?>maillist/delete/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>				        		
				        </div></td>        
				      </tr>
				  	<?php } ?>

				  </tbody>
				</table>

				<br><br>

					<!-- <form method="post" action="<?=Y::bua();?>maillist/add">
					<fieldset>
					    
					    <legend>Добавить подписчика к рассылке</legend>
					    
					    <ol>
					        <li>
					            <label>Рассылка</label>
					            <?=CHtml::dropDownList('rid', '', Rass::items (),array ('class' => 'select')); ?>
					        </li>
					        <li>
					            <label>Имя</label>
					            <input type="text" class="text" name="uname" value="">
					        </li>
					        
					        <li>
					            <label>E-mail</label>
					            <input type="text" class="text" name="email" value="">
					        </li>        
					</ol>
					</fieldset>
					
					<fieldset class="submit">
					
						<div class="row buttons">
							<input class="submit btn m-b-xs  btn-primary btn-addon btn-lg" type="submit" name="yt0" value=" Добавить " />	</div>
					    
					</fieldset>
					    
					</form> -->
			</div>
			<?php } ?>

        </div>
    </div>


