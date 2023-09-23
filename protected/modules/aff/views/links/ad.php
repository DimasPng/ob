<?php $this->pageTitle='Рекламные материалы - Панель партнёра' ?>
  <div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Рекламные материалы</h1>
                    <small class="text-muted">Аккаунт партнёра</small>
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
            <div class="panel panel-default" style="padding-top:20px;">
              <?php if (!(empty($good->ads))): ?>

                <?php echo Ad::repl($good->ads,Yii::app()->user->id,$good->id); ?>

            <?php else: ?>
                
                
            <?php if (count($adc)<1): ?>

            <p><i>В данное время дополнительные рекламные материалы - отсутствуют</i></p>

            <?php else: ?>

            <?php $adn = array (); ?>

            <?php

              foreach ($adc as $cat=>$item) {
              
                $aa = '';
                
                foreach ($item as $banner) {
                
                    $aa .= '<p><b><span style="font-size:16px; color:#003366">'.$banner->title.'</span></b></p>';
                    
                    $aa .= '<br><p>' . Ad::repl($banner->code,Yii::app()->user->id,$good->id) . '</p>';

                    if ($banner->showcode > 0) {
                    
                        $aa .= '<br><p><b>HTML-Код:</b><br><br><textarea cols="60" rows="7" class="textarea" >' . Ad::repl($banner->code,Yii::app()->user->id,$good->id) . '</textarea></p>';
                    
                    }
                            
                    $aa .= '<p>&nbsp;</p>';
                    
                            
                }
                $adn[$cat] = $aa;
              
              }
              
            ?>


            <?php $this->widget('zii.widgets.jui.CJuiTabs', array(
                    'tabs'=>$adn,
                    'htmlOptions' => array ('class' => 'tabs','style' => 'border:0'),
                  )
               ); ?>

            <?php endif; ?>

            <?php endif; ?>
            </div>

              </div>
          </div>


