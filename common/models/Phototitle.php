<?php


class Phototitle extends CActiveRecord
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
		return '{{phototitle}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			
			array('name', 'required'),
			
			array('id,  name,  alt_text, description','safe'),
			
			array('id', 'safe', 'on'=>'search'),
		);
		
		
		
	}
	


	
	 
	 
	public function attributeLabels()
	{
		return array(
		'name' => t('Photo Title (English)'),
		'alt_text' => t('Alternative Text For Photo Title (English)'),
		'description' => t('Description For Photo Title (English)'),
		
	
			 
		
		);
		
		}



public function search()
	{
		

		$criteria=new CDbCriteria;

		
		$criteria->compare('name',$this->name,true);
		
		
		
		$criteria->compare('alt_text',$this->alt_text,true);
		
		
		
		$criteria->compare('description',$this->description,true);
		
		


                
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
		
	public static function GetNameLang($id, $la){    
		                       
               
            $models=self::model()->findByPk($id);
			
			$items = t("None");
			
			if( count($models)>0 ){ 
			
						if( $la == 'it') $items = $models->name_it;
						if( $la == 'fr') $items = $models->name_fr;
						if( $la == 'de') $items = $models->name_de;
						if( $la == 'ru') $items = $models->name_ru;
						if( $la == 'es') $items = $models->name_es;
                
	    	} 
						return $items;
        }


	
	    
    public static function GetAll($id=true){    
	           $objects=self::model()->findAll();    
				
				           
               
                $data=array(''=>t("None"));      
                
                if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name'));                            
                }                
                
                return $data;
        } 
		
		
		
		
		  
		
	    
}