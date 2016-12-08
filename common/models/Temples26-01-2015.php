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
class Temples extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Page the static model class
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
		return '{{temples}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('name, address1, uid,  country, state, district, town, sdeity', 'required'),
			array('lang, status, mstatus, discover_list, region, religion, addtohome, country, state, district, town, contact, avatar', 'numerical', 'integerOnly'=>true),
			array('name, address1, address2, themelist, latitude, longitude', 'length', 'max'=>255),
			array('guid, name, deity, famous_for, thirtham_sthalavruksham, timing,  posture, belief, festival, other_deity, content1, rough_note, etiquette','safe'),
			array('zip', 'length', 'max'=>6),
			array('zip', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, uid, content1', 'safe', 'on'=>'search'),
			
			
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
 			'DietyName' => array(self::BELONGS_TO, 'Diety', 'sdeity'),
			'TownName' => array(self::BELONGS_TO, 'Town', 'town'),
			'DistrictName' => array(self::BELONGS_TO, 'District', 'district'),
			'StateName' => array(self::BELONGS_TO, 'State', 'state'),
			'CreateUserName' => array(self::BELONGS_TO, 'User', 'crby'),
			'ModUserName' => array(self::BELONGS_TO, 'User', 'mod_by'),
			
		//	'pricesort' => array(self::HAS_MANY, 'Pinfo', 'product_id','join'=>' join massage_request a on a.request_id=direct_pat.product_id'),
             ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('Temple ID'),
			'owner' => t('Property Owner'),
			'name' => t('Temple Name'),
  			'size'  => t('Property Size in sq mts'),
			'address1'  => t('Address1'),
			'address2' => t('Address2'),
			'deity' => t('Main Temple Deity'),
			'sdeity' => t('Deity'),
			'religion' => t('Religion'),
			'etiquette' => t('Etiquettes'),
			'famous_for' => t('Temple Famous For'),
			'thirtham_sthalavruksham' => t('Thirtham (Temple Tank), Sthalavruksham (Sacred Tree)'),
			'timing' => t('Timing'),
			'posture'=> t('Posture'),
			'belief' => t('Belief/Faith'),
			'festival' => t('Festival Dates'),
			'town' => t('Town'),
			'province' => t('Province'),
			'region' => t('Region'),
			'country' => t('Country'),
			'zip' => t('Zip Code'),
			'location'=> t('Property Location'),
			'view' => t('Property View'),
			'themelist' => t('Theme List'),
			'latitude'=> t('GPS  Latitude'),
			'longitude'=> t('Longitude'),
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
			'addtohome' => t('Featured Temple'),
			'discover_list' => t('Discover'),
			'luxury' => t('Luxury Collection'),
			'wedding' => t('Wedding Collection'),
			'chianti' => t('Chianti Properties'),
			'mstatus' => t("Property owner's approval status"),
			'h3' => t("H3 Description"),
			'crby' => t('Added By'),
			'mod_by' => t('Modified By')
			
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('deity',$this->deity,true);
		
		
                $sort = new CSort;
                $sort->attributes = array(
                        'name','id'
                );
                $sort->defaultOrder = 'id DESC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
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
	
	protected function afterDelete()
        {
             Seo::model()->deleteAll('uid = :id',array(':id'=>$this->uid)); 	
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
		
		public static function GetAllList($render=true){
			
			$temples = self::model()->findAll(array(
				'condition'=>'status = 1'
			)); 
			
			return $temples;
		
		}
		
		public static function GetItem($id){
			
			$temples = self::model()->findByPk($id); 
			
			return $temples;
		
		}
		
		public static function GetAll($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			
   				
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
		
		public static function GetAllWithAddress($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
				'condition' => 'status = 1',
    			'order'=>'state ASC'   				
				));            
               
                $data = array(''=>t("None")); 
				
				if(isset($objects) && count($objects)>0 ) {
					foreach ( $objects as $d ){
						$data[$d->id] = str_replace("Shri","",$d->name).', '.Town::GetName($d->town).', '.District::GetName($d->district).', '.State::GetName($d->state);

					} }
                
                        
                
                return $data;
        }
		
			
		
		
		 public function GetConcatened()
        {
           return $this->name.', '.Town::GetName($this->town).', '.District::GetName($this->district).', '.State::GetName($this->state);
        }
		
		 public function GetTempleDetails()
        {
                $criteria=new CDbCriteria;
				
				$sort = new CSort;
                
				$sort->attributes = array(
                        'name','id'
                );
                
				$sort->defaultOrder = 'name ASC';
				
                $models = Temples::model()->findAll($criteria,$sort);
 
                $list = CHtml::listData($models, 'id', 'concatened');
                
                return $list;
        }

	
		
		public static function  CheckAmn( $id , $pid )
		{
			$status = 0;
			
			if(Pinfo::model()->find(array('condition' => 'id = "'.$pid.'" AND amenities LIKE "%'.$id.'%"'))) { $status = 1; }
			
			return $status;
			
		}
        
	
	
	
	public static function GetName($id)
	{    
		$models=self::model()->findByPk($id);
		$items = t("None");
		if(count($models)>0){ $items = $models->name; } 
		return $items;
	}
	
	public function get_actionchanges($data)
	{
	
	$class_button = ( $data->status==ConstantDefine::USER_STATUS_ACTIVE ) ? 'btn btn-success dropdown-toggle' : 'btn btn-danger dropdown-toggle';
	
	$table="<div class='btn-group'>                                        
		   <button data-toggle='dropdown' class='".$class_button."'>".t('Action')."<span class='caret'></span></button>
			<ul class='dropdown-menu'>
			 <li><a href=".Yii::app()->createUrl("betemples/pdf", array('id'=>$data->id))." target='_blank'>".t('Pdf')."</a></li>
			 <li><a href=".Yii::app()->createUrl("betemples/update", array('id'=>$data->id)).">".t('Edit')."</a></li>
			 <li class='divider'></li>
			 <li><a href=".Yii::app()->createUrl("begallery/admin", array('page_id'=>$data->id)).">".t('Photos Gallery')."</a></li>
			 <li><a href=".Yii::app()->createUrl("benearest/admin", array('page_id'=>$data->id)).">".t('Nearest Things')."</a></li>
		  	 <li><a href=".Yii::app()->createUrl("bedirection/admin", array('page_id'=>$data->id)).">".t('Direction')."</a></li>
			 <li><a href=".Yii::app()->createUrl("bebestseason/admin", array('page_id'=>$data->id)).">".t('Best Season')."</a></li>
			 <li><a href=".Yii::app()->createUrl("beevents/admin", array('page_id'=>$data->id)).">".t('Special Events')."</a></li>			 
		  </ul>
		  </div>";
		return $table;
	}
	
	
	public function GpsDistance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

}