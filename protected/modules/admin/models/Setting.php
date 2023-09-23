<?php

class Setting extends CFormModel
{
	
	public $_attrNames = array();
	public $_attrs = array();

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('kursEur, kursUah, kursUsd, kursAutoMul, kursAuto', 'numerical'),

			array ('mailHost, mailType, mailPort, mailUsername, mailPassword','safe'),

                        array ('adminEmail, adminName, sysEmail, mobile, siteName, copyEmail, siteUrl, dv','safe'),
                        array ('adminEmail, sysEmail, mobile, copyEmail','email'),
                        array ('siteUrl','url'),

                        array ('staffOn, staffBaseOn, staffUploadOn, staffUploadExt, staffUploadMax, supportLetter, staffReverse, staffFullAccess, staffAutoClose','safe'),
			array ('mailLimit','numerical'),


                        //Webmoney
                        array ('payWebmoneyOn, payWmz, payWmr, payWmu, payWme, payWebmoneyKey', 'safe'),

						// яндекс касса
						array ('payYandexkassaOn, payYandexkassaShopid, payYandexkassaScid, payYandexkassaShoppass, payTestYandexkassaOn, payYandexkassaTax, payYandexkassaTaxsystem', 'safe'),

						// атол
						array('login_atol, pass_atol, inn, payment_address, code_group, sno, enable_atol, enable_phone','safe'),


                                    // FreeKassa
                                    array('payFreekassaOn, payFreekassaShopid, payFreekassaShoppass, payFreekassaShoppass2','safe'),

                                    // MegaKassa
                                    array('payMegakassaOn, payMegakassaShopid, payMegakassaShoppass','safe'),

                                    // PayMaster
                                    array('payMasterOn, payMasterShopid, payMasterShoppass','safe'),

                                    // PayMaster
                                    array('payFondyOn, payFondyId, payFondyKey','safe'),

                        //R
                        array ('payRbkmoneyId, payRbkmoneyOn, payRbkmoneyKey','safe'),

                        //R
                        array ('payZpaymentOn, payZpaymentId, payZpaymentKey','safe'),

                        //R
                        array ('payRoboxOn, payRoboxLogin, payRoboxPass1, payRoboxPass2, payRoboxValuta','safe'),

                        //R
                        array ('pay2checkoutOn, pay2checkoutId, pay2checkoutKey','safe'),

                        //R
                        array ('paySmsOn, paySmsId, paySmsKey, paySmsUrl, paySmsCost','safe'),

                        //R
                        array ('payInterkassaOn, payInterkassaId, payInterkassaKey','safe'),
                        //R
                        array ('payEnotOn, payEnotId, payEnotKey, payEnotKey2','safe'),
                        
                        //R
                        array ('payLiqpayOn, payLiqpayId, payLiqpayKey, payLiqpayPhone','safe'),

                        //R
                        array ('paySprypayOn, paySprypayId, paySprypayKey','safe'),

                        //R
                        array ('payPayonlineOn, payPayonlineId, payPayonlineKey','safe'),

				array ('ml, mlp, sendpulseID, sendpulseSecret, sendpulsePartner','safe'),

                        //R
                        array ('payW1On, payW1Id, payW1Key','safe'),

                        //Yandex
                        array ('payYandexOn, payYandexAccount, payYandexKey','safe'),

                        //Paypal
                        array ('payPaypalOn, payPaypalEmail, payPaypalKey','safe'),

                        //Qiwi
                        array ('payQiwiOn, payQiwiId, payQiwiPass','safe'),

                        //Партнёрка
                        array ('affIp, affShared, affLast, affMin, affLink, affWmz, affWmr, affYandex, affRbk, affZpayment','safe'),
                        array ('affCountry, affCity, affUrl, affMaillist, affAbout, affFrom, affNewsOn','safe'),
                    
                    
                        //Настройки для pagination
                        array ('adminPage, catalogPerPage, anewPerPage', 'safe'), 
                    
                        array ('adminPgBill, adminPgOrder, adminPgGood, adminPgAreaFile, adminPgAreaUser, adminPgPayout, adminPgAffnew,'.
                                'adminPgAd, adminPgClient, adminPgCupon, staffPagination, staffBasePagination, adminPgClick', 'safe'),
                    
