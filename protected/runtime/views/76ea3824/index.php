<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/views/order/index.php */ ?>
<?php $this->pageTitle='Оформление заказа' ?>
<?php if ($good->stepOk()) echo StepBar::showBar(1) ?>

<div class="container w-xxl w-auto-xs" id="change_pay_width">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
    <div class="m-b-lg" id="form_pay">        
        <h2 class="title"><?=$good->title?></h2>
        <h3 class="title2">Стоимость: <?php  if ($oldprice > 0) {
                    echo '<span style="text-decoration: line-through;">'.H::mysum($oldprice).H::valuta($good->currency).'</span> &nbsp;';
                }
            
            ?><span><?=H::mysum($good->price).H::valuta($good->currency) ?></span></h3>
  
        <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'bill-form',
        'enableAjaxValidation'=>false,
        'htmlOptions' =>
            array (
                'onSubmit' => 'executeExample(); return false;'
             ),

    )); ?>



    <div class="form-validation">
      <div class="text-danger wrapper text-center" ng-show="authError">
           <!--  <?= $form->errorSummary($model); ?>     -->
      </div>

    
      <div class="list-group2 list-group-sm2">
		<div class="legends">Ваши данные:</div>
        <?php if ($kind != 'disk'): ?>
        
        <div class="list-group-item2">
            
            <?= $form->textField($model,'uname',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Имя *')); ?>
            <?= $form->error($model,'uname'); ?>          
        </div>
        <?php endif; ?>

        <div class="list-group-item2">
           
            <?= $form->textField($model,'email',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Ваш e-mail *')); ?>
            <?= $form->error($model,'email'); ?>        
        </div>

        <div class="list-group-item2">
            <?= $form->textField($model,'amail',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Дополнительный e-mail')); ?>
            <?= $form->error($model,'amail'); ?>     
        </div>

        <?php if ($kind != 'disk'): ?>
            <?php if (Settings::item('phoneEbook')==1): ?>

            <div class="list-group-item2">
                <?= $form->textField($model,'phone',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Ваш № телефона *')); ?>
                <?= $form->error($model,'phone'); ?>
            </div>
            
            <?php else: ?>
            <?php $model->phone = 'нет' ?>
            <?= $form->hiddenField($model,'phone'); ?>
            <?php endif; ?>

        <?php endif; ?>

         <div class="list-group-item2">
            <?= $form->textField($model,'cupon',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Купон скидки','disabled' => (!empty ($cupon)))); ?>
            <?= $form->error($model,'cupon'); ?>
        </div>


        <?php if ($kind == 'disk'): ?>
        	<div class="legends legends2">Информация для доставки:</div>
         <div class="list-group-item2">
            <?= $form->textField($model,'surname',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Фамилия *')); ?>
            <?= $form->error($model,'surname'); ?>
        </div>
        
         <div class="list-group-item2">
            
            <?= $form->textField($model,'uname',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Имя *')); ?>
            <?= $form->error($model,'uname'); ?>
        </div>    

        <div class="list-group-item2">
          
            <?= $form->textField($model,'otchestvo',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Отчество *')); ?>
            <?= $form->error($model,'otchestvo'); ?>
        </div>

        <div class="list-group-item2">
           
            <?= $form->dropDownList($model,'strana',Country::get(), array('class' => 'select form-control','placeholder'=>'Страна *')); ?>
            <?= $form->error($model,'strana'); ?>
        </div>

         <div class="list-group-item2">
            
            <?= $form->textField($model,'region',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Область')); ?>
            <?= $form->error($model,'region'); ?>
        </div>

         <div class="list-group-item2">
           
            <?= $form->textField($model,'gorod',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Город *')); ?>
            <?= $form->error($model,'gorod'); ?>
        </div>

         <div class="list-group-item2">
           
            <?= $form->textField($model,'postindex',array('size'=>30,'maxlength'=>30, 'class' => 'text form-control','placeholder'=>'Почтовый индекс *')); ?>
            <?= $form->error($model,'postindex'); ?>
        </div>

         <div class="list-group-item2">
            
            <?= $form->textField($model,'address',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Адрес *')); ?>
            <?= $form->error($model,'address'); ?>
        </div>

        <?php if (Settings::item('phoneDisk')==1): ?>

         <div class="list-group-item2">
            
            <?= $form->textField($model,'phone',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Телефон *')); ?>
            <span style="font-size:14px; color:gray"><i>Пример: +7 (495) 123-4567</i></span>
            <?= $form->error($model,'phone'); ?>
        </div>
        
        <?php else: ?>
        <?php $model->phone = 'нет' ?>
        <?= $form->hiddenField($model,'phone'); ?>

        <?php endif; ?>

         <div class="list-group-item2">
           
            <?= $form->textField($model,'comment',array('size'=>60,'maxlength'=>255, 'class' => 'text form-control','placeholder'=>'Комментарий к заказу')); ?>
            <?= $form->error($model,'comment'); ?>
        </div>   
        <?php endif; ?>

      </div>

      <div class="flex_poli">
      	 <?= CHtml::submitButton('Продолжить', array ('class' => 'submit new_button')); ?>   
         <?php if(Settings::item('politic')) { ?>
      	 <div>
      	 	<input type="checkbox" name="agree" id="agree" required="true" checked>
      	 	<label for="agree">Принимаю <a href="<?php print_r(Settings::item('politic_oferta')); ?>" target="_blank">оферту</a> и <a href="<?php print_r(Settings::item('politic_link')); ?>" target="_blank">политику конфиденциальности</a></label>
      	 </div>
         <?php } ?>
      </div>
        
      
    </div>   

    <?php $this->endWidget(); ?>



    </div>
    <div class="text-center">
        <p>
        <small class="text-muted" style="font-family: Open Sans;
font-style: normal;
font-weight: normal;
font-size: 13px;">Мы принимаем оплату на сайте при помощи системы "<a target="_blank" href="https://wayforpay.com/ru">WayForPay</a>"© 2020</small>
        </p>
    </div>
</div>

