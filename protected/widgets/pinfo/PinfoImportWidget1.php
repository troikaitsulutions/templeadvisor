<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PinfoImportWidget extends CWidget
{
    
    public $visible=true;     
    
  
     
 
    public function init()
    {
        
    }
 
    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
        }
    }
 
    protected function renderContent()
    {       
        $model = new Pinfo;
		$mseo = new Seo;
		$gps = new Gps;
		$payment = new Payment;
		Yii::import('common.extensions.file.CFile');
                        
        //If it has guid, it means this is a translated version
        $guid=isset($_GET['guid']) ? strtolower(trim($_GET['guid'])) : '';                                      
        //List of language that should exclude not to translate       
        $lang_exclude=array();        
        //List of translated versions
        $versions=array();                
        // If the guid is not empty, it means we are creating a translated version of a content
        // We will exclude the translated language and include the name of the translated content to $versions
        if($guid!=''){
                $page_object=  Pinfo::model()->with('language')->findAll('guid=:gid',array(':gid'=>$guid));
                if(count($page_object)>0){
                        foreach($page_object as $obj){
                                $lang_exclude[]=$obj->lang;
                                $versions[]=$obj->name.' - '.$obj->language->lang_desc;
                        }
                }
                $model->guid=$guid;
        }
		
		$this->performAjaxValidation(array($model, $mseo, $gps, $payment));
	
		
        
        
        // collect user input data
        if(isset($_POST['Pinfo'], $_POST['Seo'],$_POST['Gps'],$_POST['Payment']))
        {
                                           
                
                $model->attributes=$_POST['Pinfo'];   
				$mseo->attributes=$_POST['Seo']; 
				$gps->attributes=$_POST['Gps']; 
				$payment->attributes=$_POST['Payment']; 
				
				$current_time=time();
				$mseo->created = $model->created = $current_time;
                $mseo->modified = $model->modified = $current_time;
				
				 $model->uid = uniqid();
				 $model->cr_ip = ip();
				 $gps->uid = $payment->uid = $mseo->uid = $model->uid;
				 
				 if (is_array($model->amenities)) {
						$model->amenities = implode("|",$model->amenities);
				} 
				
				 if (is_array($model->tags)) {
						$model->tags = implode("|",$model->tags);
				} 
				
				if(is_array($model->feedlist)) {
				$model->feedlist = implode("|",$model->feedlist); }
				 
				 			 
				  
				  $valid=$model->validate();
				  $valid=$gps->validate();
				  $valid=$payment->validate();
      			  $valid=$mseo->validate() && $valid;
				
				 if($valid)
        			{
				                    
                if($model->save() && $mseo->save() && $gps->save() && $payment->save() ){           
                   
                    //Start to save the Page Block
                    user()->setFlash('success',t('Imported One Property Successfully!'));   
					                 
					$del = Properties::model()->find(array(
		'condition'=>'IDPROPERTY=0 AND PUBLICWS = 1 AND SITO2=1',
		'order'=>'ID ASC'));	
					
					
					$objects = Photo::model()->findAll(array(
					'condition'=>'IDPROPERTY ='.$del->ID.' AND IMG_PATH !=""',
    				'order'=>'ID',
					)); 
					
					
					
					if(count($objects)>0){                
                		foreach($objects as $obj) {
						$temp_name = time().$obj->EXT;
					
						$gal = new Gallery;
				
				
			if (Yii::app()->s3->getObjectInfo('travel-tuscany',str_replace('http://d384zq5nbw6vm7.cloudfront.net/', '', $obj->IMG_PATH))){	
					
			Yii::app()->s3->copyObject('travel-tuscany',str_replace('http://d384zq5nbw6vm7.cloudfront.net/', '', $obj->IMG_PATH), "tt-prop-photos", $model->primaryKey.'/fullsize/'.$temp_name, S3::ACL_PUBLIC_READ); 					
				  
				$thumb=Yii::app()->phpThumb->create($obj->IMG_PATH);
				$thumb->resize(220,160);
				$thumb->save('../resources/'.$temp_name);
				
				Yii::app()->s3->putObjectFile('../resources/'.$temp_name, "tt-prop-photos", $model->primaryKey.'/thumb/'.$temp_name, S3::ACL_PUBLIC_READ);
				
    				//unlink('../resources/'.$temp_name); 
					
					$current_time=time();
					$gal->prop_id = $model->primaryKey;
					$gal->img_url = $temp_name;
					$gal->name = $obj->DESCRIPTION;
					$gal->description = $obj->DESCRIPTION;
					$gal->img_order = Gallery::FindImgOrder($model->primaryKey);
					$gal->created = $current_time;
					$gal->cr_ip = ip();
					$gal->save();
				} }
					}
				
					Properties::model()->deleteAll("ID=".$del->ID); 
					                                        
                    $model= new Pinfo;
					$prop = new Properties;
                    Yii::app()->controller->redirect(array('import'));
                } }
        } 
		
		
		$prop = Properties::model()->find(array(
		'condition'=>'IDPROPERTY=0 AND PUBLICWS = 1 AND SITO2=1',
		'order'=>'ID ASC'));
		
		$model->name = $prop->NAME;
		$model->tt_name = $prop->PUBLICNAME;
		$model->size = $prop->MQ;
		$model->location = $prop->LOCATION;	
		$model->view = $prop->VIEWTYPE;	
		$model->owner = Prop1::GetName($prop->IDPROPRIETOR);	
		$model->sleep = $prop->PAX;	
		$model->bedroom = $prop->SINGLES + $prop->DOUBLES + $prop->TWINS + $prop->DOUBLESOFABEDS + $prop->SINGLESOFABEDS; 
		$model->mbed = $prop->DOUBLES;
		$model->msbed = $prop->DOUBLESOFABEDS;
		$model->tbed = $prop->TWINS;
		$model->sbed = $prop->SINGLES;
		$model->ssbed = $prop->SINGLESOFABEDS;
		$model->nairport = $prop->KNOWN_AIRPORT;
		$model->ntown = $prop->KNOWN_TOWN;
		$model->old_id = $prop->ID;
		
		$model->airport_km = $prop->AIRPORT_KM;
		$model->town_km = $prop->TOWN_KM;
		
		$model->bathroom = $prop->TOTALBATHROOMS;
		$model->bathwshower = $prop->FULLBATHROOMSHOWER;
		$model->bathwtub = $prop->FULLBATHROOMTUB;
		$model->bathwts = $prop->HALFBATHROOM;
		$model->bathwwc = $prop->BATHROOMWC;
		
		$model->extra_cost = $prop->EXTRACOSTS_ENGLISH;
		$model->content1 = $prop->DESCRIPTION_ENGLISH;
		$model->content2 = $prop->FEED_DESC1;
		$model->ptype = $prop->TYPE;
		$model->address1 = $prop->INDIRIZZO;
		$model->town = $prop->TOWN;
		$model->province = $prop->STATE;
		$model->zip = $prop->ZIP;
		$model->youtube = $prop->YURL;
		$model->website = $prop->URL;
		$mseo->title = $prop->META_TITLE;
		$mseo->description = $prop->META_DESCRIPTION;
		$mseo->keywords = $prop->META_KEYWORDS;
		
		
		
				               
        $this->render('cmswidgets.views.pinfo.pinfo_form_widget',array('model'=>$model,'mseo'=>$mseo,'gps'=>$gps,'payment'=>$payment, 'lang_exclude'=>$lang_exclude,'versions'=>$versions));            
   
    }
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='pinfo-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
