<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class EtiquettesUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Etiquettes', $id);
			
		
       $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Etiquettes']))
        {
                $model->attributes=$_POST['Etiquettes'];  
				
								
				$current_time=time();
				
               	$model->modified = $current_time;
				$model->mod_ip = ip();
				$model->mod_by = Yii::app()->user->getId(); 	
				  
				$valid=$model->validate();
				  
				if($valid)
        		{
                		if($model->save()  ){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Etiquettes information has been updated Successfully!'));                                                            
                    $model=new Etiquettes;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.etiquettes.etiquettes_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='etiquettes-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
