<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class NearstateUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Nearstate', $id);
			
		
       $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Nearstate']))
        {
                $model->attributes=$_POST['Nearstate'];  
							
				$current_time=time();
				
               	$model->modified = $current_time;
				$model->mod_ip = ip();
				$model->mod_by = Yii::app()->user->getId(); 	
				  
				$valid=$model->validate();
				
				
				 if (is_array($model->nearstate)) {
						$model->nearstate = implode("|",$model->nearstate);
				} 
				
				
				  
				if($valid)
        		{
                		if($model->save()  ){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Near States information has been updated Successfully!'));                                                            
                    $model=new Nearstate;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }  
		
		
			
				if(isset($model->nearstate) && $model->nearstate!=='')
                $model->nearstate=explode('|',$model->nearstate);
		
		
		              
        $this->render('cmswidgets.views.nearstate.nearstate_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='nearstate-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
