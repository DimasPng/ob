<?php $this->pageTitle='Регистрация партнёра - Партнёрская программа' ?>



<div class="app app-header-fixed ">
  

<div class="container w-xxl w-auto-xs">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
  <div class="m-b-lg">
    <div class="wrapper text-center">
      <strong>Регистрация в партнёрской программе</strong>
    </div>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'partner-form',
        'enableAjaxValidation'=>false,
    )); ?>


    <div class="form-validation">
      <div class="text-danger wrapper text-center" ng-show="authError">
          <div class="validerror">
            <?php echo $form->errorSummary($model); ?>
        </div>
      </div>
      <div class="list-group list-group-sm">

        <div class="list-group-item">
             <?php echo $form->labelEx($model,'firstName'); ?>
            <?php echo $form->textField($model,'firstName',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control')); ?>
            <?php echo $form->error($model,'firstName'); ?>

          
        </div>
        <?php if (Settings::item('affCountry')): ?>
            <div class="list-group-item">
                <?php echo $form->labelEx($model,'country'); ?>
                <?php echo $form->dropDownList($model,'country',Country::get(), array ('class' => 'select form-control')); ?>
                <?php echo $form->error($model,'country'); ?>
            </div>
             
        <?php endif; ?>

        <?php if (Settings::item('affCity')): ?>
             <div class="list-group-item">
                <?php echo $form->labelEx($model,'city'); ?>
                <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255,'class' => 'text form-control')); ?>
                <?php echo $form->error($model,'city'); ?>
            </div>
        <?php endif; ?>

            <div class="list-group-item">
                <?php echo $form->labelEx($model,'email'); ?>
                <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control')); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
            

        <?php if (Settings::item('affUrl')): ?>
             <div class="list-group-item">
                <?php echo $form->labelEx($model,'url'); ?>
                <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control')); ?>
                <?php echo $form->error($model,'url'); ?>
            </div>
        <?php endif; ?>

        <?php if (Settings::item('affAbout')): ?>
             <div class="list-group-item">
                <?php echo $form->labelEx($model,'aboutProject'); ?>
                <?php echo $form->textField($model,'aboutProject',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control')); ?>
                <?php echo $form->error($model,'aboutProject'); ?>
            </div>
        <?php endif; ?>

        <?php if (Settings::item('affMaillist')): ?>
            <div class="list-group-item">
                <?php echo $form->labelEx($model,'maillist'); ?>
                <?php echo $form->textField($model,'maillist',array('size'=>30,'maxlength'=>30, 'class' => 'numeric form-control')); ?>
                <?php echo $form->error($model,'maillist'); ?>
            </div>
        <?php endif; ?>

        <?php if (Settings::item('affFrom')): ?>
            <div class="list-group-item">
                <?php echo $form->labelEx($model,'from'); ?>
                <?php echo $form->textField($model,'from',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control')); ?>
                <?php echo $form->error($model,'from'); ?>
            </div>
        <?php endif; ?>


        <legend>Реквизиты для выплаты комиссионных (укажите хотя бы один кошелёк):</legend>

    
        <?php if (Settings::item('affWmz')): ?>
           <div class="list-group-item">
                <?php echo $form->labelEx($model,'wmz'); ?>
                <?php echo $form->textField($model,'wmz',array('size'=>13,'maxlength'=>13, 'class' => 'text form-control')); ?>
                <?php echo $form->error($model,'wmz'); ?>
            </div>
        <?php endif; ?>

        <?php if (Settings::item('affWmr')): ?>
            <div class="list-group-item">
                <?php echo $form->labelEx($model,'wmr'); ?>
                <?php echo $form->textField($model,'wmr',array('size'=>13,'maxlength'=>13, 'class' => 'text form-control')); ?>
                <?php echo $form->error($model,'wmr'); ?>
            </div>
        <?php endif; ?>

        <?php if (Settings::item('affRbk')): ?>
            <div class="list-group-item">
                <?php echo $form->labelEx($model,'rbkmoney'); ?>
                <?php echo $form->textField($model,'rbkmoney',array('size'=>60,'maxlength'=>100, 'class' => 'text form-control')); ?>
                <?php echo $form->error($model,'rbkmoney'); ?>
            </div>
        <?php endif; ?>

        <?php if (Settings::item('affYandex')): ?>
            <div class="list-group-item">
                <?php echo $form->labelEx($model,'yandex'); ?>
                <?php echo $form->textField($model,'yandex',array('size'=>20,'maxlength'=>20, 'class' => 'text form-control')); ?>
                <?php echo $form->error($model,'yandex'); ?>
            </div>
        <?php endif; ?>

        <!-- <?php if (Settings::item('affZpayment')): ?>
            <div class="list-group-item">
                <?php echo $form->labelEx($model,'zpayment'); ?>
                <?php echo $form->textField($model,'zpayment',array('size'=>14,'maxlength'=>14, 'class' => 'text form-control')); ?>
                <?php echo $form->error($model,'zpayment'); ?>
            </div>
        <?php endif; ?> -->
           

        <legend>Данные для входа</legend>
            
        <div class="list-group-item">
            <?php echo $form->labelEx($model,'id'); ?>
            <?php echo $form->textField($model,'id',array('size'=>60,'maxlength'=>100, 'class' => 'text form-control')); ?>
            <?php echo $form->error($model,'id'); ?>
        </div>  
        
        <div class="list-group-item">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100, 'class' => 'text form-control')); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>    
        
       <div class="list-group-item">
            <?php echo $form->labelEx($model,'passwordRepeat'); ?>
            <?php echo $form->passwordField($model,'passwordRepeat',array('size'=>60,'maxlength'=>100, 'class' => 'text form-control')); ?>
            <?php echo $form->error($model,'passwordRepeat'); ?>
        </div>    
                

        <?php if (extension_loaded('gd')) {?>
         <div class="list-group-item">
            <?php echo $form->labelEx($model, 'verifyCode', array ('style' => 'padding-top:15px'));?>
                <?php echo $form->textField($model, 'verifyCode', array ('class' => 'text  form-control'));?>        
                <?php $this->widget('CCaptcha', array(          
                        'clickableImage' => TRUE,                   
                        'buttonLabel' => '',
                        'imageOptions' => array ('style' => 'vertical-align:middle'),
                        ));?>    

            <?php echo $form->error($model, 'verifyCode');?>
           </div>
        <?php }?>    


      </div>

      <?php echo CHtml::submitButton('Зарегистрироваться', array ('class' => 'submit btn btn-lg btn-primary btn-block')); ?>
      
      
      
    </div>


    <?php $this->endWidget(); ?>
  </div>

    <div class="text-center">
        <p>
        <small class="text-muted">ОрдерБро<br>&copy; 2019</small>
        </p>
    </div>

 
</div>

</div>
