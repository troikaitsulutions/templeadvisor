<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class OverviewCreateWidget extends CWidget
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
        $model = new Overview;
		$mseo = new Seo;
		
		
	     // if it is ajax validation request
        $this->performAjaxValidation(array($model, $mseo));
        
        // collect user input data
        if(isset($_POST['Overview'],  $_POST['Seo']))
        {
                $model->attributes=$_POST['Overview']; 
				$mseo->attributes=$_POST['Seo']; 
				 
				
				 $current_time=time();
				  $model->uid = uniqid();
				  $mseo->uid = $model->uid;
				 $mseo->created = $model->created = $current_time;	
				 $mseo->created = $model->cr_ip = ip();
				 $mseo->created = $model->crby = Yii::app()->user->getId(); 
				  $mseo->layout = 'overview';			                    
				
				 $valid=$model->validate();
      			  $valid=$mseo->validate() && $valid;
				
				 
				 if($valid)
        			{
                		if($model->save()  && $mseo->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Added Successfully!'));                                                            
                    $model=new Overview;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        }                
        $this->render('cmswidgets.views.overview.overview_form_widget',array('model'=>$model, 'mseo'=>$mseo));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='overview-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
