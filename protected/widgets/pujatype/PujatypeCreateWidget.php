<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PujatypeCreateWidget extends CWidget
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
        $model = new Pujatype;
	     // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Pujatype']))
        {
                $model->attributes=$_POST['Pujatype'];  
				
				 $current_time=time();
				 $model->created = $current_time;	
				 $model->cr_ip = ip();
				 $model->crby = Yii::app()->user->getId(); 			                    
				 $valid=$model->validate();
				 
				 if($valid)
        			{
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Puja type Added Successfully!'));                                                            
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
