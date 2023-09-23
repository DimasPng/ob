<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Категории купонов скидок</h1>
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
						<?= $form->labelEx($model,'good_id'); ?>
						<?= $form->dropDownList($model,'good_id',Good::items (), array('class' => 'select')); ?>
						<?= $form->error($model,'good_id'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'title'); ?>
						<?= $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'title'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'code'); ?>
						<?= $form->textArea($model,'code',array('rows'=>6, 'cols'=>50, 'class' => 'textarea')); ?>
						<?= $form->error($model,'code'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'adcategory_id'); ?>
						<?= $form->dropDownList($model,'adcategory_id',AdCategory::items (), array('class'=>'select')); ?>
						<?= $form->error($model,'adcategory_id'); ?>
					</li>
				        
					<li>
						<?= $form->labelEx($model,'position'); ?>
						<?= $form->textField($model,'position',array('class'=>'numeric')); ?>
						<?= $form->error($model,'position'); ?>
					</li>
				        
					<li>
						<?php echo $form->labelEx($model,'showcode',array('label' => 'Показывать код?')); ?>
						<?php echo $form->dropDownList($model,'showcode',Lookup::items('Visible'), array ('class' => 'select')); ?>
						<?php echo $form->error($model,'showcode'); ?>
				                <span class="hint">Если установить эту опцию - будет показываться код для копирования.<br><br> Если опция установлена в значение "нет", то не будет отображаться поле с кодом для копирования, а только собственно сам предпросмотр кода (т.е. собственно HTML-код передастся браузеру).</span>
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
