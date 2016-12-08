<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PinfoUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Pinfo', $id);
		
		$mseo=Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
			
		$gps=Gps::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
		$payment=Payment::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
            
      
        $this->performAjaxValidation(array($model, $mseo, $gps, $payment));
		
        
        
        
        
        // collect user input data
        if(isset($_POST['Pinfo'], $_POST['Seo'], $_POST['Gps'], $_POST['Payment']))
        {
                                                
                $model->attributes=$_POST['Pinfo'];   
				$mseo->attributes=$_POST['Seo']; 
				$gps->attributes=$_POST['Gps'];   
				$payment->attributes=$_POST['Payment'];
                
				$current_time=time();
				
                $mseo->modified = $model->modified = $current_time;
				$model->mod_ip = ip();
				$mseo->mod_by = $model->mod_by  = Yii::app()->user->getId();
				
				
				if (is_array($model->amenities)) {
						$model->amenities = implode("|",$model->amenities);
				} 
				
				if ( is_array($model->tags) ) {
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
                    user()->setFlash('success',t('Update Property Successfully!')); 
					$model=new Pinfo;
                    Yii::app()->controller->redirect(array('admin'));                                                                               
                } }
        }        
		
		if(isset($model->amenities) && $model->amenities!=='')
                $model->amenities=explode('|',$model->amenities);
		
		if(isset($model->feedlist) && $model->feedlist!=='')
                $model->feedlist=explode('|',$model->feedlist);
		if(isset($model->tags) && $model->tags!=='')
                $model->tags=explode('|',$model->tags);
				        
        $this->render('cmswidgets.views.pinfo.pinfo_form_widget',array('model'=>$model,'mseo'=>$mseo,'gps'=>$gps, 'payment'=>$payment));            
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
