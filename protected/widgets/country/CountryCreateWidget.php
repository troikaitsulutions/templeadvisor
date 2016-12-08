<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class CountryCreateWidget extends CWidget
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
        $model = new Country;
		$mseo = new Seo;
		
                        
       
        // if it is ajax validation request
        $this->performAjaxValidation(array($model,$mseo));
        
        // collect user input data
        if(isset($_POST['Country'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Country'];  
				$mseo->attributes=$_POST['Seo']; 
				
								
				$current_time=time();
				$mseo->created = $model->created = $current_time;
				$mseo->cr_ip = $model->cr_ip = ip();
				$mseo->crby = $model->crby = Yii::app()->user->getId(); 
				
				$mseo->layout = 'country';
				                    
				  $model->uid = uniqid();
				  $mseo->uid = $model->uid;
				  
				  $valid=$model->validate();
       			  $valid=$mseo->validate() && $valid;
				  
				   if($valid)
        			{
                		if($model->save() && $mseo->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Country Added Successfully!'));                                                            
                    $model=new Country;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        }                
        $this->render('cmswidgets.views.country.country_form_widget',array('model'=>$model,'mseo'=>$mseo));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='country-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
