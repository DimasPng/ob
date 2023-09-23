<script type="text/javascript">
<!--

	$(function () {
		
		$("#addbut").click (function () {
		
			v = $('#addg option:selected').val();
			console.log(v);
			dd = $('#Cupon_good_id').val();
			
			if (dd!='') dd = dd + ',';
			
			dd = dd+v;
			$('#Cupon_good_id').val(dd);
			
		});
	
	});
	
//-->
</script>



	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Купоны скидки</h1>
                    <small class="text-muted"><?php echo $this->pageTitle; ?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <div class="panel panel-default">
            	<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'cupon-form',
					'enableAjaxValidation'=>false,
				)); ?>

				<div class="validerror"><?= $form->errorSummary($model); ?></div>

				
				<fieldset>

				<legend>Данные</legend>

				<ol>

					<li>
						<?= $form->labelEx($model,'code'); ?>
						<?= $form->textField($model,'code',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'code'); ?>
					</li>
				        
					<li>
						<?= $form->labelEx($model,'category_id'); ?>
						<?= $form->dropDownList($model,'category_id',CuponCategory::items(),array('class' => 'select')); ?>
						<?= $form->error($model,'category_id'); ?>
					</li>        
				        
					<li  class="colss">
						<?= $form->labelEx($model,'good_id'); ?>
				               
						<?= $form->textArea($model,'good_id',array('cols'=>22,'rows'=>3, 'class' => 'textarea')); ?>
						 <i>Через запятую без пробелов</i>
						<?= $form->error($model,'good_id'); ?>
				                
					</li>               
				        
				        <li><label>&nbsp;</label> 
				            
				                <?= CHtml::dropDownList ('addg','',Good::items (),array ('id' => 'addg', 'class' => 'select')); ?>
				                <input type="button" size=3 value="+" id="addbut"/> 
				            
				        </li>

					<li>
						<?= $form->labelEx($model,'sum'); ?>
						<?= $form->textField($model,'sum',array('class'=>'numeric')); ?>
						<?= $form->error($model,'sum'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'kind_id'); ?>
						<?= $form->dropDownList($model,'kind_id',Lookup::items ('CuponKind'),array('class'=>'text')); ?>
						<?= $form->error($model,'kind_id'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'startDate'); ?>
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker', Ars::datePicker ('Cupon[startDate]',$model->startDate)); ?>
						<?= $form->error($model,'startDate'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'stopDate'); ?>
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker', Ars::datePicker ('Cupon[stopDate]',$model->stopDate)); ?>
						<?= $form->error($model,'stopDate'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'komis'); ?>
						<?= $form->dropDownList($model,'komis',Lookup::items ('CuponKomis'),array('class'=>'text')); ?>
						<?= $form->error($model,'komis'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'title'); ?>
						<?= $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'title'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'selfDelete'); ?>
						<?= $form->dropDownList($model,'selfDelete',Lookup::items ('Visible'),array('class'=>'text')); ?>
						<?= $form->error($model,'selfDelete'); ?>
					</li>
				        
					<li class="colss">
						<?= $form->labelEx($model,'client_good_id'); ?>
				                
						<?= $form->textArea($model,'client_good_id',array('cols'=>22,'rows'=>3, 'class' => 'textarea')); ?>
						<i>Необязательно, через запятую</i>
						<?= $form->error($model,'client_good_id'); ?>
				                
					</li>               
				        
				        
				        <?php if ($model->isNewRecord): ?>
				        
				        <li>
						<?= $form->labelEx($model,'pack'); ?>
						<?= $form->textField($model,'pack',array('size'=>60,'maxlength'=>255, 'class' => 'numeric')); ?>
						<?= $form->error($model,'pack'); ?>
				        </li>
				        
				        <?php endif; ?>


				</ol>
				</fieldset>

				<fieldset class="submit">
						<?= CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить изменения', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>
				</fieldset>			

				<?php $this->endWidget(); ?>
			</div>

        </div>
    </div>

