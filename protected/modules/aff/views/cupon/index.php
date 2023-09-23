<?php $this->pageTitle='Список купонов скидок' ;
$this->menu=array(
	array('label'=>'Добавить купон', 'url'=>array('create'), 'itemOptions' => array ('class' => 'rmenu_add')),  
);
?>

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
            <div class="panel panel-default cumimi" style="padding-top:20px;">
                  
				

                <?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'good-grid',
					'dataProvider'=>$model->search(Y::user()->id),
				   	'selectableRows' => false,
					'filter'=>$model,
				    'htmlOptions' => array('style' => 'padding-left:20px;padding-right:20px;'),
					'columns'=>array(

							
							 array(
								'name'=>'code',
								'value'=>'$data->code',
								'headerHtmlOptions'=>array('width'=>'60'),
								 'htmlOptions' => array (),
							),                        
							           
				                        
							 array(
								'name'=>'title',
								'value'=>'$data->title',
								'headerHtmlOptions'=>array('width'=>'150'),
								 'htmlOptions' => array (),
							),
							
							 array(
								'name'=>'good_id',
								'value'=>'$data->good_id',
								'headerHtmlOptions'=>array('width'=>'140'),
								 'htmlOptions' => array (),
							),                        
							
							 array(
								'name'=>'sum',
								'value'=>'$data->sum',
								'headerHtmlOptions'=>array('width'=>'70'),
								 'htmlOptions' => array (),
							),			
							
							 array(
								'name'=>'startDate',
								'value'=>'H::date($data->startDate)',
								'headerHtmlOptions'=>array('width'=>'70'),
				                                'cssClassExpression' => '$data->startDate < time()?"gooddate":"baddate"',
												 'htmlOptions' => array (),
							),
							
							 array(
								'name'=>'stopDate',
								'value'=>'H::date($data->stopDate)',
								'headerHtmlOptions'=>array('width'=>'70'),
				                                'cssClassExpression' => '$data->stopDate > time()?"gooddate":"baddate"',
												 'htmlOptions' => array (),
							),					
							
						array(
							'class'=>'CButtonColumn',
				            'htmlOptions' => array('width' => '150'),

						),
					),
				)); ?>

            </div>

           

        </div>
    </div>








