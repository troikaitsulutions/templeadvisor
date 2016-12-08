<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class TourcategoryCreateWidget extends CWidget
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
        $model = new Tourcategory;
		$mseo = new Seo;
		
		// if it is ajax validation request
        $this->performAjaxValidation(array($model,$mseo));
        
        // collect user input data
        if(isset($_POST['Tourcategory'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Tourcategory'];  
				$mseo->attributes=$_POST['Seo'];
				
				
								
				$current_time=time();
				
				$mseo->created = $model->created = $current_time;
				$mseo->crby = $model->crby = Yii::app()->user->getId(); 
				$mseo->cr_ip = $model->cr_ip = ip();
				$mseo->uid = $model->uid = uniqid();
				$mseo->layout = 'tourcategory';
				
				$valid=$model->validate();
       			$valid=$mseo->validate() && $valid;
       		  
				   if($valid)
        			{
                		if($model->save() && $mseo->save() ){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Tour Category Added Successfully!'));                                                            
                    $model=new Tourcategory;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.tourcategory.tourcategory_form_widget',array('model'=>$model,'mseo'=>$mseo));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='tourcategory-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
