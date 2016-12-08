<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class VehiclesCreateWidget extends CWidget
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
        $model = new Vehicles;
				
                        
       

        // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Vehicles']))
        {
                $model->attributes=$_POST['Vehicles'];  
				
				
								
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
                    user()->setFlash('success',t('Vehicles Added Successfully!'));                                                            
                    $model=new Vehicles;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.vehicles.vehicles_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='vehicles-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
