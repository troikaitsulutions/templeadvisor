<?php


class Tourpackage extends CActiveRecord
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
		return '{{tourpackage}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, comment, days, category, subcategory', 'required'),
			array('name, uid, cr_ip, mod_ip, icon_file, temples', 'length', 'max'=>255),
			array('crby, mod_by, days, agent, featured, created, modified, status', 'numerical', 'integerOnly'=>false),
			array('icon_file', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png, jpeg','maxSize'=>1024*1024*5,'on'=>'update'),
			array('id, uid, status, name, terms, comment, destination, inclusion', 'safe'),
			array('id, name, category, subcategory, agent', 'safe', 'on'=>'search'),
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
             'tourcategory' => array(self::BELONGS_TO, 'Tourcategory', 'category'),
			 'toursubcategory' => array(self::BELONGS_TO, 'Toursubcategory', 'subcategory'),
               ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
			'name' => t('Package Name'),
            'comment' => t('Package Description'),
			'terms' => t('Terms &amp; Conditoin'),
			
			'icon_file' => t('Thumbnail Image(870x468)'),
			
			'inclusion' => t('Whats included')
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
		$criteria->compare('category',$this->category,true);
		$criteria->compare('subcategory',$this->subcategory,true);
		$criteria->compare('agent',$this->agent,true);
		
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id','name'
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
   				
				));            
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        }
		
	

	protected function afterDelete()
        {
             Seo::model()->deleteAll('uid = :id',array(':id'=>$this->uid)); 	
        }
        
       
        public static function GetThumbnail($data)
		{   
		
		 if($data!='') { return 'http://temples.s3.amazonaws.com/tours/packages/240x143/'.$data;  }
			 else { return 'http://temples.s3.amazonaws.com/no-image/no-image.png'; }            
	         
		
			 	
		}
        
       
        
       
        
}