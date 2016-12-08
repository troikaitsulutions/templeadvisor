<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class DestinationCreateWidget extends CWidget
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
        $model = new Destination; 
		$tid = isset($_GET['tid']) ? (int)$_GET['tid'] : 0;
        // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Destination']))
        {
                $model->attributes=$_POST['Destination'];  
				$current_time = time();
				$model->created = $current_time;  
				$model->cr_ip = ip();
				$model->tid = $tid;
				$model->crby = Yii::app()->user->getId();                 
				
				
				$valid=$model->validate();  				  
				   if($valid)
        			{
                		if($model->save()){           
                    		user()->setFlash('success',t('Destination Added Successfully!'));                                                            
                    		$model=new Destination;
                    		Yii::app()->controller->redirect(array('create','tid' => $tid));
                } }
        }                
        $this->render('cmswidgets.views.destination.destination_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='destination-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
