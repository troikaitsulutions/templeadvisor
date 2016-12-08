<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PageCreateWidget extends CWidget
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
        $model = new Page;
		$mseo = new Seo;
                        
       
		
		$this->performAjaxValidation(array($model,$mseo));
		
		

       
        
        
        // collect user input data
        if(isset($_POST['Page'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Page'];   
				$mseo->attributes=$_POST['Seo']; 
				
				$current_time=time();
				$mseo->created = $model->created = $current_time;
                $mseo->modified = $model->modified = $current_time;
				$mseo->crby = $model->crby = Yii::app()->user->getId(); 
				$mseo->cr_ip = $model->cr_ip = ip();
				
				$mseo->layout = 'page';
				
				$model->uid = uniqid();
				$mseo->uid = $model->uid;
				  
				$valid=$model->validate();
      			$valid=$mseo->validate() && $valid;
				
				 if($valid)
        			{
				                    
                if($model->save() && $mseo->save() ){           
                    
                   
                    //Start to save the Page Block
                    user()->setFlash('success',t('Create new Page Successfully!'));                                                            
                    $model=new Page;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        }                
        $this->render('cmswidgets.views.page.page_form_widget',array('model'=>$model,'mseo'=>$mseo));            
   
    }
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='page-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
