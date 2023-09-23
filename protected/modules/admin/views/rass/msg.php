<?php $this->pageTitle='Рассылка' ?>
<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Рассылка</h1>
                    <small class="text-muted">Рассылка - Сообщение</small>
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
					<?=CHtml::form (array ('rass/send'),'post', array (
					    'onSubmit' => 'if(confirm("Вы подтверждаете отправку сообщения?")) return true; else return false;')); ?>    

					<fieldset>

					<legend>Параметры соообщения</legend>

					<ol>

					<li>
					<label for="subject">Тема письма:</label>
					<input class="longtext text" type="text" name="subject" value="<?=$subj?>"/>
					</li>

					<li>
					<label for="format">Формат письма:</label>
					<select name="format" class="select" id="tformat">
					<option value="plain">Текстовый</option>
					<option value="html">HTML-формат</option>
					</select>
					</li>

					<li>
					<label for="priority">Приоритет в очереди:</label>
					<input class="numeric text" type="text" name="priority" value="0"/>
					</li>

					<!-- <li>
					<label for="priority">Ссылка для редиректа (%mail_click%):</label>
					<input class="longtext text" type="text" name="link" value=""/>
					</li> -->

					</ol>

					</fieldset>

					<style>
						#tbody{
							max-width: 500px;
						    margin-left: 20px;
						    height: 350px !important;
						}
					</style>
					<div class="plaintext" id="plain">
					<fieldset>
					<legend>Сообщение (в текстовом формате)</legend>
					<?=CHtml::textarea ('tbody',$msg,array (
						'name' => 'tbody',
						'cols' => 70,
						'rows' => 20,
						'class'=> 'textarea',	
					));?>
					</fieldset>
					</div>

					<div class="htmltext" id="html">
					<fieldset style="padding:10px;">
					<legend>Сообщение (в HTML формате)</legend>

					    <?php $this->widget('application.extensions.my.ckeditor.CKEditor', array(
					'name' => 'hbody',
					        'value' => nl2br(str_replace ('%unsub%','<a href="%unsub%">%unsub%</a>',str_replace('%site_url%','<a href="%site_url%">%site_url%</a>',$msg))),
					'attribute'=>'content',
					'language'=>'ru',
					'editorTemplate'=>'full',
					)); ?>
					</fieldset>
					</div>

					<script type="text/javascript">

						function mysel () {
							if ($('#tformat').find(":selected").val() == 'html') {
								
								$('#html').show ();
								$('#plain').hide ();
								
							}	
							else {
							
								$('#html').hide ();
								$('#plain').show ();
								
							}
						}

						$(function () {	
							
							$('#tformat').change ( function () {
								mysel ();		
							});		
							mysel ();
						
						});
							
					</script>

					</fieldset>

					<div class="plaintext" style="display:none">
					<fieldset>
					<legend>Список получателей (можно редактировать)</legend>
					<textarea name="users" class="textarea" cols="70" rows="10"><?php foreach($users as $one): ?><?=$one->id?>||<?=$one->email?>||<?=($type=='refs')?$one->firstName:$one->uname?>||<?=($type=='refs')?"partner":"client"?>

					<?php endforeach; ?></textarea>
					</fieldset>
					</div>

					<input type="hidden" name="type" value="<?=$type?>">

					<fieldset class="submit">
					<input class="submit btn m-b-xs  btn-primary btn-addon btn-lg" type="submit"
					value="Разослать сообщение" />
					</fieldset>


					</form>
    			
			</div>

        </div>
    </div>



