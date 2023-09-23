<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Авторы</h1>
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

				<legend>Данные автора</legend>

				<ol>

					<li>
						<?= $form->labelEx($model,'id'); ?>
						<?= $form->textField($model,'id',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'id'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'password'); ?>
						<?= $form->textField($model,'password',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'password'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'email'); ?>
						<?= $form->textField($model,'email',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'email'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'uname'); ?>
						<?= $form->textField($model,'uname',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'uname'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'purse'); ?>
						<?= $form->textField($model,'purse',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'purse'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'kind'); ?>
						<?= $form->dropDownList($model,'kind',Lookup::items ('Purse'), array('class' => 'text')); ?>
						<?= $form->error($model,'kind'); ?>
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