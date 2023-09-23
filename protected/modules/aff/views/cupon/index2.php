<?php $this->pageTitle='Список купонов скидок' ?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Купоны скидок</h1>
                    <small class="text-muted">Список купонов скидок</small>
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
            <div class="panel panel-default" style="padding-top:20px;">
                 <p>Чтобы отслеживать субаккаунт (канал рекламы) для реф-ссылки любого товара - добавьте в конец ссылки <b>/субаккаунт</b> <br>(где имя - нужное имя или макрос тизерной/другой сети по умолчанию это <b>default</b>).
                

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
                        <th data-type="html">Купон скидки</th>
                        <th data-breakpoints="xs" data-type="html">Краткое описание</th>
                        <th  data-type="html">ID товара (ов)</th>
                        <th data-breakpoints="xs" data-type="html">Сумма</th>
                        <th data-breakpoints="xs" data-type="html">Дата старта</th>
                        <th data-breakpoints="xs" data-type="html">Дата окончания</th>
                        <th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php  $records = $model->findAll(); ?>
                     <?php foreach($records as $data){  //$b = Good::model()->findByPk($data->id);  if($b->used==1 && $b->affOn==1 && $b->affShow==1) {?>
                      <tr data-expanded="false">
                        <td><?php echo $data->code;  ?></td>
                        <td><?php echo $data->title; ?></td>
                        <td><?php echo $data->good_id; ?></td>

                        <td><?php echo $data->sum; ?></td>
                        <td><?php echo H::date($data->startDate); ?></td>
                        <td><?php echo H::date($data->stopDate); ?></td>
                        <td>
				        	<div>
				        		<a href="<?=Y::bua()?>good/view/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-success"><i class="fa fa-search"></i></a>
				        		<a href="<?=Y::bua()?>good/update/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-info"><i class="fa fa-edit"></i></a>
				        		<a href="<?=Y::bua()?>good/delete/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
				        		
				        </div></td>     
                               
                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
                
            </div>

           

        </div>
    </div>






<?= CHtml::link('Добавить купон','/ob/aff/cupon/create/',array('class'=>'create-button')); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'good-grid',
	'dataProvider'=>$model->search(Y::user()->id),
   	'selectableRows' => false,
	'filter'=>$model,
    'htmlOptions' => array('style' => 'width:680px; font-size:11px'),
	'columns'=>array(

			
			 array(
				'name'=>'code',
				'value'=>'$data->code',
				'headerHtmlOptions'=>array('width'=>'60','style'=>'font-size:11px'),
				 'htmlOptions' => array ('style'=>'font-size:11px'),
			),                        
			           
                        
			 array(
				'name'=>'title',
				'value'=>'$data->title',
				'headerHtmlOptions'=>array('width'=>'150','style'=>'font-size:11px'),
				 'htmlOptions' => array ('style'=>'font-size:11px'),
			),
			
			 array(
				'name'=>'good_id',
				'value'=>'$data->good_id',
				'headerHtmlOptions'=>array('width'=>'140','style'=>'font-size:11px'),
				 'htmlOptions' => array ('style'=>'font-size:11px'),
			),                        
			
			 array(
				'name'=>'sum',
				'value'=>'$data->sum',
				'headerHtmlOptions'=>array('width'=>'70','style'=>'font-size:11px'),
				 'htmlOptions' => array ('style'=>'font-size:11px'),
			),			
			
			 array(
				'name'=>'startDate',
				'value'=>'H::date($data->startDate)',
				'headerHtmlOptions'=>array('width'=>'70','style'=>'font-size:11px'),
                                'cssClassExpression' => '$data->startDate < time()?"gooddate":"baddate"',
								 'htmlOptions' => array ('style'=>'font-size:11px'),
			),
			
			 array(
				'name'=>'stopDate',
				'value'=>'H::date($data->stopDate)',
				'headerHtmlOptions'=>array('width'=>'70','style'=>'font-size:11px'),
                                'cssClassExpression' => '$data->stopDate > time()?"gooddate":"baddate"',
								 'htmlOptions' => array ('style'=>'font-size:11px'),
			),					
			
		array(
			'class'=>'CButtonColumn',
            'htmlOptions' => array('width' => '150','style'=>'font-size:11px'),

		),
	),
)); ?>
