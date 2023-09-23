<?php

class Payouta extends CActiveRecord
{
        public $ways;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Partner the static model class
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
		return '{{partner}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
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
			'id' => 'RefID',
			'wmz' => 'Webmoney Z',
			'wmr' => 'Webmoney R',
			'rbkmoney' => 'Счёт RBK Money',
			'yandex' => 'Кошелёк Яндекс.Деньги',
			'zpayment' => 'Кошелёк Z-Payment',
			'total' => 'Заработано',
			'paid' => 'Выплачено',
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

                $criteria->addCondition ('total > paid');

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
                        'pagination' => array (
                            'pageSize' => Settings::item('adminPgPayout'),
                        )
		));
	}

        static public function ways ($w1,$w2,$w3,$w4,$w5) {
            $ar = array ();
            $ar[] = empty($w1)?'':Lookup::item ('Purse','wmz');
            $ar[] = empty($w2)?'':Lookup::item ('Purse','wmr');
            $ar[] = empty($w3)?'':Lookup::item ('Purse','rbkmoney');
            $ar[] = empty($w4)?'':Lookup::item ('Purse','yandex');
            $ar[] = empty($w5)?'':Lookup::item ('Purse','zpayment');

            return trim (implode (' ',$ar));

        }

		static public function pay_complete_a ($id) {
				$p =  Author::model()->findByPk ($id);
				
				if ($p->kind=='wmz') { ?>	
					<?=CHtml::form (array('payouts/aok/id/'.$p->id.'/way/wmz')); ?>					
					<input class="submit confirm" type="submit"
					value="Подтвердить WebMoney Z"  style="margin-bottom:10px;"/>					
					</form>
				<?php } ?>

				<?php if ($p->kind=='wmr') { ?>	
					<?=CHtml::form (array('payouts/aok/id/'.$p->id.'/way/wmr')); ?>
					<input class="submit confirm" type="submit"
					value="Подтвердить WebMoney R" style="margin-bottom:10px;"/>
					</form>
				<?php } ?>

				<?php if ($p->kind=='rbkmoney') { ?>
					<?=CHtml::form (array('payouts/aok/id/'.$p->id.'/way/rbkmoney')); ?>
					<input class="submit confirm" type="submit"
					value="Подтвердить RBKMoney" style="margin-bottom:10px;"/>
					</form>
				<?php } ?>

				<?php if ($p->kind=='yandex') { ?>	
					<?=CHtml::form (array('payouts/aok/id/'.$p->id.'/way/yandex')); ?>
					<input class="submit confirm" type="submit"
					value="Подтвердить Яндекс.Деньги" style="margin-bottom:10px;"/>
					</form>
				<?php } ?>

				<?php if ($p->kind=='zpayment') { ?>											
						<?=CHtml::form (array('payouts/aok/id/'.$p->id.'/way/zpayment')); ?>						
						<input class="submit confirm" type="submit"
						value="Подтвердить Z-Payment" style="margin-bottom:10px;" />
						</form>
				<?php } 
		}



		static public function pay_complete ($id) {
				$p =  Partner::model()->findByPk ($id);
				
				if (!empty ($p->wmz) && (Settings::item('affWmz')==1)) { ?>	
					<?=CHtml::form (array('payouts/pok/id/'.$p->id.'/way/wmz')); ?>					
					<input class="submit confirm" type="submit"
					value="Подтвердить WebMoney Z"  style="margin-bottom:10px;"/>					
					</form>
				<?php } ?>

				<?php if (!empty ($p->wmr) && (Settings::item('affWmr')==1)) { ?>	
					<?=CHtml::form (array('payouts/pok/id/'.$p->id.'/way/wmr')); ?>
					<input class="submit confirm" type="submit"
					value="Подтвердить WebMoney R" style="margin-bottom:10px;"/>
					</form>
				<?php } ?>

				<?php if (!empty ($p->rbkmoney) && (Settings::item('affRbk')==1)) { ?>
					<?=CHtml::form (array('payouts/pok/id/'.$p->id.'/way/rbkmoney')); ?>
					<input class="submit confirm" type="submit"
					value="Подтвердить RBKMoney" style="margin-bottom:10px;"/>
					</form>
				<?php } ?>

				<?php if (!empty ($p->yandex) && (Settings::item('affYandex')==1)) { ?>	
					<?=CHtml::form (array('payouts/pok/id/'.$p->id.'/way/yandex')); ?>
					<input class="submit confirm" type="submit"
					value="Подтвердить Яндекс.Деньги" style="margin-bottom:10px;"/>
					</form>
				<?php } ?>

				<?php if (!empty ($p->zpayment) && (Settings::item('affZpayment')==1)) { ?>											
						<?=CHtml::form (array('payouts/pok/id/'.$p->id.'/way/zpayment')); ?>						
						<input class="submit confirm" type="submit"
						value="Подтвердить Z-Payment" style="margin-bottom:10px;" />
						</form>
				<?php } 
		}


		static public function pay_fast ($id) {
				$p =  Partner::model()->findByPk ($id);
				$nazn = 'ПАРТНЁРСКАЯ ПРОГРАММА '.str_replace ('/','',str_replace ('http://','',Settings::item('siteUrl'))).' : Выплата комиссионных';
				$usd = Valuta::usd(($p->total)-($p->paid), "rur");
				$sum = ($p->total)-($p->paid);
				if (!empty ($p->wmz) && (Settings::item('affWmz')==1)) { ?>				
					<form action="wmk:payto" method="get">
					<input type="hidden" name="Purse" value="<?=$p->wmz?>" />
					<input type="hidden" name="Amount" value="<?=$usd?>" />
					<input type="hidden" name="Desc" value="<?=$nazn?>" />
					<input type="hidden" name="BringToFront" value="Y" />
					<input type="submit" value="Передать в Keeper" style="height:22px;" class="confirm"/>
					</form>	
				<?php } ?>



				<?php if (!empty ($p->wmr) && (Settings::item('affWmr')==1)) { ?>				
					<form action="wmk:payto" method="get">
					<input type="hidden" name="Purse" value="<?=$p->wmr?>" />
					<input type="hidden" name="Amount" value="<?=$sum?>" />
					<input type="hidden" name="Desc" value="<?=$nazn?>" />
					<input type="hidden" name="BringToFront" value="Y" />
					<input type="submit" value="Передать в Keeper" style="height:22px;" class="confirm" />
					</form>					
				<?php } ?>

				<?php if (!empty ($p->rbkmoney) && (Settings::item('affRbk')==1)) { ?>				
					<a href="https://rbkmoney.ru/client/innerpayment.aspx" target="_blank" class="confirm">Перейти на сайт RBK Money</a>
				<?php } ?>

				<?php if (!empty ($p->yandex) && (Settings::item('affYandex')==1)) { ?>				
					<form action="https://money.yandex.ru/shop.xml" method="get" target="_blank">
					<input type="hidden" name="scid" value="767" />
					<input type="hidden" name="to-account" value="<?=$p->yandex?>" />
					<input type="hidden" name="sum_k" value="<?=$sum?>" />
					<input type="hidden" name="short-dest" value="<?=$nazn?>" />
					<input type="hidden" name="type" value="numb" />
					<input type="hidden" name="FormComment" value="Выплата комиссионных" />
					<input type="submit" value="Передать на сайт Яндекс.Деньги" style="height:22px;" class="confirm" />
					</form>		
				<?php } ?>

				<?php if (!empty ($p->zpayment) && (Settings::item('affZpayment')==1)) { ?>
						<a href="https://z-payment.ru/pretransfer.php" target="_blank" class="confirm">Перейти на сайт Z-Payment</a>
				<?php } 

        }

		static public function koshelek ($id) {
				$p =  Partner::model()->findByPk ($id);
				if (!empty ($p->wmz)) {echo $p->wmz."</br>"; }
				if (!empty ($p->wmr)) {echo $p->wmr."</br>"; }
				if (!empty ($p->yandex)) {echo $p->yandex."</br>"; }
				if (!empty ($p->rbkmoney)) {echo $p->rbkmoney."</br>"; }
				if (!empty ($p->zpayment)) {echo $p->zpayment."</br>"; }
		}

		static public function koshelek_a ($id) {
				$p =  Author::model()->findByPk ($id);
				if (!empty ($p->purse)) {echo $p->purse."</br>"; }
		}

		

}