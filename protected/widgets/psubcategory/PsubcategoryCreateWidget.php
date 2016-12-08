<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PsubcategoryCreateWidget extends CWidget
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
        $model = new Psubcategory; 
		$mseo = new Seo;
        
       $this->performAjaxValidation(array($model, $mseo));
        
		
        if(isset($_POST['Psubcategory'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Psubcategory'];  
				$mseo->attributes=$_POST['Seo']; 
				
				$current_time = time();
				$mseo->created = $model->created = $current_time;  
				$mseo->cr_ip = $model->cr_ip = ip();
				$mseo->crby = $model->crby = Yii::app()->user->getId();                 
				$mseo->uid = $model->uid = uniqid();
				$mseo->layout = 'psubcategory';
				
				$valid=$model->validate();
      			$valid=$mseo->validate() && $valid;
				
				
				
				 if($valid)
        			{ 
				                   
                if($model->save() && $mseo->save()){       
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Product Subcategory Added Successfully!'));                                                            
                    $model=new Psubcategory;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.psubcategory.psubcategory_form_widget',array('model'=>$model,'mseo'=>$mseo));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='psubcategory-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
