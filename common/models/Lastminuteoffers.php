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
class Lastminuteoffers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Page the static model class
	 */
	public $noofdays;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{lastminuteoffers}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	 
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, lang', 'required'),
			
			array('lang, prop_id, value, from_date', 'numerical', 'integerOnly'=>true),
			array('name, description', 'length', 'max'=>255),
            array('guid','safe'),
                        
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, lang', 'safe', 'on'=>'search'),
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
			'name' => t('Offer Name'),
			'value' => t('Discout(%)'),
			'from_date' => t('No of Days'),
			//'to_date' => t('-'),
			'description' => t('Offer Description'),
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

		//$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('prop_id',$this->prop_id,true);
		$criteria->compare('from_date',$this->from_date,true);
		
		$criteria->compare('lang',$this->lang);
                
                $sort = new CSort;
                $sort->attributes = array('id','from_date','value');
                $sort->defaultOrder = 'name ASC';
                

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
		$criteria->select='*, CONCAT (from_date, "  days or more before check-in") as noofdays';
		$criteria->compare('name',$this->name,true);
		$criteria->condition = '`status` = 1 and `prop_id` ='.$object_id;
                
                $sort = new CSort;
               $sort->attributes = array('id','from_date','value');
                $sort->defaultOrder = 'name ASC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>$sort
		));
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
		
	public static function ValidOffer($id){    
		                       
               
             $models=self::model()->find(array(
		    'condition'=>'prop_id=:id AND from_date<='.time().' AND to_date>='.time(),
		    'params'=>array(':id'=>$id)));
			
			$items = 0;
			
			if(count($models)>0){                
                        $items = $models->value;  
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