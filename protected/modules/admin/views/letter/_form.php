

	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Письма</h1>
                    <small class="text-muted"><?php echo $this->pageTitle; ?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <div class="panel panel-default">
            	<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'letter-form',
					'enableAjaxValidation'=>false,
				)); ?>

				<div class="validerror"><?= $form->errorSummary($model); ?></div>


				<fieldset>

				<legend>Письмо</legend>

				<ol>

				        <?php if ($model->isNewRecord): ?>
					<li>
						<?= $form->labelEx($model,'id'); ?>
						<?= $form->textField($model,'id',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'id'); ?>
					</li>    
				        <?php endif; ?>

					<li>
						<?= $form->labelEx($model,'description'); ?>
						<?= $form->textField($model,'description',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'description'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'subject'); ?>
						<?= $form->textField($model,'subject',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'subject'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'message'); ?>
						<?= $form->textArea($model,'message',array('rows'=>15, 'cols'=>55, 'class' => 'textarea')); ?>
						<?= $form->error($model,'message'); ?>
					</li>

					<li>
						<?php echo $form->labelEx($model,'type'); ?>
						<?php echo $form->dropDownList($model,'type',Letter::types(), array ('class' => 'select')); ?>
						<?php echo $form->error($model,'type'); ?>
					</li>

					<li>
						<?php echo $form->labelEx($model,'lon'); ?>
						<?php echo $form->dropDownList($model,'lon',Lookup::items('Visible'), array ('class' => 'select')); ?>
						<?php echo $form->error($model,'lon'); ?>
					</li>

				</ol>
				</fieldset>
				
				

				<fieldset class="submit">
						<?= CHtml::submitButton($model->isNewRecord ? 'Добавить товар' : 'Сохранить изменения', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>
				</fieldset>

				<?php $this->endWidget(); ?>
			</div>

        </div>
    </div>


