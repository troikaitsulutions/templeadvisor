<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PostureCreateWidget extends CWidget
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
        $model = new Posture;
		
		
        //If it has guid, it means this is a translated version
        $guid=isset($_GET['guid']) ? strtolower(trim($_GET['guid'])) : '';                                      
        //List of language that should exclude not to translate       
        $lang_exclude=array();        
        //List of translated versions
        $versions=array();                
        // If the guid is not empty, it means we are creating a translated version of a content
        // We will exclude the translated language and include the name of the translated content to $versions
        if($guid!=''){
                $review_object=  Posture::model()->with('language')->findAll('guid=:gid',array(':gid'=>$guid));
                if(count($review_object)>0){
                        foreach($review_object as $obj){
                                $lang_exclude[]=$obj->lang;
                                $versions[]=$obj->language->lang_desc;
                        }
                }
                $model->guid=$guid;
				$model->name=$obj->name;
        } 

        // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Posture']))
        {
                $model->attributes=$_POST['Posture'];  
				
				
								
				$current_time=time();
				
				$model->created = $current_time;
				$model->crby = Yii::app()->user->getId(); 
				$model->cr_ip = ip();
				
				                    
				  $model->uid = uniqid();
				 
				  
				  $valid=$model->validate();
       			 
				  
				   if($valid)
        			{
                		if($model->save() ){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Posture Added Successfully!'));                                                            
                    $model=new Posture;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.posture.posture_form_widget',array('model'=>$model,'lang_exclude'=>$lang_exclude,'versions'=>$versions));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='posture-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
