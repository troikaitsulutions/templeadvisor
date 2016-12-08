<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class AtinfoUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Atinfo', $id);
		
            $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Atinfo']))
        {
                $model->attributes=$_POST['Atinfo'];  				
								
				$current_time=time();
				$model->modified = $current_time;    
				$model->mod_ip = ip();
				$model->mod_by = Yii::app()->user->getId();
				
				 if (is_array($model->facility)) {
						$model->facility = implode("|",$model->facility);
				}                     
				                    
							  
				  $valid=$model->validate();       			   
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                   
                    user()->setFlash('success',t('Attractions information has been updated Successfully!'));                                                            
                    $model=new Atinfo;
                    Yii::app()->controller->redirect(array('admin'));
					
                } }
        }  
		
		
		if(isset($model->facility) && $model->facility!=='')
                $model->facility=explode('|',$model->facility);     
				         
        $this->render('cmswidgets.views.atinfo.atinfo_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='atinfo-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
