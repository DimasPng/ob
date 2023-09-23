<?php $this->pageTitle='История выплат - Панель партнёра' ?>
<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">История выплат</h1>
                    <small class="text-muted">Здравствуйте, <?= Y::user()->title?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                       
            <div class="panel panel-default" style="padding-top:20px;">
                <?php $payouts = $model->history; ?>
    
                    <?php if (empty ($payouts)): ?>
                    
                       <p>На текущий нет сохранённых записей в истории выплат.</p>
                       
                    <?php else: ?>
                    
                    
                    
                    
                <div class="items">
                <style> .asdasdasd45 th, .asdasdasd45 td {
                  padding: 10px;
                  text-align: left;
                }
                </style>
                <table  class="asdasdasd45" cellspacing="20">
                    <thead>
                        <tr>
                            <th >Дата выплаты</th>
                            <th>Способ выплаты</th>
                            <th >Реквизиты</th>
                            <th >Сумма</th>
                        </tr>
                    </thead>

                <?php foreach ($payouts as $one): ?>

                <tr>
                    <td data-label="Дата выплаты" style="color:#036"><?= date ('j.m.Y H:i',$one->date); ?></td>
                    <td data-label="Способ " ><?= Lookup::item ('Purse',$one->way) ?></td>
                    <td data-label="Реквизиты" ><?= $one->rekv; ?></td>
                    <td data-label="Сумма"  style="color:#C00"><?= $one->sum.H::valuta ($one->valuta); ?></td>
                </tr>

                <?php endforeach; ?>
                </table>
                </div>    
                    
                    
                    
                    <?php endif; ?>
            </div>

        </div>
    </div>

