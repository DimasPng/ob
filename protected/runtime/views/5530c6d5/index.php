<?php /* source file: /home/admin/web/psi-in.ru/public_html/ob/protected/modules/admin/views/default/index.php */ ?>
<?php $this->pageTitle='Главная' ?>
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Здравствуйте, <?=Y::user()->firstName ?>!</h1>
</div>
<div class="wrapper-md">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <!-- <div class="col-sm-6">
          <div class="panel no-border">
            <div class="panel-heading bg-primary lt">
              <div class="m-sm">
                <span class="pull-right"><i class="fa fa-caret-up text-warning text-lg"></i></span>
                <span class="h4 text-white">Общая статистика</span>
              </div>              
              <div class="text-center m-t-md">
                <?php 
                    $goods = Good::model ()->findAll (
                                        //'used = 1'
                                );
                     $thegood = '';
        
                    $startDate = time () - 31536000;
                    $stopDate = time ();
        
                    $gl = array ();
        
                    foreach ($goods as $one) {
                        $gl[$one->id] = $one->title;
                    }
                    $goodList = $gl;
                    $gg = $goodList;
        
                    $query = "((createDate > $startDate AND createDate < $stopDate AND (status_id='waiting' OR status_id='cancelled' OR status_id='nalozh' OR status_id='nalozh_confirmed' OR status_id='nalozh_sent' OR status_id='nalozh_back'))";
                    $query .= " OR (payDate > $startDate AND payDate < $stopDate AND (status_id='approved' OR status_id = 'processing' OR status_id='sent' OR status_id='nalozh_ok')))"; 
        
        
                    $porders = Order::model()->findAll('payDate > '.$startDate.' AND payDate < '.$stopDate.' AND (status_id = "approved" OR status_id="processing" OR status_id="sent" OR status_id="nalozh_ok")');
        
        
                    $orders = Order::model()->findAll($query);
        
                    $stat = Order::groupMonth($porders,$startDate,$stopDate);
        
                    //print_r($stat); 
                    $k=0;
                    $str_stat="";
                    foreach($stat as $val){
                       
                       $k++; 
                       if($k==1) {continue;}
                       $l=$k-1;
                       $str_stat.="[".$l.",".$val['sum']."],";
                    }
        
                    $str_stat = substr($str_stat, 0, -1);
        
                    ?>
        
        
                 <div ui-jq="plot" ui-options="
                  [
                    { data: [ <?php echo $str_stat; ?> ], points: { show: true, radius: 6}, splines: { show: true, tension: 0.45, lineWidth: 5, fill: 0 } }
                  ], 
                  {
                    colors: ['#23b7e5'],
                    series: { shadowSize: 3 },
                    xaxis:{ 
                      font: { color: '#ccc' },
                      position: 'bottom',
                      ticks: [
                        [ 1, 'Jan' ], [ 2, 'Feb' ], [ 3, 'Mar' ], [ 4, 'Apr' ], [ 5, 'May' ], [ 6, 'Jun' ], [ 7, 'Jul' ], [ 8, 'Aug' ], [ 9, 'Sep' ], [ 10, 'Oct' ], [ 11, 'Nov' ], [ 12, 'Dec' ]
                      ]
                    },
                    yaxis:{ font: { color: '#ccc' } },
                    grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#ccc' },
                    tooltip: true,
                    tooltipOpts: { content: '%x.1 is %y.4',  defaultTheme: false, shifts: { x: 0, y: 20 } }
                  }
                " style="height:240px" ></div>
                  
                  <div ui-jq="sparkline" ui-options="[ 10,9,11,10,11,10,12,10,9,10,11,9,8 ], 
                  {type:'bar', height:60, barWidth:4, barSpacing:6, barColor:'#7266ba'}
                  " class="sparkline inline m-t m-b-n-sm"></div>
              </div>
            </div>
            <div class="hbox bg-primary bg">
              <div class="col wrapper">
                <span>Оплаченных счетов</span>
                <div class="h1 text-info font-thin"><?=$data['paidBill']?></div>
              </div>
              <div class="col wrapper bg-info">
                <span>Общий доход</span>
                <div class="h1 text-warning font-thin"><?=H::mysum(H::indv($data['totalSum'],'rur'))?> <?=H::dv(1)?> (<?=H::mysum($data['totalSumUsd'])?>$)</div>
              </div>
            </div>
            <div class="panel-footer bg-light lter wrapper">
              <div class="row">
                <div class="col-xs-4">
                  <small class="text-muted block">Товаров</small>
                  <span class="text-md"><?=$data['goodsCount']?></span>
                </div>
                <div class="col-xs-4">
                  <small class="text-muted block">Клиентов</small>
                  <span class="text-md"><?=$data['clientsCount']?></span>
                </div>
                <div class="col-xs-4">
                  <small class="text-muted block">Партнеров</small>
                  <span class="text-md"><?=$data['partnersCount']?></span>
                </div>
              </div>
            </div>
          </div>
        </div> -->
                          <div class="col-sm-6">
                              <!-- main header -->                           
                                  <div class="panel panel-default">
                                      <?php $xx = StaffAccess::allowed('main'); ?>
                                      <?php if (empty($xx) OR (in_array('index',$xx))): ?>
                                      <fieldset>
                                        <style>
                                          .oneitem{
                                            margin-bottom:5px;
                                          }
                                        </style>
                                            <legend>Статистика магазина</legend>

                                        <ol>

                                        <li>
                                        <label>Всего товаров:</label>
                                        <div class="oneitem"><?=$data['goodsCount']?></div>
                                        </li>

                                        <li>
                                        <label>Всего клиентов:</label>
                                        <div class="oneitem"><?=$data['clientsCount']?></div>
                                        </li>

                                        <li>
                                        <label>Всего партнёров:</label>
                                        <div class="oneitem"><?=$data['partnersCount']?></div>
                                        </li>

                                        <li>
                                        <label>Всего кликов:</label>
                                        <div class="oneitem"><?=$data['clicksCount']?></div>
                                        </li>

                                        <li>&nbsp;</li>

                                        <li>
                                       <label>Писем в очереди:</label>
                                       <div class="oneitem"><span style="color:#C00"><?=Queue::model ()->count (); ?></span> &nbsp; <?=CHtml::link ('просмотреть очередь &gt;&gt;',array ('queue/index')); ?></div>
                                       </li>
                                       
                                       <li>
                                       <label>Последняя рассылка:</label>
                                       <span class="oneitem"><span style="color:#036"><?=(Settings::item ('cronRass')>1)?date('d.m.Y H:i:s',Settings::item ('cronRass')):'никогда'?></span></span>
                                       </li>
                                       
                                       
                                       <li>&nbsp;</li>

                                        <li>
                                        <label>Всего счетов:</label>
                                        <div class="oneitem"><?=$data['totalBill']?></div>
                                        </li>

                                        <li>
                                        <label>Оплаченных счетов:</label>
                                        <div class="oneitem"><?=$data['paidBill']?></div>
                                        </li>

                                        <li>
                                        <label>Всего заказов:</label>
                                        <div class="oneitem"><?=$data['totalOrder']?></div>
                                        </li>

                                        <li>
                                        <label>Оплаченных заказов:</label>
                                        <div class="oneitem"><?=$data['paidOrder']?></div>
                                        </li>

                                        </ol>
                                        </fieldset>

                                        
                                        <fieldset style="padding-left:20px;">                                            
                                            <!-- <legend>Переход к просмотру статистики</legend> -->

                                        <br>

                                        <style>
                                          @media (max-width: 767px){
                                              .panel-default  table tr{
                                                      display: inline-grid;
                                              }
                                              .panel-default .submit{
                                                width:100%;
                                              }
                                          }
                                        </style>
                                        <table class="one_table" border="0" align="center" width="100%"><tr>
                                        <td align="center">
                                        <form target="_blank" action="<?=Y::bu()?>admin/stat" method="post">
                                            <input type="hidden" name="startDate" value="<?=date('j.m.Y')?>">
                                            <input type="hidden" name="stopDate" value="<?=date('j.m.Y')?>">
                                            <input type="submit" value="Статистика за сегодня" class="submit btn m-b-xs  btn-primary btn-addon btn-lg xxxx">
                                        </form>
                                        </td>

                                        <td align="center">
                                        <form target="_blank" action="<?=Y::bu()?>admin/stat" method="post">
                                            <input type="hidden" name="startDate" value="<?=date('j.m.Y',time()-604800)?>">
                                            <input type="hidden" name="stopDate" value="<?=date('j.m.Y')?>">
                                            <input type="submit" value="Статистика за неделю" class="submit btn m-b-xs  btn-primary btn-addon btn-lg xxxx">
                                        </form>
                                        </td>

                                        <td align="center">
                                        <form target="_blank" action="<?=Y::bu()?>admin/stat" method="post">
                                            <input type="hidden" name="startDate" value="01.01.<?=date('Y')?>">
                                            <input type="hidden" name="stopDate" value="<?=date('j.m.Y')?>">
                                            <input type="submit" value="Статистика за текущий год" class="submit btn m-b-xs  btn-primary btn-addon btn-lg xxxx">
                                        </form>
                                        </td>
                                        </tr>
                                        </table>
                                        <br>

                                        </fieldset>
                                        

                                        <?php else: ?>


                                        <?php endif; ?>

                                      </div>
                            </div>

                            <div class="col-sm-6">
                              <!-- main header -->                           
                                  <div class="panel panel-default">
                                      <?php $xx = StaffAccess::allowed('main'); ?>
                                      <?php if (empty($xx) OR (in_array('index',$xx))): ?>
                                     


                                        <fieldset>
                                        <legend>Прибыль и доходы</legend>
                                        <ol>

                                        <li>
                                        <label>Общий доход:</label>
                                        <div class="oneitem"><?=H::mysum(H::indv($data['totalSum'],'rur'))?> <?=H::dv(1)?> (<?=H::mysum($data['totalSumUsd'])?>$)</div>
                                        </li>

                                        <li>&nbsp;</li>

                                        <li>
                                        <label>Комиссионные:</label>
                                        <div class="oneitem"><?=H::mysum(H::indv($data['totalPSum'],'rur'))?> <?=H::dv(1)?> (<?=H::mysum($data['totalPSumUsd'])?>$)</div>
                                        </li>

                                        <li>
                                        <label>К выплате партнёрам:</label>
                                        <div class="oneitem"><?=H::mysum(H::indv($data['totalPSum2'],'rur'))?> <?=H::dv(1)?> (<?=H::mysum($data['totalPSum2Usd'])?>$)</div>
                                        </li>
                                        <li>
                                        <label>Авторские:</label>
                                        <div class="oneitem"><?=H::mysum(H::indv($data['totalASum'],'rur'))?> <?=H::dv(1)?> (<?=H::mysum($data['totalASumUsd'])?>$)</div>
                                        </li>

                                        <li>
                                        <label>К выплате авторам:</label>
                                        <div class="oneitem"><?=H::mysum(H::indv($data['totalASum2'],'rur'))?> <?=H::dv(1)?> (<?=H::mysum($data['totalASum2Usd'])?>$)</div>
                                        </li>

                                        <li>&nbsp;</li>
                                        <li>
                                        <label>Чистая прибыль:</label>
                                        <div class="oneitem"><?=H::mysum(H::indv($data['cleanSum'],'rur'))?> <?=H::dv(1)?> (<?=H::mysum($data['cleanSumUsd'])?>$)</div>
                                        </li>

                                        </ol>
                                        </fieldset>

                                        <?php else: ?>


                                        <?php endif; ?>

                                        
                                      </div>
                            </div>
      </div>
    </div>
  </div>

