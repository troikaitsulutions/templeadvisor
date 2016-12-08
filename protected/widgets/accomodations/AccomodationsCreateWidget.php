<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class AccomodationsCreateWidget extends CWidget
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
        $model = new Accomodations; 

        // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Accomodations']))
        {
                $model->attributes=$_POST['Accomodations'];  
				
				
								
				$current_time=time();				
				$model->created = $current_time;
				$model->cr_ip = ip();
				$model->crby = Yii::app()->user->getId();
				$model->uid = uniqid();
				  
				  
				  $valid=$model->validate();
				  
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Accomodations Added Successfully!'));                                                            
                    $model=new Accomodations;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.accomodations.accomodations_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='accomodations-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
