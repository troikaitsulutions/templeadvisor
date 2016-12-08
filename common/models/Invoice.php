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
class Invoice extends CActiveRecord
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
		return '{{invoice}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('booking_id, prop_id, customer_id, fdate, tdate, actual_price, price_per, peoples, adults, children, infants', 'required'),
			array('prop_id, customer_id, created, modified, crby, mod_by, status, peoples, adults, children, infants', 'numerical', 'integerOnly'=>true),
			array('booking_id, cr_ip, mod_ip', 'length', 'max'=>255),
            array('booking_id','safe'),
                        
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, booking_id, prop_id, customer_id, created, modified, crby, mod_by, status, peoples, adults, children, infants, fdate, tdate, actual_price, price_per, discount_type, discount_value', 'safe'),
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
	
}?>