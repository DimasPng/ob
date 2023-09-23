<?php

class AreaitemController extends Controller
{

	/**
	 * @return array action filters
	 */
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
		        'actions'=>array('index','download'),
		        'users'=>array('@'),
		    ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex($id = FALSE)
	{
		//Тут вставить проверку на число $id

		if (!is_numeric ($id)) {
			throw new CHttpException(404, 'Не найдена категория');
		}

                //Делаем проверку по сроку
                if (Y::user()->payTill<time()) {
                   $this->redirect (array ('end'));
                }

		$criteria=new CDbCriteria(array(
			'condition'=> 'area_section_id = :id AND area_id = :areaId',
			'params' => array (':id' => $id,':areaId' => Y::user()->areaId),
			'order'=>'position ASC',
		));

		$dataProvider=new CActiveDataProvider('AreaItem', array(
			'pagination'=>array(
				'pageSize'=>Settings::item ('areaPerPage'),
			),
			'criteria'=>$criteria,
		));
                
                //{KG}
                
                $model = $this->loadSection ($id);

                if (Y::user()->areaId !== $model->area_id) {
                    die ('Access denied');
                }

		$this->render('index',array(
		    'dataProvider'=>$dataProvider,
		    'model' => $model,
		));

	}

        public function actionDownload ($id,$file) {

            //Делаем проверку по сроку
            if (Y::user()->payTill<time()) {
                   $this->redirect (array ('end'));
            }

            //Верно ли передан ID файла
            if (!is_numeric ($id)) {
                die ('Неверный формат ID');
            }

            $item = $this->loadItem ($id);

            //Проверка на права доступа к этому файлу
            if (Y::user()->areaId !== $item->area_id) {
                die ('Access denied');
            }

            $ffile = $item->filename;


            if (!file_exists ('./files/area/'.$ffile)) die ('File not exists');

            $ff = './files/area/'.$ffile;            
            
            //Выдача в браузер, если .html
            if (strpos ($ff,'.html')!==FALSE) {
                echo file_get_contents ($ff);
                die ();
            }

            if (strpos ($ff,'.php')!==FALSE) {
                include ($ff);
                die ();
            }

            
            Yii::import('ext.helpers.EDownloadHelper');
            
            EDownloadHelper::download ($ff);
            
            
            return TRUE;

        }

        public function loadSection($id)
	{
		$model=AreaSection::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Категории с таким ID не существует.');
		return $model;
	}

       public function loadItem($id)
	{
		$model=AreaItem::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Файла с таким ID не существует.');
		return $model;
	}


}