<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class FeventsUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Fevents', $id);
		
		$mseo=Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
            
      
        $this->performAjaxValidation(array($model,$mseo));
		
        
        
        
        
        // collect user input data
        if(isset($_POST['Fevents'], $_POST['Seo']))
        {
                                                
                $model->attributes=$_POST['Fevents'];   
				$mseo->attributes=$_POST['Seo']; 
				$mseo->layout = 'fevents';
                
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
                    user()->setFlash('success',t('Update Event Successfully!')); 
					$model=new Fevents;
                    Yii::app()->controller->redirect(array('admin'));                                                                               
                } }
        }                
        $this->render('cmswidgets.views.fevents.fevents_form_widget',array('model'=>$model,'mseo'=>$mseo));            

        
        
            
        
    }   
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='fevents-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
