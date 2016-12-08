<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ProductSelectcategoryWidget extends CWidget
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
	
		$model = new Productcategory;
        
        
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='selectcategory-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
		
		
        // collect user input data
        if(isset($_POST['Productcategory']))
        {
                $model->attributes=$_POST['Productcategory'];   
				$current_time = time();
				$model->created = $current_time;  
				$model->cr_ip = ip();
				$model->crby = Yii::app()->user->getId();                 
	
				$valid=$model->validate();
				if($valid)
        		{            
                    
                    Yii::app()->controller->redirect(array('create','category'=>$model->category));
                } 
        }    
		      
        $this->render('cmswidgets.views.product.selectcategory_form_widget',array('model'=>$model));
    }   
}
