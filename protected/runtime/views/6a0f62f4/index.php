<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/views/bill/index.php */ ?>
<?php $this->pageTitle='Оплата счёта #'.$model->id ?>

<?php if ($good->stepOk()) echo StepBar::showBar(4) ?>

<script type="text/javascript">
    var auto_submit = 1; //Поменяйте на 1 если хотите чтобы отправлялись способы автоматом при нажатии кнопки "Подробнее"
</script>



<div class="container w-xxl w-auto-xs" id="change_pay_width">
  <!-- <a href class="navbar-brand block m-t">Вход - Панель администратора</a> -->
    <div class="m-b-lg" id="form_pay">
        <h1>
          <strong>Способ оплаты</strong>
        </h1>


        <div class="sum_detail">
            <div class="sum">
                <h5>Оплата счёта №<?=$model->id ?> от <?=date ('j.m.Y H:i',$model->createDate) ?></h5>
                Сумма <span><?=$model->sum ?><?=H::valuta($model->valuta) ?>  </span>
                
                <?php if ($model->valuta!='usd'): ?>
                    (<?php $x = Valuta::conv ($model->sum,$model->valuta); echo $x['usd']; ?>$)

                <?php endif; ?>
           
            </div>

            <!-- <div class="detail">
                Детали платежа
                <div class="show-more__link-icon">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAAA+UlEQVRIie3UPU7DMBiA4TdWjBA7lbhDWGBmALZ24AxZEp8oinwPxEKG9gp06A1APQCL0WcWQCUR1HZWv6N/8siWYsjlcrnEivFA27Yb4KwoimXf9/s5HzfGLETkCXi31t4czqnxYu/9qff+WkQGY8xiJjoAV977k/H8BHbOrYAXoBKRddM0F7FoXdfnIvIMVMBOa/0wXjO56u+NWusBuAR2wJ219jUUPdxbluVt13VvQXAqHor+C8fiMehROBSPRYPgY3gKGgz/hTvnPlLQKBh+/ZsVsP0aroCtUuo+5sGJgmFycog8aTIMPyd/BFBKreY+rblcLhfVJ3o7kBQopkuHAAAAAElFTkSuQmCC">
                </div>
            </div> -->
        </div>

        <!-- <div class="full_detail">
            <h4>Оплата счёта №<?=$model->id ?> от <?=date ('j.m.Y H:i',$model->createDate) ?></h1>
        
            <h4>Сумма: <?=$model->sum ?><?=H::valuta($model->valuta) ?> 
                
            <?php if ($model->valuta!='usd'): ?>
                (<?php $x = Valuta::conv ($model->sum,$model->valuta); echo $x['usd']; ?>$)
        
            <?php endif; ?>
        
            </h4>
        
            <p align="center"><b>Ваша постоянная ссылка для отслеживания состояния данного заказа:</b><br><br>
                <a href="<?=$stlink?>" target="_blank"><?=$stlink?></a>
            </p>
        </div> -->
        
        <br>
        <!-- <p align="center"><span style="font-size:14px">Выберите желаемый способ оплаты    
        
        <?php if (!$fw): ?>        
        <br><br>В колонке <b>&quot;Оплата через&quot;</b> оставьте <br />значение по умолчанию, если затрудняетесь выбрать.</span></p><br />        
        <?php endif; ?> -->
        
        <?php if ($good->nalozhOn || $good->kurier): ?>
        <div align="center" class="wrap2">

            <h3>Наложенный платеж</h3>

            <div class="payimg">
                <img src="<?=Y::bu()?>images/front/bill/<?=($model->strana=='Украина')?'ukrpost.jpg':'post.gif'?>">
            </div>

            <h4>Оплата наложенным платежом (при получении на почте)</h4>

            Чтобы окончательно подтвердить заказ наложенным платежом, нажмите:
            <form action="<?=$nalozhLink ?>" method="post">            
                <?php if ($good->kurier): ?>
                <p style="padding: 20px; font-weight: bold;"><input type="checkbox" name="kurier" value="ok" class="checkbox" checked> Получить заказ курьером (вместо почты) в г.<?=CHtml::encode($model->gorod); ?></p>            
                <?php endif; ?>
                <br>
                <div class="paybtn">
                    <input id="subm" class="submit btn btn-lg btn-primary btn-block" type="submit" value="Подтверждаю заказ наложенным платежом"/>
                </div>
            </form>
        </div>
        <?php endif; ?>



        <?php $firstway = TRUE; ?>
        <?php foreach ($wlist as $key=>$pl): ?>

            <div class="wrap2">
            <h4><?=$key?></h4>


            <div class="flex_pays">           
                <?php foreach ($pl as $one): ?>
                <label class="flex_pays_item2">
                        
                        <?php if($one->pic=="CloudPayments") { ?>
                        <input type="radio" class="radio" name="pway" value="<?=$one->plist_id?>" onclick="javascript:pay();" />
                        <?php } else {?>
                        <input type="radio" class="radio" name="pway" value="<?=$one->plist_id?>" onclick="javascript:setway(<?=$one->plist_id?>);" />
                        <?php } ?>
                        <div class="round"></div>
                        <span class="name_mehtod"><?=$one->title?></span>
                        <img src="<?=Y::bu()?>images/ways/<?=$one->pic?>.gif" />
                        
                   
                   
                    <div class="thr" id="th<?=$one->plist_id?>">

                                <?php if ($fw): ?>
                               <div class="hidden">
                                <?php endif; ?>
                                
                                
                        <select class="selectway" id="sl_<?=$one->plist_id?>" onchange="javascript:showcode();">
                        <?php foreach ($one->ways as $way): ?>

                        <option value="<?=$way?>"><?=$ways[$way]->title?></option>

                        <?php endforeach; ?>
                        </select>
                                
                                <?php if ($fw): ?>
                                </div>
                                <?php endif; ?>                          
                                
                    </div> 
                    <div class="thr" id="thim<?=$one->plist_id?>" style="display: none;">
	                    <a title="Щёлкните, чтобы перейти к форме оплаты" href="#" class="myfocus">
	                    <button class="new_button">Перейти к оплате</button>
	                    </a>
	               </div>

                </label>       

                <?php endforeach; ?>
            </div>



            <?php foreach ($pl as $one): ?>
            <!-- <div class="thr" id="thim<?=$one->plist_id?>" style="display: none;">
                    <a title="Щёлкните, чтобы перейти к форме оплаты" href="#" class="myfocus">
                    <button class="new_button">Перейти к оплате</button>
                    </a>
               </div> -->
            <?php endforeach; ?>

            

        </div>

        <?php endforeach; ?>





        <?php //print_r($ways); ?>
        <?php foreach ($ways as $way): ?>

        <div style="display:none;">

            <?php    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                        'id'=>'dg_'.$way->way_id,            
                        'options'=>array(
                            'title'=>'Оплата через '.$way->title,
                            'autoOpen'=>false,
                            'position' => array ('my' => 'center top','at' => 'center top+150'),
                            'modal'=>true,                    
                                'minWidth' => 550,                                        
                                'resizable' => false,
                                'draggable' => false,
                        ),
                    ));

            ?>


            <div class="dialog_input" align="center">            
                <a class="dclose" href="#"><span class="ui-icon ui-icon-closethick">Закрыть</span></a>
                 
                <p align="center">
                    <?=Way::repl($way->code,$values);?>            
                </p>            
            </div>

            <?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
              </div> 
            <?php endforeach; ?>

        </div>

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






