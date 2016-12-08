<?php

/**
 * This is the model class for table "tt_booking".
 *
 * The followings are the available columns in table 'tt_booking':
 * @property string $id
 * @property string $booking_id
 * @property string $prop_id
 * @property string $customer_id
 * @property string $fdate
 * @property string $tdate
 * @property integer $bsource
 * @property integer $confirm
 * @property integer $status
 * @property integer $modified
 * @property integer $created
 * @property integer $crby
 * @property integer $mod_by
 * @property string $cr_ip
 * @property string $mod_ip
 */
class TtBooking extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TtBooking the static model class
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
		return 'tt_booking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('booking_id, prop_id, customer_id, fdate, tdate', 'required'),
			array('bsource, confirm, status, modified, created, crby, mod_by', 'numerical', 'integerOnly'=>true),
			array('booking_id', 'length', 'max'=>225),
			array('prop_id, customer_id, fdate, tdate', 'length', 'max'=>20),
			array('cr_ip, mod_ip', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, booking_id, prop_id, customer_id, fdate, tdate, bsource, confirm, status, modified, created, crby, mod_by, cr_ip, mod_ip', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'booking_id' => 'Booking',
			'prop_id' => 'Prop',
			'customer_id' => 'Customer',
			'fdate' => 'Fdate',
			'tdate' => 'Tdate',
			'bsource' => 'Bsource',
			'confirm' => 'Confirm',
			'status' => 'Status',
			'modified' => 'Modified',
			'created' => 'Created',
			'crby' => 'Crby',
			'mod_by' => 'Mod By',
			'cr_ip' => 'Cr Ip',
			'mod_ip' => 'Mod Ip',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('booking_id',$this->booking_id,true);
		$criteria->compare('prop_id',$this->prop_id,true);
		$criteria->compare('customer_id',$this->customer_id,true);
		$criteria->compare('fdate',$this->fdate,true);
		$criteria->compare('tdate',$this->tdate,true);
		$criteria->compare('bsource',$this->bsource);
		$criteria->compare('confirm',$this->confirm);
		$criteria->compare('status',$this->status);
		$criteria->compare('modified',$this->modified);
		$criteria->compare('created',$this->created);
		$criteria->compare('crby',$this->crby);
		$criteria->compare('mod_by',$this->mod_by);
		$criteria->compare('cr_ip',$this->cr_ip,true);
		$criteria->compare('mod_ip',$this->mod_ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}