<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class AtfacilityUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Atfacility', $id);
			
		
       $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Atfacility']))
        {
                $model->attributes=$_POST['Atfacility'];  
				
								
				$current_time=time();
				
               	$model->modified = $current_time;
				$model->mod_ip = ip();
				$model->mod_by = Yii::app()->user->getId(); 	
				  
				$valid=$model->validate();
				  
				if($valid)
        		{
                		if($model->save()  ){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Facility information has been updated Successfully!'));                                                            
                    $model=new Atfacility;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.atfacility.atfacility_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='atfacility-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
