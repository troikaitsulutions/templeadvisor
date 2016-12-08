<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class TourcostCreateWidget extends CWidget
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
       $model = new Tourcost;
        
       $this->performAjaxValidation(array($model));
        
		
		
        // collect user input data
        if(isset($_POST['Tourcost']))
        {
			
                $model->attributes=$_POST['Tourcost'];   
				
				$current_time = time();
				$model->created = $current_time;  
				$model->cr_ip = ip();
				$model->crby = Yii::app()->user->getId();                 
				$model->uid = uniqid();
				
				$valid=$model->validate();
      		
				
				 if($valid)
        			{ 
				                   
                if($model->save() ){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('The Tour Cost has been Added Successfully!'));                                
                    $model=new Tourcost;
                    Yii::app()->controller->redirect(array('create'));
                }
					}
        } 
		      
        $this->render('cmswidgets.views.tourcost.tourcost_form_widget',array('model'=>$model));
    }  
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='tourcost-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