<input type="button" id="wayfocus" style="width:0; height:0; background-color:#FFFFFF; border:0;" value="" />

<div style="position:  absolute; left: -9999px; top: -9999px;" id="wayloader"></div>
<script type="text/javascript">
<!--

var myway = '';
var showbt = '';

$(document).ready(function() {
    $(".myfocus").click(function() {
        dgg = '#dg_' + cd;

        form2x = $(dgg + " form");
        is_form = !(form2x.attr("action") == undefined);

        if (auto_submit == 1) {
            if (is_form == false) {
                $(dgg).dialog("open");
            }
        } else {
            $(dgg).dialog("open");
        }


        //Запись способа
        <?php $glink = Y::bu().'waysave?bill_id='.$model->id.'&hash='.Bill::hashBill ($model->id).'&way=';?>

        glink = '<?=$glink;?>';
        loadlink = glink + cd;

        $("#wayloader").load(loadlink);

        if (is_form == true && auto_submit == 1) {
            form2x.submit();
        }

        return false;
    });

    $(".dclose").click(function() {
        $(dgg).dialog("close");
        return false;
    });


    $(".flex_pays_item").click(function() {
        $(".flex_pays_item").removeClass("active");    
        $(this).addClass("active");
     });

    $(".sum_detail .detail").click(function() {
        if($(this).hasClass("active"))
        {
            $(".full_detail").slideUp();
            $(this).removeClass("active");
        }
        else
        {
           $(this).addClass("active");     
           $(".full_detail").slideDown();
        }
    });
});


function setway(way) {
    myway = way;
    show_thr();    
}

function show_thr() {
    //Скрываем всё
    $(".thr").hide();
    dv = '#th' + myway;
    dvt = '#thim' + myway;
    $(dv).show();
    $(dvt).show();
    showcode();
}

function showcode() {
    nm = '#sl_' + myway;
    cd = $(nm).find(":selected").val();

    toshow = '#w_' + cd;
    showbt = '#bt_' + cd;
    //$(".oneway").hide ();             
    //$(toshow).show ();
}




//-->
</script>



