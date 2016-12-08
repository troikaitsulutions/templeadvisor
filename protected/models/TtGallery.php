<?php

/**
 * This is the model class for table "tt_gallery".
 *
 * The followings are the available columns in table 'tt_gallery':
 * @property string $id
 * @property string $prop_id
 * @property string $img_url
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property string $guid
 * @property integer $img_order
 * @property integer $modified
 * @property integer $created
 * @property integer $crby
 * @property integer $mod_by
 * @property string $cr_ip
 * @property string $mod_ip
 */
class TtGallery extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tt_gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prop_id, name, description, guid, img_order', 'required'),
			array('status, img_order, modified, created, crby, mod_by', 'numerical', 'integerOnly'=>true),
			array('prop_id, cr_ip, mod_ip', 'length', 'max'=>255),
			array('img_url', 'length', 'max'=>500),
			array('name', 'length', 'max'=>512),
			array('guid', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, prop_id, img_url, name, description, status, guid, img_order, modified, created, crby, mod_by, cr_ip, mod_ip', 'safe', 'on'=>'search'),
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
			'prop_id' => 'Prop',
			'img_url' => 'Img Url',
			'name' => 'Name',
			'description' => 'Description',
			'status' => 'Status',
			'guid' => 'Guid',
			'img_order' => 'Img Order',
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
		$criteria->compare('img_url',$this->img_url,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('img_order',$this->img_order);
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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TtGallery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
