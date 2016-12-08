<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class TownCreateWidget extends CWidget
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
        $model = new Town;
		$mseo = new Seo;
		
                        
        //If it has guid, it means this is a translated version
        $guid=isset($_GET['guid']) ? strtolower(trim($_GET['guid'])) : '';                                      
        //List of language that should exclude not to translate       
        $lang_exclude=array();        
        //List of translated versions
        $versions=array();                
        // If the guid is not empty, it means we are creating a translated version of a content
        // We will exclude the translated language and include the name of the translated content to $versions
        if($guid!=''){
                $review_object = Town::model()->with('language')->findAll('guid=:gid',array(':gid'=>$guid));
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
        $this->performAjaxValidation(array($model,$mseo));
        
        // collect user input data
        if(isset($_POST['Town'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Town'];  
				$mseo->attributes=$_POST['Seo']; 
				
								
				$current_time=time();
				$mseo->created = $model->created = $current_time;
				$mseo->crby = $model->crby = Yii::app()->user->getId(); 
				$mseo->cr_ip = $model->cr_ip = ip();
				$mseo->layout = 'town';
				                    
				  $model->uid = uniqid();
				  $mseo->uid = $model->uid;
				  
				  $valid=$model->validate();
				  
       			  $valid=$mseo->validate() && $valid;
				  
				   if($valid)
        			{
                		if($model->save() && $mseo->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Town Added Successfully!'));                                                            
                    $model=new Town;
                 //   Yii::app()->controller->redirect(array('admin'));
                } }
        }                
        $this->render('cmswidgets.views.town.town_form_widget',array('model'=>$model,'mseo'=>$mseo,'lang_exclude'=>$lang_exclude,'versions'=>$versions));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='town-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
