<?php


class Villaowner extends CActiveRecord
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
		return '{{people}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		
		
		return array(
			array('created, modified, status, name, display_name, category, address1, country, zip, email', 'required'),
			// array( 'terms_condition', 'required', 'requiredValue'=>'Selected' ),
			array('id, crby, created, modified, status, category', 'numerical', 'integerOnly'=>true),
			array('uid, name, skype, code, display_name, address1, zip, address2, town, province, email2, company, fax, cr_ip, mod_ip', 'length', 'max'=>255),
			array('user_url','length','max'=>500),
			array('bank_details, note','length','max'=>1000),
			array('email', 'email'),
            array('email','unique'),
			array('tele, mobile', 'my_required'),
			array('id, name, uid, display_name, user_url, avatar,mobile2,terms_condition', 'safe'),
		);
	}
	
	public function my_required($attribute_name, $params)
{
    if (empty($this->tele) && empty($this->mobile) ) 
	{
        $this->addError($attribute_name, Yii::t('user', 'At least 1 contact number must be filled up properly'));

        return false;
    }

    return true;
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
                    'Category' => array(self::BELONGS_TO, 'Category', 'category'),
                ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 
	
	 
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
			'name' => t('Name'),
			'display_name' => t('Display Name'),
			'company' => t('Company Name'),
			'address1' => t('Address Line 1'),
			'address2' => t('Address Line 2'),
			'town' => t('City'),
			'skype' => t('Skype ID'),
			'province' => t('State'),
			'country' => t('Country'),
			'zip' => t('ZIP Code'),
			'tele' => t('Telephone Number'),
			'mobile' => t('Mobile Phone Number 1'),
			'mobile2' => t('Mobile Phone Number 2'),
			'fax' => t('FAX'),
			'email' => t('Primary email ID'),
			'email2' => t('Additional email id'),
			'user_url' => t('Owner Website'),
			'bank_details' => t('Bank Details'),
			'note' => t('Notes'),
			'gender' => t('Gender'),
			'bio' => t('BIO'),
			'status' => t('Active Status'),
			'lang' => t('Language'),
			'terms_condition' => t('Accept Terms & Conditions'),
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
		$criteria->with = array('Category');
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.display_name',$this->display_name,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.tele',$this->tele,true);
		$criteria->compare('Category.name',$this->category,true);
		if(user()->isAgent) $criteria->compare('t.category','102',true);
			$criteria->compare('t.zip',$this->zip,true);
				$criteria->compare('t.address1',$this->address1,true);
				if((user()->isAgent) || (user()->isVillaOwner))
		{
			$user = User::model()->find(array('condition'=>"user_id='".user()->id."'"));
			$criteria->compare('t.id',$user->people_id);
		}
                
                $sort = new CSort;
                $sort->attributes = array(
                        't.id',
                );
                $sort->defaultOrder = 'Category.name,t.name ASC';
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
	}
        
	public function tasearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id,true);
		$criteria->with = array('Category');
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.display_name',$this->display_name,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.tele',$this->tele,true);
		$criteria->compare('Category.name',$this->category,true);
		$criteria->compare('t.category','102',true);
			$criteria->compare('t.zip',$this->zip,true);
				$criteria->compare('t.address1',$this->address1,true);
                
                $sort = new CSort;
                $sort->attributes = array(
                        't.id',
                );
                $sort->defaultOrder = 'Category.name,t.name ASC';
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
	}
        
    
	
	public function dashboardview()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id,true);
		$criteria->with = array('Category');
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.display_name',$this->display_name,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.tele',$this->tele,true);
		
		if((user()->isAgent) || (user()->isVillaOwner))
		{
			$user = User::model()->find(array('condition'=>"user_id='".user()->id."'"));
			$criteria->compare('t.id',$user->people_id);
		}
                
              	$criteria->limit = 5;
		$sort = new CSort;
		$sort->defaultOrder = 't.id DESC';
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
           
			'sort'=>$sort,
            'pagination'=>false,
		));
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
		
	public static function GetOwner($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			'group'=>'t.name',
   				'distinct'=>true,
				'condition'=>'category=101',
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
		
		public static function GetPriest($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			'group'=>'t.name',
   				'distinct'=>true,
				'condition'=>'category=106',
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
		
		public static function GetAstrologer($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			'group'=>'t.name',
   				'distinct'=>true,
				'condition'=>'category=107',
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
		
		public static function GetHomam($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			'group'=>'t.name',
   				'distinct'=>true,
				'condition'=>'category=108',
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
		
		public static function GetVendor($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			'group'=>'t.name',
   				'distinct'=>true,
				'condition'=>'category=109',
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
		
		public static function GetTa($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			'group'=>'t.name',
   				'distinct'=>true,
				'condition'=>'category=110',
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
		
		
		public static function GetContacts($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			'group'=>'t.name',
   				'distinct'=>true,
				'condition'=>'category=106',
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
		
		
		public static function GetCustomer($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = self::model()->findAll(array(
    			'select'=>'t.name, t.id',
    			'group'=>'t.name',
   				'distinct'=>true,
				'condition'=>'category=100',
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
        
    public static function GetTaAll($render=true){    
			$objects = self::model()->findAll(array(
			'select'=>'t.name, CONCAT("TA-",t.id) as id',
			'condition'=>"category='102'",
			'group'=>'t.name',
			'distinct'=>true,
			));            
		   
			if($objects && count($objects) > 0 ){
				$data = CHtml::listData($objects,'id','name');                            
			} 
			else{ $data = array(); }               
			
			return $data;
	}
} ?>