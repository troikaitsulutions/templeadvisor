<?php

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 * @property string $page_id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $parent
 * @property string $layout
 * @property string $slug
 * @property integer $lang
 */
class Pinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Page the static model class
	 */
	 public $h3,$price_week,$people;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{pinfo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('name, tt_name, town, province, region, country, zip, sleep, bedroom, bathroom, content1, uid, lang, owner', 'required'),
			array('lang, status, town, province, region, country, size, sleep, bedroom, bathroom, addtohome, location, view, mbed, msbed, tbed, sbed, ssbed, bathwshower, bathwtub, bathwts, nairport, ntrain, ntown, airport_km, train_km, town_km, bathwwc, car, mstatus, addtohome, ptype, luxury, wedding, chianti, old_id', 'numerical', 'integerOnly'=>true),
			array('name, tt_name,address1, address2, feedlist', 'length', 'max'=>255),
			array('guid, name, tt_name,  content2, cal_url, youtube, website, pint, extra_cost, tags, amenities, tourist_sights, other_services, notes,h3','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, tt_name, uid, lang,h3', 'safe', 'on'=>'search'),
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
            'language' => array(self::BELONGS_TO, 'Language', 'lang'),
 			'regionname' => array(self::BELONGS_TO, 'Region', 'region'),
			'provincename' => array(self::BELONGS_TO, 'Province', 'province'),
			'locationname' => array(self::BELONGS_TO, 'Plocation', 'location'),
			'Type' => array(self::BELONGS_TO, 'Type', 'ptype'),
			'Country' => array(self::BELONGS_TO, 'Country', 'country'),
			'Town' => array(self::BELONGS_TO, 'Town', 'town'),
 			'nairport' => array(self::BELONGS_TO, 'Town', 'nairport'),
  			'ntrain' => array(self::BELONGS_TO, 'Town', 'ntrain'),
			'People' => array(self::BELONGS_TO, 'People', 'owner'),
			'Season' => array(self::HAS_MANY, 'Season', '', 'on'=>'Season.prop_id = t.id'),
			'GPS' => array(self::HAS_ONE, 'Gps', '', 'on'=>'GPS.uid = t.uid'),
			'Payment' => array(self::HAS_ONE, 'Payment', '', 'on'=>'Payment.uid = t.uid','joinType'=>'LEFT JOIN',),
			'Comment' => array(self::HAS_ONE, 'Review', '', 'on'=>'Comment.parent = t.id'),
		//	'pricesort' => array(self::HAS_MANY, 'Pinfo', 'product_id','join'=>' join massage_request a on a.request_id=direct_pat.product_id'),
             ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('Property ID'),
			'owner' => t('Property Owner'),
			'name' => t('Property Orginal Name'),
  			'tt_name' => t('Property Site Name'),
  			'size'  => t('Property Size in sq mts'),
			'address1'  => t('Address1'),
			'address2' => t('Address2'),
			'town' => t('Town'),
			'province' => t('Province'),
			'region' => t('Region'),
			'country' => t('Country'),
			'zip' => t('Zip Code'),
			'location'=> t('Property Location'),
			'view' => t('Property View'),
			'ptype' => t('Property Type'),
			'sleep'=> t('Sleeps'),
			'bedroom'=> t('Total BedRoom'),
			'mbed' => t('Matrimonial Bed'),
			'msbed' => t('Matrimonial Sofa Bed'),
			'tbed' => t('Twin Bed'),
			'sbed' => t('Single Bed'),
			'ssbed'=> t('Single Sofa Bed'),
			'bathroom' => t('Total Bathrooms'),
			'bathwshower' => t('Bathroom with Shower'),
			'bathwtub' => t('Bathroom with Tub'),
			'bathwts' => t('Bathroom with Tub & Shower'),
			'bathwwc' => t('Water Closet'),
			'notes' => t('Notes about Property- not shown on site'),
			'nairport' => t('Nearest Airport'),
			'ntrain' => t('Nearest Train Station'),
			'ntown' => t('Nearest Town'),
			
			'airport_km' => t('KM'),
			'train_km' => t('KM'),
			'town_km' => t('KM'),
			
			'car'=> t('Car Required'),
			'extra_cost' => t('Additional Cost'),
			'other_services' => t('Other Services'),
			'tourist_sights' => t('Tourist Sights'),
			'content1' => t('Property Description'),
			'cal_url' => t('Google/ical URL'),
			'youtube' => t('YouTube URL'),
			'pint' => t('Pintrest URL'),
			'website' => t('Property URL'),
			'content2' => t('Property Description for Other sites'),
			'lang' => t('Language'),
			'addtohome' => t('Featured Property'),
			'luxury' => t('Luxury Collection'),
			'wedding' => t('Wedding Collection'),
			'chianti' => t('Chianti Properties'),
			'mstatus' => t("Property owner's approval status"),
			'h3' => t("H3 Description"),
			
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
		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.tt_name',$this->tt_name,true);
		$criteria->with = array('provincename','language');
		if((user()->isAgent) || (user()->isVillaOwner))
		{
			$user = User::model()->find(array('condition'=>"user_id='".user()->id."'"));
			$criteria->compare('t.owner',$user->people_id);
		}
		if($this->province!='')
		{
			$criteria->compare('provincename.name',$this->province,true);
		}
 		if($this->lang!='')
		{
			$criteria->compare('language.lang_desc',$this->lang,true);
		}
               
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
                );
                $sort->defaultOrder = 't.id DESC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
	}
        
		
		public function dashboardsearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
	
	
		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.tt_name',$this->tt_name,true);
		$criteria->with = array('provincename','language');
	
		if((user()->isAgent) || (user()->isVillaOwner))
		{
			$user = User::model()->find(array('condition'=>"user_id='".user()->id."'"));
			$criteria->compare('t.owner',$user->people_id);
		}
		if($this->province!='')
		{
			$criteria->compare('provincename.name',$this->province,true);
		}
 		if($this->lang!='')
		{
			$criteria->compare('language.lang_desc',$this->lang,true);
		}	
   		$criteria->limit = 5;
		$sort = new CSort;
		$sort->defaultOrder = 't.id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
            'pagination'=>false,
		));
	}
        


        protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{				
				if($this->guid==''){
                                    $this->guid=uniqid();
                                }                             
                                
			} 
			return true;
		}
		else
			return false;
	}
        
        
        public static function getPageName($id){
            if($id){
                $page=Pinfo::model()->findByPk($id);
                if($page){
                    return CHtml::encode($page->name);
                } else{
                    return '';
                }
            } else {
                return '';
            }
        }
		
		public static function getPropNames($ids){
            if($ids){
				
				$prop_id = explode(',',$ids);
				
				$prop_name = '';
				
				if( isset($prop_id) && count($prop_id)>0 ) {
					
					foreach ( array_filter($prop_id) as $key=>$value) { $prop_name .= Pinfo::getPageName($value).','; }
					
					return ' : '.trim($prop_name, ',');
					
				} else { return '1'; } 
										
            } else {
                return $ids;
            }
        }
		
		public static function GetUID($id){
            if($id){
                $page=self::model()->findByPk($id);
                if($page){
                    return $page->uid;
                } else{
                    return '';
                }
            } else {
                return '';
            }
        }
		
		public static function GetPage(){
            $pages=self::model()->with('language')->findAll();                        
            $data=array(0=>t("None"));
            if($pages && count($pages) > 0 ){
               foreach($pages as $t){
                    $data[$t->id]=$t->tt_name.' - '.$t->language->lang_desc ;
                }
            }
            
            return $data;
        }
		
		public static function GetAll($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.tt_name, t.id',
    			'group'=>'t.tt_name',
   				
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','tt_name'));                            
                }                
                
                return $data;
        }
		
		public static function  CheckAmn( $id , $pid )
		{
			$status = 0;
			
			if(Pinfo::model()->find(array('condition' => 'id = "'.$pid.'" AND amenities LIKE "%'.$id.'%"'))) { $status = 1; }
			
			return $status;
			
		}
        
	
	public function PropertySearch()
	{
		$criteria=new CDbCriteria;
		if(isset($_GET['property_type']))
		{
		if($_GET['property_type']!='') $criteria->compare('ptype',$_GET['property_type']);
		}
		if(isset($_GET['property_size1']) || isset($_GET['property_size2']))
		{
			if($_GET['property_size1']!='' && $_GET['property_size2']!='') $criteria->addBetweenCondition('size',$_GET['property_size1'],$_GET['property_size2']);
			else if($_GET['property_size1']!='') $criteria->compare('size<',$_GET['property_size1'],false);
			else if($_GET['property_size2']!='') $criteria->compare('size>',$_GET['property_size2'],false);
		}
		if(isset($_GET['property_town']))
		{
		if($_GET['property_town']!='') $criteria->compare('town',$_GET['property_town']);
		}
		if(isset($_GET['property_tag']))
		{
		if($_GET['property_tag']!='') $criteria->compare('tags',$_GET['property_tag'],true);
		}
		
		if(isset($_GET['property_status']))
		{
		if($_GET['property_status']!='') $criteria->compare('status',$_GET['property_status'],true);
		}
		if(isset($_GET['property_other']))
		{
			$property_other = $_GET['property_other'];
			
			if($property_other!='')
			{
				$property_other = explode(',',$property_other);
				if(in_array(1,$property_other)) $criteria->compare('status','2',false);
				if(in_array(2,$property_other))
				{
					$with[] = 'Comment';
					$criteria->addCondition("Comment.id IS NULL");
				}
				if(in_array(3,$property_other)) $criteria->addCondition("tourist_sights=''");
				if(in_array(6,$property_other))
				{
					$with[] = 'GPS';
					$criteria->addCondition("GPS.latitude!='' OR GPS.longitude!=''");
				}
				if(in_array(7,$property_other))
				{
					$with[] = 'GPS';
					$criteria->addCondition("GPS.latitude='' AND GPS.longitude=''");
				}
				if(in_array(8,$property_other))
				{
					$with[] = 'Payment';
					$criteria->addCondition("Payment.tourist_tax='0'");
				}
				$criteria->with = $with;
			}
		}

		$sort = new CSort;
		$sort->attributes = array('id');
		$sort->defaultOrder = 't.id DESC';
		if(Yii::app()->controller->action->id=='properties')
			return new CActiveDataProvider($this,array('criteria'=>$criteria,'sort'=>$sort,'pagination'=>array('pageSize'=>Yii::app()->settings->get('system', 'page_size'))));
		else
		{
			$count = self::model()->count($criteria);
			return new CActiveDataProvider($this,array('criteria'=>$criteria,'sort'=>$sort,'pagination'=>array('pageSize'=>$count)));
		}
	}
	
	public function ownersearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		if($_GET['villa_type']!='') $criteria->compare('ptype',$_GET['villa_type']);
		if($_GET['villa_size']!='') $criteria->compare('size',$_GET['villa_size']);
		if($_GET['villa_town']!='') $criteria->compare('town',$_GET['villa_town']);
		if($_GET['villa_other']!='') $criteria->compare('status',$_GET['villa_other']);
		

		
		if(Yii::app()->controller->action->id=='Manageownerreport')
			return new CActiveDataProvider($this,array('criteria'=>$criteria,'sort'=>$sort,'pagination'=>array('pageSize'=>Yii::app()->settings->get('system', 'page_size'))));
		else
		{
			$count = self::model()->count($criteria);
			return new CActiveDataProvider($this,array('criteria'=>$criteria,'sort'=>false,'pagination'=>array('pageSize'=>$count)));
		}
		
	}
        
	public static function GetName($id)
	{    
		$models=self::model()->find(array(
		'condition'=>'`id`=:id',
		'params'=>array(':id'=>$id)));
		$items = t("None");
		if(count($models)>0){ $items = $models->tt_name; } 
		return $items;
	}
}