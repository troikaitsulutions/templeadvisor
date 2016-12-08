<?php


class Itinerarydetail extends CActiveRecord
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
		return '{{itinerarydetail}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tid, day, itinerary, comment', 'required'),
			array('id, crby, mod_by, created, modified, status, itinerary, tid, day', 'numerical', 'integerOnly'=>true),
			array('cr_ip, mod_ip', 'length', 'max'=>255),
			array('id, itinerary', 'safe', 'on'=>'search'),
		);
	}
	
	public function checkCost() 
	{        
		$Cost = self::model()->findAll(array(
					'condition'=>'tid = :TID AND vehicle = :VEH AND accomodation = :ACC',
					'params'=>array(':TID'=>$this->tid, ':VEH'=>$this->vehicle, ':ACC'=>$this->accomodation)));
		
		if ( isset($Cost) && count($Cost)>0 ) 
		{
			$this->addError("tid", 'The Cost Already Added');
		}
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		 return array(                    
             'Tourpackages' => array(self::BELONGS_TO, 'Tourpackage', 'tid'),
			 'Vehicle' => array(self::BELONGS_TO, 'Vehicles', 'vehicle'),
			 'Accomodation' => array(self::BELONGS_TO, 'Accomodations', 'accomodation'),
               ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
			'tid' => t('Package Name'),
            'comment' => t('Comment'),
			'accomodation' => t('Accomodation Type'),
			'vehicle' => t('Vehicle Type'),
			'cost' => t('Actual Cost'),
			'profit_margin' => t('Margin Cost'),
			'service_tax' => t('Service Tax(%)'),
			'pg_charge' => t('PG Service Charge(%)'),
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

		$criteria->compare('tid',$this->tid,true);
		
		
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id','tid'
                );
                $sort->defaultOrder = 'tid ASC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
	}   
        
}