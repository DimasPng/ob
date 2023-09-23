<?php

class LinksController extends Controller
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
		        'actions'=>array('index','amd','rr'),
		        'users'=>array('@'),
		    ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionRr($id = FALSE)
	{

            if (!$id) die ('No id');
            
            if (!preg_match ('/^[0-9a-z_]+$/',$id)) die ('Bad good id');
            
            //Получаем список материалов для этого товара
            $ads = Ad::model()->findAll (
                    array (
                        'condition' => 'good_id=:id',
                        'params' => array (
                            ':id' => $id,    
                        ),
                        'order'  => 'position ASC',                        
                    )
            );
            
            $good = Good::model()->findByPk ($id);
            
            if (!$good) die ('No good');
            
            $adc = array ();            
            
            if (!empty ($ads)) {
                foreach ($ads as $one) {                    
                    
                    $adc[AdCategory::item($one->adcategory_id)][] = $one;
                }
                    
            }
            
            //{KG}
            

            $this->render('ad', array (
                'adc' => $adc,
                'good' => $good,
            ));
	}
    
    
	public function actionAmd($id = FALSE)
	{

            if (!$id) die ('No id');
            
            if (!preg_match ('/^[0-9a-z_]+$/',$id)) die ('Bad good id');
            
            //Получаем список материалов для этого товара
            $ads = Ad::model()->findAll (
                    array (
                        'condition' => 'good_id=:id',
                        'params' => array (
                            ':id' => $id,    
                        ),
                        'order'  => 'position ASC',                        
                    )
            );
            
            $good = Good::model()->findByPk ($id);
            
            if (!$good) die ('No good');
            
            $adc = array ();            
            
            if (!empty ($ads)) {
                foreach ($ads as $one) {                    
                    
                    $adc[AdCategory::item($one->adcategory_id)][] = $one;
                }
                    
            }
            

            $this->render('ad', array (
                'adc' => $adc,
                'good' => $good,
            ));
	}

	public function actionIndex()
	{

            $model=new Good('search');
            $model->unsetAttributes();  // clear any default values

            $model->used = 1;
            $model->affOn = 1;
            $model->affShow = 1;
           

            //print_r($model);

            $this->render('index',array(
                'model'=>$model,
            ));


            
	}


}