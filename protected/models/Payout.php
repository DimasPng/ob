<?php

/**
 * This is the model class for table "{{payout}}".
 *
 * The followings are the available columns in table '{{payout}}':
 * @property integer $id
 * @property string $kind
 * @property integer $date
 * @property string $theid
 * @property string $way
 * @property double $sum
 * @property string $valuta
 */
class Payout extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Payout the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{payout}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kind, date, theid, way, sum, valuta', 'required'),
			array('date', 'numerical', 'integerOnly'=>true),
			array('sum', 'numerical'),
			array('kind, valuta', 'length', 'max'=>10),
			array('theid, way, rekv', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kind, date, theid, way, sum, valuta, rekv', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '№',
			'kind' => 'Кому',
			'date' => 'Дата',
			'theid' => 'ID партнёра/автора',
			'way' => 'Способ выплаты',
			'sum' => 'Сумма',
			'valuta' => 'Валюта',
                        'rekv' => 'Реквизиты',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('kind',$this->kind,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('theid',$this->theid,true);
		$criteria->compare('way',$this->way,true);
		$criteria->compare('sum',$this->sum);
		$criteria->compare('valuta',$this->valuta,true);
        	$criteria->compare('rekv',$this->rekv,true);                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort' => array (
                            'defaultOrder' => 'date DESC',
                        ),
			'pagination' => array (
				'pageSize' => Settings::item('adminPage'),
			),                    
		));
	}
}