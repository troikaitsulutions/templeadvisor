<?php


class Contributemyarticle extends CActiveRecord
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
		return '{{articles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		
		
		return array(
			array('created,  status, name, heading,  email_id, content1 ', 'required'),
			array('id, crby, mod_by, created, modified, status, addtohome', 'numerical', 'integerOnly'=>true),
			array('img_url_1, img_url_2, img_url_3, img_url_4, img_url_5', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png, jpeg'),
			array('name, cr_ip, mod_ip, email_id, phoneno ', 'length', 'max'=>255),
			array('id, name, heading,  email_id, phoneno, content1 , img_url_1, img_url_2, img_url_3, img_url_4, img_url_5', 'safe'),
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
			'email_id' => t('Email ID : '),
			'phoneno' => t('Phone Number : '),
			'heading' => t('Heading : '),
			'content1' => t('Article : '),
			'img_url_1' => t('Upload image 1 :'),
			'img_url_2' => t('Upload image 2 :'),
			'img_url_3' => t('Upload image 3 :'),
			'img_url_4' => t('Upload image 4 :'),
			'img_url_5' => t('Upload image 5 :')
		


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
		$criteria->compare('email_id',$this->email_id,true);
		
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
		

public static function GetThumbnail($data)
		{               
	                // $image= ($data->status==ConstantDefine::USER_STATUS_ACTIVE) ? 'active' : 'disabled';
					
		     	//	 $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
		
			 		return 'http://temples.s3.amazonaws.com/'.$data->id.'/thumb/'.$data->img_url_1; 
					//return FRONT_SITE_URL.'resources/'.$data->prop_id.'/thumb/'.$data->img_url; 
		}



	

}