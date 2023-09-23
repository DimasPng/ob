

	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Товары</h1>
                    <small class="text-muted"><?php echo $this->pageTitle; ?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <div class="panel panel-default">
            	<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'category-form',
					'enableAjaxValidation'=>false,
				)); ?>

				<div class="validerror"><?= $form->errorSummary($model); ?></div>
				
				<fieldset>
				<legend>Сведения о Категории</legend>
				<ol>
					<li>
					<div class="row">
						<?php echo $form->labelEx($model,'title'); ?>
						<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'longtext')); ?>
						<?php echo $form->error($model,'title'); ?>
					</div>
				    </li>

					<li>
					<div class="row">
						<?php echo $form->labelEx($model,'description'); ?>
						<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class' => 'textarea')); ?>
						<?php echo $form->error($model,'description'); ?>
					</div>
				    </li>

					<!-- <li>
					        <div class="row">
					        	<?php echo $form->labelEx($model,'visible',array('label' => 'Отображать в каталоге?')); ?>
					        	<?php echo $form->dropDownList($model,'visible',Lookup::items('Visible'), array ('class' => 'select')); ?>
					        	<?php echo $form->error($model,'visible'); ?>
					        </div>
					        				    </li>
					        
					        <li>
					        <div class="row">
					        	<?php echo $form->labelEx($model,'position'); ?>
					        	<?php echo $form->textField($model,'position', array ('class' => 'numeric')); ?>
					        	<?php echo $form->error($model,'position'); ?>
					        </div>
					        				    </li>				 -->        
				</ol>				    
				</fieldset>


				<fieldset class="submit">
						<?= CHtml::submitButton($model->isNewRecord ? 'Добавить категорию' : 'Сохранить изменения', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>
				</fieldset>

				<?php $this->endWidget(); ?>
			</div>

        </div>
    </div>
