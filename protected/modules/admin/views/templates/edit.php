<?php $this->pageTitle='Изменение HTML-шаблона'; ?><?

$this->menu=array(
	array('label'=>'Список шаблонов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>


	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Шаблоны</h1>
                    <small class="text-muted"><?php echo $this->pageTitle; ?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <div class="panel panel-default">
            	<form method="POST">
    
				<fieldset>
				<legend>Шаблон &quot;<?=$tmname?>&quot;</legend>

				<div class="shablon" align="center">

				           <?=CHtml::textarea ('template_data',$template_data,array (
				                'rows' => 20, 'cols'=>75, 'class' => 'textarea width-template')); ?>
				</div>

				</fieldset>

				<fieldset class="submit_center" style="text-align: center;">
				<input class="submit_center btn m-b-xs  btn-primary btn-addon btn-lg" type="submit"
				value="Сохранить изменения" />
				</fieldset>

				</form>    


			</div>

        </div>
    </div>

