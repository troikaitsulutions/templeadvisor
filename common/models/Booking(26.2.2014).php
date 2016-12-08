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
class Booking extends CActiveRecord
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
		return '{{booking}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('booking_id, prop_id, customer_id, fdate, tdate, feedlist_id', 'required'),
			array('prop_id, customer_id, created, modified, crby, mod_by, status, peoples, adults, children, infants', 'numerical', 'integerOnly'=>true),
			array('booking_id, cr_ip, mod_ip', 'length', 'max'=>255),
            array('booking_id','safe'),
                        
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, booking_id, feedlist_id', 'safe'),
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
					'Pinfo' => array(self::BELONGS_TO, 'Pinfo', 'prop_id'),
					'Villaowner' => array(self::BELONGS_TO, 'Villaowner', 'customer_id'),
                ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'booking_id' => t('Booking No'),
			'prop_id' => t('Property Name'),
			'customer_id' => t('Customer'),
			'fdate' => t('From'),
			'tdate' => t('To'),
			'status' => t('Status'),
			'feedlist_id' => t('Third Party')
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
		$criteria->compare('booking_id',$this->booking_id,true);
		$criteria->compare('prop_id',$this->prop_id,true);
		$criteria->compare('customer_id',$this->customer_id,true);
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
                );
                $sort->defaultOrder = 'created DESC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
	}
	
	
	public function dasboardview()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id,true);
		$criteria->compare('booking_id',$this->booking_id,true);
		$criteria->compare('prop_id',$this->prop_id,true);
		$criteria->compare('customer_id',$this->customer_id,true);
                
               
        $criteria->limit = 5;
		$sort = new CSort;
		$sort->defaultOrder = 't.id DESC';
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
            'pagination'=>false,
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

	public function BookingSearch()
	{
		$criteria=new CDbCriteria;
		
		if($_GET['include_exclude']==0)
		{
			$criteria->compare('t.customer_id',$_GET['customer_id'],false);
			$criteria->compare('t.prop_id',$_GET['prop_id'],false);
			if($_GET['fdate']!='' && $_GET['tdate']!='')
			{
				$fdate = date_format(date_create($_GET['fdate']),'Y-m-d');
				$tdate = date_format(date_create($_GET['tdate']),'Y-m-d');
				$criteria->addCondition("date_add(DATE_FORMAT(FROM_UNIXTIME(`fdate`),'%Y-%m-%d'),interval 1 day) BETWEEN '$fdate' and '$tdate' OR date_add(DATE_FORMAT(FROM_UNIXTIME(`tdate`),'%Y-%m-%d'),interval 1 day) BETWEEN '$fdate' and '$tdate'");
			}
		}
		else if($_GET['include_exclude']==1)
		{
			$criteria->compare('t.customer_id!',$_GET['customer_id'],false);
			$criteria->compare('t.prop_id!',$_GET['prop_id'],false);
			if($_GET['fdate']!='' && $_GET['tdate']!='')
			{
				$fdate = date_format(date_create($_GET['fdate']),'Y-m-d');
				$tdate = date_format(date_create($_GET['tdate']),'Y-m-d');
				$criteria->addCondition("date_add(DATE_FORMAT(FROM_UNIXTIME(`fdate`),'%Y-%m-%d'),interval 1 day) NOT BETWEEN '$fdate' and '$tdate' OR date_add(DATE_FORMAT(FROM_UNIXTIME(`tdate`),'%Y-%m-%d'),interval 1 day) NOT BETWEEN '$fdate' and '$tdate'");
			}
		}

        $sort = new CSort;
		$sort->attributes = array('id');
        $sort->defaultOrder = 'created DESC';
          
		if(Yii::app()->controller->action->id=='reservation')
		{     
			return new CActiveDataProvider($this,array('criteria'=>$criteria,'sort'=>$sort,'Pagination'=>array('PageSize'=>Yii::app()->settings->get('system','page_size'))));
		}
		else
		{
			$count = self::model()->count($criteria);
			return new CActiveDataProvider($this,array('criteria'=>$criteria,'sort'=>$sort,'Pagination'=>array('PageSize'=>$count)));
		}
	}
	
	
		public function BookingarrivalSearch()
	{
		$criteria=new CDbCriteria;
		
		
			$criteria->compare('t.customer_id',$_GET['customer_id'],false);
			$criteria->compare('t.prop_id',$_GET['prop_id'],false);
			if($_GET['fdate']!='' && $_GET['tdate']!='')
			{
				$fdate = date_format(date_create($_GET['fdate']),'Y-m-d');
				$tdate = date_format(date_create($_GET['tdate']),'Y-m-d');
				$criteria->addCondition("date_add(DATE_FORMAT(FROM_UNIXTIME(`fdate`),'%Y-%m-%d'),interval 1 day) BETWEEN '$fdate' and '$tdate'");
			}
		
		
		
        $sort = new CSort;
		$sort->attributes = array('id');
        $sort->defaultOrder = 'created DESC';
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
	}
	
	function booking_thirdparty($feedlist)
	{
		$feedlist_arr = explode('-',$feedlist);
		if($feedlist_arr[0]=='FP') $name = Feedlist::GetName($feedlist_arr[1]);
		else if($feedlist_arr[0]=='TA') $name = Villaowner::GetName($feedlist_arr[1]);
		else $name = t("None");
		return $name;
	}
	
	public static function GetAll($render=true){    
	           //$objects=self::model()->findAll();    
				$region_id=1045;
				$objects = Province::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			'group'=>'t.name',
   				'distinct'=>true,
				'condition'=>'source = '.(int) $region_id.' AND lang ='.CurrentLangId(),
				));            
               
                $data=array(''=>t("Select"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
}?>