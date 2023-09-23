<?php $this->pageTitle='Рассылка' ?>





<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Рассылка</h1>
                    <small class="text-muted">Рассылка - Выбор получателей</small>
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
				<?=CHtml::form (array ('rass/msg'),'post'); ?>    
    
				<fieldset>
				<legend>Получатели</legend>
				<ol>

				<li >
				<label for="format" style="width:300px;">Выберите, чтобы отправить партнерам:</label>
				<input  style="margin-top:5px;" type="radio" name="type" value="refs">
				</li>

				<li  >
				<label for="format"  style="width:300px;">Выберите, чтобы отправить всем клиентам</label>
				<input  style="margin-top:10px;" type="radio" name="type" value="all_client">
				</li>

				<li   class="tovar_client">
				<label for="format"  style="width:300px;">Выберите, чтобы отправить всем клиентам по товарам</label>
				<input  style="margin-top:10px;" type="radio" name="type" value="tovar_client">
				</li>


				<li >
				<label for="format"  style="width:300px;">Выберите, чтобы отправить всем не оплатившим клиентам:</label>
				<input style="margin-top:10px;" type="radio" name="type" value="wait">
				</li>

				<li  class="tovar_wait">
				<label for="format"  style="width:300px;">Выберите, чтобы отправить всем не оплатившим клиентам по товарам:</label>
				<input style="margin-top:10px;" type="radio" name="type" value="tovar_wait">
				</li>

				<!-- <li  class="tovar_wait">
				<label for="format"  style="width:300px;">Выберите, чтобы отправить всем не активным партнерам</label>
				<input style="margin-top:10px;" type="radio" name="type" value="no_active_partners">
				</li>
				
				<li  class="tovar_wait">
				<label for="format"  style="width:300px;">Выберите, чтобы отправить всем не активным клиентам:</label>
				<input style="margin-top:10px;" type="radio" name="type" value="no_active_clients">
				</li>
				
				<li  class="tovar_wait">
				<label for="format"  style="width:300px;">Отметьте, чтобы отключить не активных согласно настройкам:</label>
				<input style="margin-top:10px;" type="checkbox" name="no_active">
				</li> -->




				<li style="display:none;" class="select_users">
				<!-- <select name="users[]" class="select" id="users" multiple size="20" style="height:300px;">-->
				  <fieldset>
				   <legend>Отметьте товар или несколько товаров:</legend>
				<?php foreach ($goods as $one): ?>
				<div style="display:block;width:100%;"><label style="width:100%;"><input  type="checkbox"  name="users[]" value="gd_<?=$one->id;?>"> <?=$one->title;?></label></div>
				<?php endforeach; ?>
				 </fieldset>
				<!-- </select> -->
				</li>


				</ol>

				</fieldset>

				<fieldset class="submit">
				<input class="submit submit btn m-b-xs  btn-primary btn-addon btn-lg" type="submit"
				value="Продолжить" />
				</fieldset>        

				<?=CHtml::endForm()?>
    
			</div>

        </div>
    </div>
