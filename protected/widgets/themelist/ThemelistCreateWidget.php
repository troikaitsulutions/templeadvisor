<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ThemelistCreateWidget extends CWidget
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
        $model = new Themelist;
		$mseo = new Seo;
		
        
        // if it is ajax validation request
        $this->performAjaxValidation(array($model,$mseo));
        
        // collect user input data
        if(isset($_POST['Themelist'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Themelist'];  
				$mseo->attributes=$_POST['Seo']; 
				
								
				$current_time=time();
				
				$mseo->created = $model->created = $current_time;
				$mseo->crby = $model->crby = Yii::app()->user->getId(); 
				$mseo->cr_ip = $model->cr_ip = ip();
				$mseo->layout = 'Themelist';
				                    
				  $model->uid = uniqid();
				  $mseo->uid = $model->uid;
				  
				  $valid=$model->validate();
       			  $valid=$mseo->validate() && $valid;
				  
				   if($valid)
        			{
                		if($model->save() && $mseo->save() ){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Theme Sub List info Added Successfully!'));                                                            
                    $model=new Themelist;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        }                
        $this->render('cmswidgets.views.themelist.themelist_form_widget',array('model'=>$model,'mseo'=>$mseo));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='themelist-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
