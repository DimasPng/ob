<?php $this->pageTitle='Привлечённые партнёры - Панель партнёра' ?>
<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Привлечённые Вами партнёры</h1>
                    <small class="text-muted">Здравствуйте, <?= Y::user()->title?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                       
            <div class="panel panel-default" style="padding-top:20px;">
                <?php $partners = $model->partners; ?>
    
                <?php if (empty ($partners)): ?>
                
                   <p>Вы не привлекли пока что ни одного партнёра.</p>
                   
                <?php else: ?>                    
                    
                <div class="items">

                <style> .asdasdasd45 th, .asdasdasd45 td {
                  padding: 10px;
                  text-align: left;
                }
                </style>
                <table  class="asdasdasd45" cellspacing="20">
                <tr>
                    <th >Дата регистрации</th>
                    <th >RefID партнёра</th>
                    <th>E-mail партнёра</th>        
                    <th >Число продаж</th>
                    <th >Ваш доход с партнёра</th>
                </tr>


                <?php foreach ($partners as $one): ?>

                <?php $affs = $one->lev2; ?>

                <?php $psum = 0; foreach ($affs as $it) {

                   $psum += $it->pkomis;

                } ?>

                <tr>
                    <td style="color:#036"><?= date ('j.m.Y H:i',$one->createTime); ?></td>
                    <td><?= $one->id ?></td>
                    <td><?= (TRUSTEDP==1)?$one->email:H::codemail ($one->email) ?></td>
                    <td style="color:#090"><?= count ($affs); ?></td>
                    <td style="color:#C00"><?= H::mysum ($psum) ?> р.</td>
                </tr>

                <?php endforeach; ?>
                </table>
                </div>    
                    
                <?php endif; ?>
            </div>

        </div>
    </div>

