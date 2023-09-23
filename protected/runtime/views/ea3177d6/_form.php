<?php /* source file: /home/user/web/psi-in.ru/public_html/ob/protected/modules/admin/views/good/_form.php */ ?>


	<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Товары</h1>
                    <small class="text-muted"><?php echo $this->pageTitle; ?></small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <div class="panel panel-default">
            	<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'good-form',
					'enableAjaxValidation'=>false,
				)); ?>

				<div class="validerror"><?= $form->errorSummary($model); ?></div>

				<fieldset>

				<legend>Основная информация о товаре</legend>

				<ol>
				        <?php if ($model->isNewRecord): ?>
				        
					<li>
						<?= $form->labelEx($model,'id'); ?>
						<?= $form->textField($model,'id',array('size'=>60,'maxlength'=>100, 'class' => 'text')); ?>
						<?= $form->error($model,'id'); ?>
					</li>
				        
				        <?php endif; ?>

					<li>
						<?= $form->labelEx($model,'category_id'); ?>
						<?= $form->dropDownList($model,'category_id',Category::items (),array('class'=>'select')); ?>
						<?= $form->error($model,'category_id'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'title'); ?>
						<?= $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'title'); ?>
					</li>
				        
					<li>
						<?= $form->labelEx($model,'price'); ?>
						<?= $form->textField($model,'price',array('class'=>'numeric')); ?>
						<?= $form->error($model,'price'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'currency'); ?>
						<?= $form->dropDownList($model,'currency',Lookup::items ('Valuta'), array('class' => 'select')); ?>
						<?= $form->error($model,'currency'); ?>
					</li>
				        

					<li>
						<?= $form->labelEx($model,'description'); ?>
						<?= $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class' => 'textarea')); ?>
						<?= $form->error($model,'description'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'image'); ?>
						<?= $form->textField($model,'image',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'image'); ?>
					</li>

					
					<li>
						<?= $form->labelEx($model,'position'); ?>
						<?= $form->textField($model,'position',array('class'=>'numeric')); ?>
						<?= $form->error($model,'position'); ?>
					</li>


					<li>
						<?= $form->labelEx($model,'kind'); ?>
						<?= $form->dropDownList($model,'kind',Lookup::items ('GoodKind'),array('class' => 'select')); ?>
						<?= $form->error($model,'kind'); ?>
					</li>
				        
					<li>
						<?= $form->labelEx($model,'dlink'); ?>
						<?= $form->textField($model,'dlink',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'dlink'); ?>
					</li>                
				        
					       
				        
					<li>
						<?= $form->labelEx($model,'used'); ?>
						<?= $form->dropDownList($model,'used',Lookup::items('Visible'),array('class'=>'select')); ?>
						<?= $form->error($model,'used'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'mli'); ?>
						<?= $form->dropDownList($model,'mli',Lookup::items('Visible'),array('class'=>'select')); ?>
						<?= $form->error($model,'mli'); ?>
					</li> 
					
					<li>
						<?= $form->labelEx($model,'mlgroup'); ?>
						<?= $form->textField($model,'mlgroup',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'mlgroup'); ?>
					</li> 
					<?php if(Settings::item('sendpulseID')!="" && Settings::item('sendpulseSecret')!="") { ?>
					<li>
						<label for="Good_sendpulseGroup" class="required">Выберите группу для сохранения SendPulse</label>						
						<select class="select" name="Good[sendpulseGroup]" id="Good_sendpulseGroup">
							<option value="0">Выберите группу</option>
							<?php $lists =  Sendpulse::getLists(); 
				        		  if($lists) { foreach ($lists as $list) { ?>
				        		  	 <option <?php if($model->sendpulseGroup==$list->id) { echo "selected"; } ?> value="<?php echo $list->id; ?>"><?php echo $list->name; ?></option>
				        		 <?php  }}
				        	?>
						</select>											
					</li>
					<?php } ?>   

				</ol>

				</fieldset>

				<br>

				<?=H::moredivAll ('настройки авторства','lol') ?>
				<fieldset>
				    <legend>Авторство</legend>
				    <br>
					<ol>
						<li>
							<?= $form->labelEx($model,'author_id'); ?>
							<?= $form->dropDownList($model,'author_id',array_merge (array('' => '(автор не задан)'), Author::items()),array('class'=>'select')); ?>
							<?= $form->error($model,'author_id'); ?>
						</li>
					        
						<li>
							<?= $form->labelEx($model,'authorKomis'); ?>
							<?= $form->textField($model,'authorKomis',array('class'=>'numeric')); ?>
							<?= $form->error($model,'authorKomis'); ?>
						</li>                
					        
						<li>
							<?= $form->labelEx($model,'aukind'); ?>
							<?= $form->dropDownList($model,'aukind',array ('price' => '% от стоимости товара', 'total' => '% от прибыли (цена товара минус комиссия партнёрам)'),array('class'=>'select')); ?>
							<?= $form->error($model,'aukind'); ?>
						</li> 
					</ol>
					
					<ol class="author2 <?php if($model->authorKomis2>0) {echo "active";} ?>">
						<li>
							<?= $form->labelEx($model,'author_id2'); ?>
							<?= $form->dropDownList($model,'author_id2',array_merge (array('' => '(автор не задан)'), Author::items()),array('class'=>'select')); ?>
							<?= $form->error($model,'author_id2'); ?>
						</li>
					        
						<li>
							<?= $form->labelEx($model,'authorKomis2'); ?>
							<?= $form->textField($model,'authorKomis2',array('class'=>'numeric')); ?>
							<?= $form->error($model,'authorKomis2'); ?>
						</li>                
					        
						<li>
							<?= $form->labelEx($model,'aukind2'); ?>
							<?= $form->dropDownList($model,'aukind2',array ('price' => '% от стоимости товара', 'total' => '% от прибыли (цена товара минус комиссия партнёрам)'),array('class'=>'select')); ?>
							<?= $form->error($model,'aukind2'); ?>
						</li> 
					</ol>

					<ol  class="author3 <?php if($model->authorKomis3>0) {echo "active";} ?>">
						<li>
							<?= $form->labelEx($model,'author_id3'); ?>
							<?= $form->dropDownList($model,'author_id3',array_merge (array('' => '(автор не задан)'), Author::items()),array('class'=>'select')); ?>
							<?= $form->error($model,'author_id3'); ?>
						</li>
					        
						<li>
							<?= $form->labelEx($model,'authorKomis3'); ?>
							<?= $form->textField($model,'authorKomis3',array('class'=>'numeric')); ?>
							<?= $form->error($model,'authorKomis3'); ?>
						</li>                
					        
						<li>
							<?= $form->labelEx($model,'aukind3'); ?>
							<?= $form->dropDownList($model,'aukind3',array ('price' => '% от стоимости товара', 'total' => '% от прибыли (цена товара минус комиссия партнёрам)'),array('class'=>'select')); ?>
							<?= $form->error($model,'aukind3'); ?>
						</li> 
					</ol>
					
					<style>
						.author2, .author3{
							display:none;
						}

						.author2.active, .author3.active{
							display:block;
						}

						.add_author{
						    margin-left: 35px;
						    padding: 10px;
						    margin-top: 20px;
						    display: block;
						    width: 230px;
						    background: #7266ba;
						    color: #fff !important;
						}

						.add_author:hover{
							color:#fff;
						}

					</style>

					
					 <?php if($model->authorKomis3<=0) {?><a href="" class="add_author">Добавить еще одного автора</a><?php } ?>
				</fieldset>
				<br>
				</div>
				<?=H::moredivAll ('текст письма после оплаты','l') ?>
				
				<fieldset>

				    <legend>Письмо после оплаты</legend>

				    <br>

				<ol>
				    
					<li>
						<?= $form->labelEx($model,'letterSubject'); ?>
						<?= $form->textField($model,'letterSubject',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'letterSubject'); ?>
					</li>    

					<li>
						<?= $form->labelEx($model,'letterType'); ?>
						<?= $form->dropDownList($model,'letterType',Lookup::items('Letter'),array('class'=>'select')); ?>
						<?= $form->error($model,'letterType'); ?>
					</li>
				        
					<li>
						<?= $form->labelEx($model,'letterText'); ?>
						<?= $form->textArea($model,'letterText',array('rows'=>6, 'cols'=>50, 'class' => 'textarea')); ?>
						<?= $form->error($model,'letterText'); ?>
					</li>        
				        
				</ol>
				</fieldset>        

				<br>
				</div>

				<?=H::moredivAll ('параметры партнёрской программы') ?>
				<fieldset>

				    <legend>Параметры партнёрской программы</legend>

				    <br>

				<ol>

					<li>
						<?= $form->labelEx($model,'affOn'); ?>
						<?= $form->dropDownList($model,'affOn',Lookup::items('Visible'),array('class'=>'select')); ?>
						<?= $form->error($model,'affOn'); ?>
					</li>
				        
					<li>
						<?= $form->labelEx($model,'affOrder'); ?>
						<?= $form->dropDownList($model,'affOrder',Lookup::items('KomisOrder'),array('class'=>'select')); ?>
						<?= $form->error($model,'affOrder'); ?>
					</li>
				        

					<li>
						<?= $form->labelEx($model,'affLink'); ?>
						<?= $form->textField($model,'affLink',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'affLink'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'affKomis'); ?>
						<?= $form->textField($model,'affKomis',array('class'=>'numeric')); ?>
						<?= $form->error($model,'affKomis'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'affKomisType'); ?>
						<?= $form->dropDownList($model,'affKomisType',Lookup::items('KomisType'),array('class'=>'select')); ?>
						<?= $form->error($model,'affKomisType'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'affPkomis'); ?>
						<?= $form->textField($model,'affPkomis',array('class'=>'numeric')); ?>
						<?= $form->error($model,'affPkomis'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'affPkomisType'); ?>
						<?= $form->dropDownList($model,'affPkomisType',Lookup::items('KomisType'),array('class'=>'select')); ?>
						<?= $form->error($model,'affPkomisType'); ?>
					</li>

					<li>
						<?= $form->labelEx($model,'affShow'); ?>
						<?= $form->dropDownList($model,'affShow',Lookup::items('Visible'),array('class'=>'select')); ?>
						<?= $form->error($model,'affShow'); ?>
					</li>

				</ol>
				</fieldset>

				
				<br>
				</div>

				<?=H::moredivAll ('дополнительные параметры','b') ?>
				<fieldset>

				    <legend>Дополнительные параметры</legend>

				    <br>
				<ol>
				    
					<li>
						<?= $form->labelEx($model,'nalozhOn'); ?>
						<?= $form->dropDownList($model,'nalozhOn',Lookup::items('Visible'),array('class'=>'select')); ?>
						<?= $form->error($model,'nalozhOn'); ?>
					</li>    
				        
					<li>
						<?= $form->labelEx($model,'kurier'); ?>
						<?= $form->dropDownList($model,'kurier',Lookup::items('Visible'),array('class'=>'select')); ?>
						<?= $form->error($model,'kurier'); ?>
					</li>            
				        
					<li>
						<?= $form->labelEx($model,'kurstrany'); ?>
						<?= $form->textField($model,'kurstrany',array('class' => 'select')); ?>
						<?= $form->error($model,'kurstrany'); ?>
					</li>

				        
					<li>
						<?= $form->labelEx($model,'kurgorod'); ?>
						<?= $form->textField($model,'kurgorod',array('class' => 'select')); ?>
						<?= $form->error($model,'kurgorod'); ?>
					</li>        
				        		        
					

					<li>
						<?= $form->labelEx($model,'getUrl'); ?>
						<?= $form->textField($model,'getUrl',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'getUrl'); ?>
					</li>
				        
				    							        
				</ol>
				</fieldset>
				</div>

				
				<?=H::moredivAll ('параметры Корзины','c') ?>
				<fieldset>				
				    <legend>Параметры Корзины</legend>				
				    <br>
				<ol>		
					<li>
						<?= $form->labelEx($model,'cartOn'); ?>
						<?= $form->dropDownList($model,'cartOn',Lookup::items('Visible'),array('class'=>'select')); ?>
						<?= $form->error($model,'cartOn'); ?>
					</li>
				
					<li>
						<?= $form->labelEx($model,'cartGoods'); ?>
						<?= $form->textField($model,'cartGoods',array('size'=>60,'maxlength'=>255, 'class' => 'text')); ?>
						<?= $form->error($model,'cartGoods'); ?>
					</li>
				
					<li>
						<?= $form->labelEx($model,'cartMinus'); ?>
						<?= $form->textField($model,'cartMinus',array('class'=>'numeric')); ?>
						<?= $form->error($model,'cartMinus'); ?>
					</li>
				        
					<li>
						<?= $form->labelEx($model,'cartText'); ?>
						<?= $form->textArea($model,'cartText',array('rows'=>6, 'cols'=>50, 'class' => 'textarea')); ?>
						<?= $form->error($model,'cartText'); ?>
					</li>        
				        
				</ol>
				</fieldset>
				</div>

				
				

				<fieldset class="submit">
						<?= CHtml::submitButton($model->isNewRecord ? 'Добавить товар' : 'Сохранить изменения', array ('class' => 'submit btn m-b-xs  btn-primary btn-addon btn-lg')); ?>
				</fieldset>

				<?php $this->endWidget(); ?>
			</div>

        </div>
    </div>
