<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class AtlistCreateWidget extends CWidget
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
        $model = new Atlist;

        $this->performAjaxValidation(array($model));
       
        if(isset($_POST['Atlist']))
        {
                $model->attributes=$_POST['Atlist'];  
				
				
				$current_time=time();				
				$model->created = $current_time;
				$model->cr_ip = ip();
				$model->crby = Yii::app()->user->getId();
				
				                    
				
				 
				  
				  $valid=$model->validate();
				  
				  
				   if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Attractions Added Successfully!'));                                                            
                    $model=new Atlist;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.atlist.atlist_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='atlist-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
