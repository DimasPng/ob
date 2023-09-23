<?php

class SupportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user actions
				'users'=>array('@'),
				'actions' => StaffAccess::allowed('support'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

            //{KG}
            $this->autoClose ();
            
            $answer = new TicketAnswer ();
            $model = $this->loadModel($id);

            if (Settings::item ('staffFullAccess')!=1) {
                if ((Y::user()->id>1) AND (Y::user()->id <> $model->staff_id)) {

                    Y::user()->setFlash ('admin', Yii::t ('admin','У Вас нет прав на просмотр этого тикета, т.к. Вы не владелец'));
                    $this->redirect(array('support/index'));
                }
            }
                
                
                if (!empty ($model->answers)) {
                    $last = end($model->answers);    
                } else {
                    $last = $model;
                }
                
                
                $answer->message = Yii::t('admin','Здравствуйте, ').$model->firstName.".\r\n\r\n".'[QUOTE]'.$last->message.'[/QUOTE]';
            
		$this->render('view',array(
			'model'=>$model,
                        'answer' => $answer,                        
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id, $a = FALSE)
	{
                if ($a) {
                    
                    $a = TicketAnswer::model ()->findByPk ($id);
                    
                    if ($a) {
                        $tid = $a->ticket_id; 
                        
                            //Удаляем вложения
                            if (!empty ($a->file1)) {
                                $fn = './userfiles/'.$a->file1;
                                if (file_exists ($fn)) {
                                    unlink ($fn);
                                }
                            }
                            if (!empty ($a->file2)) {
                                $fn = './userfiles/'.$a->file2;
                                if (file_exists ($fn)) {
                                    unlink ($fn);
                                }
                            }
                        
                        
                        
                        $a->delete ();
                        
                        Y::user()->setFlash ('admin',Yii::t ('admin','Ответ удален'));
                        $this->redirect (array('view', 'id' => $tid));
                        
                    } else {
                        die ('Answer does not exists');
                    }
                    
                    
                    return TRUE;
                }
            
            
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request

                        //Загружаем модель
                        $model = $this->loadModel($id);

                        //Удаляем все ответы
                        $answers = $model->answers;

                        foreach ($answers as $answ) {
                            if (!empty ($answ->file1)) {
                                $fn = './userfiles/'.$answ->file1;
                                if (file_exists ($fn)) {
                                    unlink ($fn);
                                }
                            }
                            if (!empty ($answ->file2)) {
                                $fn = './userfiles/'.$answ->file2;
                                if (file_exists ($fn)) {
                                    unlink ($fn);
                                }
                            }

                            $answ->delete();
                        }

                        //Удаляем все вложения
                        for ($i=1; $i<=4; $i++) {
                            $fld = 'file'.$i;
                            if (!empty ($model->$fld)) {
                                $fn = './userfiles/'.$model->$fld;
                                if (file_exists ($fn)) {
                                    unlink ($fn);
                                }
                            }
                        }

                        //Удаляем модель
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax'])) {
				Y::user()->setFlash ('admin',Yii::t ('admin','Запись удалена'));
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionTickets($id)
	{
            //{KG}
                $this->autoClose ();
		//Проверяем права доступа оператора к данному отделу
		$allowed = StaffAccess::allowed('departaments');
		if (!empty ($allowed)) {
			//$allowed = explode (',',$allowed);
			if (!in_array($id, $allowed)) {
				throw new CHttpException(403,'Извините, но доступ к этому отделу Вам запрещён.');
			}
		}

		$model=new Ticket('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['Ticket'])) {
			$model->attributes=$_GET['Ticket'];
		} else {
		}

                $model->section_id = $id;
                //Назначаем оператора, если не админ
                if (Settings::item ('staffFullAccess')!=1) {
                    if (Y::user()->id!=1) {
                        $model->staff_id = Y::user()->id;
                    }
                }

		$this->render('tickets',array(
			'model'=>$model,
		));
	}

	//Список категорий
	public function actionIndex ()
	{
		$dataProvider=new CActiveDataProvider('TicketSection', array (
                        'sort' => array (
                            'defaultOrder' => 'position ASC',
                        ),
                ));                
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

        /*
         * Функция по обновлению тикета
         */
        public function actionUpdate ($id) {

            if (!isset ($_POST['Ticket'])) {
                throw new CHttpException(404,'Не переданы данные');
            }

            //Выполняем обновление
            $model = $this->loadModel ($id);
            $tdata = $_POST['Ticket'];
            
            if (Settings::item ('staffFullAccess')!=1) {
                if ((Y::user()->id>1) AND (Y::user()->id <> $model->staff_id)) {

                    Y::user()->setFlash ('admin', Yii::t ('answer','У Вас нет прав на изменение этого тикета, т.к. Вы не владелец'));
                    $this->redirect(array('support/index'));
                }
            }

            if (isset ($tdata['section_id'])) {
                $model->section_id = $tdata['section_id'];
            }
            
            $model->status_id = $tdata['status_id'];
            $model->staff_id = $tdata['staff_id'];
            $model->priority_id = $tdata['priority_id'];

            $model->save (FALSE, array ('status_id','priority_id','staff_id','section_id'));

            Y::user()->setFlash ('admin','Данные тикета изменены');
            $this->redirect(array('view', 'id' => $id));


            

        }

        /*
         * Ответ поддержки на заданный вопрос
         */
        public function actionAnswer ($id) {
                
                //{KG}
		$answer = new TicketAnswer ();

		if (isset($_POST['TicketAnswer']))
		{
                        if (empty($_POST['TicketAnswer']['message'])) {
                            throw new CHttpException(404,'Нужно ввести ответ');
                        }

			$answer->attributes=$_POST['TicketAnswer'];
			$answer->id = 0;
			$answer->ticket_id = $id; //Защита от перепределения ID
			$answer->staff_id = Y::user()->id;
			$answer->kind = 'staff';

                        $ticket = $this->loadModel ($id);

                        if (Settings::item ('staffFullAccess')!=1) {
                            if ((Y::user()->id>1) AND (Y::user()->id <> $ticket->staff_id)) {

                                Y::user()->setFlash ('admin', Yii::t ('answer','У Вас нет прав на изменение этого тикета, т.к. Вы не владелец'));
                                $this->redirect(array('support/index'));
                            }
                        }

			if($answer->save(FALSE)) {

				//Открываем тикет				
				$ticket->open ();

                                //Обновляем статус
                                $ticket->status_id = $answer->status_id;
                                $ticket->save (FALSE);


                                //Загружаем файлы
                                $needSaveAgain = FALSE;
                                for ($i=1; $i<=2; $i++) {
                                    $nm = 'file'.$i;

                                    if (Settings::item('staffUploadOn')) {
                                    //Если файлы переданы - сохраняем их
                                    $answer->$nm=CUploadedFile::getInstance($answer,$nm);
                                        if ($answer->$nm!=NULL) {
                                            //Генерируем имя файла
                                            $fname = H::random_string('alnum',64).'.'.$answer->$nm->extensionName;
                                            $answer->$nm->saveAs('./userfiles/'.$fname);
                                            $answer->$nm = $fname;
                                            $needSaveAgain = TRUE;
                                        }
                                    } else {
                                        $answer->$nm = '';
                                        $needSaveAgain = TRUE;
                                    }

                                }
                                //Сохраняем заново
                                if ($needSaveAgain) {
                                    $answer->save(FALSE);
                                }


                                //Отправка письма по почте

				//Готовим данные для отправки
				$data = array (
					'id' => $ticket->id,
					'name' => $ticket->firstName,
                                        'subject' => $ticket->subject,
                                        'link' => Yii::app()->getBaseUrl (TRUE).'/support/viewticket?ticket_id='.$ticket->id.'&hash='.Ticket::hashTicket ($ticket->id),
				);

				Mail::letter ('staff_answer',$ticket->email,$ticket->firstName,$data);


            			Y::user()->setFlash ('admin', Yii::t ('answer','Новый ответ добавлен'));
                                $this->redirect(array('view', 'id' => $id));
			}
		} else {
                    throw new CHttpException(404,'Не переданы данные.');
                }


        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Ticket::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ticket-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        private function autoClose ()
        {
            if (Settings::item ('staffAutoClose')==0) {
                return FALSE;
            }
            
            //Дата, раньше которой закрывать
            $rdate = time ()-3600*(Settings::item ('staffAutoClose'));
            
            //Получаем тикеты со статусом ожидание и ранее этой даты
            $t = Ticket::model()->findAll (array (
                'condition' => 'status_id = 2 AND updateTime < :date',
                'params' => array (
                    ':date' => $rdate,
                ),                
            ));
            
            foreach ($t as $one) {
                $one->close ();
            }
            
        }
}
