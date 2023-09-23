<?php $this->pageTitle='Статистика - Панель партнёра' ?>
<div class="col">
        <!-- main header -->
    <div class="bg-light lter b-b wrapper-md">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <h1 class="m-n font-thin h3 text-black">Панель партнёра</h1>
                <small class="text-muted">Просмотр статистики</small>
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
            
            <?php


if ($statKind == 'day') {

  

    $nn=0; $data = array (); $max=1;

    if (count($stat)>20) {
        $ss = ceil (count($stat)/20);
    } else {
        $ss = 2;
    }

    $totalsum = 0;

    foreach ($stat as $key=>$one) {

        if (($nn % $ss) == 0) {
            $data[$nn]['Day']['date'] = date ('j.m',$key);
        }
        $data[$nn]['Day']['count'] = $one['sum'];
        $totalsum += $one ['sum'];
        if ($one['sum']>$max && $one['sum']>1) {
            $max = $one['sum'];
        }

        $nn++;
    }

 } else {

    $nn=0; $data = array (); $max=1;

    if (count($stat)>20) {
        $ss = ceil (count($stat)/20);
    } else {
        $ss = 2;
    }

    
    $totalsum = 0;

    foreach ($stat as $key=>$one) {

        if (($nn % $ss) == 0) {
            $data[$nn]['Day']['date'] = date ('m/y',$key);
        }
        $data[$nn]['Day']['count'] = $one['sum'];
        $totalsum += $one ['sum'];
        if ($one['sum']>$max && $one['sum']>1) {
            $max = $one['sum'];
        }

        $nn++;
    }


 }

  ?>

  <?php


if ($statKind == 'day') {



    $nn=0; $data = array (); $max=2;

    if (count($stat)>20) {
        $ss = ceil (count($stat)/20);
    } else {
        $ss = 2;
    }

    //Y::dump ($stat);

    foreach ($stat as $key=>$one) {

        if (($nn % $ss) == 0) {
            $data[$nn]['Day']['date'] = date ('j.m',$key);
        }
        $data[$nn]['Day']['count'] = $one['count'];
        if ($one['count']>$max && $one['count']>1) {
            $max = $one['count'];
        }

        $nn++;
    }

 } else {



    $nn=0; $data = array (); $max=1;

    if (count($stat)>20) {
        $ss = ceil (count($stat)/20);
    } else {
        $ss = 2;
    }

    //Y::dump ($stat);

    foreach ($stat as $key=>$one) {

        if (($nn % $ss) == 0) {
            $data[$nn]['Day']['date'] = date ('m/y',$key);
        }
        $data[$nn]['Day']['count'] = $one['count'];
        if ($one['count']>$max && $one['count']>1) {
            $max = $one['count'];
        }

        $nn++;
    }


 }
