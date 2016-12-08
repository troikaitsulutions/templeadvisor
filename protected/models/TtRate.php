<?php

/**
 * This is the model class for table "tt_rate".
 *
 * The followings are the available columns in table 'tt_rate':
 * @property string $id
 * @property string $season_id
 * @property string $people
 * @property double $price_week
 * @property double $price_day
 * @property string $created
 * @property string $modified
 * @property integer $crby
 * @property string $cr_ip
 * @property string $mod_ip
 * @property integer $status
 */
class TtRate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TtRate the static model class
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
		return 'tt_rate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('season_id, people, price_week, price_day, created, modified, crby, cr_ip, mod_ip', 'required'),
			array('crby, status', 'numerical', 'integerOnly'=>true),
			array('price_week, price_day', 'numerical'),
			array('season_id', 'length', 'max'=>20),
			array('people, created, modified', 'length', 'max'=>11),
			array('cr_ip, mod_ip', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, season_id, people, price_week, price_day, created, modified, crby, cr_ip, mod_ip, status', 'safe', 'on'=>'search'),
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
			'people' => 'People',
			'price_week' => 'Price Week',
			'price_day' => 'Price Day',
			'created' => 'Created',
			'modified' => 'Modified',
			'crby' => 'Crby',
			'cr_ip' => 'Cr Ip',
			'mod_ip' => 'Mod Ip',
			'status' => 'Status',
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
		$criteria->compare('people',$this->people,true);
		$criteria->compare('price_week',$this->price_week);
		$criteria->compare('price_day',$this->price_day);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('crby',$this->crby);
		$criteria->compare('cr_ip',$this->cr_ip,true);
		$criteria->compare('mod_ip',$this->mod_ip,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}