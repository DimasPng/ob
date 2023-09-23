

	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Варианты оплаты</h1>
                    <small class="text-muted"><?php echo $this->pageTitle; ?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <div class="panel panel-default">
            	<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'good-form',
					'enableAjaxValidation'=>false,
				)); ?>

				<div class="validerror"><?= $form->errorSummary($model); ?></div>
				
				<fieldset>
					<legend>Данные</legend>
					<ol>
						<li>
							<?= $form->labelEx($model,'title'); ?>
							<?= $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
							<?= $form->error($model,'title'); ?>
						</li>
					        
						<li>
							<?= $form->labelEx($model,'category'); ?>
							<?= $form->textField($model,'category',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
							<?= $form->error($model,'category'); ?>
						</li>        

						<li>
							<?= $form->labelEx($model,'pic'); ?>
							<?= $form->textField($model,'pic',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
							<?= $form->error($model,'pic'); ?>
						</li>

						<li>
							<?= $form->labelEx($model,'url'); ?>
							<?= $form->textField($model,'url',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
							<?= $form->error($model,'url'); ?>
						</li>

						<li>
							<?= $form->labelEx($model,'ways'); ?>
							<?= $form->textField($model,'ways',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
							<?= $form->error($model,'ways'); ?>
						</li>

						<li>
							<?= $form->labelEx($model,'position'); ?>
							<?= $form->textField($model,'position',array('class'=>'numeric')); ?>
							<?= $form->error($model,'position'); ?>
						</li>


					</ol>
				</fieldset>

				<fieldset class="submit">
						<?= CHtml::submitButton($model->isNewRecord ? 'Добавить вариант' : 'Сохранить изменения', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>
				</fieldset>

				<?php $this->endWidget(); ?>
			</div>

        </div>
    </div>

