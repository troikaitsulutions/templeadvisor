<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class BeliefUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Belief', $id);
			
		    
			
			
			
		
            $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Belief']))
        {
                $model->attributes=$_POST['Belief'];  
				
				
								
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
                    user()->setFlash('success',t('Belief/Faith information has been updated Successfully!'));                                                            
                    $model=new Belief;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.belief.belief_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='belief-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
