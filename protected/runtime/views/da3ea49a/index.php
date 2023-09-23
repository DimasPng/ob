<?php /* source file: /home/user/web/psi-in.ru/public_html/ob/protected/modules/admin/views/settings/paysystems/index.php */ ?>
<?php $this->pageTitle='Настройки платёжных систем' ?>

    <div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Настройки</h1>
                    <small class="text-muted">Настройки платёжных систем</small>
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


                    <?
                    $this->widget('zii.widgets.jui.CJuiTabs', array(
                            'tabs' => array(
                                    'WebMoney'      =>  $this->renderPartial('_webmoney',array('model' => $model, 'form' => $form),true),
                                   /* 'RBKMoney'      =>  $this->renderPartial('_rbkmoney',array('model' => $model, 'form' => $form),true),
                                    'Z-payment'      =>  $this->renderPartial('_zpayment',array('model' => $model, 'form' => $form),true),*/
                                    'РобоКасса'      =>  $this->renderPartial('_robox',array('model' => $model, 'form' => $form),true),
                                    /*'2CheckOut'      =>  $this->renderPartial('_2checkout',array('model' => $model, 'form' => $form),true),*/
                                    /*'SMS Coin'      =>  $this->renderPartial('_smscoin',array('model' => $model, 'form' => $form),true),*/
                                    'Интеркасса'      =>  $this->renderPartial('_interkassa',array('model' => $model, 'form' => $form),true),
                                    'LiqPay'      =>  $this->renderPartial('_liqpay',array('model' => $model, 'form' => $form),true),
                                    'SpryPay'      =>  $this->renderPartial('_sprypay',array('model' => $model, 'form' => $form),true),
                                    'Яндекс.Деньги'      =>  $this->renderPartial('_yandex',array('model' => $model, 'form' => $form),true),
                                    'PayPal'      =>  $this->renderPartial('_paypal',array('model' => $model, 'form' => $form),true),
                                    'Qiwi'      =>  $this->renderPartial('_qiwi',array('model' => $model, 'form' => $form),true),
                                     /*  'PayOnlineSystem'      =>  $this->renderPartial('_payonline',array('model' => $model, 'form' => $form),true),*/
                                    'Единая касса W1'      =>  $this->renderPartial('_w1',array('model' => $model, 'form' => $form),true),
                                    'Яндекс.Касса'      =>  $this->renderPartial('_yandexkassa',array('model' => $model, 'form' => $form),true),
                                    'Megakassa'      =>  $this->renderPartial('_megakassa',array('model' => $model, 'form' => $form),true),
                                    'Free-Kassa'      =>  $this->renderPartial('_freekassa',array('model' => $model, 'form' => $form),true),
                                    'PayMaster'      =>  $this->renderPartial('_paymaster',array('model' => $model, 'form' => $form),true),
                                    'Fondy'      =>  $this->renderPartial('_fondy',array('model' => $model, 'form' => $form),true),
									'WayForPay'      =>  $this->renderPartial('_wayforpay',array('model' => $model, 'form' => $form),true),
									'Enot.io'      =>  $this->renderPartial('_enot',array('model' => $model, 'form' => $form),true),
                            ),
                            'options' => array(
                                    'collapsible' => false,
                                    'selected' => $selected,
                            ),
                            'htmlOptions' => array ('class' => 'tabs'),
                    ));

                    ?>

                    <fieldset class="submit">
                            <?php echo CHtml::submitButton('Сохранить настройки', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>

                    <?php $this->endWidget(); ?>

                    </fieldset>
            </div>

        </div>
    </div>

