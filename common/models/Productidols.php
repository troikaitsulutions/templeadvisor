<?php


class Productidols extends CActiveRecord
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
			array('name, description, short_desc, category, vendor, cost, margin_type, packing_cost, shipping_cost, margin_cost, service_tax, total', 'required'),
			array('name, uid, cr_ip, mod_ip, icon_file, vendor_sku, vendor_product_name', 'length', 'max'=>255),
			array('crby, status, mod_by, created, modified, vendor, scategory, color, minorderqty, material, height, width, depth, weight, featured, best_selling', 'numerical', 'integerOnly'=>false),
			array('icon_file', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png, jpeg','maxSize'=>1024*1024*5,'on'=>'update'),
			array('id, uid, status, name', 'safe'),
		);
	}

	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
			'name' => t('Idols Name'),
            'comment' => t('Product Description'),
			'minorderqty' => t('Min. Order Qty'),
			'scategory' => t('Sub Category'),
			'cost' => t('Cost'),
			'height' => t('Height(cms)'),
			'width' => t('Width(cms)'),
			'depth' => t('Depth(cm)'),
			'weight' => t('Weight(gms)'),
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
                $sort->defaultOrder = 'id ASC';
                

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
	         if($data!='') { return 'http://temples.s3.amazonaws.com/products/idols/240x143/'.$data;  }
			 else { return 'http://temples.s3.amazonaws.com/no-image/no-image.png'; }
					
		} 
        
       
        
        
       
        
       
        
}