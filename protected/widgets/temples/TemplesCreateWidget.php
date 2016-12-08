<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class TemplesCreateWidget extends CWidget
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
        $model = new Temples;
		$mseo = new Seo;
		$gps= new Gps;
		
		
		$this->performAjaxValidation(array($model, $mseo));
	
		
        
        
        // collect user input data
        if(isset($_POST['Temples'], $_POST['Seo']))
        {
                                           
                
                $model->attributes=$_POST['Temples'];   
				$mseo->attributes=$_POST['Seo']; 
				
				 
				
				$current_time=time();
				$mseo->created = $model->created = $current_time;
				 $model->uid = uniqid();
				 $mseo->cr_ip = $model->cr_ip = ip();
				 $mseo->uid = $model->uid;
				 $mseo->crby = $model->crby = Yii::app()->user->getId(); 
				 $mseo->layout = 'temples';
				 
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
				
				  $valid=$model->validate();
      			  $valid=$mseo->validate() && $valid;
				
				 if($valid)
        			{
				                    
                if($model->save() && $mseo->save() ){           
                    
                   
                    //Start to save the Page Block
                    user()->setFlash('success',t('Create new Temples Successfully!'));                                                            
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
				
				
				               
        $this->render('cmswidgets.views.temples.temples_form_widget',array('model'=>$model,'mseo'=>$mseo,'gps'=>$gps));            
   
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