                        array ('catalogOn,usualCartOn,phoneDisk,phoneEbook,checkBlack,nalozhCountries,firstWay,crossLimit,nalozhEmail,nalozhManual,securebookUrl,cronWord,cronKursRate,mailInterval,notifyOn,notifyLimit,notifyInterval,notifyNalozh,notifyPrepaid,notifyFirst,notifySecond,affAllTrusted, relation_partner, count_click, day_click','safe'),
                    
                    
                        array ('logon, logsendgood, lognewclient, lognewpartner, logneworder, lognewpay, logpin, lognewchange, logpartner, logauthor, logpaypartner, logpayauthor, lognewrass, logsendmail, loglogin', 'safe'), 

                        //Настройки для политики
                        array ('politic, politic_link, politic_oferta', 'safe'), 
                    

		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'kursUsd' => '1 доллар в рублях',
			'kursEur' => '1 евро в рублях',
			'kursUah' => '1 гривня в рублях',
			'kursAuto' => 'Включить',
			'kursAutoMul' => 'Умножить на',
			'dv' => 'Основная валюта',

			'ml' => 'Введите код API',

			'mlp' => 'Код группы партнеров',


                  'sendpulseID' => 'ID',
                  'sendpulseSecret' => 'Secret',
                  'sendpulsePartner' => 'Группа для партнеров',


			//Для раздела "Параметры почты"
			'mailType' => 'Способ отправки',
			'mailLimit' => 'Лимит писем за раз',
			'mailHost' => 'SMTP Хост',
			'mailPort' => 'SMTP порт',
			'mailUsername' => 'SMTP логин',
			'mailPassword' => 'SMTP пароль',

                  //политки                 

                  'politic' => 'Включить политику',
                  'politic_link' => 'Ссылка на политику',
                  'politic_oferta' => 'Ссылка на оферту',

                        //Для раздела поддержка
                        'staffOn'      => 'Поддержка включена',
                        'staffBaseOn'  => 'База Знаний включена',
                        'staffUploadOn'  => 'Вложения разрешены',
                        'staffUploadExt' => 'Типы вложений',
                        'staffUploadMax' => 'Макс. размер (КБ)',
                        'supportLetter'  => 'Новый тикет - письмо',
                        'staffReverse' => 'Отображение ответов',
                        'staffFullAccess' => 'Доступ операторов',
                        'staffAutoClose' => 'Автозакрытие (часов)',                    

                        //Раздел "Мои данные"
                        'adminName' => 'Имя администратора',
                        'adminEmail' => 'E-mail администратора',
                        'sysEmail' =>  'E-mail для оповещения',
                        'copyEmail' =>  'E-mail для копий',
                        'mobile'    => 'Моб. e-mail (если есть)',
                        'siteName'  => 'Название проекта',
                        'siteUrl'   => 'URL проекта',

						//Раздел "АТОЛ"
                        'login_atol' => 'Логин ATOL',
                        'pass_atol' => 'Пароль ATOL',
						'inn' => 'ИНН',
                        'payment_address' => 'Ссылка на сайт',
						'code_group' => 'Код группы',
						'sno' => 'Система налогообложения',
						'enable_atol' => 'Отправлять в АТОЛ?',
								'enable_phone' => 'Передавать телефон',

                        //Платёжные системы
                        //Настройки
                        'payWebmoneyOn' => 'Включить WebMoney',
                        'payWmz' => 'WMZ-кошелёк',
                        'payWmr' => 'WMR-кошелёк',
                        'payWme' => 'WME-кошелёк',
                        'payWmu' => 'WMU-кошелёк',
                        'payWebmoneyKey' => 'Секретный ключ',

						'payYandexkassaOn' => 'Включить YandexKassa',
						'payTestYandexkassaOn' => 'Тестовый режим?',
						'payYandexkassaShopid' => 'ShopID',
						'payYandexkassaScid' => 'SCID витрины',
						'payYandexkassaShoppass' => 'ShopPassword',

                                    'payYandexkassaTax' => 'Ставка НДС',
                                    'payYandexkassaTaxsystem' => 'Система налогообложения',


                        'payRbkmoneyOn' => 'Включить RBK Money',
                        'payRbkmoneyId' => 'ID сайта',
                        'payRbkmoneyKey' => 'Секретное слово',

                        'payZpaymentOn' => 'Включить Z-payment',
                        'payZpaymentId' => 'ID магазина',
                        'payZpaymentKey' => 'Секретный ключ',

