<?php

/**
 * This is the model class for table "{{feedlist}}".
 *
 * The followings are the available columns in table '{{feedlist}}':
 * @property string $id
 * @property string $uid
 * @property string $name
 * @property string $content
 * @property string $sharevia
 * @property integer $status
 * @property integer $modified
 * @property integer $created
 * @property integer $crby
 * @property string $cr_ip
 * @property string $mod_ip
 */
class Feedlist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{feedlist}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid', 'required'),
			array('status, modified, created, crby', 'numerical', 'integerOnly'=>true),
			array('uid, name, cr_ip, mod_ip', 'length', 'max'=>255),
			array('sharevia', 'length', 'max'=>20),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, uid, name, content, sharevia, status, modified, created, crby, cr_ip, mod_ip', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'name' => 'Name',
			'content' => 'Content',
			'sharevia' => 'Sharevia',
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
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('sharevia',$this->sharevia,true);
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
	 * @return Feedlist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
