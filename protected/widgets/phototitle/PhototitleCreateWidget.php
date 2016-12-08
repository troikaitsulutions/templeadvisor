<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PhototitleCreateWidget extends CWidget
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
        $model = new Phototitle;        
        $this->performAjaxValidation(array($model));
        
       
        if(isset($_POST['Phototitle']))
        {
                $model->attributes=$_POST['Phototitle'];  
						
								
				$current_time=time();
				$model->created = $current_time;
				
              
			   $model->crby = Yii::app()->user->getId();
			   $model->cr_ip = ip();
							                    
				
				  
				  $valid=$model->validate();
				       			  
				  
				   if($valid)
        			{
                		if($model->save() ){           
                    
                    
                    user()->setFlash('success',t("Photo Title's Added Successfully!"));                                                            
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
