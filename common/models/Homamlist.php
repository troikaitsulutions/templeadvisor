<?php


class Homamlist extends CActiveRecord
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
		return '{{homamlist}}';
	}
	

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, comment, purpose, cost, packing_cost, shipping_cost, margin_cost, margin_type, service_tax, priest', 'required'),
			array('name, cr_ip, mod_ip, uid, icon_file', 'length', 'max'=>255),
			array('crby, mod_by, cost, packing_cost, shipping_cost, total, margin_cost, service_tax, purpose, priest, featured, created, modified, status', 'numerical', 'integerOnly'=>false),
			array('icon_file', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png, jpeg','maxSize'=>1024*1024*5,'on'=>'update'),
			array('id, uid, status, name, comment', 'safe'),
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
			'name' => t('Homam Name'),
            'comment' => t('Homam Description'),
			'purpose' => t('Purpose'),
			'cost' => t('Cost'),
			'shipping_cost' => t('Postal Charges'),
			'icon_file' => t('Thumbnail Image(600x400)'),
			'priest' => t('Priest(Homam)')
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
		$criteria->compare('status',1,true);
		
		
         if ( (isset($_GET['filter']) && ($_GET['filter']!='' ) ) )
		{
			$criteria2 = new CDbCriteria;
			
			$pieces = explode(",", $_GET['filter']);
			
			if(is_array($pieces)) {
				foreach ($pieces as $key => $value) 
					{ 
						$criteria2->compare('purpose', $value, false, 'OR');
					} 
			}
			
			
			
			$criteria->mergeWith($criteria2, 'AND');
	
		}
		
                $sort = new CSort;
                $sort->attributes = array(
                        'name','id'
                );
			
			if(isset($_GET['sort']) && ($_GET['sort']!='' ) )
			{
				$sort->defaultOrder = $_GET['sort'];
			} else {
				
				$sort->defaultOrder = 'id DESC';
			}
			
				
                
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
			'Pagination' => array (
                  'PageSize' => 15 
             ),
		));
	}
	

	
    protected function afterDelete()
        {
             Seo::model()->deleteAll('uid = :id',array(':id'=>$this->uid)); 	
        }    
       
    
		
		
		public static function GetThumbnail($data)
		{               
	         if($data!='') { return 'http://temples.s3.amazonaws.com/homam/list/240x143/'.$data;  }
			 else { return 'http://temples.s3.amazonaws.com/no-image/no-image.png'; }
					
		}  
        
       
        
       
        
}