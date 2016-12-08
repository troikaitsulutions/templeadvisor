<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class AtfacilityCreateWidget extends CWidget
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
        $model = new Atfacility;
	     // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Atfacility']))
        {
                $model->attributes=$_POST['Atfacility'];  
				
				 $current_time=time();
				 $model->created = $current_time;	
				 $model->cr_ip = ip();
				 $model->crby = Yii::app()->user->getId(); 			                    
				
				  
				 $valid=$model->validate();
				 
				 if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Facilities Added Successfully!'));                                                            
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
