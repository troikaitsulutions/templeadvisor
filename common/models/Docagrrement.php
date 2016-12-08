<?php


class Docagrrement extends CActiveRecord
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
		return '{{docagrrement}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		
		
		return array(
			array('doc_name,people_type,description', 'required'),
			
			array('id,uid,doc_name,people_type,description,guid,attachment_file,created_date,modified,created,crby,mod_by,cr_ip,mod_ip', 'safe', 'on'=>'search'),
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
						'name'=>array(self::BELONGS_TO, 'Category','people_type'),
	

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
			'doc_name' => t('Document Name'),
			'people_type' => t('People Type'),
			'description' => t('Description'),
			'attachment_file' => t('Attach File'),
			
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
		$criteria->compare('doc_name',$this->doc_name,true);
		$criteria->compare('people_type',$this->people_type,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('attachment_file',$this->attachment_file,true);
		
	
                
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
    			'select'=>'t.doc_name, t.id',
    			'group'=>'t.doc_name',
   				 'distinct'=>true,
				 
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','doc_name'));                            
                }                
                
                return $data;
        }
        
}