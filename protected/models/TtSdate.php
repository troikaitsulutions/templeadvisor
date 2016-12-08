<?php

/**
 * This is the model class for table "tt_sdate".
 *
 * The followings are the available columns in table 'tt_sdate':
 * @property string $id
 * @property string $season_id
 * @property string $from_date
 * @property string $to_date
 * @property integer $status
 * @property integer $modified
 * @property integer $created
 * @property integer $crby
 * @property string $cr_ip
 * @property string $mod_ip
 */
class TtSdate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TtSdate the static model class
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
		return 'tt_sdate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('season_id, from_date, to_date', 'required'),
			array('status, modified, created, crby', 'numerical', 'integerOnly'=>true),
			array('season_id', 'length', 'max'=>20),
			array('from_date, to_date', 'length', 'max'=>11),
			array('cr_ip, mod_ip', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, season_id, from_date, to_date, status, modified, created, crby, cr_ip, mod_ip', 'safe', 'on'=>'search'),
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
			'season_id' => 'Season',
			'from_date' => 'From Date',
			'to_date' => 'To Date',
			'status' => 'Status',
			'modified' => 'Modified',
			'created' => 'Created',
			'crby' => 'Crby',
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
		$criteria->compare('season_id',$this->season_id,true);
		$criteria->compare('from_date',$this->from_date,true);
		$criteria->compare('to_date',$this->to_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('modified',$this->modified);
		$criteria->compare('created',$this->created);
		$criteria->compare('crby',$this->crby);
		$criteria->compare('cr_ip',$this->cr_ip,true);
		$criteria->compare('mod_ip',$this->mod_ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}