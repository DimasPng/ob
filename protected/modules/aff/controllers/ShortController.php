<?php

class ShortController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
		    array('allow',
		        'actions'=>array('index','del'),
		        'users'=>array('@'),
		    ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$id = Y::user()->id;

		$model = $this->loadModel($id);
		$short = new Shorten ();                

		$list = Shorten::listItems ($id);

		if(isset($_POST['Shorten']))
		{
			$dd = array ();
			$dd['url'] = $_POST['Shorten']['url'];
			$dd['description'] = $_POST['Shorten']['description'];
			$dd['partner_id'] = $id;

			$short->attributes=$dd;
			if($short->save()) {
				Y::user()->setFlash ('aff', Yii::t ('aff','Короткая ссылка добавлена'));
				$this->redirect(array('/aff/short'));
			}

		}
                //{KG}

		$this->render('/short/index',array(
			'model'=>$model,
			'short'=>$short,
			'slist' => $list,
		));
	}

	public function actionDel ($id)
	{
		if (!is_numeric ($id)) {
			die ('Неверный формат ID');
		}

		
		$short = $this->loadShort ($id);

		$refid = Y::user()->id;

		if ($short->partner_id !== $refid) {
			throw new CHttpException(404,'Эта ссылка Вам не принадлежит');
		}

		$short->delete();

		Y::user()->setFlash ('aff', Yii::t ('aff','Короткая ссылка удалена'));
		$this->redirect(array('/aff/short'));

	}

	public function loadModel($id)
	{
		$model=Partner::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Партнёра с таким ID не существует.');
		return $model;
	}

	public function loadShort($id)
	{
		$model=Shorten::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Ссылки с таким ID не существует.');
		return $model;
	}


}