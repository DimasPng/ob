<?php $this->pageTitle='Короткие ссылки - Панель партнёра' ?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Короткие ссылки</h1>
                    <small class="text-muted">RefID: <?= $model->id ?></small>
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
                 <?php if (!empty ($slist)): ?>
                <div class="items">

                <style> .asdasdasd45 th, .asdasdasd45 td {
                  padding: 10px;
                  text-align: left;
                }
                </style>
                <table  class="asdasdasd45" cellspacing="20">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Короткая ссылка</th>
                        <th>Описание</th>
                        <th>Удалить</th>
                    </tr>
                </thead>

                <?php foreach ($slist as $key=>$one): ?>

                <tr>
                    <td data-label="ID"><a href="<?=$one['url']?>" title="<?=$one['url']?>" target="_blank"><?=$key?></a></td>
                    <td data-label="Короткая ссылка"><?= Y::request()->getBaseUrl(true).'/'.$key ?></td>
                    <td data-label="Описание"><?=CHtml::encode($one['title'])?></td>
                    <td data-label="Удалить"><a href="<?= Y::bu()?>aff/short/del/id/<?=$key?>"><img src="<?= Y::bu()?>images/theme/btn/x.gif" title="Удалить эту ссылку"></a></td>
                </tr>

                <?php endforeach; ?>
                </table>
                </div>

                <?php else: ?>

                <p>Нет коротких ссылок</p>

                <?php endif; ?>

                

                

               <!--  <h3 style="padding-left:20px;">Новая короткая ссылка</h3>
               
               
               <p>Вы можете выбрать в разделе &quot;Реф-ссылки&quot; длинную реф-ссылку и получить короткую</p> -->

                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'short-form',
                    'enableAjaxValidation'=>false,
                )); ?>

                    <div class="validerror">
                        <?php echo $form->errorSummary($short); ?>
                    </div>

                <fieldset>
                <legend>Создать новую короткую ссылку</legend>
                <ol>

                    <li>
                    <div class="row">
                        <?php echo $form->labelEx($short,'url', array('style' => 'width:auto;')); ?>
                        <?php echo $form->textField($short,'url',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
                        <?php echo $form->error($short,'url'); ?>
                    </div>
                    </li>

                    <li>
                    <div class="row">
                        <?php echo $form->labelEx($short,'description'); ?>
                        <?php echo $form->textField($short,'description',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
                        <?php echo $form->error($short,'description'); ?>
                    </div>
                    </li>
                    
                </ol>

                </fieldset>

                <fieldset class="submit">
                <input class="submit btn m-b-xs  btn-primary btn-addon btn-lg" type="submit"
                value="Получить короткую ссылку" />
                </fieldset>

                <?php $this->endWidget(); ?>

            </div>

           

        </div>
    </div>







