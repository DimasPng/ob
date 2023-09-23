<?php $this->pageTitle='Уведомление об оплате счёта' ?>
<div class="container w-xxl w-auto-xs" id="change_pay_width">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
    <div class="m-b-lg" id="form_pay">
        <div class="wrapper text-center">
          <strong style="font-size: 20px;">Уведомление об оплате счёта</strong>
        </div>

        <h3 class="text-center">Отправка уведомления о совершении оплаты вручную</h3>
  
        <p>&nbsp;</p>

        <p style="font-size:14px; line-height:170%;">Если Вы совершили оплату ручным переводом напрямую продавцу (не через мерчанты и/или посредников), - то с помощью данной формы Вы можете отправить запрос администратору, чтобы он нашёл Ваш платёж - и отметил Ваш счёт как оплаченный.</p>

        <p>&nbsp;</p>

        <p style="color:#CC0000"><b>Счёт №<?=$bill->id?> от <?=H::date($bill->createDate)?></b></p><br>
        <p>Ваш e-mail: <b><?=CHtml::encode ($bill->email)?></b></p>

        <br><br>

        <p style="font-size:14px; line-height:170%;">Пожалуйста, укажите как можно больше сведений о Вашем переводе: дата и время суток; точная сумма; кошелёк, с которого был перевод; назначение платежа и др. Это ускорит процесс поиска платежа.</p>

        <br><br>
        
        <div class="form-validation">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'notify-form',
            'enableAjaxValidation'=>false,
        )); ?>

        <fieldset>
        <legend>Данные запроса</legend>

        <div class="list-group list-group-sm">

            <div class="list-group-item">
                <?php echo $form->labelEx($model,'way'); ?>
                <?php echo $form->textField($model,'way',array('size'=>60,'maxlength'=>12, 'class' => 'longtext')); ?>
                <?php echo $form->error($model,'way'); ?>
            </div>    
            
            <style>
                .newt{
                    display: block;
                    width:100%;
                }
            </style>
                
            <div class="list-group-item">
                <?php echo $form->labelEx($model,'message'); ?>
                <?php echo $form->textArea($model,'message',array('cols'=>50,'rows'=>8, 'class' => 'textarea newt')); ?>
                <?php echo $form->error($model,'message'); ?>
            </div>    
            

       
        <?php if (extension_loaded('gd')) {?>
            <div class="list-group-item">
                <?php echo $form->labelEx($model, 'verifyCode', array ('style' => 'padding-top:15px'));?>
                    <?php echo $form->textField($model, 'verifyCode', array ('class' => 'text'));?>        
                    <?php $this->widget('CCaptcha', array(          
                            'clickableImage' => TRUE,                   
                            'buttonLabel' => '',
                            'imageOptions' => array ('style' => 'vertical-align:middle'),
                            ));?>    

                <?php echo $form->error($model, 'verifyCode');?>
                </div>
        <?php }?>    
        </div>

        </fieldset>

            <fieldset class="submit">
                <?php echo CHtml::submitButton('Отправить сообщение', array ('class' => 'submit btn btn-lg btn-primary btn-block')); ?>
            </fieldset>

        <?php $this->endWidget(); ?>
         </div>


    </div>
    <div class="text-center">
        <p>
        <small class="text-muted"><a target="_blank" href="http://orderbro.ru/">ОрдерБро</a><br>&copy; 2019</small>
        </p>
    </div>
</div>


