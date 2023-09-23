<?php

class CatalogController extends Controller
{

	public function actionCategory($id = FALSE)
	{
		//Тут вставить проверку на число $id

		if (!is_numeric ($id)) {
			throw new CHttpException(404, 'Не найдена категория');
		}

		$criteria=new CDbCriteria(array(
			'condition'=> 'catalog_on = 1 AND used = 1 AND category_id =:id',
			'params' => array (':id' => $id),
			'order'=>'position ASC',
		));

		$dataProvider=new CActiveDataProvider('Good', array(
			'pagination'=>array(
				'pageSize'=>Settings::item ('catalogPerPage'),
			),
			'criteria'=>$criteria,
		));
                
                //{START}
                //{KG}

		$this->render('/catalog/category',array(
		    'dataProvider'=>$dataProvider,
		    'model' => $this->loadCategory ($id),
		));
                
                //{END}

	}

	public function actionIndex()
	{
            
                //Если не существует главной таблицы - переадресовываем на инсталляцию                
            
                if (!in_array('ob_settings',Yii::app()->db->schema->tableNames)) {
                    $this->redirect (array('install/index'));
                }
                
            
		if (!Settings::item('catalogOn')) {
			$this->redirect (array ('/main/'));
		}      
                //{START}
                //{KG}
                
                

		$categories = $models=Category::model()->findAll(array(
			'condition' => 'visible=1',
		    'order'=>'position',
		));

		$this->render('/catalog/index',array(
		    'categories'=>$categories,
		));
                
                //{END}
	}

	public function actionAjaxcart ($id = FALSE)
	{
		if (preg_match ('/^[a-z0-9_]{1,100}$/',$id)) {
			UsualCart::addGood($id);
		}

		if (Y::isIE()) {
			$ref = Y::request()->urlReferrer;

			if (!empty ($ref)) {
				$this->redirect ($ref);
			}

			$this->redirect (array('/'));
		}

		$this->renderPartial('/catalog/_ajaxcart', array('added' => 1), false, true);
	}

	public function actionCartdel ($id = FALSE, $token = FALSE)
	{

		if (preg_match ('/^[a-z0-9_]{1,100}$/',$id) && is_numeric ($token)) {
				UsualCart::delGood($id, $token);
		}

		$this->redirect (array('/'));
	}

	public function actionAjaxempty ()
	{

		UsualCart::emptyCart();

		if (Y::isIE()) {
			$ref = Y::request()->urlReferrer;

			if (!empty ($ref)) {
				$this->redirect ($ref);
			}

			$this->redirect (array('/'));
		}

		$this->renderPartial('/catalog/_ajaxcart', array() , false, true);
	}


	public function loadCategory($id)
	{
		$model=Category::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Категории с таким ID не существует.');
		return $model;
	}
	/**
	 * Устанавливает layout для каталога
	 */
	public function init ()
	{
		parent::init ();
		$this->layout = '//layouts/main';
	}

}