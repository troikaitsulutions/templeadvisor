<?php

/**
 * This is the model class for table "tt_tarrif".
 *
 * The followings are the available columns in table 'tt_tarrif':
 * @property integer $ID
 * @property integer $IDUSER
 * @property string $USERNAME
 * @property integer $LASTUPDATE
 * @property integer $FROM1
 * @property integer $TO1
 * @property integer $FROM2
 * @property integer $TO2
 * @property integer $FROM3
 * @property integer $TO3
 * @property integer $FROM4
 * @property integer $TO4
 * @property integer $FROM5
 * @property integer $TO5
 * @property double $PRICEDAY
 * @property double $PRICEWEEK
 * @property double $PRICEMONTH
 * @property double $PRICEDOLLARDAY
 * @property double $PRICEDOLLARWEEK
 * @property double $PRICEDOLLARMONTH
 * @property string $CURRENCY
 * @property double $DISCOUNT
 * @property double $MAXDISCOUNT
 * @property integer $IDPROPERTY
 * @property integer $IDPERIOD
 * @property integer $IDUNIT
 * @property double $COSTDAY
 * @property double $COSTWEEK
 * @property double $COSTMONTH
 * @property integer $GIORNOINIZIO
 * @property integer $IDROOM
 * @property integer $PERSONPRICE
 * @property double $PRICEDAYB
 * @property double $PRICEDAYC
 * @property double $PRICEDAYD
 * @property double $PRICEDAYE
 * @property double $PRICEWEEKB
 * @property double $PRICEWEEKC
 * @property double $PRICEWEEKD
 * @property double $PRICEWEEKE
 * @property integer $PAXMAX
 * @property integer $PAXMAXB
 * @property integer $PAXMAXC
 * @property integer $PAXMAXD
 * @property integer $PAXMAXE
 * @property double $PRICEDOLLARDAYB
 * @property double $PRICEDOLLARDAYC
 * @property double $PRICEDOLLARDAYD
 * @property double $PRICEDOLLARDAYE
 * @property double $PRICEDOLLARWEEKB
 * @property double $PRICEDOLLARWEEKC
 * @property double $PRICEDOLLARWEEKD
 * @property double $PRICEDOLLARWEEKE
 * @property double $COSTDAYB
 * @property double $COSTDAYC
 * @property double $COSTDAYD
 * @property double $COSTDAYE
 * @property double $COSTWEEKB
 * @property double $COSTWEEKC
 * @property double $COSTWEEKD
 * @property double $COSTWEEKE
 * @property integer $FROM6
 * @property integer $FROM7
 * @property integer $FROM8
 * @property integer $FROM9
 * @property integer $FROM10
 * @property integer $TO6
 * @property integer $TO7
 * @property integer $TO8
 * @property integer $TO9
 * @property integer $TO10
 * @property double $COMMISSIONDAYA
 * @property double $COMMISSIONDAYB
 * @property double $COMMISSIONDAYC
 * @property double $COMMISSIONDAYD
 * @property double $COMMISSIONDAYE
 * @property double $COMMISSIONWEEKA
 * @property double $COMMISSIONWEEKB
 * @property double $COMMISSIONWEEKC
 * @property double $COMMISSIONWEEKD
 * @property double $COMMISSIONWEEKE
 * @property double $TAXDAYA
 * @property double $TAXDAYB
 * @property double $TAXDAYC
 * @property double $TAXDAYD
 * @property double $TAXDAYE
 * @property double $TAXWEEKA
 * @property double $TAXWEEKB
 * @property double $TAXWEEKC
 * @property double $TAXWEEKD
 * @property double $TAXWEEKE
 * @property double $TAXPERC
 * @property integer $AUTOCALCOLO
 * @property double $STARTINGCOSTDAYA
 * @property double $STARTINGCOSTDAYB
 * @property double $STARTINGCOSTDAYC
 * @property double $STARTINGCOSTDAYD
 * @property double $STARTINGCOSTDAYE
 * @property integer $COMM_PER
 */
