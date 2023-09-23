<?php $this->pageTitle='Главная - Панель партнёра' ?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Аккаунт партнёра <?= Y::user()->id ?></h1>
                    <small class="text-muted">Здравствуйте, <?= Y::user()->title?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                       
            <div class="panel panel-default">
                 <fieldset>	
    				<style>
    					.oneitem {
						    margin-bottom: 5px;
						}
    				</style>
				    <legend>Информация</legend>
				    
				    <ol>
				        <li>
				            <label>Всего заработано:</label> <div class="oneitem"><?=H::mysum($aff->total) ?> рублей</div>
				        </li>
				        
				        <li>
				            <label>Выплачено:</label> <div class="oneitem"><?=H::mysum($aff->paid) ?> рублей</div>
				        </li>
				        
				        <li>
				            <label>Ожидает выплаты:</label> <div class="oneitem"><?=H::mysum($aff->total-$aff->paid) ?> рублей</div>
				        </li>
				        
				        <li>&nbsp;</li>
				        
				        <?php $cc = $aff->clickCount; $oc = $aff->orderCount; $kc = 0; ?>
				        <?php if ($oc>0) $kc = ceil ($cc/$oc); ?>
				        
				        <li>
				            <label>Кликов за всё время:</label> <div class="oneitem"><?=$cc ?></div>
				        </li>
				        <li>
				            <label>Продаж за всё время:</label> <div class="oneitem"><span class="date"><b><?=$oc ?></b>&nbsp;</span> <?php if ($kc>0) echo '(коэффициент продаж = 1:'.$kc.')'; ?></div>
				        </li>
				        
				        <li>&nbsp;</li>
				        
				        <li>
				            <label>Привлечено партнёров:</label> <div class="oneitem"><?=$aff->partnerCount ?>&nbsp;<?=CHtml::link(' смотреть список >>',array ('partners/index')); ?></div>
				        </li>
				        
				        
				        
				    </ol>
				    
				</fieldset>



            </div>

        </div>
    </div>

