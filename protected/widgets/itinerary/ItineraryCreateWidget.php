<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ItineraryCreateWidget extends CWidget
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
        $model = new Itinerary; 
		$tid = isset($_GET['tid']) ? (int)$_GET['tid'] : 0;
        // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Itinerary']))
        {
                $model->attributes=$_POST['Itinerary'];  
				$current_time = time();
				$model->created = $current_time;  
				$model->cr_ip = ip();
				$model->tid = $tid;
				$model->crby = Yii::app()->user->getId();    
				
				if (is_array($model->temples)) {
						$model->temples = implode("|",$model->temples);
				}               
				
				
				$valid=$model->validate();  				  
				   if($valid)
        			{
                		if($model->save()){           
                    		user()->setFlash('success',t('Itinerary Added Successfully!'));                                                            
                    		$model=new Itinerary;
                    		Yii::app()->controller->redirect(array('create','tid' => $tid));
                } }
        } 
		
		if(isset($model->temples) && $model->temples!=='')
                $model->temples=explode('|',$model->temples);              
        $this->render('cmswidgets.views.itinerary.itinerary_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='itinerary-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
