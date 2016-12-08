<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class AtinfoCreateWidget extends CWidget
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
        $model = new Atinfo;

        $this->performAjaxValidation(array($model));
       
        if(isset($_POST['Atinfo']))
        {
                $model->attributes=$_POST['Atinfo'];  
				
				
				$current_time=time();				
				$model->created = $current_time;
				$model->cr_ip = ip();
				$model->crby = Yii::app()->user->getId();
				
				 if (is_array($model->facility)) {
						$model->facility = implode("|",$model->facility);
				}                     
				
				 
				  
				  $valid=$model->validate();
				  
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Attraction Information Added Successfully!'));                                                            
                    $model=new Atinfo;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        }                
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
