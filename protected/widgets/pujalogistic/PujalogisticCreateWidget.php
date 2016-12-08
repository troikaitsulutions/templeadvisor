<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PujalogisticCreateWidget extends CWidget
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
        $model = new Pujalogistic;
	     // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Pujalogistic']))
        {
                $model->attributes=$_POST['Pujalogistic'];  
				
				 $current_time=time();
				 $model->created = $current_time;	
				 $model->cr_ip = ip();
				 $model->crby = Yii::app()->user->getId(); 			                    
				 $valid=$model->validate();
				 
				 if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Puja Logistic Price Added Successfully!'));                                                            
                    $model=new Pujalogistic;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.pujalogistic.pujalogistic_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='pujalogistic-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
