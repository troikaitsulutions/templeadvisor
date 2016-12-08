<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ItinerarydetailCreateWidget extends CWidget
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
        $model = new Itinerarydetail; 
		
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Itinerarydetail']))
        {
                $model->attributes=$_POST['Itinerarydetail'];  
				$current_time = time();
				$model->created = $current_time;  
				$model->cr_ip = ip();
				$model->crby = Yii::app()->user->getId();    
				$model->tid = Itinerary::model()->findByPk($model->itinerary)->tid;
				$model->day = Itinerary::model()->findByPk($model->itinerary)->day;
				
				$valid=$model->validate();  				  
				   if($valid)
        			{
                		if($model->save()){           
                    		user()->setFlash('success',t('Itinerary Detail Added Successfully!'));                                                            
                    		$model=new Itinerarydetail;
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
