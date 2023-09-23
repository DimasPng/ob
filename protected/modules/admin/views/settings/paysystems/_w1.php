<fieldset>

<legend>Параметры платёжной системы W1 (Единый Кошелёк)</legend>

<a target="_blank" href="https://www.walletone.com/ru/merchant/"><img src="<?=Y::bu()?>images/admin/pay/w1.jpg" style="    padding: 20px 25px;
    width: 126px;
    margin-left: 18px;"></a>

<ol>

    <li>    
        <?php echo $form->labelEx($model,'payW1On'); ?>
        <?php echo $form->checkBox($model,'payW1On',array('class' => 'checkbox','uncheckValue' => 0)); ?>
    </li>

    <li>
        <?php echo $form->labelEx($model,'payW1Id'); ?>
        <?php echo $form->textField($model,'payW1Id',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payW1Id'); ?>
    </li>

    <li>
        <?php echo $form->labelEx($model,'payW1Key'); ?>
        <?php echo $form->textField($model,'payW1Key',array('size'=>60,'maxlength'=>250, 'class' => 'text')); ?>
        <?php echo $form->error($model,'payW1Key'); ?>
    </li>


    
</ol>

</fieldset>

<br />
<br>
<?=H::moredivAll('данные для настройки','w1') ?>
<fieldset>
    <legend>Настройка уведомления на сайте Единой Кассы merchant.w1.ru</legend>
    <ol>

        <li>
            <label>Где настраивать:</label>
            <div class="systemlink"><a target="_blank" href="https://www.walletone.com/merchant/client/#/settings/integration">https://www.walletone.com/merchant/client/#/settings/integration</a></div>
        </li>

        <li>
            <label>URL скрипта:</label>
            <div class="systemlink"><?=Y::bu()?>ps/wallet</div>
        </li>

        <li>
            <label>Метод форм. ЭЦП:</label>
            <div class="systemparam">MD5</div>
        </li>

    </ol>
</fieldset>

</div>