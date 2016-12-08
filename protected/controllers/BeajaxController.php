<?php
/**
 * Backend Block Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeajaxController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        array('label'=>t('Manage Block'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'button')),
                        array('label'=>t('Add Block'), 'url'=>array('create'),'linkOptions'=>array('class'=>'button')),
                );
		 
	}
                 
        /**
	 * The function that do Create new Block
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('block_create');
	}
        
       
        
        /**
	 * The function that do Manage Block
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('block_admin');
	}
        
        /**
	 * The function that view Block details
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Update this Block'), 'url'=>array('update','id'=>$id),'linkOptions'=>array('class'=>'button')),
                            array('label'=>t('View this Block'), 'url'=>array('view','id'=>$id),'linkOptions'=>array('class'=>'button'))
                        )
                    );
		$this->render('block_view');
	}
        
        /**
	 * The function that update Block
	 * 
	 */
	public function actionUpdate()
	{                
                $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;                
                $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Update this Block'), 'url'=>array('update','id'=>$id),'linkOptions'=>array('class'=>'button')),
                            array('label'=>t('View this Block'), 'url'=>array('view','id'=>$id),'linkOptions'=>array('class'=>'button'))
                        )
                    );
		$this->render('block_update',array('id'=>$id));
	}
        
        
        /**
	 * The function is to Delete Block
	 * 
	 */
	public function actionLoadprices()
	{  
		
	if(isset($_GET['class'])) {
		
		$data = Price::model()->findByPk($_GET['class']); 
		
		//$market_tour =  $data->market_tour;
		//$shuttle_transfer = $data->shuttle_transfer;
		
		if ( $data->market_tour == 0 ) {
			$market_tours[0]='Market tour not available for this package';
		} else {
			$market_tours[0]='Not interest';
			$market_tours[$data->market_tour] = 'Maket Tour ('.$data->market_tour.' Euro Per Person )';
		}
		
		foreach($market_tours as $value=>$name)
                $market_tour .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
		if ( $data->shuttle_transfer == 0 ) {
			$shuttle_transfers[0]='Shuttle Transffer not available for this package';
		} else {
			$shuttle_transfers[0]='Not interest';
			$shuttle_transfers[$data->shuttle_transfer] = 'Shuttle Transfer ('.$data->shuttle_transfer.' Euro Per Person From Meeting Point )';
		}
		
		foreach($shuttle_transfers as $value=>$name)
                $shuttle_transfer .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
		
		if($data->days == 1) 
		{ 
			for($i=1;$i<=15;$i++) { $no_of_days[$i] = $i; }	
		} else { 
			$no_of_days[$data->days] = $data->days; 
		}
		
		if($data->people == 1) 
		{ 
			for($i=1;$i<=15;$i++) { $no_of_people[$i] = $i; }	
		} else { 
			$no_of_people[$data->people] = $data->people; 
		}
		
            foreach($no_of_days as $value=>$name)
                $no_of_day .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
			foreach($no_of_people as $value=>$name)
                $no_of_peoples .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
			
			$tax = $data->price*($data->tax/100);
			$gt =  (float)$data->price+(float)$tax;
			$cart = '<div class="extra_members_amount"> <div class="form_left_amount">'.$data->class_type.'</div> <div class="form_left_amount_second_second"> &euro; '.$data->price.' </div> <div class="form_left_amount_five_second">'.$data->people.'</div> <div class="form_left_amount_six_second">'.$data->days.'</div>  <div class="form_left_amount_last">&euro; '.$data->price.'</div></div>';
			$total_tax = '<div class="form_right_prices"> &euro; '.$tax.' </div> <div class="total_cost"> Tax & Processing Fees </div>';
			$total_pay = '<div class="form_right_prices"> &euro; '.$gt.' </div> <div class="total_cost"> Total Amount </div>';
			
			if($gt>0) {
				
				$percentage [0]="Amount To Pay";
				$percentage [round($gt/2)]='50% Amount( &euro; '.round($gt/2).')';
				$percentage [round($gt)]='100% Amount( &euro; '.round($gt).')';
				
				foreach($percentage as $value=>$name)
                $percent .= CHtml::tag('option', array('value'=>$value),$name,true);
			}
			
            echo CJSON::encode(array(
			  'no_of_days' => $no_of_day,
			  'cart' => $cart,
			  'total_tax' => $total_tax,
			  'total_pay' => $total_pay,
			  'no_of_peoples' => $no_of_peoples,
			  'market_tour' => $market_tour,
			  'shuttle_transfer' => $shuttle_transfer,
			  'percent'=>$percent
            ));           
	}
		
	}
	
	public function actionGencart()
	{  
		
	if(isset($_GET['days'])) {
		
		$data = Price::model()->findByPk($_GET['booking_type']); 
		
		$market_tour =  $data->market_tour;
		$shuttle_transfer = $data->shuttle_transfer;
		if( $data->days == 1 ) {
			$tot = $data->price * $_GET['participants'] * $_GET['days'];
		} else {
			$tot = $data->price * $_GET['participants'];
		}
		$tax = $tot*($data->tax/100);
		$gt =  (float)$tot+(float)$tax;
		
		$cart = '<div class="extra_members_amount"> <div class="form_left_amount">'.$data->class_type.'</div> <div class="form_left_amount_second_second"> &euro; '.$data->price.' </div> <div class="form_left_amount_five_second">'.$_GET['participants'].'</div> <div class="form_left_amount_six_second">'.$_GET['days'].'</div>  <div class="form_left_amount_last">&euro; '.$tot.'</div></div>';
		if( $_GET['market_tour']!=0 ) {
			$mtot = $data->market_tour * $_GET['participants'];
			$tax += $mtot*($data->tax/100);
			$gt += (float)$mtot+((float)$mtot*($data->tax/100));
			
			$type_market = '<div class="extra_members_amount"> <div class="form_left_amount"> Market Tour </div> <div class="form_left_amount_second_second"> &euro; '.$data->market_tour.'</div> <div class="form_left_amount_five_second">'.$_GET['participants'].'</div> <div class="form_left_amount_six_second">1</div>  <div class="form_left_amount_last">&euro; '.$mtot.'</div></div>';
		}
		
		if( $_GET['shuttle_transfer']!=0 ) {
			$stot = $data->shuttle_transfer * $_GET['participants']* $_GET['days'];
			$tax += $stot*($data->tax/100);
			$gt += (float)$stot+($stot*($data->tax/100));
			
			$type_shuttle = '<div class="extra_members_amount"> <div class="form_left_amount"> Shuttle Transfer </div> <div class="form_left_amount_second_second"> &euro; '.$data->shuttle_transfer.'</div> <div class="form_left_amount_five_second">'.$_GET['participants'].'</div> <div class="form_left_amount_six_second">'.$_GET['days'].'</div>  <div class="form_left_amount_last">&euro; '.$stot.'</div></div>';
		}
		
		$total_tax = '<div class="form_right_prices"> &euro; '.$tax.' </div> <div class="total_cost"> Tax & Processing Fees </div>';
		$total_pay = '<div class="form_right_prices"> &euro; '.$gt.' </div> <div class="total_cost"> Total Amount </div>';
		
		if($gt>0) {
				
				$percentage [0]="Amount To Pay";
				$percentage [round($gt/2)]='50% Amount( &euro; '.round($gt/2).')';
				$percentage [round($gt)]='100% Amount( &euro; '.round($gt).')';
				
				foreach($percentage as $value=>$name)
                $percent .= CHtml::tag('option', array('value'=>$value),$name,true);
			}
		
            echo CJSON::encode(array(
			  'cart' => $cart,
			  'type_market' => $type_market,
			  'type_shuttle' => $type_shuttle,
			  'total_tax' => $total_tax,
			  'total_pay' => $total_pay,
			  'percent'=>$percent
            ));           
	}
	}   
	
	
	public function actionLoadalt()
	{  
		
	if(isset($_GET['photo_title_id'])) {
		
		$data = Phototitle::model()->findByPk($_GET['photo_title_id']); 
//print_r($data);
			$photo_en = $data->name;
			
			$photo1_en = $data->alt_text;
			
			$photo2_en = $data->description;
			
            // return data (JSON formatted)
            echo CJSON::encode(array(
			  'photo_en' => $photo_en,
			 
			  'photo1_en' => $photo1_en,
			 
			  'photo2_en' => $photo2_en
			 
            ));           
	}
		
	}
	

