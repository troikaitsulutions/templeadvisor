<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class PujatypeUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Pujatype', $id);
			
		
       $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Pujatype']))
        {
                $model->attributes=$_POST['Pujatype'];  
				
								
				$current_time=time();
				
               	$model->modified = $current_time;
				$model->mod_ip = ip();
				$model->mod_by = Yii::app()->user->getId(); 	
				  
				$valid=$model->validate();
				  
				if($valid)
        		{
                		if($model->save()  ){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Puja Type information has been updated Successfully!'));                                                            
                    $model=new Pujatype;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.pujatype.pujatype_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='pujatype-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
