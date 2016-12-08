<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class TourcostUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Tourcost', $id);    
      
	  	$this->performAjaxValidation(array($model, $mseo));
		
        // collect user input data
        if(isset($_POST['Tourcost']))
        {
				$model->attributes=$_POST['Tourcost'];
				$current_time=time();
                $model->modified = $current_time;    
				$model->mod_ip = ip();    
				$model->mod_by = Yii::app()->user->getId();  
					
				$valid=$model->validate();
				
                if($valid)
        		{
					if($model->save()){           
						user()->setFlash('success',t('Update Tour Cost Successfully!'));  
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
