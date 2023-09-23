<?php $this->pageTitle='Просмотр системного письма' ?><?

$this->menu=array(
	array('label'=>'Список писем', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Изменить письмо', 'url'=>array('update', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
);
?>


<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Письма</h1>
                    <small class="text-muted">Просмотр письма #<?php echo $model->id; ?></small>
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
				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						'id',
						'description',
						'lon' => array (
							'label' => 'Включено',
							'value' => Lookup::item ('Visible',$model->lon),
						),
						'type',
						
						'space' => array ('label' => '&nbsp;', 'value' => ' '),		
						'subject',
						'message' => array (
							'label' => 'Текст письма',
							'type' => 'raw',
							'value' => nl2br ($model->message),
						),

					),
				)); ?>
                
            </div>            

        </div>
    </div>



