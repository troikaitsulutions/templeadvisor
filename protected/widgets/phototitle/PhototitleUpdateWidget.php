<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class PhototitleUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Phototitle', $id);
			
		    
			
		
			
		
            $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Phototitle']))
        {
                $model->attributes=$_POST['Phototitle'];  
				
				
								
				$current_time=time();
				
				
                $model->modified = $current_time;
				$model->mod_by = Yii::app()->user->getId(); 
				$model->mod_ip = ip(); 
				
				 
				  
				  $valid=$model->validate();
				 
       			   
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                    user()->setFlash('success',t("Photo Title's information has been updated Successfully!"));                                                            
                    $model=new Phototitle;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.phototitle.phototitle_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($model)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='phototitle-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
	}
}
