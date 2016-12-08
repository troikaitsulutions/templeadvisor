<?php

/**
 * This is the model class for table "{{people}}".
 *
 * The followings are the available columns in table '{{people}}':
 * @property string $id
 * @property string $uid
 * @property string $code
 * @property string $name
 * @property string $display_name
 * @property string $company
 * @property string $address1
 * @property string $address2
 * @property string $town
 * @property string $province
 * @property string $country
 * @property string $zip
 * @property string $tele
 * @property string $tele2
 * @property string $mobile
 * @property string $fax
 * @property string $email
 * @property string $email2
 * @property string $user_url
 * @property string $bank_details
 * @property string $note
 * @property integer $category
 * @property integer $lang
 * @property string $skype
 * @property integer $status
 * @property integer $created
 * @property integer $modified
 * @property integer $crby
 * @property string $cr_ip
 * @property string $mod_ip
 * @property integer $old_id
 */
class People extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{people}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, code, name, display_name, address1, country, tele2, email, email2, note, category, lang, created, modified, crby, cr_ip, mod_ip, old_id', 'required'),
			array('category, lang, status, created, modified, crby, old_id', 'numerical', 'integerOnly'=>true),
			array('uid, tele2', 'length', 'max'=>100),
			array('code, town, province, email2, cr_ip, mod_ip', 'length', 'max'=>50),
			array('name, display_name, company', 'length', 'max'=>255),
			array('address1, address2', 'length', 'max'=>150),
			array('country', 'length', 'max'=>10),
			array('zip, tele, mobile, fax, email', 'length', 'max'=>128),
			array('user_url, bank_details', 'length', 'max'=>500),
			array('skype', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, uid, code, name, display_name, company, address1, address2, town, province, country, zip, tele, tele2, mobile, fax, email, email2, user_url, bank_details, note, category, lang, skype, status, created, modified, crby, cr_ip, mod_ip, old_id, avatar', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
	 return array(                    
                    'language' => array(self::BELONGS_TO, 'Language', 'lang'),
                    'Category' => array(self::BELONGS_TO, 'Category', 'category'),
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
			'code' => 'Code',
			'name' => 'Name',
			'display_name' => 'Display Name',
			'company' => 'Company',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'town' => 'Town',
			'province' => 'Province',
			'country' => 'Country',
			'zip' => 'Zip',
			'tele' => 'Tele',
			'tele2' => 'Tele2',
			'mobile' => 'Mobile',
			'fax' => 'Fax',
			'email' => 'Email',
			'email2' => 'Email2',
			'user_url' => 'User Url',
			'bank_details' => 'Bank Details',
			'note' => 'Note',
			'category' => 'Category',
			'lang' => 'Lang',
			'skype' => 'Skype',
			'status' => 'Status',
			'created' => 'Created',
			'modified' => 'Modified',
			'crby' => 'Crby',
			'cr_ip' => 'Cr Ip',
			'mod_ip' => 'Mod Ip',
			'old_id' => 'Old',
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
		$criteria->with = array('Category');
			if(isset($_GET['tele']))
		{
		if($_GET['tele']!='') $criteria->addSearchCondition('tele',$_GET['tele']);
		}
		if(isset($_GET['name']))
		{
		if($_GET['name']!='') $criteria->addSearchCondition('name',$_GET['name']);
		}
		if(isset($_GET['display_name']))
		{
		if($_GET['display_name']!='') $criteria->addSearchCondition('display_name',$_GET['display_name']);
		}
		if(isset($_GET['email']))
		{
		if($_GET['email']!='') $criteria->addSearchCondition('email',$_GET['email']);
		}
		if(isset($_GET['address1']))
		{
		if($_GET['address1']!='') $criteria->addSearchCondition('address1',$_GET['address1']);
		}
		if(isset($_GET['zip']))
		{
		if($_GET['zip']!='') $criteria->addSearchCondition('zip',$_GET['zip']);
		}
		if(isset($_GET['category']))
		{
		if($_GET['category']!='') $criteria->compare('Category.name',$_GET['category'],true);
		
		}


		$criteria->compare('id',$this->id,true);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('code',$this->code,true);
	
		
		$criteria->compare('company',$this->company,true);
	
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('country',$this->country,true);
	
		$criteria->compare('tele2',$this->tele2,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('fax',$this->fax,true);

		$criteria->compare('email2',$this->email2,true);
		$criteria->compare('user_url',$this->user_url,true);
		$criteria->compare('bank_details',$this->bank_details,true);
		$criteria->compare('note',$this->note,true);
		
		$criteria->compare('lang',$this->lang);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('created',$this->created);
		$criteria->compare('modified',$this->modified);
		$criteria->compare('crby',$this->crby);
		$criteria->compare('cr_ip',$this->cr_ip,true);
		$criteria->compare('mod_ip',$this->mod_ip,true);
		$criteria->compare('old_id',$this->old_id);
		if(user()->isAgent) $criteria->compare('t.category','102',true);
		$sort = new CSort;
		$sort->attributes = array('id');
 		$sort->defaultOrder = 'Category.name,t.name ASC';
 		if(Yii::app()->controller->action->id=='properties')
			return new CActiveDataProvider($this,array('criteria'=>$criteria,'sort'=>$sort,'pagination'=>array('pageSize'=>Yii::app()->settings->get('system', 'page_size'))));
		else
		{
			$count = self::model()->count($criteria);
			return new CActiveDataProvider($this,array('criteria'=>$criteria,'sort'=>false,'pagination'=>array('pageSize'=>$count)));
		}
	}
	
	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return People the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
}
?>