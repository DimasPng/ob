<?php $this->pageTitle='Настройки интерфейса' ?>




	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Настройки</h1>
                    <small class="text-muted"><?php echo $this->pageTitle; ?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
        	<?php $flashmsg = Y::user()->getFlash ('admin') ?>
                <?php if (!empty($flashmsg)): ?>
                	<div class="alert alert-info">
					  <strong>Результат последнего действия</strong><br><?= $flashmsg ?>
					</div>                    
                <?php endif; ?>         
            <div class="panel panel-default">
            	<?php $form=$this->beginWidget('CActiveForm', array(
				    'id'=>'ticket-form',
				    'enableAjaxValidation'=>false,
				)); ?>

				<div class="validerror"><?= $form->errorSummary($model); ?></div>


				<fieldset>

					<legend>Число записей на страницу для основных объектов</legend>

					<br>
					<ol>

					    <li>
					        <?php echo $form->labelEx($model,'adminPage'); ?>
					        <?php echo $form->textField($model,'adminPage',array('class' => 'numeric')); ?>
					        <?php echo $form->error($model,'adminPage'); ?>
					    </li>
					    
					  <!--   <li>
					      <?php echo $form->labelEx($model,'catalogPerPage'); ?>
					      <?php echo $form->textField($model,'catalogPerPage',array('class' => 'numeric')); ?>
					      <?php echo $form->error($model,'catalogPerPage'); ?>
					  </li> -->
					    
					   <!--  <li>
					       <?php echo $form->labelEx($model,'anewPerPage'); ?>
					       <?php echo $form->textField($model,'anewPerPage',array('class' => 'numeric')); ?>
					       <?php echo $form->error($model,'anewPerPage'); ?>
					   </li> -->
					    
					</ol>

					</fieldset>

					<br />

					<fieldset>

					<legend>Записей на страницу по некоторым разделам админки</legend>

					<br>
					<ol>

					    <li>
					        <?php echo $form->labelEx($model,'adminPgBill'); ?>
					        <?php echo $form->textField($model,'adminPgBill',array('class' => 'numeric')); ?>
					        <?php echo $form->error($model,'adminPgBill'); ?>
					    </li>
					    
					    <li>
					        <?php echo $form->labelEx($model,'adminPgOrder'); ?>
					        <?php echo $form->textField($model,'adminPgOrder',array('class' => 'numeric')); ?>
					        <?php echo $form->error($model,'adminPgOrder'); ?>
					    </li>

					    <li>
					        <?php echo $form->labelEx($model,'adminPgGood'); ?>
					        <?php echo $form->textField($model,'adminPgGood',array('class' => 'numeric')); ?>
					        <?php echo $form->error($model,'adminPgGood'); ?>
					    </li>
					    <li>
					        <?php echo $form->labelEx($model,'adminPgPayout'); ?>
					        <?php echo $form->textField($model,'adminPgPayout',array('class' => 'numeric')); ?>
					        <?php echo $form->error($model,'adminPgPayout'); ?>
					    </li>

					    <!-- <li>
					        <?php echo $form->labelEx($model,'adminPgAffnew'); ?>
					        <?php echo $form->textField($model,'adminPgAffnew',array('class' => 'numeric')); ?>
					        <?php echo $form->error($model,'adminPgAffnew'); ?>
					    </li> -->

					    <!-- <li>
					        <?php echo $form->labelEx($model,'adminPgAd'); ?>
					        <?php echo $form->textField($model,'adminPgAd',array('class' => 'numeric')); ?>
					        <?php echo $form->error($model,'adminPgAd'); ?>
					    </li> -->

					    <li>
					        <?php echo $form->labelEx($model,'adminPgClient'); ?>
					        <?php echo $form->textField($model,'adminPgClient',array('class' => 'numeric')); ?>
					        <?php echo $form->error($model,'adminPgClient'); ?>
					    </li>

					    <li>
					        <?php echo $form->labelEx($model,'adminPgCupon'); ?>
					        <?php echo $form->textField($model,'adminPgCupon',array('class' => 'numeric')); ?>
					        <?php echo $form->error($model,'adminPgCupon'); ?>
					    </li>	    

					</ol>

					</fieldset>
				<br />				

				<fieldset class="submit">
						<?= CHtml::submitButton('Сохранить изменения', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>
				</fieldset>

				<?php $this->endWidget(); ?>
			</div>

        </div>
    </div>
