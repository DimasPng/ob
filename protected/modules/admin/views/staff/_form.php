<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Менеджеры</h1>
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
						<?= $form->labelEx($model,'username'); ?>
						<?= $form->textField($model,'username',array('class'=>'text')); ?>
						<?= $form->error($model,'username'); ?>
					</li>
				    
				    <li>
				        <?php echo $form->labelEx($model,'password', array('label' => 'Пароль')); ?>
				        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100, 'class' => 'text')); ?>
				        <?php echo $form->error($model,'password'); ?>
				    </li>
				    
				    <li>
				        <?php echo $form->labelEx($model,'passwordRepeat'); ?>
				        <?php echo $form->passwordField($model,'passwordRepeat',array('size'=>60,'maxlength'=>100, 'class' => 'text')); ?>
				        <?php echo $form->error($model,'passwordRepeat'); ?>
				    </li>        
				    
				    <li>&nbsp;</li>

					<li>
						<?= $form->labelEx($model,'firstName'); ?>
						<?= $form->textField($model,'firstName',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'firstName'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'email'); ?>
						<?= $form->textField($model,'email',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'email'); ?>
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
