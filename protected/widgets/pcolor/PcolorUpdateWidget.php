<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class PcolorUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Pcolor', $id);
			
		    
			
		
			
		
            $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Pcolor']))
        {
                $model->attributes=$_POST['Pcolor'];  
				
				
								
				$current_time=time();
				$model->modified = $current_time;
				$model->mod_by = Yii::app()->user->getId(); 
				$model->mod_ip = ip(); 
				
				  
				  $valid=$model->validate();
       			
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Color has been updated Successfully!'));                                                            
                    $model=new Pcolor;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.pcolor.pcolor_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='pcolor-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
