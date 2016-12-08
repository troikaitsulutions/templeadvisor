<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ItineraryUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Itinerary', $id);
		$tid = isset($_GET['tid']) ? (int)$_GET['tid'] : 0;
		
			
			
			
			$this->performAjaxValidation(array($model));
            
      
      
      
        // collect user input data
        if(isset($_POST['Itinerary']))
        {
                $model->attributes=$_POST['Itinerary'];      
				$current_time=time();
				$model->modified = $current_time;    
				$model->mod_ip = ip();    
				$model->mod_by = Yii::app()->user->getId();  
				
				if (is_array($model->temples)) {
						$model->temples = implode("|",$model->temples);
				}   
				$valid=$model->validate();
				
				
				
                                       
                 if($valid)
        			{
				         
                if($model->save()){       
                    user()->setFlash('success',t('Update Itinerary Successfully!'));  
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
