<?php


class Recipient extends CActiveRecord
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
		return '{{recipient}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		
		
		return array(
			array('group_creation_id,recipent_first_name,recipent_last_name,recipent_email', 'required'),
			array('recipent_email','email'),
			array('recipent_email','unique'),
			array('group_creation_id', 'numerical'),
			array('id,uid,group_creation_id,recipent_first_name,recipent_last_name,recipent_email,created_date,guid,recipent_phone_no', 'safe', 'on'=>'search'),
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
					'groupcreation'=>array(self::BELONGS_TO, 'Groupcreation','group_creation_id'),
	

                ); 
				
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('Recipient id'),
			'uid' => t('uid'),
			'guid' => t('guid'),
			'group_creation_id' => t('Group Name'),
			'recipent_first_name' => t('First Name'),
			'recipent_last_name' => t('Last Name'),
			'recipent_email' => t('Email'),
			'recipent_phone_no'=>t('Phone no'),
			'guid' => t('Recipent Guid'),

			
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
		$criteria->compare('group_creation_id',$this->group_creation_id,true);
		$criteria->compare('recipent_first_name',$this->recipent_first_name,true);
		$criteria->compare('recipent_last_name',$this->recipent_last_name,true);
		$criteria->compare('recipent_email',$this->recipent_email,true);
		$criteria->compare('recipent_phone_no',$this->recipent_phone_no,true);
	
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
                );
                $sort->defaultOrder = 'id DESC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => Yii::app()->settings->get('system', 'page_size') 
             ),
		));
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
	
	/*public static function GetName($id){    
		                       
               
            $models=self::model()->find(array(
		    'condition'=>'`id`=:id',
		    'params'=>array(':id'=>$id)));
			
			$items = t("None");
			
			if(count($models)>0){                
                
                        $items = $models->name;
                
	    	} 
			return $items;
        }*/

	
	    
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
        
}