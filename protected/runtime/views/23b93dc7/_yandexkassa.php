<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/settings/paysystems/_yandexkassa.php */ ?>
<fieldset>

<legend>Параметры платёжной системы Яндекс.Касса</legend>

<a href="https://kassa.yandex.ru/" target="_blank"><img src="<?=Y::bu()?>images/admin/pay/ykassa.gif" style="padding:20px 25px; width:250px;" ></a>

<ol>

    <li>    
        <?php echo $form->labelEx($model,'payYandexkassaOn'); ?>
        <?php echo $form->checkBox($model,'payYandexkassaOn',array('class' => 'checkbox','uncheckValue' => 0)); ?>    
    </li>

	<li>    
        <?php echo $form->labelEx($model,'payTestYandexkassaOn'); ?>
        <?php echo $form->checkBox($model,'payTestYandexkassaOn',array('class' => 'checkbox','uncheckValue' => 0)); ?>    
    </li>
 
    <li>    
        <?php echo $form->labelEx($model,'payYandexkassaShopid'); ?>
        <?php echo $form->textField($model,'payYandexkassaShopid',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payYandexkassaShopid'); ?>
    </li>

    <li>
        <?php echo $form->labelEx($model,'payYandexkassaScid'); ?>
        <?php echo $form->textField($model,'payYandexkassaScid',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payYandexkassaScid'); ?>
    </li>
    
    <li>
        <?php echo $form->labelEx($model,'payYandexkassaShoppass'); ?>
        <?php echo $form->textField($model,'payYandexkassaShoppass',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payYandexkassaShoppass'); ?>
    </li>    
	
	<li>
    	<?php echo $form->labelEx($model,'payYandexkassaTaxsystem'); ?>
        <?php echo $form->dropDownList($model,'payYandexkassaTaxsystem',array(
            '1' => 'Общая СН',
            '2' => 'Упрощенная СН (доходы)',
            '3' => 'Упрощенная СН (доходы минус расходы)',
            '4' => 'Единый налог на вмененный доход',
            '5' => 'Единый сельскохозяйственный налог',
            '6' => 'Патентная СН',
        ), array ('class' => 'select')); ?>     
        <?php echo $form->error($model,'payYandexkassaTaxsystem'); ?>
	</li> 

	<li>
    	<?php echo $form->labelEx($model,'payYandexkassaTax'); ?>
        <?php echo $form->dropDownList($model,'payYandexkassaTax',array(
            '1' => 'без НДС',
            '2' => 'НДС по ставке 0%',
            '3' => 'НДС чека по ставке 10%',
            '4' => 'НДС чека по ставке 20%',
            '5' => 'НДС чека по расчетной ставке 10/110',
            '6' => 'НДС чека по расчетной ставке 20/120',
        ), array ('class' => 'select')); ?>     
        <?php echo $form->error($model,'payYandexkassaTax'); ?>
	</li>     
    
</ol>

</fieldset>
<?=H::moredivAll('данные для настройки','yandeskassa') ?>
<fieldset>
    <legend>Настройка уведомления на сайте Яндекс.Касса</legend>
    <ol>

        <li>
            <label>Способ подключения</label>
            <div class="systemlink">Платежный модуль</div>
        </li>

        <li>
            <label>checkURL</label>
            <div class="systemlink"><?=Y::bu()?>ps/yandexkassa</div>
        </li>

        <li>
            <label>avisoUrl</label>
            <div class="systemparam"><?=Y::bu()?>ps/yandexkassa</div>
        </li>

        <li>
            <label>Поля successUrl и shopFailUrl нужно оставить пустыми</label>
            <!-- <div class="systemparam"><?=Y::bu()?>ps/yandexkassa</div> -->
        </li>

        

    </ol>
</fieldset>
</div>