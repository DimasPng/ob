<?php $this->pageTitle='Партнёрская программа - Вход' ?>
<div class="app app-header-fixed ">
  

<div class="container w-xxl w-auto-xs">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
  <div class="m-b-lg">
    <div class="wrapper text-center">
      <strong>Вход в партнерскую программу</strong>
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
        	<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username', array ('class' => 'text form-control ')); ?>
			<?php echo $form->error($model,'username'); ?>

          
        </div>
        <div class="list-group-item">
        	<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password', array ('class' => 'tex form-control ')); ?>
			<?php echo $form->error($model,'password'); ?>
        </div>
      </div>

      <?php echo CHtml::submitButton('Выполнить вход', array ('class' => 'submit btn btn-lg btn-primary btn-block')); ?>
      
      <div class="text-center m-t m-b"><a href="<?= Y::bu() ?>aff/forgot">Забыли пароль?</a> | <a href="<?= Y::bu() ?>aff/reg">Регистрация?</a></div>
      
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

