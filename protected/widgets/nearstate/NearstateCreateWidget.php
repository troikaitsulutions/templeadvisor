<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class NearstateCreateWidget extends CWidget
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
        $model = new Nearstate;
	     // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Nearstate']))
        {
                $model->attributes=$_POST['Nearstate'];  
				
				 $current_time=time();
				 $model->created = $current_time;	
				 $model->cr_ip = ip();
				 $model->crby = Yii::app()->user->getId(); 			                    
				
				
				
				 if (is_array($model->nearstate)) {
						$model->nearstate = implode("|",$model->nearstate);
				} 
				  
				  
				 $valid=$model->validate();
				 
				 if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Nearest States Added Successfully!'));                                                            
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