                        'payRoboxOn' => 'Включить Робокассу',
                        'payRoboxPass1' => 'Пароль #1',
                        'payRoboxPass2' => 'Пароль #2',
                        'payRoboxLogin' => 'Логин',
                        'payRoboxValuta' => 'Валюта продавца',

                        'pay2checkoutOn' => 'Включить 2CheckOut',
                        'pay2checkoutId' => 'Номер аккаунта',
                        'pay2checkoutKey' => 'Secret Word',
                    
                        'paySmsOn' => 'Включить SMS Coin',
                        'paySmsId' => 'ID смс:банка',
                        'paySmsUrl' => 'Адрес шлюза',
                        'paySmsKey' => 'Секретный ключ',
                        'paySmsCost' => 'Учитывать комиссию',

                        'payInterkassaOn' => 'Включить Интеркассу',
                        'payInterkassaId' => 'ID магазина',
                        'payInterkassaKey' => 'Секретный ключ',
            
                        'payEnotOn' => 'Включить Enot.io',
                        'payEnotId' => 'ID магазина',
                        'payEnotKey' => 'Секретный ключ',
                        'payEnotKey2' => 'Секретный ключ2',
                        
                        'payLiqpayOn' => 'Включить LiqPay',
                        'payLiqpayId' => 'ID мерчанта LiqPay',
                        'payLiqpayPhone' => 'Телефон в LiqPay',
                        'payLiqpayKey' => 'Ключ ("для прочих")',
                    
                        'paySprypayOn' => 'Включить SpryPay',
                        'paySprypayId' => 'ID магазина SpryPay',
                        'paySprypayKey' => 'Секретный ключ',

                        'payYandexOn'   => 'Включить Я.Деньги',
                        'payYandexAccount'  => '№ счёта Я.Деньги',
                        'payYandexKey'  => 'Секретное слово',


                        // FreeKassa
                        'payFreekassaShopid' => 'ID Вашего магазина',
                        'payFreekassaShoppass' => 'Секретное слово',
                        'payFreekassaShoppass2' => 'Секретное слово 2',
                        'payFreekassaOn' => 'Включить Free-kassa',

                        // MegaKassa
                        'payMegakassaShopid' => 'ID Сайта',
                        'payMegakassaShoppass' => 'Секретный ключ',
                        'payMegakassaOn' => 'Включить MegaKassa',

                        // PayMaster
                        'payMasterShopid' => 'ID Сайта',
                        'payMasterShoppass' => 'Секретный ключ',
                        'payMasterOn' => 'Включить PayMaster',

                          // Fondy

                        'payFondyId' => 'ID мерчанта',
                        'payFondyKey' => 'Ключ платежа',
                        'payFondyOn' => 'Включить Fondy',




            'payPaypalOn'   => 'Включить Paypal',
            'payPaypalEmail'  => 'E-mail в Paypal',
            'payPaypalKey'  => 'Проверка подлинности',

                        'payQiwiOn' => 'Включить Qiwi',
                        'payQiwiId' => 'ID магазина Qiwi',
                        'payQiwiPass' => 'API_ID:API_KEY',


            'payW1On' => 'Включить W1',
            'payW1Id' => 'ID магазина W1',
            'payW1Key' => 'Ключ для проверки',


                        'affIp' => 'Блокировать похожие IP',
                        'affShared' => 'Общая реф-ссылка',
                        'affLink' => 'Описание партнёрки',
                        'affMin' => 'Мин. сумма для выплат',
                        'affLast' => 'Начислять комиссионные',
                        'affWmz' => 'Включить WebMoney Z',
                        'affWmr' => 'Включить WebMoney P',
                        'affYandex' => 'Включить Яндекс.Деньги',
                        'affZpayment' => 'Включить Z-Payment',
                        'affRbk' => 'Включить RBK Money',
                        'affCountry' => 'Поле "Страна"',
                        'affCity' => 'Поле "Город"',
                        'affUrl' => 'Поле "URL-сайта"',
                        'affMaillist' => 'Поле "Подписчиков"',
                        'affAbout' => 'Поле "О проекте"',
                        'affFrom' => 'Поле "Откуда узнали"',
                        'affNewsOn' => 'Показывать Новости',                    
                        'affAllTrusted' => 'Все видят e-mail',
						'relation_partner' => 'Закреплять клиентов за партнером при вводе купона',
                    
                        'adminPage' => 'Общее для админки',
                        'catalogPerPage' => 'Товаров в каталоге',
                        'anewPerPage' => 'Новостей в акке партнёра',
                    
