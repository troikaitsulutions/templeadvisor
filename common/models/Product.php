<?php


class Product extends CActiveRecord
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
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, short_desc, pcode, category, cost, margin_type, packing_cost, shipping_cost, margin_cost, service_tax, vendor', 'required'),
			array('name, cr_ip, mod_ip, singer, music_director, producer', 'length', 'max'=>255),
			array('crby, status, mod_by, created, media_type, file_type, language, height, width, depth, weight, pages, print, edition, vendor', 'numerical', 'integerOnly'=>false),
			array('id, status, name, tracklist', 'safe'),
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
			'name' => t('Product Name'),
            'comment' => t('Product Description'),
			'purpose' => t('Purpose'),
			'cost' => t('Cost'),
			'total' => t('Selling Price')
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
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
                );
                $sort->defaultOrder = 'id DESC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>$sort
		));
	}
	

	protected function afterDelete()
        {
             Seo::model()->deleteAll('uid = :id',array(':id'=>$this->uid)); 	
        }
        
       
      public static function GetThumbnail($data)
		{
			
			if( $data != '' ) {
			$FndCat = self::model()->find(array('condition'=>'icon_file = "'.$data.'"'));
			
		   if( isset($FndCat) && count($FndCat)>0 ) {
				
			switch ($FndCat->category) {
				case 1000:
        			return 'http://temples.s3.amazonaws.com/products/cds/240x143/'.$data;
        			break;
					
				case 1001:
        			return 'http://temples.s3.amazonaws.com/products/books/240x143/'.$data;
        			break;
				
				case 3006:
        			return 'http://temples.s3.amazonaws.com/products/poojaitems/240x143/'.$data;
        			break;
					
				case 3007:
        			return 'http://temples.s3.amazonaws.com/products/idols/240x143/'.$data;
        			break;
				case 3008:
        			return 'http://temples.s3.amazonaws.com/products/otheritems/240x143/'.$data;
        			break;	
					
				default:
        			return 'http://temples.s3.amazonaws.com/no-image/no-image.png';
				}				
			               
		   } } else {
			
			  return 'http://temples.s3.amazonaws.com/no-image/no-image.png'; 
		   }
					
		} 
           
        
       
        
       
        
}