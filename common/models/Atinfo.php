<?php


class Atinfo extends CActiveRecord
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
		return '{{atinfo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		
		
		return array(
			array('status, type, name','required'),
			array('name, state,  district, town, comment,  t1_name, t2_name, t3_name, m1_name, m2_name, m3_name, h1_name, h2_name, h3_name , t1_from, t1_to, t2_from, t2_to, t3_from, t3_to, m1_from, m2_from, m3_from, m1_to, m2_to, m3_to, h1_from, h2_from, h3_from, h1_to, h2_to, h3_to, tele, mobile, address, contact_people, email, latitude, longitude, best_time, visit_hour, facility', 'safe'),
			array(' id, crby, created, modified, mod_by, status, addtohome', 'numerical', 'integerOnly'=>true),
			array(' name, mod_ip, cr_ip', 'length', 'max'=>255),
			
			array('id, name', 'safe', 'on'=>'search'),
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
					'District' => array(self::BELONGS_TO, 'District', 'district'),
					'Atlist' => array(self::BELONGS_TO, 'Atlist', 'type'),
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
			'status'=> t('Status'),
			'type' => t('Under the type'),
			'state' => t('State'),
			'district' => t('District'),
			'town'=> t('Town/Area'),
			'comment' => t('Comment'),
			'address' => t('Address'),
			'tele'=> t('Contact Number 1'),
			'mobile' => t('Contact Number 2'),
			'facility' => t('Available Facilities'),
			'best_time'=> t('Best Time'),
			'visit_hour' => t('Duration'),
			'contact_people' => t('Contact Person'),
			'email' => t('Email Id'),
			'addtohome' => t('Add to Quick List On Home'),
			
           
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

		//$criteria->with = array('District');
		$criteria->compare('name',$this->name,true);
                $sort = new CSort;
                $sort->attributes = array('name, type, district, state');
                $sort->defaultOrder ='district, type  ASC';
                

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
		
	public static function GetAllWithType($render=true){    
	           //$objects=self::model()->findAll();    
				
				$objects = Atlist::model()->findAll(array(
    				'group'=>'t.name'
				));            
               
                $data=array(''=>t("None"));      
                
				$sort->defaultOrder = 'name  ASC';
                
				if($objects && count($objects) > 0 ){
                    $data = CMap::mergeArray($data,CHtml::listData($objects,'id','name','TypeName.name'));                            
                }                
                
                return $data;
        }
		
		
		
		public static function getTiming1($t1){
	  if( $t1==0 ) { return '00:00'; }
	  if( $t1==1 ) { return '00:30'; }
	  if( $t1==2 ) { return '01:00'; }
	  if( $t1==3 ) { return '01:30'; }
	  if( $t1==4 ) { return '02:00'; }
	  if( $t1==5 ) { return '02:30'; }
	  if( $t1==6 ) { return '03:00'; }
	  if( $t1==7 ) { return '03:30'; }
	  if( $t1==8 ) { return '04:00'; }
	  if( $t1==9 ) { return '04:30'; }
	  if( $t1==10 ) { return '05:00'; }
	  if( $t1==11 ) { return '05:30'; }
	  if( $t1==12 ) { return '06:00'; }
	  if( $t1==13 ) { return '06:30'; }
	  if( $t1==14 ) { return '07:00'; }
	  if( $t1==15 ) { return '07:30'; }
	  if( $t1==16 ) { return '08:00'; }
	  if( $t1==17 ) { return '08:30'; }
	  if( $t1==18 ) { return '09:00'; }
	  if( $t1==19 ) { return '09:30'; }
	  if( $t1==20 ) { return '10:00'; }
	  if( $t1==21 ) { return '10:30'; }
	  if( $t1==22 ) { return '11:00'; }
	  if( $t1==23 ) { return '11:30'; }
	  if( $t1==24 ) { return '12:00'; }
	  if( $t1==25 ) { return '12:30'; }
	  if( $t1==26 ) { return '13:00'; }
	  if( $t1==27 ) { return '13:30'; }
	  if( $t1==28 ) { return '14:00'; }
	  if( $t1==29 ) { return '14:30'; }
	  if( $t1==30 ) { return '15:00'; }
	  if( $t1==31 ) { return '15:30'; }
	  if( $t1==32 ) { return '16:00'; }
	  if( $t1==33 ) { return '16:30'; }
	  if( $t1==34 ) { return '17:00'; }
	  if( $t1==35 ) { return '17:30'; }
	  if( $t1==36 ) { return '18:00'; }
	  if( $t1==37 ) { return '18:30'; }
	  if( $t1==38 ) { return '19:00'; }
	  if( $t1==39 ) { return '19:30'; }
	  if( $t1==40 ) { return '20:00'; }
	  if( $t1==41 ) { return '20:30'; }
	  if( $t1==42 ) { return '21:00'; }
	  if( $t1==43 ) { return '21:30'; }
	  if( $t1==44 ) { return '22:00'; }
	  if( $t1==45 ) { return '22:30'; }
	  if( $t1==46 ) { return '23:00'; }
	  if( $t1==47 ) { return '23:30'; }
	  if( $t1==48 ) { return '24:00'; }
	  
		
	return array(
		
		0=>"--Select--",
		1=>"00:30",
		2=>"01:00",
		3=>"01:30",
		4=>"02:00",
		5=>"02:30",
		6=>"03:00",
		7=>"03:30",
		8=>"04:00",
		9=>"04:30",
		10=>"05:00",
		11=>"05:30",
		12=>"06:00",
		13=>"06:30",
		14=>"07:00",
		15=>"07:30",
		16=>"08:00",
		17=>"08:30",
		18=>"09:00",
		19=>"09:30",
		20=>"10:00",
		21=>"10:30",
		22=>"11:00",
		23=>"11:30",
		24=>"12:00",
		25=>"12:30",
		26=>"13:00",
		27=>"13:30",
		28=>"14:00",
		29=>"14:30",
		30=>"15:00",
		31=>"15:30",
		32=>"16:00",
		33=>"16:30",
		34=>"17:00",
		35=>"17:30",
		36=>"18:00",
		37=>"18:30",
		38=>"19:00",
		39=>"19:30",
		40=>"20:00",
		41=>"20:30",
		42=>"21:00",
		43=>"21:30",
		44=>"22:00",
		45=>"22:30",
		46=>"23:00",
		47=>"23:30",
		48=>"24:00"
	
	 );
	}
	
	
	public static function getTiming2($t2){
	  if( $t2==0 ) { return '00:00'; }
	  if( $t2==1 ) { return '00:30'; }
	  if( $t2==2 ) { return '01:00'; }
	  if( $t2==3 ) { return '01:30'; }
	  if( $t2==4 ) { return '02:00'; }
	  if( $t2==5 ) { return '02:30'; }
	  if( $t2==6 ) { return '03:00'; }
	  if( $t2==7 ) { return '03:30'; }
	  if( $t2==8 ) { return '04:00'; }
	  if( $t2==9 ) { return '04:30'; }
	  if( $t2==10 ) { return '05:00'; }
	  if( $t2==11 ) { return '05:30'; }
	  if( $t2==12 ) { return '06:00'; }
	  if( $t2==13 ) { return '06:30'; }
	  if( $t2==14 ) { return '07:00'; }
	  if( $t2==15 ) { return '07:30'; }
	  if( $t2==16 ) { return '08:00'; }
	  if( $t2==17 ) { return '08:30'; }
	  if( $t2==18 ) { return '09:00'; }
	  if( $t2==19 ) { return '09:30'; }
	  if( $t2==20 ) { return '10:00'; }
	  if( $t2==21 ) { return '10:30'; }
	  if( $t2==22 ) { return '11:00'; }
	  if( $t2==23 ) { return '11:30'; }
	  if( $t2==24 ) { return '12:00'; }
	  if( $t2==25 ) { return '12:30'; }
	  if( $t2==26 ) { return '13:00'; }
	  if( $t2==27 ) { return '13:30'; }
	  if( $t2==28 ) { return '14:00'; }
	  if( $t2==29 ) { return '14:30'; }
	  if( $t2==30 ) { return '15:00'; }
	  if( $t2==31 ) { return '15:30'; }
	  if( $t2==32 ) { return '16:00'; }
	  if( $t2==33 ) { return '16:30'; }
	  if( $t2==34 ) { return '17:00'; }
	  if( $t2==35 ) { return '17:30'; }
	  if( $t2==36 ) { return '18:00'; }
	  if( $t2==37 ) { return '18:30'; }
	  if( $t2==38 ) { return '19:00'; }
	  if( $t2==39 ) { return '19:30'; }
	  if( $t2==40 ) { return '20:00'; }
	  if( $t2==41 ) { return '20:30'; }
	  if( $t2==42 ) { return '21:00'; }
	  if( $t2==43 ) { return '21:30'; }
	  if( $t2==44 ) { return '22:00'; }
	  if( $t2==45 ) { return '22:30'; }
	  if( $t2==46 ) { return '23:00'; }
	  if( $t2==47 ) { return '23:30'; }
	  if( $t2==48 ) { return '24:00'; }
	  
		
	return array(
		
		0=>"--Select--",
		1=>"00:30",
		2=>"01:00",
		3=>"01:30",
		4=>"02:00",
		5=>"02:30",
		6=>"03:00",
		7=>"03:30",
		8=>"04:00",
		9=>"04:30",
		10=>"05:00",
		11=>"05:30",
		12=>"06:00",
		13=>"06:30",
		14=>"07:00",
		15=>"07:30",
		16=>"08:00",
		17=>"08:30",
		18=>"09:00",
		19=>"09:30",
		20=>"10:00",
		21=>"10:30",
		22=>"11:00",
		23=>"11:30",
		24=>"12:00",
		25=>"12:30",
		26=>"13:00",
		27=>"13:30",
		28=>"14:00",
		29=>"14:30",
		30=>"15:00",
		31=>"15:30",
		32=>"16:00",
		33=>"16:30",
		34=>"17:00",
		35=>"17:30",
		36=>"18:00",
		37=>"18:30",
		38=>"19:00",
		39=>"19:30",
		40=>"20:00",
		41=>"20:30",
		42=>"21:00",
		43=>"21:30",
		44=>"22:00",
		45=>"22:30",
		46=>"23:00",
		47=>"23:30",
		48=>"24:00"
	
	 );
	}
	
	
	public static function getMonth($t1){
	  if( $t1==0 ) { return 'None'; }
	  if( $t1==1 ) { return 'January'; }
	  if( $t1==2 ) { return 'February'; }
	  if( $t1==3 ) { return 'March'; }
	  if( $t1==4 ) { return 'April'; }
	  if( $t1==5 ) { return 'May'; }
	  if( $t1==6 ) { return 'June'; }
	  if( $t1==7 ) { return 'July'; }
	  if( $t1==8 ) { return 'August'; }
	  if( $t1==9 ) { return 'September'; }
	  if( $t1==10 ) { return 'October'; }
	  if( $t1==11 ) { return 'November'; }
	  if( $t1==12 ) { return 'December'; }
	
	
	return array(
		
		0=>"--Select--",
		1=>"January",
		2=>"February",
		3=>"March",
		4=>"April",
		5=>"May",
		6=>"June",
		7=>"July",
		8=>"August",
		9=>"September",
		10=>"October",
		11=>"November",
		12=>"December"
		
	 );
	}
		
      public static function getDays($t1){
	  if( $t1==0 ) { return 'None'; }
	  if( $t1==1 ) { return 'Sunday'; }
	  if( $t1==2 ) { return 'Monday'; }
	  if( $t1==3 ) { return 'Tuesday'; }
	  if( $t1==4 ) { return 'Wednesday'; }
	  if( $t1==5 ) { return 'Thursday'; }
	  if( $t1==6 ) { return 'Friday'; }
	  if( $t1==7 ) { return 'Saturday'; }
	
	return array(
		
		0=>"--Select--",
		1=>"Sunday",
		2=>"Monday",
		3=>"Tuesday",
		4=>"Wednesday",
		5=>"Thursday",
		6=>"Friday",
		7=>"Saturday",
	
	 );
	}
		  
}