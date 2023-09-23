<script type="text/javascript">
<!--

	$(function () {
		
		$("#addbut").click (function () {
		
			v = $('#addg').find(":selected").val();
			$('#Cupon_good_id').val("");
			
			//if (dd!='') dd = dd + ',';
			
			//dd = dd+v;
			$('#Cupon_good_id').val(v);
			
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
        	    

			 <?php $flashmsg = Y::user()->getFlash ('aff') ?>
			        <?php if (!empty($flashmsg)): ?>

			            <div class="alert alert-info">
			              <strong>Результат последнего действия</strong><br><?= $flashmsg ?>
			            </div>        

			        <?php endif; ?> 
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
						<label for="Cupon_good_id" class="required">ID товара<span class="required">*</span></label>
				      
						<?= $form->textField($model,'good_id',array('cols'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'good_id'); ?>
				                
					</li>               
				        
				        <li><label>Добавить товар</label>
				            <input type="button" size=3 value="+" id="addbut" style="    height: 34px;"/> 
				                <?= CHtml::dropDownList ('addg','',Good::items_aff (),array ('id' => 'addg', 'class' => 'select')); ?>
				            
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
						<?= $form->labelEx($model,'title'); ?>
						<?= $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'title'); ?>
					</li>



				</ol>
				</fieldset>
				

				<fieldset class="submit">
						<?= CHtml::submitButton($model->isNewRecord ? 'Добавить купон' : 'Сохранить изменения', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>
				</fieldset>

				<?php $this->endWidget(); ?>

				

			</div>

        </div>
    </div>