class TtTarrif extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tt_tarrif';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDUSER, LASTUPDATE, FROM1, TO1, FROM2, TO2, FROM3, TO3, FROM4, TO4, FROM5, TO5, IDPROPERTY, IDPERIOD, IDUNIT, GIORNOINIZIO, IDROOM, PERSONPRICE, PAXMAX, PAXMAXB, PAXMAXC, PAXMAXD, PAXMAXE, FROM6, FROM7, FROM8, FROM9, FROM10, TO6, TO7, TO8, TO9, TO10, AUTOCALCOLO, COMM_PER', 'numerical', 'integerOnly'=>true),
			array('PRICEDAY, PRICEWEEK, PRICEMONTH, PRICEDOLLARDAY, PRICEDOLLARWEEK, PRICEDOLLARMONTH, DISCOUNT, MAXDISCOUNT, COSTDAY, COSTWEEK, COSTMONTH, PRICEDAYB, PRICEDAYC, PRICEDAYD, PRICEDAYE, PRICEWEEKB, PRICEWEEKC, PRICEWEEKD, PRICEWEEKE, PRICEDOLLARDAYB, PRICEDOLLARDAYC, PRICEDOLLARDAYD, PRICEDOLLARDAYE, PRICEDOLLARWEEKB, PRICEDOLLARWEEKC, PRICEDOLLARWEEKD, PRICEDOLLARWEEKE, COSTDAYB, COSTDAYC, COSTDAYD, COSTDAYE, COSTWEEKB, COSTWEEKC, COSTWEEKD, COSTWEEKE, COMMISSIONDAYA, COMMISSIONDAYB, COMMISSIONDAYC, COMMISSIONDAYD, COMMISSIONDAYE, COMMISSIONWEEKA, COMMISSIONWEEKB, COMMISSIONWEEKC, COMMISSIONWEEKD, COMMISSIONWEEKE, TAXDAYA, TAXDAYB, TAXDAYC, TAXDAYD, TAXDAYE, TAXWEEKA, TAXWEEKB, TAXWEEKC, TAXWEEKD, TAXWEEKE, TAXPERC, STARTINGCOSTDAYA, STARTINGCOSTDAYB, STARTINGCOSTDAYC, STARTINGCOSTDAYD, STARTINGCOSTDAYE', 'numerical'),
			array('USERNAME', 'length', 'max'=>50),
			array('CURRENCY', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, IDUSER, USERNAME, LASTUPDATE, FROM1, TO1, FROM2, TO2, FROM3, TO3, FROM4, TO4, FROM5, TO5, PRICEDAY, PRICEWEEK, PRICEMONTH, PRICEDOLLARDAY, PRICEDOLLARWEEK, PRICEDOLLARMONTH, CURRENCY, DISCOUNT, MAXDISCOUNT, IDPROPERTY, IDPERIOD, IDUNIT, COSTDAY, COSTWEEK, COSTMONTH, GIORNOINIZIO, IDROOM, PERSONPRICE, PRICEDAYB, PRICEDAYC, PRICEDAYD, PRICEDAYE, PRICEWEEKB, PRICEWEEKC, PRICEWEEKD, PRICEWEEKE, PAXMAX, PAXMAXB, PAXMAXC, PAXMAXD, PAXMAXE, PRICEDOLLARDAYB, PRICEDOLLARDAYC, PRICEDOLLARDAYD, PRICEDOLLARDAYE, PRICEDOLLARWEEKB, PRICEDOLLARWEEKC, PRICEDOLLARWEEKD, PRICEDOLLARWEEKE, COSTDAYB, COSTDAYC, COSTDAYD, COSTDAYE, COSTWEEKB, COSTWEEKC, COSTWEEKD, COSTWEEKE, FROM6, FROM7, FROM8, FROM9, FROM10, TO6, TO7, TO8, TO9, TO10, COMMISSIONDAYA, COMMISSIONDAYB, COMMISSIONDAYC, COMMISSIONDAYD, COMMISSIONDAYE, COMMISSIONWEEKA, COMMISSIONWEEKB, COMMISSIONWEEKC, COMMISSIONWEEKD, COMMISSIONWEEKE, TAXDAYA, TAXDAYB, TAXDAYC, TAXDAYD, TAXDAYE, TAXWEEKA, TAXWEEKB, TAXWEEKC, TAXWEEKD, TAXWEEKE, TAXPERC, AUTOCALCOLO, STARTINGCOSTDAYA, STARTINGCOSTDAYB, STARTINGCOSTDAYC, STARTINGCOSTDAYD, STARTINGCOSTDAYE, COMM_PER', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'IDUSER' => 'Iduser',
			'USERNAME' => 'Username',
			'LASTUPDATE' => 'Lastupdate',
			'FROM1' => 'From1',
			'TO1' => 'To1',
			'FROM2' => 'From2',
			'TO2' => 'To2',
			'FROM3' => 'From3',
			'TO3' => 'To3',
			'FROM4' => 'From4',
			'TO4' => 'To4',
			'FROM5' => 'From5',
			'TO5' => 'To5',
			'PRICEDAY' => 'Priceday',
			'PRICEWEEK' => 'Priceweek',
			'PRICEMONTH' => 'Pricemonth',
			'PRICEDOLLARDAY' => 'Pricedollarday',
			'PRICEDOLLARWEEK' => 'Pricedollarweek',
			'PRICEDOLLARMONTH' => 'Pricedollarmonth',
			'CURRENCY' => 'Currency',
			'DISCOUNT' => 'Discount',
			'MAXDISCOUNT' => 'Maxdiscount',
			'IDPROPERTY' => 'Idproperty',
			'IDPERIOD' => 'Idperiod',
			'IDUNIT' => 'Idunit',
			'COSTDAY' => 'Costday',
			'COSTWEEK' => 'Costweek',
			'COSTMONTH' => 'Costmonth',
			'GIORNOINIZIO' => 'Giornoinizio',
			'IDROOM' => 'Idroom',
			'PERSONPRICE' => 'Personprice',
			'PRICEDAYB' => 'Pricedayb',
			'PRICEDAYC' => 'Pricedayc',
			'PRICEDAYD' => 'Pricedayd',
			'PRICEDAYE' => 'Pricedaye',
			'PRICEWEEKB' => 'Priceweekb',
			'PRICEWEEKC' => 'Priceweekc',
			'PRICEWEEKD' => 'Priceweekd',
			'PRICEWEEKE' => 'Priceweeke',
			'PAXMAX' => 'Paxmax',
			'PAXMAXB' => 'Paxmaxb',
			'PAXMAXC' => 'Paxmaxc',
			'PAXMAXD' => 'Paxmaxd',
			'PAXMAXE' => 'Paxmaxe',
			'PRICEDOLLARDAYB' => 'Pricedollardayb',
			'PRICEDOLLARDAYC' => 'Pricedollardayc',
			'PRICEDOLLARDAYD' => 'Pricedollardayd',
			'PRICEDOLLARDAYE' => 'Pricedollardaye',
			'PRICEDOLLARWEEKB' => 'Pricedollarweekb',
			'PRICEDOLLARWEEKC' => 'Pricedollarweekc',
			'PRICEDOLLARWEEKD' => 'Pricedollarweekd',
			'PRICEDOLLARWEEKE' => 'Pricedollarweeke',
			'COSTDAYB' => 'Costdayb',
			'COSTDAYC' => 'Costdayc',
			'COSTDAYD' => 'Costdayd',
			'COSTDAYE' => 'Costdaye',
			'COSTWEEKB' => 'Costweekb',
			'COSTWEEKC' => 'Costweekc',
			'COSTWEEKD' => 'Costweekd',
			'COSTWEEKE' => 'Costweeke',
			'FROM6' => 'From6',
			'FROM7' => 'From7',
			'FROM8' => 'From8',
			'FROM9' => 'From9',
			'FROM10' => 'From10',
			'TO6' => 'To6',
			'TO7' => 'To7',
			'TO8' => 'To8',
			'TO9' => 'To9',
			'TO10' => 'To10',
			'COMMISSIONDAYA' => 'Commissiondaya',
			'COMMISSIONDAYB' => 'Commissiondayb',
			'COMMISSIONDAYC' => 'Commissiondayc',
			'COMMISSIONDAYD' => 'Commissiondayd',
			'COMMISSIONDAYE' => 'Commissiondaye',
			'COMMISSIONWEEKA' => 'Commissionweeka',
			'COMMISSIONWEEKB' => 'Commissionweekb',
			'COMMISSIONWEEKC' => 'Commissionweekc',
			'COMMISSIONWEEKD' => 'Commissionweekd',
			'COMMISSIONWEEKE' => 'Commissionweeke',
			'TAXDAYA' => 'Taxdaya',
			'TAXDAYB' => 'Taxdayb',
			'TAXDAYC' => 'Taxdayc',
			'TAXDAYD' => 'Taxdayd',
			'TAXDAYE' => 'Taxdaye',
			'TAXWEEKA' => 'Taxweeka',
			'TAXWEEKB' => 'Taxweekb',
			'TAXWEEKC' => 'Taxweekc',
			'TAXWEEKD' => 'Taxweekd',
			'TAXWEEKE' => 'Taxweeke',
			'TAXPERC' => 'Taxperc',
			'AUTOCALCOLO' => 'Autocalcolo',
			'STARTINGCOSTDAYA' => 'Startingcostdaya',
			'STARTINGCOSTDAYB' => 'Startingcostdayb',
			'STARTINGCOSTDAYC' => 'Startingcostdayc',
			'STARTINGCOSTDAYD' => 'Startingcostdayd',
			'STARTINGCOSTDAYE' => 'Startingcostdaye',
			'COMM_PER' => 'Comm Per',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('IDUSER',$this->IDUSER);
		$criteria->compare('USERNAME',$this->USERNAME,true);
		$criteria->compare('LASTUPDATE',$this->LASTUPDATE);
		$criteria->compare('FROM1',$this->FROM1);
		$criteria->compare('TO1',$this->TO1);
		$criteria->compare('FROM2',$this->FROM2);
		$criteria->compare('TO2',$this->TO2);
		$criteria->compare('FROM3',$this->FROM3);
		$criteria->compare('TO3',$this->TO3);
		$criteria->compare('FROM4',$this->FROM4);
		$criteria->compare('TO4',$this->TO4);
		$criteria->compare('FROM5',$this->FROM5);
		$criteria->compare('TO5',$this->TO5);
		$criteria->compare('PRICEDAY',$this->PRICEDAY);
		$criteria->compare('PRICEWEEK',$this->PRICEWEEK);
		$criteria->compare('PRICEMONTH',$this->PRICEMONTH);
		$criteria->compare('PRICEDOLLARDAY',$this->PRICEDOLLARDAY);
		$criteria->compare('PRICEDOLLARWEEK',$this->PRICEDOLLARWEEK);
		$criteria->compare('PRICEDOLLARMONTH',$this->PRICEDOLLARMONTH);
		$criteria->compare('CURRENCY',$this->CURRENCY,true);
		$criteria->compare('DISCOUNT',$this->DISCOUNT);
		$criteria->compare('MAXDISCOUNT',$this->MAXDISCOUNT);
		$criteria->compare('IDPROPERTY',$this->IDPROPERTY);
		$criteria->compare('IDPERIOD',$this->IDPERIOD);
		$criteria->compare('IDUNIT',$this->IDUNIT);
		$criteria->compare('COSTDAY',$this->COSTDAY);
		$criteria->compare('COSTWEEK',$this->COSTWEEK);
		$criteria->compare('COSTMONTH',$this->COSTMONTH);
		$criteria->compare('GIORNOINIZIO',$this->GIORNOINIZIO);
		$criteria->compare('IDROOM',$this->IDROOM);
		$criteria->compare('PERSONPRICE',$this->PERSONPRICE);
		$criteria->compare('PRICEDAYB',$this->PRICEDAYB);
		$criteria->compare('PRICEDAYC',$this->PRICEDAYC);
		$criteria->compare('PRICEDAYD',$this->PRICEDAYD);
		$criteria->compare('PRICEDAYE',$this->PRICEDAYE);
		$criteria->compare('PRICEWEEKB',$this->PRICEWEEKB);
		$criteria->compare('PRICEWEEKC',$this->PRICEWEEKC);
		$criteria->compare('PRICEWEEKD',$this->PRICEWEEKD);
		$criteria->compare('PRICEWEEKE',$this->PRICEWEEKE);
		$criteria->compare('PAXMAX',$this->PAXMAX);
		$criteria->compare('PAXMAXB',$this->PAXMAXB);
		$criteria->compare('PAXMAXC',$this->PAXMAXC);
		$criteria->compare('PAXMAXD',$this->PAXMAXD);
		$criteria->compare('PAXMAXE',$this->PAXMAXE);
		$criteria->compare('PRICEDOLLARDAYB',$this->PRICEDOLLARDAYB);
		$criteria->compare('PRICEDOLLARDAYC',$this->PRICEDOLLARDAYC);
		$criteria->compare('PRICEDOLLARDAYD',$this->PRICEDOLLARDAYD);
		$criteria->compare('PRICEDOLLARDAYE',$this->PRICEDOLLARDAYE);
		$criteria->compare('PRICEDOLLARWEEKB',$this->PRICEDOLLARWEEKB);
		$criteria->compare('PRICEDOLLARWEEKC',$this->PRICEDOLLARWEEKC);
		$criteria->compare('PRICEDOLLARWEEKD',$this->PRICEDOLLARWEEKD);
		$criteria->compare('PRICEDOLLARWEEKE',$this->PRICEDOLLARWEEKE);
		$criteria->compare('COSTDAYB',$this->COSTDAYB);
		$criteria->compare('COSTDAYC',$this->COSTDAYC);
		$criteria->compare('COSTDAYD',$this->COSTDAYD);
		$criteria->compare('COSTDAYE',$this->COSTDAYE);
		$criteria->compare('COSTWEEKB',$this->COSTWEEKB);
		$criteria->compare('COSTWEEKC',$this->COSTWEEKC);
		$criteria->compare('COSTWEEKD',$this->COSTWEEKD);
		$criteria->compare('COSTWEEKE',$this->COSTWEEKE);
		$criteria->compare('FROM6',$this->FROM6);
		$criteria->compare('FROM7',$this->FROM7);
		$criteria->compare('FROM8',$this->FROM8);
		$criteria->compare('FROM9',$this->FROM9);
		$criteria->compare('FROM10',$this->FROM10);
		$criteria->compare('TO6',$this->TO6);
		$criteria->compare('TO7',$this->TO7);
		$criteria->compare('TO8',$this->TO8);
		$criteria->compare('TO9',$this->TO9);
		$criteria->compare('TO10',$this->TO10);
		$criteria->compare('COMMISSIONDAYA',$this->COMMISSIONDAYA);
		$criteria->compare('COMMISSIONDAYB',$this->COMMISSIONDAYB);
		$criteria->compare('COMMISSIONDAYC',$this->COMMISSIONDAYC);
		$criteria->compare('COMMISSIONDAYD',$this->COMMISSIONDAYD);
		$criteria->compare('COMMISSIONDAYE',$this->COMMISSIONDAYE);
		$criteria->compare('COMMISSIONWEEKA',$this->COMMISSIONWEEKA);
		$criteria->compare('COMMISSIONWEEKB',$this->COMMISSIONWEEKB);
		$criteria->compare('COMMISSIONWEEKC',$this->COMMISSIONWEEKC);
		$criteria->compare('COMMISSIONWEEKD',$this->COMMISSIONWEEKD);
		$criteria->compare('COMMISSIONWEEKE',$this->COMMISSIONWEEKE);
		$criteria->compare('TAXDAYA',$this->TAXDAYA);
		$criteria->compare('TAXDAYB',$this->TAXDAYB);
		$criteria->compare('TAXDAYC',$this->TAXDAYC);
		$criteria->compare('TAXDAYD',$this->TAXDAYD);
		$criteria->compare('TAXDAYE',$this->TAXDAYE);
		$criteria->compare('TAXWEEKA',$this->TAXWEEKA);
		$criteria->compare('TAXWEEKB',$this->TAXWEEKB);
		$criteria->compare('TAXWEEKC',$this->TAXWEEKC);
		$criteria->compare('TAXWEEKD',$this->TAXWEEKD);
		$criteria->compare('TAXWEEKE',$this->TAXWEEKE);
		$criteria->compare('TAXPERC',$this->TAXPERC);
		$criteria->compare('AUTOCALCOLO',$this->AUTOCALCOLO);
		$criteria->compare('STARTINGCOSTDAYA',$this->STARTINGCOSTDAYA);
		$criteria->compare('STARTINGCOSTDAYB',$this->STARTINGCOSTDAYB);
		$criteria->compare('STARTINGCOSTDAYC',$this->STARTINGCOSTDAYC);
		$criteria->compare('STARTINGCOSTDAYD',$this->STARTINGCOSTDAYD);
		$criteria->compare('STARTINGCOSTDAYE',$this->STARTINGCOSTDAYE);
		$criteria->compare('COMM_PER',$this->COMM_PER);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TtTarrif the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