                        'adminPgBill'       => 'Счета',
                        'adminPgOrder'       => 'Заказы',
                        'adminPgGood'       => 'Товары',
                        'adminPgAreaFile'       => 'Файлы закрытой зоны',
                        'adminPgAreaUser'       => 'Участники закрытой зоны',
                        'adminPgPayout'       => 'Выплаты',
                        'adminPgAffnew'       => 'Новости',
                        'adminPgAd'       => 'Промо-материалы',
                        'adminPgClient'       => 'Клиенты',
                        'adminPgCupon'       => 'Скидки',
                        'staffPagination'       => 'Поддержка',
                        'staffBasePagination'       => 'База знаний',
                        'adminPgClick' => 'Статистика кликов',
                    
                        'catalogOn' => 'Каталог включён',
                        'usualCartOn' => 'Традиционная корзина',
                        'phoneDisk' => 'Телефон для физич.',
                        'phoneEbook' => 'Телефон для цифр.',
                        'checkBlack' => 'Чёрный список',
                        'nalozhCountries' => 'Страны наложенного',
                        'firstWay' => 'Только один способ',
                        'crossLimit' => 'Лимит кроссела (мин)',
                        'nalozhEmail' => 'Активация по e-mail',
                        'nalozhManual' => 'Подтв. оператором',
                        'securebookUrl' => 'SecureBook кейген URL',
                        'cronWord' => 'Секретное слово Крона',
                        'cronKursRate' => 'Интервал курсов(мин)',
                        'mailInterval' => 'Интервал писем(мин)',
                        'notifyOn' => 'Включить письма',
                        'notifyLimit' => 'Напоминаний за раз',
                        'notifyInterval' => 'Интервал рассылки',
                        'notifyFirst' => '1-е письмо (дней)',
                        'notifySecond' => '2-е письмо (дней)',
                        'notifyPrepaid' => 'После предопл. (дней)',
                        'notifyNalozh' => 'После налож. (дней)',
						'day_click' => 'Число дней',
                        'count_click' => 'Количество кликов',
                    
                    
                        //Лог
                        'logon' => 'Включить журнал (лог)',
                        'logsendgood' => 'Выслан товар',
                        'lognewclient' => 'Добавлен клиент',
                        'lognewpartner' => 'Новый партнёр',
                        'logneworder' => 'Выписан счёт',
                        'lognewpay' => 'POST платёжных систем',
                        'logpin' => 'Использован PIN-код',
                        'lognewchange' => 'Изменён статус счёта',
                        'logpartner' => 'Начисление партнёру',
                        'logauthor' => 'Начисление автору',
                        'logpaypartner' => 'Выплата партнёру',
                        'logpayauthor' => 'Выплата автору',
                        'lognewrass' => 'Новая рассылка/серия',
                        'logsendmail' => 'Часть очереди писем',
                        'loglogin' => 'Вход в админ-панель',

		);

	}

	//Сохранение настроек в БД
	public function save ()
	{
		$tableName = '{{settings}}';

		$builder = Yii::app()->db->commandBuilder;

		foreach ($this->attributes as $key=>$value){
			$ar = array (
				'value' => $value
			);
			$criteria = new CDbCriteria;
			$criteria->condition = 'id=:id';
			$criteria->params = array (':id' => $key);

			$command = $builder->createUpdateCommand ($tableName,$ar,$criteria);
			$command->execute ();
		}

		return TRUE;

	}

	public function attributeNames()
	{
		return $this->_attrNames;
	}

	//Загрузка полей по умолчанию
	public function loadFields ()
	{
                $tableName = '{{settings}}';

		$command = new CDbCommand (Yii::app()->db,'SELECT * FROM '.$tableName);
		$res = $command->queryAll ();

		$attrs = array();
		$attrNames = array ();
		foreach ($res as $one){
			$attrs[$one['id']] = $one['value'];
			$attrNames[] = $one['id'];
		}

		$this->_attrNames = $attrNames;
		$this->_attrs = $attrs;
		$this->attributes = $attrs;

		return TRUE;
	}

	public function __get($name)
	{
		if(in_array($name, $this->_attrNames)) {
			return $this->_attrs[$name];
		} else {
			return parent::__get($name);
		}
	}

	public function __set($name, $value)
	{
		if(in_array($name, $this->_attrNames)) {
			return $this->_attrs[$name] = $value;
		} else {
			return parent::__set($name, $value);
		}
	}

}
