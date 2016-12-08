<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ItinerarydetailUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Itinerarydetail', $id);
			
		$this->performAjaxValidation(array($model));
        // collect user input data
        if(isset($_POST['Itinerarydetail']))
        {
                $model->attributes=$_POST['Itinerarydetail'];      
				$current_time=time();
				$model->modified = $current_time;    
				$model->mod_ip = ip();    
				$model->mod_by = Yii::app()->user->getId();  
				$model->tid = Itinerary::model()->findByPk($model->itinerary)->tid;
				$model->day = Itinerary::model()->findByPk($model->itinerary)->day;
				
				$valid=$model->validate();
			               
                if($valid)
        			{
                if($model->save()){       
                    user()->setFlash('success',t('Update Itinerary detail Successfully!'));  
					Yii::app()->controller->redirect(array('create'));                                                                            
                } }
        }
		        
        $this->render('cmswidgets.views.itinerarydetail.itinerarydetail_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='itinerarydetail-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
