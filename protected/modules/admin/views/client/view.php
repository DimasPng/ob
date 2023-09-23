<?php $this->pageTitle='Просмотр клиента' ?><?

$this->menu=array(
	array('label'=>'Список клиентов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
	array('label'=>'Удалить клиента', 'url'=>array('delete', 'id'=>$model->id), 'itemOptions' => array ('class' => 'rmenu_edit')),
);
?>
<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Клиенты</h1>
                    <small class="text-muted">Просмотр клиента №<?php echo $model->id; ?></small>
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
								'good_id',
								'uname',
								'email',
								'amail',
								'date' => array (
						                    'label' => 'Дата',
						                    'value' => H::date ($model->date),
						                 ),
								'subscribe' => array (
						                    'label' => 'Получать рассылку?',
						                    'value' => ($model->subscribe==1)?"Да":"Нет",
						                ),            
								'bill_id' => array(
						                    'label' => 'Номер счёта',
						                    'value' => $model->bill_id>0?CHtml::link($model->bill_id,array("bill/view","id" => $model->bill_id)):" ",
						                ),
							),
						)); ?>
                
            </div>            

        </div>
    </div>
