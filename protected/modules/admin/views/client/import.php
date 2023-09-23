<?php

$this->pageTitle = 'Импорт клиентов';

$this->menu=array(
	array('label'=>'Список клиентов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
);

?>


<?php

$this->pageTitle = 'Экспорт клиентов';

$this->menu=array(
    array('label'=>'Список клиентов', 'url'=>array('index'), 'itemOptions' => array ('class' => 'rmenu_list')),
        array('label'=>'Импорт клиентов', 'url'=>array('import'), 'itemOptions' => array ('class' => 'rmenu_add')),        

);

?>

<div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Клиенты</h1>
                    <small class="text-muted">Импорт клиентов</small>
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
                <br><p>С помощью этой странички Вы можете внести в базу клиентов для заданного ID товара.</p>

                <p>Ваша база должна содержать построчно имена и e-mail адреса, разделённые заданным разделителем</p>

                <p>Укажите Ваш формат вида <b>{email};{uname}</b> - где {email} и {uname} обозначают сооветственно e-mail и имя человека, а знак <b>;</b> будет определён как разделитель.</p>


                <form action="" method="post">

                    <fieldset>
                        
                        <legend>Данные</legend>

                    <ol>

                    <li>
                <label>Выберите товар :</label> </b><?=CHtml::dropDownList ('good',FALSE,Good::items (),array ('class' => 'select')); ?></li>
                    
                        <li><label>Формат:</label><?=CHtml::textField ('format','{email};{uname}',array ('class' => 'longtext text')); ?></li>
                        
                        <li><label>Список клиентов:</label>
                            
                <textarea class="textarea" rows="12" cols="52" name="list"></textarea></li>            

                    </ol>
                    </fieldset>
                    
                    <p style="    margin-left: 15px;    text-align: center;    max-width: 822px;">
                        <input type="submit" value="Добавить клиентов в базу" class="submit btn m-b-xs  btn-primary btn-addon btn-lg">
                    </p>
                    
                </form>

                
            </div>            

        </div>
    </div>

