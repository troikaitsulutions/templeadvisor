<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PageUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Page', $id);
		
		$mseo=Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
            
      
        $this->performAjaxValidation(array($model,$mseo));
		
        
        
        
        
        // collect user input data
        if(isset($_POST['Page'], $_POST['Seo']))
        {
                                                
                $model->attributes=$_POST['Page'];   
				$mseo->attributes=$_POST['Seo']; 
				$mseo->layout = 'page';
                
				$current_time=time();
				
                $mseo->modified = $model->modified = $current_time;
				$mseo->mod_ip = $model->mod_ip = ip();
				$mseo->mod_by = $model->mod_by = Yii::app()->user->getId();
				$valid=$model->validate();
      			$valid=$mseo->validate() && $valid;
                                       
                 if($valid)
        			{
				                    
                if($model->save() && $mseo->save() ){            
                    
                   
                    //Start to save the Page Block
                    user()->setFlash('success',t('Update Page Successfully!')); 
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
