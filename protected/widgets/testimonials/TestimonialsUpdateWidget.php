<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class TestimonialsUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Testimonials', $id);
		
            $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Testimonials']))
        {
                $model->attributes=$_POST['Testimonials'];  				
								
				$current_time=time();
				$model->modified = $current_time;    
				$model->mod_ip = ip();
				$model->mod_by = Yii::app()->user->getId();
				
			           
							  
				  $valid=$model->validate();       			   
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                   
                    user()->setFlash('success',t('Testimonial information has been updated Successfully!'));                                                            
                    $model=new Testimonials;
                    Yii::app()->controller->redirect(array('admin'));
					
                } }
        }  
		
		
	 
				         
        $this->render('cmswidgets.views.testimonials.testimonials_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='testimonials-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
