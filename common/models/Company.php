<?php

/**
 * This is the model class for table "{{company}}".
 *
 * The followings are the available columns in table '{{company}}':
 * @property integer $id
 * @property integer $people_id
 * @property string $company_name
 * @property string $logo
 * @property string $company_address
 * @property string $contact_person
 * @property integer $created
 * @property integer $modified
 * @property integer $crby
 * @property string $cr_ip
 * @property string $mod_ip
 */
class Company extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{company}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('people_id, company_name, logo, company_address, contact_person', 'required'),
			array('people_id, created, modified, crby', 'numerical', 'integerOnly'=>true),
			array('logo', 'length', 'max'=>100),
			array('contact_person', 'length', 'max'=>250),
			array('cr_ip, mod_ip', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, people_id, company_name, logo, company_address, contact_person, created, modified, crby, cr_ip, mod_ip', 'safe', 'on'=>'search'),
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
			'people_id' => 'People',
			'company_name' => 'Company Name',
			'logo' => 'Logo',
			'company_address' => 'Company Address',
			'contact_person' => 'Contact Person',
			'created' => 'Created',
			'modified' => 'Modified',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('people_id',$this->people_id);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('company_address',$this->company_address,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('modified',$this->modified);
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
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
