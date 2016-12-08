<?php

/**
 * This is the model class for table "tt_pinfo".
 *
 * The followings are the available columns in table 'tt_pinfo':
 * @property string $id
 * @property string $uid
 * @property integer $owner
 * @property integer $lang
 * @property string $guid
 * @property string $name
 * @property string $tt_name
 * @property integer $size
 * @property integer $ptype
 * @property string $address1
 * @property string $address2
 * @property integer $town
 * @property integer $province
 * @property integer $region
 * @property integer $country
 * @property string $zip
 * @property integer $location
 * @property integer $view
 * @property integer $sleep
 * @property integer $bedroom
 * @property integer $mbed
 * @property integer $msbed
 * @property integer $tbed
 * @property integer $sbed
 * @property integer $ssbed
 * @property integer $bathroom
 * @property integer $bathwshower
 * @property integer $bathwtub
 * @property integer $bathwts
 * @property integer $bathwwc
 * @property integer $nairport
 * @property integer $ntrain
 * @property integer $ntown
 * @property integer $airport_km
 * @property integer $train_km
 * @property integer $town_km
 * @property integer $car
 * @property string $amenities
 * @property string $tags
 * @property string $feedlist
 * @property string $extra_cost
 * @property string $other_services
 * @property string $tourist_sights
 * @property string $content1
 * @property string $content2
 * @property string $cal_url
 * @property string $youtube
 * @property string $pint
 * @property string $website
 * @property integer $status
 * @property integer $mstatus
 * @property integer $addtohome
 * @property integer $luxury
 * @property integer $wedding
 * @property integer $modified
 * @property integer $created
 * @property integer $crby
 * @property integer $mod_by
 * @property string $cr_ip
 * @property string $mod_ip
 * @property integer $old_id
 */
class TtPinfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tt_pinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, owner, lang, guid, size, ptype, zip, nairport, ntrain, ntown, airport_km, train_km, town_km, amenities, tags, feedlist, extra_cost, other_services, tourist_sights, cal_url, youtube, pint, website, old_id', 'required'),
			array('owner, lang, size, ptype, town, province, region, country, location, view, sleep, bedroom, mbed, msbed, tbed, sbed, ssbed, bathroom, bathwshower, bathwtub, bathwts, bathwwc, nairport, ntrain, ntown, airport_km, train_km, town_km, car, status, mstatus, addtohome, luxury, wedding, modified, created, crby, mod_by, old_id', 'numerical', 'integerOnly'=>true),
			array('uid, guid, address1, address2, feedlist, cr_ip, mod_ip', 'length', 'max'=>255),
			array('name, tt_name, amenities, tags, youtube, pint, website', 'length', 'max'=>500),
			array('zip', 'length', 'max'=>11),
			array('cal_url', 'length', 'max'=>1024),
			array('content1, content2', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, uid, owner, lang, guid, name, tt_name, size, ptype, address1, address2, town, province, region, country, zip, location, view, sleep, bedroom, mbed, msbed, tbed, sbed, ssbed, bathroom, bathwshower, bathwtub, bathwts, bathwwc, nairport, ntrain, ntown, airport_km, train_km, town_km, car, amenities, tags, feedlist, extra_cost, other_services, tourist_sights, content1, content2, cal_url, youtube, pint, website, status, mstatus, addtohome, luxury, wedding, modified, created, crby, mod_by, cr_ip, mod_ip, old_id', 'safe', 'on'=>'search'),
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
			'regionname' => array(self::BELONGS_TO, 'TtRegion', 'region'),
			'locationname' => array(self::BELONGS_TO, 'TtPlocation', 'location'),
			'TtType' => array(self::BELONGS_TO, 'TtType', 'ptype'),
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
			'owner' => 'Owner',
			'lang' => 'Lang',
			'guid' => 'Guid',
			'name' => 'Name',
			'tt_name' => 'Tt Name',
			'size' => 'Size',
			'ptype' => 'Ptype',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'town' => 'Town',
			'province' => 'Province',
			'region' => 'Region',
			'country' => 'Country',
			'zip' => 'Zip',
			'location' => 'Location',
			'view' => 'View',
			'sleep' => 'Sleep',
			'bedroom' => 'Bedroom',
			'mbed' => 'Mbed',
			'msbed' => 'Msbed',
			'tbed' => 'Tbed',
			'sbed' => 'Sbed',
			'ssbed' => 'Ssbed',
			'bathroom' => 'Bathroom',
			'bathwshower' => 'Bathwshower',
			'bathwtub' => 'Bathwtub',
			'bathwts' => 'Bathwts',
			'bathwwc' => 'Bathwwc',
			'nairport' => 'Nairport',
			'ntrain' => 'Ntrain',
			'ntown' => 'Ntown',
			'airport_km' => 'Airport Km',
			'train_km' => 'Train Km',
			'town_km' => 'Town Km',
			'car' => 'Car',
			'amenities' => 'Amenities',
			'tags' => 'Tags',
			'feedlist' => 'Feedlist',
			'extra_cost' => 'Extra Cost',
			'other_services' => 'Other Services',
			'tourist_sights' => 'Tourist Sights',
			'content1' => 'Content1',
			'content2' => 'Content2',
			'cal_url' => 'Cal Url',
			'youtube' => 'Youtube',
			'pint' => 'Pint',
			'website' => 'Website',
			'status' => 'Status',
			'mstatus' => 'Mstatus',
			'addtohome' => 'Addtohome',
			'luxury' => 'Luxury',
			'wedding' => 'Wedding',
			'modified' => 'Modified',
			'created' => 'Created',
			'crby' => 'Crby',
			'mod_by' => 'Mod By',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('owner',$this->owner);
		$criteria->compare('lang',$this->lang);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('tt_name',$this->tt_name,true);
		$criteria->compare('size',$this->size);
		$criteria->compare('ptype',$this->ptype);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('town',$this->town);
		$criteria->compare('province',$this->province);
		$criteria->compare('region',$this->region);
		$criteria->compare('country',$this->country);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('location',$this->location);
		$criteria->compare('view',$this->view);
		$criteria->compare('sleep',$this->sleep);
		$criteria->compare('bedroom',$this->bedroom);
		$criteria->compare('mbed',$this->mbed);
		$criteria->compare('msbed',$this->msbed);
		$criteria->compare('tbed',$this->tbed);
		$criteria->compare('sbed',$this->sbed);
		$criteria->compare('ssbed',$this->ssbed);
		$criteria->compare('bathroom',$this->bathroom);
		$criteria->compare('bathwshower',$this->bathwshower);
		$criteria->compare('bathwtub',$this->bathwtub);
		$criteria->compare('bathwts',$this->bathwts);
		$criteria->compare('bathwwc',$this->bathwwc);
		$criteria->compare('nairport',$this->nairport);
		$criteria->compare('ntrain',$this->ntrain);
		$criteria->compare('ntown',$this->ntown);
		$criteria->compare('airport_km',$this->airport_km);
		$criteria->compare('train_km',$this->train_km);
		$criteria->compare('town_km',$this->town_km);
		$criteria->compare('car',$this->car);
		$criteria->compare('amenities',$this->amenities,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('feedlist',$this->feedlist,true);
		$criteria->compare('extra_cost',$this->extra_cost,true);
		$criteria->compare('other_services',$this->other_services,true);
		$criteria->compare('tourist_sights',$this->tourist_sights,true);
		$criteria->compare('content1',$this->content1,true);
		$criteria->compare('content2',$this->content2,true);
		$criteria->compare('cal_url',$this->cal_url,true);
		$criteria->compare('youtube',$this->youtube,true);
		$criteria->compare('pint',$this->pint,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('mstatus',$this->mstatus);
		$criteria->compare('addtohome',$this->addtohome);
		$criteria->compare('luxury',$this->luxury);
		$criteria->compare('wedding',$this->wedding);
		$criteria->compare('modified',$this->modified);
		$criteria->compare('created',$this->created);
		$criteria->compare('crby',$this->crby);
		$criteria->compare('mod_by',$this->mod_by);
		$criteria->compare('cr_ip',$this->cr_ip,true);
		$criteria->compare('mod_ip',$this->mod_ip,true);
		$criteria->compare('old_id',$this->old_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TtPinfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
