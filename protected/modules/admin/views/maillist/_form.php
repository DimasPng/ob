<?php
/* @var $this MaillistController */
/* @var $model Rass */
/* @var $form CActiveForm */
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
            <div class="panel panel-default">
            	<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'cupon-category-form',
					'enableAjaxValidation'=>false,
				)); ?>

				<div class="validerror"><?= $form->errorSummary($model); ?></div>

				
				<fieldset>
				<legend>Основные данные</legend>
				<ol>
					<li>
						<?php echo $form->labelEx($model,'title'); ?>
						<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class' => 'text')); ?>
						<?php echo $form->error($model,'title'); ?>
					</li>

					<li>		
						<?php echo $form->labelEx($model,'good_id'); ?>
						<?php echo $form->dropDownList($model,'good_id',Good::items(),array ('class' => 'select')); ?>
						<?php echo $form->error($model,'good_id'); ?>
					</li>

					<li>		
						<?php echo $form->labelEx($model,'active'); ?>
						<?php echo $form->dropDownList($model,'active',Lookup::items("Visible"),array ('class' => 'select')); ?>
						<?php echo $form->error($model,'active'); ?>
				    </li>
				</ol>
				</fieldset>

				<fieldset class="submit">
						<?= CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить изменения', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>
				</fieldset>

				<?php $this->endWidget(); ?>
			</div>

        </div>
    </div>
