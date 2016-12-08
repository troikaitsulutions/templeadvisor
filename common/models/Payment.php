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
class Payment extends CActiveRecord
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
		return '{{payment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('uid, deposit, balance_due, final_clean, commission', 'required'),
			array('ta_discount, tax, deposit, balance_due,tourist_tax', 'numerical', 'integerOnly'=>true),
			array('security', 'type', 'type'=>'float'),
			array('ac, heating,  final_clean', 'length', 'max'=>255),
			
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
			'security' => t('Security Deposit(&euro;)'),
  			'heating' => t('Heating/week(&euro;)'),
			'final_clean' => t('Final Cleaning/Week(&euro;)'),
			'commission' => t('Listing Commission(%)'),
			'ac' => t('Air Conditioning/week(&euro;)'),
			'tax' => t('TAX(%)'),
			'ta_discount' => t('Travel Agent Discount(%)'),
			'deposit' => t('Deposit(%)'),
			'balance_due' => t('Balance Due Days'),
			'tourist_tax' => t('Tourist Tax%'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public static function GetCommission($id){    
		                       
               
             $models=self::model()->find(array(
		    'condition'=>'uid=:id',
		    'params'=>array(':id'=>$id)));
			
			$items = t("None");
			
			if(count($models)>0){                
                        $items = t($models->commission);  
	    	} 
			return $items;
        }
        
}