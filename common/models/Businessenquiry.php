<?php


class Businessenquiry extends CActiveRecord
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
		return '{{businessenquiry}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		
		
		return array(
			array(' created,  status, name, companyname, nob,  ep,  email, phoneno, comments', 'required'),
			array('id, crby, mod_by, created, modified, status, state, addtohome', 'numerical', 'integerOnly'=>true),
			
			array(' name, cr_ip, mod_ip, email, phoneno, city', 'length', 'max'=>255),
			array('id, name, companyname, city,  nob,  ep, email, phoneno, comments ', 'safe'),
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
                   
					
                ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
			'name' => t('Name : '),
			'companyname' => t('Company Name : '),
			'city' => t('City/Town : '),
			'nob' => t('Natural of business : '),
			'email' => t('Email ID : '),
			'phoneno' => t('Phone Number : '),
			'ep' => t('Enquiry Purpose : '),
			'comments' => t('Comments : '),
			'state' => t('State : '),
		

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
		
                $sort = new CSort;
                $sort->attributes = array('id','name');
                $sort->defaultOrder = 'id DESC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
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
		

	
	
	
	public static function getNaturalOfBusiness($n){
		
	  if( $n==0 ) { return '--Select--'; }
	  if( $n==1 ) { return 'Hotel'; }
	  if( $n==2 ) { return 'Restaurants'; }
	  if( $n==3 ) { return 'Travel Operator'; }
	  if( $n==4 ) { return 'Tour Operator & Guide'; }
	  if( $n==5 ) { return 'Others'; }
	 
		return array(
		
		0=>"--Select--",
		1=>"Hotel",
		2=>"Restaurants",
		3=>"Travel Operator",
		4=>"Tour Operator & Guide",
		5=>"Others"
		);
		
	}
	
	public static function getEnquiryPurpose($e){
		
	  if( $e==0 ) { return '--Select--'; }
	  if( $e==1 ) { return 'Travel arrangement & Booking'; }
	  if( $e==2 ) { return 'For Advertisement'; }
	  if( $e==3 ) { return 'Other Business'; }
		
		return array(
		
		0=>"--Select--",
		1=>"Travel arrangement & Booking",
		2=>"For Advertisement",
		3=>"Other Business",
		
		
		);
	}
	
	

}