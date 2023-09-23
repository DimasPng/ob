<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Особые комисии партнёра</h1>
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

				<legend>Данные</legend>

				<ol>

					<li>
						<?= $form->labelEx($model,'partner_id'); ?>
						<?= $form->dropDownList($model,'partner_id',Partner::items (),array('class' => 'select')); ?>
						<?= $form->error($model,'partner_id'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'good_id'); ?>
						<?= $form->dropDownList($model,'good_id',Good::sitems (),array('class' => 'select')); ?>
						<?= $form->error($model,'good_id'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'komis'); ?>
						<?= $form->textField($model,'komis',array('class'=>'numeric')); ?>
						<?= $form->error($model,'komis'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'komis_type_id'); ?>
						<?= $form->dropDownList($model,'komis_type_id',Lookup::items ('KomisType'),array('class'=>'select')); ?>
						<?= $form->error($model,'komis_type_id'); ?>
					</li>


				</ol>
				</fieldset>

				<fieldset class="submit">
						<?= CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить изменения', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>
				</fieldset>

				<?php $this->endWidget(); ?>
			</div>

        </div>
    </div>

