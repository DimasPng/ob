<?php $this->pageTitle='Восстановление забытого пароля - Партнёрская программа' ?>


<?php $this->pageTitle='Панель администратора - Вход' ?>


<div class="app app-header-fixed ">
  

<div class="container w-xxl w-auto-xs">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
  <div class="m-b-lg">
    <div class="wrapper text-center">
      <strong>Восстановление пароля</strong>
    </div>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableAjaxValidation'=>false,
    )); ?>


    <div class="form-validation">
      <div class="text-danger wrapper text-center" ng-show="authError">
          
      </div>
      <div class="list-group list-group-sm">
        <div class="list-group-item">
            <?php echo $form->labelEx($model,'id'); ?>
            <?php echo $form->textField($model,'id',array('size'=>60,'maxlength'=>50, 'class' => 'text  form-control')); ?>
            <?php echo $form->error($model,'id'); ?>

          
        </div>
        <div class="list-group-item">
             <?php echo $form->labelEx($model,'email'); ?>
             <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>120, 'class' => 'text  form-control')); ?>
             <?php echo $form->error($model,'email'); ?>
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

      <?php echo CHtml::submitButton('Сбросить пароль', array ('class' => 'submit btn btn-lg btn-primary btn-block')); ?>
      <div class="text-center m-t m-b"><a href="<?= Y::bu() ?>aff">Партнерская программа</a></div>
      
      
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


