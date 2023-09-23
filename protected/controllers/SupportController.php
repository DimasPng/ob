<?php

class SupportController extends Controller
{
	/**
	 * Главное окно страницы поддержки
	 */
	public function actionIndex()
	{
		$this->render('/support/index');
	}

	/**
	 * Создание нового тикета
	 */
	public function actionNewTicket()
	{
		$model=new Ticket;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ticket']))
		{                    
                    
			$model->attributes=$_POST['Ticket'];
			$model->id = '0'; //Защита от перепределения ID
                        //
                        //Чистим возможные теги [QUOTE]
                        $model->message = str_replace ('[QUOTE]','',$model->message);
                        $model->message = str_replace ('[/QUOTE]','',$model->message);
                        
			if($model->save()) {

                                //Загружаем файлы
                                $needSaveAgain = FALSE;
                                for ($i=1; $i<=4; $i++) {
                                    $nm = 'file'.$i;

                                    if (Settings::item('staffUploadOn')) {
                                    //Если файлы переданы - сохраняем их
                                    $model->$nm=CUploadedFile::getInstance($model,$nm);
                                        if ($model->$nm!=NULL) {
                                            //Генерируем имя файла
                                            $fname = H::random_string('alnum',64).'.'.$model->$nm->extensionName;
                                            $model->$nm->saveAs('./userfiles/'.$fname);
                                            $model->$nm = $fname;
                                            $needSaveAgain = TRUE;
                                        }
                                    } else {
                                        $model->$nm = '';
                                        $needSaveAgain = TRUE;
                                    }
                                }
                                //Сохраняем заново
                                if ($needSaveAgain) {
                                    $model->save();
                                }
                                
                                if (Settings::item ('supportLetter')) {
                                        //Отправка письма по почте

                                        //Готовим данные для отправки
                                        $data = array (
                                                'id' => $model->id,
                                                'name' => $model->firstName,
                                                'subject' => $model->subject,                                 
                                        );

                                        Mail::letter ('staff_new_ticket',$model->email,$model->firstName,$data);
                                        
                                }
                                
                                //Отправка письма администратору
                                        $data = array (
                                                'id' => $model->id,
                                                'name' => $model->firstName,
                                                'subject' => $model->subject,
                                                'body' => $model->message,
                                                'email' => $model->email,
                                        );

                                        Mail::letter ('admin_new_ticket',$model->staff->email,$model->staff->firstName,$data);
                                
                                

				//Передаём тикет
				Yii::app()->user->setFlash ('ticketId',$model->id);

				$this->redirect(array('support/okticket'));
			}
		} else {
			$model->priority_id = 2;
		}
                //{KG}

		$this->render('/support/newticket', array (
		       'model'=>$model,
		   ));
	}

	/**
	 * Получение ссылки на просмотр существующего тикета
	 */
	public function actionOpenTicket()
	{

		$model=new FindTicket;
		if(isset($_POST['FindTicket']))
		{
			$model->attributes=$_POST['FindTicket'];
			if($model->validate())
			{
				$ticket = $this->loadModel ($model->id);
				$hash = Ticket::hashTicket($ticket->id);

				$this->redirect (array ('/support/viewticket',
					'ticket_id' => $ticket->id,
					'hash' => $hash,
				));

			}
		}

		$this->render('/support/openticket',array('model'=>$model));
	}

	/**
	 * Показывается после создания тикета
	 */
	public function actionOkTicket ()
	{
		$data = array (
			'ticketId' => Y::user()->getFlash ('ticketId'),
		);
		if (empty($data['ticketId'])) {
			 throw new CHttpException(403, Yii::t('ticket', 'Не указан ID тикета или форма была отправлена повторно - дважды тикет создан не будет'));
		}
		$data['ticketHash'] = Ticket::hashTicket($data['ticketId']);
		$this->render('/support/okticket',$data);
                //{KG}
	}

