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
class Gallery extends CActiveRecord
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
		return '{{gallery}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('img_url, prop_id', 'required'),
			array('prop_id, img_order', 'numerical', 'integerOnly'=>true),
            array('prop_id,name,description','safe'),
                        
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id', 'safe', 'on'=>'search'),
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
                ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
			'prop_id' => t('Property ID'),
			'img_order' => t('Photos Order'),
			'img_url' => t('Photo URL'),
			'name' => t('Alt Text'),
			'description' => t('Description of Photo'),
			'lang' => t('Lnaguage'),
			
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

		//$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('prop_id',$this->prop_id,true);
		
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id','name'
                );
                $sort->defaultOrder = 'name DESC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>$sort
		));
	}
	
	public function searchByobject($object_id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id,true);
		$criteria->compare('img_url',$this->img_url,true);
		$criteria->compare('name',$this->name,true);
		$criteria->condition = '`status` = 1 and `prop_id` ='.$object_id;
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
                );
                $sort->defaultOrder = 'img_order ASC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>$sort,
						'pagination'=>array(
                        'pageSize'=>Yii::app()->settings->get('system', 'page_size'),
                ),
		));
	}
	
	public function FindImgOrderNo($img_id)
	{
			$models=self::model()->find(array(
		    'condition'=>'prop_id=:id',
		    'params'=>array(':id'=>$img_id),
			'order' => 'img_order DESC',
			'limit' => 1
			
			));
			
			$items = 1;
			
			if( isset($models) && count($models) > 0 ){
						       
                        $items = $models->img_order+1;  
	    	} 
			return $items;
	}

	
	public static function OfferProp($id){    
		                       
               
             $models=self::model()->find(array(
		    'condition'=>'id=:id',
		    'params'=>array(':id'=>$id)));
			
			$items = t("None");
			
			if(count($models)>0){                
                        $items = t($models->prop_id);  
	    	} 
			return $items;
        }
		
	public static function GetThumbnail($data)
		{               
	                // $image= ($data->status==ConstantDefine::USER_STATUS_ACTIVE) ? 'active' : 'disabled';
					
		     	//	 $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
		
			 		return 'http://tt-prop-photos.s3.amazonaws.com/'.$data->prop_id.'/thumb/'.$data->img_url; 
		}
		
		public static function GetLargeImage($data)
		{               
	                // $image= ($data->status==ConstantDefine::USER_STATUS_ACTIVE) ? 'active' : 'disabled';
					
		     	//	 $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
		
			 		return 'http://tt-prop-photos.s3.amazonaws.com/'.$data->prop_id.'/fullsize/'.$data->img_url; 
		}
		
	public static function GetPropThumbnail($img_id)
		{               
	               
			$models=self::model()->find(array(
		    'condition'=>'prop_id=:id',
		    'params'=>array(':id'=>$img_id),
			'order' => 'img_order ASC',
			
			));
			$items = "";
			if(count($models)>0){
						       
                        $items = 'http://tt-prop-photos.s3.amazonaws.com/'.$img_id.'/thumb/'.$models->img_url;  
	    	} 
			return $items; 
		}
		
		public static function GetPropLargeImg($img_id)
		{               
	               
			$models=self::model()->find(array(
		    'condition'=>'prop_id=:id',
		    'params'=>array(':id'=>$img_id),
			'order' => 'img_order ASC',
			
			));
			$items = "";
			if(count($models)>0){
						       
                        $items = 'http://tt-prop-photos.s3.amazonaws.com/'.$img_id.'/fullsize/'.$models->img_url;  
	    	} 
			return $items; 
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
}