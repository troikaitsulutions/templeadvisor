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
class Events extends CActiveRecord
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
		return '{{events}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prop_id, from_date, to_date, name, comment', 'required'),
			array('prop_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
            //array('name','unique'),     
           // array('prop_id+name+year', 'common.extensions.uniqueMultiColumnValidator'),             
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, prop_id, name, status, comment', 'safe'),
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
             'Vehicles' => array(self::BELONGS_TO, 'Vehicles', 'vehicle'),
			 'Town' => array(self::BELONGS_TO, 'Town', 'town'),
               ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
			'name' => t('Event Name'),
			'from_date' => t('From Date'),
			'to_date' => t('To Date'),
			'lang' => t('Language'),
            'comment' => t('Description')
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
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
                );
                $sort->defaultOrder = 'id ASC';
                

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
		$criteria->compare('name',$this->name,true);
		$criteria->condition = '`status` = 1 and `prop_id` ='.$object_id;
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
                );
                $sort->defaultOrder = 'name DESC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>$sort,
						'pagination'=>array('pageSize'=>Yii::app()->settings->get('system', 'page_size'))
		));
	}
	
	public static function AdditionalCostName($id){    
		                       
               
             $models=self::model()->find(array(
		    'condition'=>'id=:id',
		    'params'=>array(':id'=>$id)));
			
			$items = t("None");
			
			if(count($models)>0){                
                        $items = t($models->name);  
	    	} 
			return $items;
        }
	
	public static function AdditionalCostProp($id){    
		                       
               
             $models=self::model()->find(array(
		    'condition'=>'id=:id',
		    'params'=>array(':id'=>$id)));
			
			$items = t("None");
			
			if(count($models)>0){                
                        $items = t($models->prop_id);  
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