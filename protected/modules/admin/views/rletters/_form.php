<?php
/* @var $this RlettersController */
/* @var $model RassLetter */
/* @var $form CActiveForm */
?>


	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Письма из серии</h1>
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
							<?php echo $form->labelEx($model,'rass_id'); ?>
							<?php echo $form->dropDownList($model,'rass_id',Rass::items (), array('class' => 'select')); ?>
							<?php echo $form->error($model,'rass_id'); ?>
						</li>

						<li>
							<?php echo $form->labelEx($model,'title'); ?>
							<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
							<?php echo $form->error($model,'title'); ?>
						</li>

						<li>
							<?php echo $form->labelEx($model,'content'); ?>
							<?php echo $form->textArea($model,'content',array('rows'=>12, 'cols'=>42, 'class' => 'textarea')); ?>
							<?php echo $form->error($model,'content'); ?>
						</li>

						<li>
							<?php echo $form->labelEx($model,'hours'); ?>
							<?php echo $form->textField($model,'hours', array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
							<?php echo $form->error($model,'hours'); ?>
						</li>

						<li>
							<?php echo $form->labelEx($model,'comment'); ?>
							<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
							<?php echo $form->error($model,'comment'); ?>
					        </li>
					        
					        
					        <?php if ($model->isNewRecord): ?>
					        <li><br>
					        <label>&nbsp;</label>
					        <input type="checkbox" class="checkbox" name="add" value="1" checked> Добавить это письмо в очередь текущим подписчикам
					        </li>
					        
					        <?php endif; ?>
					</ol>
					</fieldset>

				<fieldset class="submit">
						<?= CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить изменения', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>
				</fieldset>


			    <br>
			    <p style="font-size:10px;"> Подсказка: используйте <b>%name%</b> макрос для подстановки имени человека в тексте или теме письма.</p>

				<?php $this->endWidget(); ?>
			</div>

        </div>
    </div>

    

