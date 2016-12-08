<?php

/**
 * This is the model class for table "tt_season".
 *
 * The followings are the available columns in table 'tt_season':
 * @property string $id
 * @property string $prop_id
 * @property string $name
 * @property integer $stay
 * @property string $guid
 * @property integer $lang
 * @property integer $status
 * @property integer $modified
 * @property integer $created
 * @property integer $crby
 * @property string $cr_ip
 * @property string $mod_ip
 */
class TtSeason extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tt_season';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prop_id, name, stay', 'required'),
			array('stay, lang, status, modified, created, crby', 'numerical', 'integerOnly'=>true),
			array('prop_id', 'length', 'max'=>20),
			array('name, guid, cr_ip, mod_ip', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, prop_id, name, stay, guid, lang, status, modified, created, crby, cr_ip, mod_ip', 'safe', 'on'=>'search'),
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
			'TtSdate' => array(self::BELONGS_TO, 'TtSdate', 'region'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'prop_id' => 'Prop',
			'name' => 'Name',
			'stay' => 'Stay',
			'guid' => 'Guid',
			'lang' => 'Lang',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('prop_id',$this->prop_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('stay',$this->stay);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('lang',$this->lang);
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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TtSeason the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