/*	public function actionLoadtempleinfo()
	{  
		
	if(isset($_GET['name'])) {
		
		$data = Temples::model()->findByPk((int) $_GET['name']); 
			
            // return data (JSON formatted)
            echo CJSON::encode(array(
              'dropDownCountry' => $data->country,
			  'dropDownState' => $data->state,
			   'dropDownDistrict' => $data->district,
			    'dropDownRegion' => $data->region,
				 'dropDownTown' => $data->town
			  
                        ));    } }  */
	

	public function actionLoadtempleinfo()
	{  
	  $id = $data->name;
	  
	 
		if(isset($id)) {
		
		$data = Temples::model()->findByPk($id); 
		
            // return data (JSON formatted)
            echo CJSON::encode(array(
             'dropDownState' => $data->state,
			 'dropDownDistrict' => $data->district,
			  'dropDownRegion' => $data->region
                        ));           
	}
		
	}
	
	
	
		
	
/*	public function actionLoadtempleinfo()
	{  	
		
	if(isset($_GET['id'])) {
		
		$data = Temples::model()->findByPk((int) $_GET['id']); 
		
            // return data (JSON formatted)
            echo CJSON::encode(array(
             'dropDownState' => $data->state,
			 'dropDownDistrict' => $data->district,
			  'dropDownRegion' => $data->region
                        ));           
	}
		
	} */
	
	
	
	
	
	
	
	
	
	
	
	public function actionLoadstate()
	{  
		
	if(isset($_GET['country'])) {
		
		$data = State::model()->findAll(array(
    			'select'=>'t.name, t.id',
				'condition'=>'source = '.(int) $_GET['country'].' AND lang ='.CurrentLangId(),
    			'group'=>'t.name',
   				'distinct'=>true,
				)); 
				
		$data = CHtml::listData($data,'id','name');
            $dropDownStates = "<option value=''>Select State</option>"; 
            foreach($data as $value=>$name)
                $dropDownStates .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
 
            //District
            $dropDownDistricts = "<option value='null'>Select District</option>";
			$dropDownTowns = "<option value='null'>Select Town</option>";
 
            // return data (JSON formatted)
            echo CJSON::encode(array(
              'dropDownStates' => $dropDownStates,
              'dropDownDistricts' => $dropDownDistricts,
			  'dropDownTowns' => $dropDownTowns
            ));           
	}
		
	}
	
	
	public function actionLoadrstate()
	{  
		
	if(isset($_GET['region'])) {
		
		$data = State::model()->findAll(array(
    			'select'=>'t.name, t.id',
				'condition'=>'region = '.(int) $_GET['region'],
    			'group'=>'t.name',
   				'distinct'=>true,
				)); 
		
		$data = CHtml::listData($data,'id','name');
            $dropDownStates = "<option value=''>Select State</option>"; 
			$dropDownDistricts = "<option value='null'>Select Districts</option>";
            foreach($data as $value=>$name)
                $dropDownStates .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
 
            // return data (JSON formatted)
            echo CJSON::encode(array(
              'dropDownStates' => $dropDownStates,
              'dropDownDistricts' => $dropDownDistricts
            ));           
	}
		
	}
	
	public function actionLoadrdistrict()
	{  
		
	if(isset($_GET['state'])) {
		
		$data = District::model()->findAll(array(
    			'select'=>'t.name, t.id',
				'condition'=>'source = '.(int) $_GET['state'],
    			'group'=>'t.name',
   				'distinct'=>true,
				)); 
				
				
		$data = CHtml::listData($data,'id','name');
            $dropDownDistricts = "<option value=''>Select District</option>"; 
            foreach($data as $value=>$name)
                $dropDownDistricts .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
 
            // return data (JSON formatted)
            echo CJSON::encode(array(
              'dropDownDistricts' => $dropDownDistricts
            ));           
	}
		
	}
	
	
	
	
	public function actionLoaddistrict()
	{  
		
	if(isset($_GET['state'])) {
		
		$data = District::model()->findAll(array(
    			'select'=>'t.name, t.id',
				'condition'=>'source = '.(int) $_GET['state'],
    			'group'=>'t.name',
   				'distinct'=>true,
				)); 
				
		$data1 = Temples::model()->findAll(array(
    			'select'=>'t.name, t.id',
				'condition'=>'state = '.(int) $_GET['state'],
    			'group'=>'t.name',
   				'distinct'=>true,
				)); 
				
		$data = CHtml::listData($data,'id','name');
            $dropDownDistricts = "<option value=''>Select District</option>"; 
            foreach($data as $value=>$name)
                $dropDownDistricts .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
		$data1 = CHtml::listData($data1,'id','name');
            $dropDownTemples = "<option value=''>Select Temple</option>"; 
            foreach($data1 as $value=>$name)
                $dropDownTemples .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
 
            // return data (JSON formatted)
            echo CJSON::encode(array(
              'dropDownDistricts' => $dropDownDistricts,
			  'dropDownTemples' => $dropDownTemples
            ));           
	}
		
	}
	
	public function actionLoadtown()
	{  
		
	if(isset($_GET['district'])) {
		
		$data = Town::model()->findAll(array(
    			'select'=>'t.name, t.id',
				'condition'=>'source = '.(int) $_GET['district'],
    			'group'=>'t.name',
   				'distinct'=>true,
				)); 
				
		$data1 = Temples::model()->findAll(array(
    			'select'=>'t.name, t.id',
				'condition'=>'district = '.(int) $_GET['district'],
    			'group'=>'t.name',
   				'distinct'=>true,
				)); 
				
		$data = CHtml::listData($data,'id','name');
            $dropDownTowns = "<option value=''>Select Town</option>"; 
            foreach($data as $value=>$name)
                $dropDownTowns .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
		$data1 = CHtml::listData($data1,'id','name');
            $dropDownTemples = "<option value=''>Select Temple</option>"; 
            foreach($data1 as $value=>$name)
                $dropDownTemples .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
 
            // return data (JSON formatted)
            echo CJSON::encode(array(
			  'dropDownTowns' => $dropDownTowns,
			  'dropDownTemples' => $dropDownTemples
            ));           
	}
		
	}
	
	
	public function actionLoadsubcategory()
	{  
		
	if(isset($_GET['category'])) {
		
		$data = Toursubcategory::model()->findAll(array(
    			'select'=>'t.name, t.id',
				'condition'=>'source = '.(int) $_GET['category'],
    			'group'=>'t.name',
   				'distinct'=>true,
				)); 
				
		$data = CHtml::listData($data,'id','name');
            $dropDownTowns = "<option value=''>Select Subcategory</option>"; 
            foreach($data as $value=>$name)
                $dropDownTowns .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
 
            // return data (JSON formatted)
            echo CJSON::encode(array(
			  'dropDownTowns' => $dropDownTowns
            ));           
	}
		
	}
	
	public function actionLoadavatar()
	{  
		
	if(isset($_GET['sdeity'])) {
		
		$data = Avatar::model()->findAll(array(
    			'select'=>'t.name, t.id',
				'condition'=>'source = '.(int) $_GET['sdeity'].' AND lang ='.CurrentLangId(),
    			'group'=>'t.name',
   				'distinct'=>true,
				)); 
				
		$data = CHtml::listData($data,'id','name');
            $dropDownAvatar = "<option value=''>Select Avatar</option>"; 
            foreach($data as $value=>$name)
                $dropDownAvatar .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
 
            // return data (JSON formatted)
            echo CJSON::encode(array(
			  'dropDownAvatar' => $dropDownAvatar
            ));           
	}
		
	}
	
	public function actionLoadzip()
	{  
		
	if(isset($_GET['town'])) {
		
		$data = Town::model()->findByPk( (int) $_GET['town'] ); 
				
		            // return data (JSON formatted)
            echo CJSON::encode(array(
			  'zip' => $data->zip,
			  'latitude' => $data->latitude,
			  'longitude' => $data->longitude
            ));           
	}
		
	}
	           
}