<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PinfoCreateWidget extends CWidget
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
                
				
				 $model->uid = uniqid();
				 $mseo->cr_ip = $model->cr_ip = ip();
				 $gps->uid = $payment->uid = $mseo->uid = $model->uid;
				 $mseo->crby = $model->crby = Yii::app()->user->getId(); 
				 $mseo->layout = 'prop';
				 
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
                    user()->setFlash('success',t('Create new Property Successfully!'));                                                            
                    $model=new Pinfo;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        } 
		
				               
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
