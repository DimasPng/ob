<?php $this->pageTitle='Выслать товар' ?><?

$this->menu=array(
	array('label'=>'Список товаров', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);
?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Товары</h1>
                    <small class="text-muted">Выслать товар &quot;<?=$model->title?>&quot;</small>
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
				<form method="post">
					<fieldset style="padding:7px">
					<legend>Отправка товара <?=$model->id?> пользователю</legend>
					<ol>
					<li>
					<label for="uname">Имя пользователя:</label>
					<input name="uname" type="text" class="text" value="Пользователь">
					</li>

					<li>
					<label for="email">E-mail пользователя:</label>
					<input name="email" type="text" class="text" value="@">
					</li>
					</ol>

					</fieldset>
					<fieldset class="submit">
					<input class="submit btn m-b-xs  btn-primary btn-addon btn-lg" type="submit" value="Выслать товар" />
					</fieldset>

					</form> 
			</div>

        </div>
    </div>