<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class PsubcategoryUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Psubcategory', $id);
	   
      $mseo = Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
			
		
            
      
	  	$this->performAjaxValidation(array($model, $mseo));
		
        if(isset($_POST['Psubcategory'], $_POST['Seo']))
        {
				Yii::import('common.extensions.file.CFile');
                $model->attributes=$_POST['Psubcategory'];  
				$mseo->attributes=$_POST['Seo'];     
				$current_time=time();
                $mseo->modified = $model->modified = $current_time;    
				$mseo->mod_ip = $model->mod_ip = ip();    
				$mseo->mod_by = $model->mod_by = Yii::app()->user->getId();  
				
				
				$valid=$model->validate();
				$valid=$mseo->validate() && $valid;
				  
                if($valid)
        		{         
                if($model->save() && $mseo->save()){             
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Product SubCategory has been updated Successfully!'));                                                            
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
