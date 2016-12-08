<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class AvatarUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Avatar', $id);
			
		    
			
			$mseo=Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
			
			
		
            $this->performAjaxValidation(array($model,$mseo));
        
        // collect user input data
        if(isset($_POST['Avatar'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Avatar'];  
				$mseo->attributes=$_POST['Seo']; 
				
								
				$current_time=time();
				$mseo->modified = $model->modified = $current_time;
				$mseo->mod_by = $model->mod_by = Yii::app()->user->getId(); 
				$mseo->mod_ip = $model->mod_ip = ip(); 
				$mseo->layout = 'avatar';
				                    
				  $model->uid = uniqid();
				  $mseo->uid = $model->uid;
				  
				  $valid=$model->validate();
       			  $valid=$mseo->validate() && $valid;
				  
				   if($valid)
        			{
                		if($model->save() && $mseo->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Avatar information has been updated Successfully!'));                                                            
                    $model=new Avatar;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        }                
        $this->render('cmswidgets.views.avatar.avatar_form_widget',array('model'=>$model,'mseo'=>$mseo));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='avatar-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
