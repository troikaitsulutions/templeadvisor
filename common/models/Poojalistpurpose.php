<?php


class Poojalistpurpose extends CActiveRecord
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
		return '{{poojalist}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, comment, puja_type, puja_nos, purpose, temple, priest, pooja_cost', 'required'),
			array('name, uid, cr_ip, mod_ip, icon_file', 'length', 'max'=>255),
			array('crby, mod_by, puja_type, puja_nos, state, district, town, purpose, temple, deity, priest, featured, created, modified, status', 'numerical', 'integerOnly'=>true),
			array('pooja_cost, total', 'numerical', 'integerOnly'=>false),
			array('icon_file', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png, jpeg','maxSize'=>1024*1024*5,'on'=>'update'),
			array('id, status, name, comment', 'safe'),
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
			'name' => t('Puja Name'),
            'comment' => t('Puja Description'),
			'purpose' => t('Purpose'),
			'pooja_cost' => t('Puja Cost'),
			'total' => t('Total Cost(Display on site)'),
			'icon_file' => t('Thumbnail Image(870x468)')
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
		$pcategory = isset($_GET['pcategory']) ? strtolower(trim($_GET['pcategory'])) : '';
		$PurposeSeo = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$pcategory)));
		$Purpose = Pujapurpose::model()->find(array('condition'=>'uid = :REGUID','params'=>array(':REGUID'=>$PurposeSeo->uid)));

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('purpose',$Purpose->id,true);
		$criteria->compare('status',1,true);
		
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
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
	         if($data!='') { return 'http://temples.s3.amazonaws.com/poojas/list/240x143/'.$data;  }
			 else { return 'http://temples.s3.amazonaws.com/no-image/no-image.png'; }
					
		} 
       
		public function getSitecost()
		{
			$TotalCost = 0;
			$PujaType = Pujatype::model()->findByPk($this->puja_type);
				
				if ( isset($PujaType) && count($PujaType)>0 ) 
				{
					if( $PujaType->id != 1415  ) 
					{
					$MarginProfit = $this->pooja_cost * ($PujaType->profit_margin/100.00);
					$ServiceTax = ( $this->pooja_cost + $PujaType->packing_cost + $PujaType->transportation_cost + $MarginProfit ) * ($PujaType->service_tax/100.00);
					$PgCost = ( $this->pooja_cost + $PujaType->packing_cost + $PujaType->transportation_cost + $MarginProfit + $ServiceTax ) * ($PujaType->pg_charge/100.00);
					$TotalCost = $this->pooja_cost + $PujaType->packing_cost + $PujaType->transportation_cost +  $MarginProfit + $ServiceTax + $PgCost;
					$TotalCost = self::round_up($TotalCost, -1);
					}
					
					if( $PujaType->id == 1415  ) 
					{
					$MarginProfit = $this->pooja_cost * ($PujaType->profit_margin/100.00);
					$PackingCost = $PujaType->packing_cost * $this->puja_nos;
					$TransportationCost = $PujaType->transportation_cost * $this->puja_nos;
					
					$ServiceTax = ( $this->pooja_cost + $PackingCost + $TransportationCost + $MarginProfit ) * ($PujaType->service_tax/100.00);
					$PgCost = ( $this->pooja_cost + $PackingCost + $TransportationCost + $MarginProfit + $ServiceTax ) * ($PujaType->pg_charge/100.00);
					$TotalCost = $this->pooja_cost + $PackingCost + $TransportationCost +  $MarginProfit + $ServiceTax + $PgCost;
					$TotalCost = self::round_up($TotalCost, -1);
					}
				} 
				
			return $TotalCost;
			
		}   
		
		public function round_up($value, $places) 
		{
			$mult = pow(10, abs($places)); 
			 return $places < 0 ?
			ceil($value / $mult) * $mult :
				ceil($value * $mult) / $mult;
		}
        


		
				
       
        
}