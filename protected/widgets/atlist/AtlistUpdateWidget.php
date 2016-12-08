<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class AtlistUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Atlist', $id);
		
            $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Atlist']))
        {
                $model->attributes=$_POST['Atlist'];  				
								
				$current_time=time();
				$model->modified = $current_time;    
				$model->mod_ip = ip();
				$model->mod_by = Yii::app()->user->getId();
				
				                    
							  
				  $valid=$model->validate();       			   
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                   
                    user()->setFlash('success',t('Attractions information has been updated Successfully!'));                                                            
                    $model=new Atlist;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.atlist.atlist_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='atlist-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
