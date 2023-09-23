<?php $this->pageTitle = 'История выплат'; ?><?


?>


<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Категории купонов скидок</h1>
                    <small class="text-muted"><?php echo $this->pageTitle; ?></small>
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
                <table class="table" data-empty="Ничего не найдено" data-filter-connectors="false" data-toggle-column="last" ui-jq="footable" ui-options='{
                    "paging": {                                           
                      "enabled": true,
                      "size" : 20
                    },
                    "filtering": {
                      "enabled": true,
                      "placeholder" : "Поиск"
                    },                 
                    "sorting": {
                      "enabled": true
                    }}'>
                    <thead>
                      <tr>
                        <th data-type="html">ID</th>
                        <th  data-type="text">Кому</th>
                        <th data-breakpoints="xs" data-type="date">Дата</th>
                        <th data-breakpoints="xs" data-type="text">ID партнёра/автора   </th>
                        <th data-breakpoints="xs" data-type="text">Способ выплаты</th>
                        <th data-breakpoints="xs" data-type="text">Реквизиты</th>
                        <th data-breakpoints="xs" data-type="number">Сумма</th>
                        <th data-breakpoints="xs" data-type="html" data-sort-use="text">Управление</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php $records = $model->findAll(); ?>
                     <?php foreach($records as $data){ ?>
                      <tr data-expanded="false">
                        <td><?php echo $data->id; ?></td>
                        <td><?php echo ($data->kind=="partner")?"партнёр":"автор"; ?></td>
                        <td><?php echo date ("j.m.Y H:i", $data->date); ?></td>
                        <td><?php echo $data->theid; ?></td>
                        <td><?php echo $data->way; ?></td>
                        <td><?php echo $data->rekv; ?></td>
                        <td><?php echo $data->sum . H::valuta($data->valuta); ?></td>
                        <td>
                            <div>
                               
                                <a href="<?=Y::bua()?>payhistory/delete/id/<?php echo $data->id; ?>" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
                                
                        </div></td>        
                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
            </div>

        </div>
    </div>
