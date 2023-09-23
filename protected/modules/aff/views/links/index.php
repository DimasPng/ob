<?php $this->pageTitle='Партнёрские ссылки - Панель партнёра' ?>
<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Партнёрские ссылки</h1>
                    <small class="text-muted">Партнёрские ссылки</small>
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
                <?php $records = $model->findAll(); if($records) { ?>   
            <div class="panel panel-default" style="padding-top:20px;">
                <!--  <p>Чтобы отслеживать субаккаунт (канал рекламы) для реф-ссылки любого товара - добавьте в конец ссылки <b>/субаккаунт</b> <br>(где имя - нужное имя или макрос тизерной/другой сети по умолчанию это <b>default</b>). -->
                

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
                        <th data-type="html">Название</th>
                        <th data-breakpoints="xs" data-type="html">Реф-ссылка</th>
                        <th  data-type="html">Комиссионные</th>
                        <th data-breakpoints="xs" data-type="html">2 ур.</th>
                        <th data-breakpoints="xs" data-type="html" data-sort-use="text">Материалы</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach($records as $data){  $b = Good::model()->findByPk($data->id);  if($b->used==1 && $b->affOn==1 && $b->affShow==1) {?>
                      <tr data-expanded="false">
                        <td><?php echo CHtml::link($data->title,$data->affLink,array('target' => '_blank'));  ?></td>
                        <td><a href="<?php echo Y::bu().'go/'.Y::user()->id.'/p/'.$data->id; ?>" target="_blank"><?php echo Y::bu().'go/'.Y::user()->id.'/p/'.$data->id; ?></a></td>
                        <td><?php if(PartnerPersonal::sum(Y::user()->id, $data->id,"t",$data->affKomisType)=='fixed')
                        {
                            echo (PartnerPersonal::sum(Y::user()->id, $data->id,"s",$data->affKomis).H::valuta($data->currency));
                        }
                        else
                        {
                            echo PartnerPersonal::sum(Y::user()->id, $data->id,"s",$data->affKomis).'%';
                        } ?>
                        </td>
                        <td><?php echo ($data->affPkomisType=='fixed')?(($data->affPkomis+0).H::valuta($data->currency)):$data->affPkomis.'%'; ?></td>
                        <td><?php echo CHtml::link('материалы',array('amd','id'=>$data->id)); ?></td>
                               
                      </tr>
                    <?php }} ?>

                  </tbody>
                </table>


                <p style="    color: #555;
    border: 1px solid #b9b9b9;
    padding: 10px;
    border-radius: 10px;
    margin-right: 25px;
    margin-top: 20px;"><b>Ссылка для привлечения партнёров в партнёрскую программу:</b><br><br>
                <a target="_blank" href="<?=Y::bu().'go/'.Yii::app()->user->id?>/a"><?=Y::bu().'go/'.Yii::app()->user->id?>/a</a>
                
            </div>
        <?php } ?>

           

        </div>
    </div>
