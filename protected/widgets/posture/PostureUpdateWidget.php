<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class PostureUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Posture', $id);
			
		    
			
			
			
		
            $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Posture']))
        {
                $model->attributes=$_POST['Posture'];  
				
				
								
				$current_time=time();
				$model->modified = $current_time;
				$model->mod_by = Yii::app()->user->getId(); 
				$model->mod_ip = ip(); 
				
				                    
				  $model->uid = uniqid();
				 
				  
				  $valid=$model->validate();
       			 
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Posture information has been updated Successfully!'));                                                            
                    $model=new Posture;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.posture.posture_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='posture-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