	/**
	 * Отображение существующего тикета
	 */
	public function actionViewTicket ($ticket_id = FALSE, $hash = FALSE)
	{
		//Проверка формата
		if (!preg_match ('/^[a-z0-9]{12}$/',$ticket_id) OR (!preg_match('/^[a-z0-9]{32}$/',$hash))) {
			throw new CHttpException(403, 'Wrong or error ticket view URL');
		}

		//Проверяем хэш
		if (Ticket::hashTicket($ticket_id)!==$hash) {
			throw new CHttpException(403, 'Ticket Hash error');
		}

		$answer = new TicketAnswer ();

		if(isset($_POST['TicketAnswer']))
		{
                    
			$ticket = $this->loadModel ($ticket_id);                    
                        
			$answer->attributes=$_POST['TicketAnswer'];
			$answer->id = 0;
			$answer->ticket_id = $ticket_id; //Защита от перепределения ID
			$answer->staff_id = $ticket->staff_id;
			$answer->kind = 'you';
                        $answer->message = str_replace ('[QUOTE]','',$answer->message);
                        $answer->message = str_replace ('[/QUOTE]','',$answer->message);

			if($answer->save()) {

				//Открываем тикет
				$ticket->open ();

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
                                
                                //Отправляем админу о добавлении нового ответа
                                $data = array (
                                      'id' => $ticket->id,
                                      'name' => $ticket->firstName,
                                      'subject' => $ticket->subject,
                                      'body' => $answer->message,
                                      'email' => $ticket->email,
                                );

                                Mail::letter ('admin_modify_ticket',$ticket->staff->email,$ticket->staff->firstName,$data);
                                


				Y::user()->setFlash ('ticket', Yii::t ('answer','Новый ответ добавлен'));

				$this->redirect (array ('/support/viewticket',
					'ticket_id' => $ticket_id,
					'hash' => $hash,
				));
			}
		}
                //{KG}

		//Если всё в порядке - отображаем тикет
		$this->render('/support/viewticket',array(
		    'model'=>$this->loadModel($ticket_id),
		    'answer' => $answer,
		    'ticketHash' => $hash,
		));

	}

	/**
	 * Закрытие тикета
	 */
	public function actionCloseTicket ($ticket_id = FALSE, $hash = FALSE)
	{
		//Проверка формата
		if (!preg_match ('/^[a-z0-9]{12}$/',$ticket_id) OR (!preg_match('/^[a-z0-9]{32}$/',$hash))) {
			throw new CHttpException(403, 'Wrong or error ticket view URL');
		}

		//Проверяем хэш
		if (Ticket::hashTicket($ticket_id)!==$hash) {
			throw new CHttpException(403, 'Ticket Hash error');
		}

		$ticket = $this->loadModel($ticket_id);
		$ticket->close ();

		//Редирект на просмотр тикета
		$this->redirect (array ('/support/viewticket',
			'ticket_id' => $ticket_id,
			'hash' => $hash,
		));

	}

	/**
	 * Показывает категорию статей
	 */
	public function actionBase ($category = FALSE)
	{
		if ($category === FALSE) {

			$categories = $models=ArticleCategory::model()->findAll(array(
			    'order'=>'position',
			));

			$this->render('/support/base',array(
			    'categories'=>$categories,
			));

			return TRUE;
		}

		if (!is_numeric ($category)) {
			throw new CHttpException(404, 'Не найдена категория');
		}

		$model = $this->loadCategory($category);
                //{KG}

		//Если всё в порядке - отображаем список
		$this->render('/support/category',array(
		    'model'=>$model,
		));

	}

	public function actionArticle ($id = FALSE) {
		if (!is_numeric ($id)) {
			throw new CHttpException(404, 'Не найдена статья');
		}

		$model = $this->loadArticle($id);
                
                if (!$model->visible) die ('Извините, но данная статья временно скрыта');

		//Если всё в порядке - отображаем тикет
		$this->render('/support/article',array(
			'model'=>$model,
		));

	}

	/**
	 * Устанавливает layout для службы поддержки
	 */
	public function init ()
	{
		parent::init ();
		$this->layout = '//layouts/support';
	}

	/**
	 * Указание action для каптчи
	 */
	public function actions(){
		return array(
		    'captcha'=>array(
		        'class'=>'MyCCaptchaAction',
		        'backColor'=>0xFFFFFF,
		    ),
		);
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
			throw new CHttpException(404,'Тикета с таким ID не существует.');
		return $model;
	}

	public function loadCategory($id)
	{
		$model=ArticleCategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Категории с таким ID не существует.');
		return $model;
	}

	public function loadArticle($id)
	{
		$model=Article::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Статьи с таким ID не существует.');
		return $model;
	}

	public function beforeAction ($action) {

		switch (strtolower($action->id)) {

			case 'index':
			case 'viewticket':
			case 'closeticket':
			case 'newticket':
			case 'okticket':
			case 'openticket':

				if (Settings::item('staffOn')==FALSE) {
					throw new CHttpException(404,'Служба поддержки отключена.');
				}

			break;

			case 'base':
			case 'article':

				if (Settings::item('staffBaseOn')==FALSE) {
					throw new CHttpException(404,'База знаний отключена.');
				}

		}

		return parent::beforeAction ($action);
	}

}