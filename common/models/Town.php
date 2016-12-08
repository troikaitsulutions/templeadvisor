<?php


class Town extends CActiveRecord
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
		return '{{town}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		
		
		return array(
			array('lang, created, modified, status, name', 'required'),
			array('lang, id, crby, mod_by, created, modified, status, addtohome, source', 'numerical', 'integerOnly'=>true),
			array('zip', 'length', 'max'=>6),
			array('zip', 'numerical', 'integerOnly'=>true),
			array('guid, uid, name, cr_ip, mod_ip, latitude, longitude', 'length', 'max'=>255),
			array('id, name, uid, latitude, longitude, lang', 'safe', 'on'=>'search'),
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
					'district' => array(self::BELONGS_TO, 'District', 'source'),
					'CreateUserName' => array(self::BELONGS_TO, 'User', 'crby'),
					'ModUserName' => array(self::BELONGS_TO, 'User', 'mod_by'),
					
                ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
			'name' => t('Town/City Name'),
			'latitude' => t('GPS Latitude'),
			'longitude' => t('Longitude'),
			'source' => t('District'),
			'zip' => t('PIN Code'),
			'content' => t('About Town'),
			'addtohome' => t('Add to Quick List On Home'),
			'lang' => t('Language'),
            'guid' => t('Guid'),
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
		$criteria->compare('source',$this->source,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('addtohome',$this->addtohome,true);
		$criteria->compare('district.id',$this->district,true);
		$criteria->compare('lang',$this->lang);
                
                $sort = new CSort;
                $sort->attributes = array('id','name','source');
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
	
public static function GetAll($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			'group'=>'t.name',
   				'distinct'=>true,
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
		
	public static function GetAllWithGroup($render=true){    
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id, t.source',
    			'group'=>'t.name',
   				'distinct'=>true,
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name','district.name'));                            
                }                
                
                return $data;
        }
		
	public static function GetName($id){    
		                       
               
            $models=self::model()->find(array(
		    'condition'=>'`id`=:id',
		    'params'=>array(':id'=>$id)));
			
			$items = t("None");
			
			if(count($models)>0){                
                
                        $items = $models->name;
                
	    	} 
			return $items;
        }
		
	public static function GetTownName(){
		
            $page = self::model()->findAll(array(
    		'condition'=>'addtohome=1 AND status = 1 AND lang ='.CurrentLangID(),
			'order'=>'id ASC',
			));    
			                    
           if($page){
                    return $page;
                } else{
                    return '';
                }
        }
		
	public static function GetLangName($id){
		
            $town=self::model()->find(array(
		    'condition'=>'`id`=:id',
		    'params'=>array(':id'=>$id)));
			
			$models = self::model()->find(array(
				'condition'=>'guid = :GUID AND lang = :LANG',
				'params'=>array(':GUID'=>$town->guid,':LANG'=>CurrentLangID())));
			
			
			
			$items = t("None");
			                    
           if(count($models)>0){                
                
                        $items = $models->name;
                
	    	} 
			return $items;
        }
   public static function GetParent($id){    
		                       
               
            $models=self::model()->find(array(
		    'condition'=>'`uid`=:id',
		    'params'=>array(':id'=>$id)));
			
			$items = t("None");
			
			if(count($models)>0){                
                
                        $items = $models->source;
                
	    	} 
			return $items;
        }     
}