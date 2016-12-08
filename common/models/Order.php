<?php


class Order extends CActiveRecord
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
		return '{{order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		
		
		return array(
			array('prop_id','required'),	
			array('id, crby, created, modified, mod_by, state_order, district_order,  region_order', 'numerical', 'integerOnly'=>true),
			array('state_order', 'length', 'min'=>1, 'max'=>20),
			array('region_order', 'length', 'min'=>1, 'max'=>30),
			array('district_order', 'length', 'min'=>1, 'max'=>10),
			array('mod_ip, cr_ip', 'length', 'max'=>255),
			array('state_order, district_order,  region_order, name','safe'),
			array('id, prop_id', 'safe', 'on'=>'search'),
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
                   'TempleName' => array(self::BELONGS_TO, 'Temples', 'id')
					
                ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
			'name' => t('Select Temple'),
			
			'state' => t('State'),
			'district' => t('District'), 
		
			'region' => t('Region'),
		
			'state_order' => t('State Rank'), 
			'district_order' => t('District Rank'), 
			
			'region_order' => t('Region Rank'),
			
			'status'=> t('Status'),
			'addtohome' => t('Add to Quick List On Home'),
			
           
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
		$criteria->compare('state_order',$this->state_order,true);
		$criteria->compare('district_order',$this->district_order,true);
		$criteria->compare('region_order',$this->region_order,true);
		
		
		
		
		
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
                );
                $sort->defaultOrder = 'id ASC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
	}
        
   
   
   
   
   
   public function searchbystateorder()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		
		$criteria->compare('id',$this->id,true);
		
		$criteria->compare('name',$this->name,true);
		$criteria->compare('state_order',$this->state_order,true);
		
                $sort = new CSort;
                $sort->attributes = array(
                        'name','id'
                );
                $sort->defaultOrder = 'state_order ASC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
            'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
	}
        
    public function searchbydistrictorder()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		
		$criteria->compare('id',$this->id,true);
		
		$criteria->compare('name',$this->name,true);
		$criteria->compare('district_order',$this->district_order,true);
		
                $sort = new CSort;
                $sort->attributes = array(
                        'name','id'
                );
                $sort->defaultOrder = 'district_order ASC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
	}
   
   
   
    public function searchbyregionorder()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		
		$criteria->compare('name',$this->name,true);
		$criteria->compare('region_order',$this->region_order,true);
		
                $sort = new CSort;
                $sort->attributes = array(
                        'name','id'
                );
                $sort->defaultOrder = 'region_order ASC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
	}
   
   
   	
	
	/*public static function GetName($id)
	{    
		$models=self::model()->findByPk($id);
		$items = t("None");
		if(count($models)>0){ $items = $models->name; } 
		return $items;
	} */

   
   
   
   public static function getRankCategory($t1){
	  if( $t1==0 ) { return 'None'; }
	  if( $t1==1 ) { return 'Famous'; }
	  if( $t1==2 ) { return 'Historical'; }
	  if( $t1==3 ) { return 'Famous & Historical'; }
	
	return array(
		
		0=>"--Select--",
		1=>"Famous",
		2=>"Historical",
		3=>"Famous & Historical",
	
	 );
	}
	
   
   
   
   
    
	/* public static function GetName($id){    
		                       
               
            $models=self::model()->find(array(
		    'condition'=>'`id`=:id',
		    'params'=>array(':id'=>$id)));
			
			$items = t("None");
			
			if(count($models)>0){                
                
            $items = $models->name;
                
	    	} 
			return $items;
        } 
        */
} 


