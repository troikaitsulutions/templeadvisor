<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class TemplesUpdateWidget extends CWidget
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
        $id=isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $model=  GxcHelpers::loadDetailModel('Temples', $id);
		
		$mseo=Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
			
		$gps=Gps::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
		
		if(  count($gps) == 0 ) { $gps= new Gps; $gps->uid = $model->uid;  } 
			
		
		
        $this->performAjaxValidation(array( $model, $mseo ));
		
        
        
        
        
        // collect user input data
        if(isset($_POST['Temples'], $_POST['Seo']))
        {
                                                
                $model->attributes=$_POST['Temples'];   
				$mseo->attributes=$_POST['Seo']; 
							
                
				$current_time=time();
				
                $mseo->modified = $model->modified = $current_time;
				$model->mod_ip = ip();
				$mseo->mod_by = $model->mod_by  = Yii::app()->user->getId();
				
				 if (is_array($model->themelist)) {
						$model->themelist = implode("|",$model->themelist);
				} 
				
				 if (is_array($model->posture)) {
						$model->posture = implode("|",$model->posture);
				} 
				
				 if (is_array($model->belief)) {
						$model->belief = implode("|",$model->belief);
				} 
				
				if (is_array($model->etiquette)) {
						$model->etiquette = implode("|",$model->etiquette);
				}   
				
				
				/*if (is_array($model->amenities)) {
						$model->amenities = implode("|",$model->amenities);
				} 
				
				if ( is_array($model->tags) ) {
						$model->tags = implode("|",$model->tags);
				} 
				
				if(is_array($model->feedlist)) {
				$model->feedlist = implode("|",$model->feedlist); }
				*/
				$valid=$model->validate();
				$valid=$mseo->validate() && $valid;
				
				
                                       
                 if($valid)
        			{
				                    
                if($model->save() && $mseo->save() ){            
                   
                    //Start to save the Page Block
                    user()->setFlash('success',t('Update Temples Successfully!')); 
					$model=new Temples;
                    Yii::app()->controller->redirect(array('admin'));                                                                               
                } }
        }        
		
		if(isset($model->themelist) && $model->themelist!=='')
                $model->themelist=explode('|',$model->themelist);
				
				if(isset($model->posture) && $model->posture!=='')
                $model->posture=explode('|',$model->posture);
				
				if(isset($model->belief) && $model->belief!=='')
                $model->belief=explode('|',$model->belief);
				
				if(isset($model->etiquette) && $model->etiquette!=='')
                $model->etiquette=explode('|',$model->etiquette);
				
				
		/*
		if(isset($model->feedlist) && $model->feedlist!=='')
                $model->feedlist=explode('|',$model->feedlist);
		if(isset($model->tags) && $model->tags!=='')
                $model->tags=explode('|',$model->tags);
		*/		        
        $this->render('cmswidgets.views.temples.temples_form_widget',array('model'=>$model,'mseo'=>$mseo, 'gps'=>$gps ));            
    }   
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='temples-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
