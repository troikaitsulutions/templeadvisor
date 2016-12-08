<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PcolorCreateWidget extends CWidget
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
        $model = new Pcolor;
		
		
        // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Pcolor']))
        {
                $model->attributes=$_POST['Pcolor'];  
			 
				
								
				$current_time=time();
				
				$model->created = $current_time;
				$model->crby = Yii::app()->user->getId(); 
			    $model->cr_ip = ip();
			
				  $valid=$model->validate();
       			 
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Product color Added Successfully!'));                                                            
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
