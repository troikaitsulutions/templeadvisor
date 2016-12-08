<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class PujalogisticUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Pujalogistic', $id);
			
		
       $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Pujalogistic']))
        {
                $model->attributes=$_POST['Pujalogistic'];  
				
								
				$current_time=time();
				
               	$model->modified = $current_time;
				$model->mod_ip = ip();
				$model->mod_by = Yii::app()->user->getId(); 	
				  
				$valid=$model->validate();
				  
				if($valid)
        		{
                		if($model->save()  ){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Puja Logistic Price has been updated Successfully!'));                                                            
                    $model=new Pujalogistic;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.pujalogistic.pujalogistic_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='pujalogistic-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
