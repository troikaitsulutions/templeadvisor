<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class NthingsUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Nthings', $id);
			
			
		
            $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Nthings']))
        {
                $model->attributes=$_POST['Nthings'];  				
								
				$current_time=time();
				$model->modified = $current_time;    
				$model->mod_ip = ip();
				$model->mod_by = Yii::app()->user->getId();
				
				                    
				  $model->uid = uniqid();				  
				  $valid=$model->validate();       			   
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Nearest Things information has been updated Successfully!'));                                                            
                    $model=new Nthings;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        }                
        $this->render('cmswidgets.views.nthings.nthings_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='nthings-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
