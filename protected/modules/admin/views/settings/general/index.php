<?php $this->pageTitle='Общие настройки' ?>

	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Настройки</h1>
                    <small class="text-muted">Общие настройки</small>
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
            <div class="panel panel-default fix_setting" >
				<?php $form=$this->beginWidget('CActiveForm', array(
					    'id'=>'ticket-form',
					    'enableAjaxValidation'=>false,
					)); ?>


					<?
					$this->widget('zii.widgets.jui.CJuiTabs', array(
					        'tabs' => array(
					                'Основные'      =>  $this->renderPartial('_project',array('model' => $model, 'form' => $form),true),
					                'Курсы валют'    =>  $this->renderPartial('_kurs',array('model' => $model, 'form' => $form),true),
					                'Настройки почты'    =>  $this->renderPartial('_mail',array('model' => $model, 'form' => $form),true),
					                //'Поддержка'          =>  $this->renderPartial('_support',array('model' => $model, 'form' => $form),true),
					                'Крон и рассылки'            =>  $this->renderPartial('_other',array('model' => $model, 'form' => $form),true),
									'Mailer Lite'            =>  $this->renderPartial('_lite',array('model' => $model, 'form' => $form),true),
									'SendPulse'            =>  $this->renderPartial('_sendpulse',array('model' => $model, 'form' => $form),true),
					        ),
					        'options' => array(
					                'collapsible' => false,
					                'selected' => $selected,
					        ),
					        'htmlOptions' => array ('class' => 'tabs'),
					));

					?>

					<fieldset class="submit">
					        <?php echo CHtml::submitButton('Сохранить настройки', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>

					<?php $this->endWidget(); ?>

					</fieldset>
			</div>

        </div>
    </div>

