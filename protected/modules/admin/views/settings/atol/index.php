<?php $this->pageTitle='Настройки АТОЛ' ?>

    <div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Настройки</h1>
                    <small class="text-muted">Настройки АТОЛ</small>
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

                <fieldset>

                <legend>Информация для работы с сервисом</legend>

                <br>
                <ol>

                     <li>
                        <?php echo $form->labelEx($model,'enable_atol'); ?>
                        <?php echo $form->checkBox($model,'enable_atol',array('class' => 'checkbox','uncheckValue' => 0)); ?>
                        <?php echo $form->error($model,'enable_atol'); ?>
                    </li>

                    
                    <li>
                        <?php echo $form->labelEx($model,'enable_phone'); ?>
                        <?php echo $form->checkBox($model,'enable_phone',array('class' => 'checkbox','uncheckValue' => 0)); ?>
                        <?php echo $form->error($model,'enable_phone'); ?>
                    </li>

                    <li>
                        <?php echo $form->labelEx($model,'login_atol'); ?>
                        <?php echo $form->textField($model,'login_atol',array('class' => 'text')); ?>
                        <?php echo $form->error($model,'login_atol'); ?>
                    </li>
                    
                    <li>
                        <?php echo $form->labelEx($model,'pass_atol'); ?>
                        <?php echo $form->textField($model,'pass_atol',array('class' => 'text')); ?>
                        <?php echo $form->error($model,'pass_atol'); ?>
                    </li>

                     <li>
                        <?php echo $form->labelEx($model,'inn'); ?>
                        <?php echo $form->textField($model,'inn',array('class' => 'text')); ?>
                        <?php echo $form->error($model,'inn'); ?>
                    </li>

                    <li>
                        <?php echo $form->labelEx($model,'payment_address'); ?>
                        <?php echo $form->textField($model,'payment_address',array('class' => 'text')); ?>
                        <?php echo $form->error($model,'payment_address'); ?>
                    </li>

                    <li>
                        <?php echo $form->labelEx($model,'code_group'); ?>
                        <?php echo $form->textField($model,'code_group',array('class' => 'text')); ?>
                        <?php echo $form->error($model,'code_group'); ?>
                    </li>
                     <li>
                      <?php echo $form->labelEx($model,'sno'); ?>
                        <?php echo $form->dropDownList($model,'sno',array(
                            'osn' => 'Общая СН',
                            'usn_income' => 'Упрощенная СН (доходы)',
                            'usn_income_outcome' => 'Упрощенная СН (доходы минус расходы)',
                            'envd' => 'Единый налог на вмененный доход',
                            'esn' => 'Единый сельскохозяйственный налог',
                            'patent' => 'Патентная СН',
                        ), array ('class' => 'select')); ?>     
                        <?php echo $form->error($model,'sno'); ?>
                        </li>
                   
                    
                </ol>

                </fieldset>

                    <fieldset class="submit">
                            <?php echo CHtml::submitButton('Сохранить настройки', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>

                    <?php $this->endWidget(); ?>

                    </fieldset>
            </div>

        </div>
    </div>