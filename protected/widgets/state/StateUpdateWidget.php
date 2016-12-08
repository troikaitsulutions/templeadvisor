<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class StateUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('State', $id);
			
		    
			
			$mseo=Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
			
			
		
            $this->performAjaxValidation(array($model,$mseo));
        
        // collect user input data
        if(isset($_POST['State'], $_POST['Seo']))
        {
                $model->attributes=$_POST['State'];  
				$mseo->attributes=$_POST['Seo']; 
				
								
				$current_time=time();
				$model->name = trim($model->name);
				$mseo->modified = $model->modified = $current_time;
				$mseo->mod_by = $model->mod_by = Yii::app()->user->getId(); 
				$mseo->mod_ip = $model->mod_ip = ip(); 
				$mseo->layout = 'state';
				                    
				  $model->uid = uniqid();
				  $mseo->uid = $model->uid;
				  
				  $valid=$model->validate();
       			  $valid=$mseo->validate() && $valid;
				  
				   if($valid)
        			{
                		if($model->save() && $mseo->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('State information has been updated Successfully!'));                                                            
                    $model=new State;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        }                
        $this->render('cmswidgets.views.state.state_form_widget',array('model'=>$model,'mseo'=>$mseo));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='state-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