?>
             <p>&nbsp;</p>   
        
            <style>
                #startDate, #stopDate{display:inline-block; max-width: 100px; width:100%;}
                #thegood{    display: block;
                            width: 320px;
                            height: 34px !important;
                            padding: 6px 12px;
                            font-size: 14px;
                            line-height: 1.42857143;
                            color: #555;
                            background-color: #fff;
                            background-image: none;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
                            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                            border-color: #cfdadd;
                            border-radius: 2px;
                            -webkit-box-shadow: none;
                            box-shadow: none;max-width: 230px; width:100%;}
                .xxxx{
                    margin-left:30px;
                        text-align: center;
    margin-bottom: 20px;
    padding: 10px 26px;
    margin-left: 21px;
                }
            </style>
            <div style="    display: inline-block;
    padding: 20px 20px 20px 0px;
    margin-left: 20px;
    border: 1px solid #dee5e7;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);">
            <p><b>Выберите период: </b></p>


            <?= CHtml::beginForm(array ()); ?>

            <p><?php $this->widget('zii.widgets.jui.CJuiDatePicker', Ars::datePicker ('startDate',$startDate)); ?>

            по

            <?php $this->widget('zii.widgets.jui.CJuiDatePicker', Ars::datePicker ('stopDate',$stopDate)); ?>

            <br><br>Для товара: </br>
            <?= CHtml::dropDownList ('thegood',$thegood,array_merge(array(''=>'Все'),$gl)); ?>

           <ol style="   padding-left: 23px;"><li><label>Статистика по каналам</label> <input type='checkbox' class='checkbox' name='subacc' value='1'> </li></ol>

            
                 <?= CHtml::submitButton('Показать статистику', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg xxxx')); ?>
            
            <?= CHtml::endForm(); ?>
            </div>

            <p>&nbsp;</p>

            <h2 style="margin-left:20px;">Статистика за период с <?=$startDate?> по <?=$stopDate?> для <?=(empty($thegood)?'ВСЕХ товаров':'товара: '.$gl[$thegood])?></h2>
            

            <table class="table" data-toggle-column="last" ui-jq="footable" ui-options='{
                    "paging": {
                      "enabled": false
                    },
                    "filtering": {
                      "enabled": false
                    },
                    "sorting": {
                      "enabled": false
                    }}'>
                    <thead>
                      <tr>
                        <th data-type="html">Товар</th>
                        <th data-breakpoints="xs" data-type="html">Кликов</th>                       
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/waiting.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/approved.gif"></th>

                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/processing.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/sent.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/nalozh.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/nalozh_confirmed.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/nalozh_sent.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/nalozh_ok.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/nalozh_back.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/cancelled.gif"></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($goods as $one): ?>
                        
                        <?php $cl = $clicks[$one->id]; ?>
                        
                        <?php if (!empty ($thegood)) {
                            if ($one->id!=$thegood) continue;
                        } ?>
                      <tr data-expanded="false">
                        <td><?=$one->title?></td>
                        <td><?=$cl['clicks']?></td>
                        <td><?=$cl['waiting']?></td>
                        <td><?=$cl['approved']?></td>
                        <td><?=$cl['processing']?></td>
                        <td><?=$cl['sent']?></td>
                        <td><?=$cl['nalozh']?></td>
                        <td><?=$cl['nalozh_confirmed']?></td>
                        <td><?=$cl['nalozh_sent']?></td>
                        <td><?=$cl['nalozh_ok']?></td>
                        <td><?=$cl['nalozh_back']?></td>
                        <td><?=$cl['cancelled']?></td>
                       
                            
                      </tr>


                    <?php endforeach; ?>
                    <tr>
                        <?php $cl = $totalstat ?>
                        <td><b>Все товары</b></td>
                        <td class="thedate"><?=$cl['clicks']?></td>
                        <td><?=$cl['waiting']?></td>
                        <td class="gooddate"><?=$cl['approved']?></td>
                        <td class="gooddate"><?=$cl['processing']?></td>
                        <td class="gooddate"><?=$cl['sent']?></td>
                        <td><?=$cl['nalozh']?></td>
                        <td><?=$cl['nalozh_confirmed']?></td>
                        <td><?=$cl['nalozh_sent']?></td>
                        <td class="gooddate"><?=$cl['nalozh_ok']?></td>
                        <td class="baddate"><?=$cl['nalozh_back']?></td>
                        <td class="baddate"><?=$cl['cancelled']?></td>
                        
                    </tr>

                  </tbody>
                </table>
            
            <fieldset>

                <legend>Информация для выбранного периода</legend>

                <ol>
                    <style>
                        .oneitem {
                            margin-bottom: 5px;
                        }
                    </style>
                    <li>
                        <label>Кликов всего:</label><div class="oneitem"><?=$tclicks?></div>
                        
                    </li>        
                    
                    <li>
                        <label>Кликов для партнёрки:</label><div class="oneitem"><?=$aclicks?></div>
                        
                    </li>        
                    

                    <li>
                        <label>Всего засчитано продаж:</label><div class="oneitem"><?=count($opaid)?></div>
                        
                    </li>
                    
                    <li>
                    <label>На общую сумму:</label><div class="oneitem"><?=H::mysum($totalsum)?> рублей</div>
                    </li>


                </ol>


            </fieldset>


            <br>
          

            <?=H::moredivAll('информацию о статусах','liq') ?>
            <?= $this->renderPartial('//main/_statuses'); ?>
            </div>

            



             <?php if ($sbcheck): ?>

                    
            <h2 style="margin-left:20px;">Статистика по своим каналам</h2>                

           
           <table class="table" data-toggle-column="last" ui-jq="footable" ui-options='{
                    "paging": {
                      "enabled": false
                    },
                    "filtering": {
                      "enabled": false
                    },
                    "sorting": {
                      "enabled": false
                    }}'>
                    <thead>
                      <tr>
                        <th data-type="html">Субаккаунт</th>
                        <th data-breakpoints="xs" data-type="html">Кликов</th>                       
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/waiting.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/approved.gif"></th>

                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/processing.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/sent.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/nalozh.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/nalozh_confirmed.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/nalozh_sent.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/nalozh_ok.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/nalozh_back.gif"></th>
                        <th data-breakpoints="xs" data-type="html"><img src="<?=Y::bu()?>images/status/cancelled.gif"></th>

                        <th data-breakpoints="xs" data-type="html">%</th>
                        <th data-breakpoints="xs" data-type="html">EPC</th>
                        <th data-breakpoints="xs" data-type="html">Доход</th>

                      </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($subs as $one): ?>
                 
                        <?php $cl = $sub[$one]; ?>
                      <tr data-expanded="false">
                        <td><?=$one->title?></td>
                        <td><?=$cl['clicks']?></td>
                        <td><?=$cl['waiting']?></td>
                        <td><?=$cl['approved']?></td>
                        <td><?=$cl['processing']?></td>
                        <td><?=$cl['sent']?></td>
                        <td><?=$cl['nalozh']?></td>
                        <td><?=$cl['nalozh_confirmed']?></td>
                        <td><?=$cl['nalozh_sent']?></td>
                        <td><?=$cl['nalozh_ok']?></td>
                        <td><?=$cl['nalozh_back']?></td>
                        <td><?=$cl['cancelled']?></td>

                        <td ><?=H::econv ($cl['clicks'],$cl['conv']); ?>%</td>
                        <td style='color: #036;'><?=H::epc ($cl['clicks'],$cl['dohod']); ?>р.</td>
                        <td><?=H::mysum ($cl['dohod']); ?>р.</td>
                       
                            
                      </tr>


                    <?php endforeach; ?>
                    <tr>
                        <?php $cl = $totalstat2 ?>
                        <td style="font-size:9px" align='left'><b>Все субаккаунты</b></td>
                        <td class="thedate"><?=$cl['clicks']?></td>
                        <td><?=$cl['waiting']?></td>
                        <td class="gooddate"><?=$cl['approved']?></td>
                        <td class="gooddate"><?=$cl['processing']?></td>
                        <td class="gooddate"><?=$cl['sent']?></td>
                        <td><?=$cl['nalozh']?></td>
                        <td><?=$cl['nalozh_confirmed']?></td>
                        <td><?=$cl['nalozh_sent']?></td>
                        <td class="gooddate"><?=$cl['nalozh_ok']?></td>
                        <td class="baddate"><?=$cl['nalozh_back']?></td>
                        <td class="baddate"><?=$cl['cancelled']?></td>
                        <td style='font-size:10px;'><?=H::econv ($cl['clicks'],$cl['conv']); ?>%</td>
                        <td style='font-size:10px; color: #036;'><?=H::epc ($cl['clicks'],$cl['dohod']); ?>р.</td>
                        <td class="gooddate"><?=H::mysum ($cl['dohod']); ?>р.</td>
                        
                    </tr>

                  </tbody>
                </table>
             

            <?php endif; ?>



        </div>

    </div>


