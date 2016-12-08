<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class AdditionalcostCreateWidget extends CWidget
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
        $model = new Additionalcost;
                        
        //If it has guid, it means this is a translated version
        $guid=isset($_GET['guid']) ? strtolower(trim($_GET['guid'])) : '';        
		
		$page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0;                              
        //List of language that should exclude not to translate       
        $lang_exclude=array();        
        //List of translated versions
        $versions=array();                
        // If the guid is not empty, it means we are creating a translated version of a content
        // We will exclude the translated language and include the name of the translated content to $versions
        if($guid!=''){
                $review_object=  Additionalcost::model()->with('language')->findAll('guid=:gid',array(':gid'=>$guid));
                if(count($review_object)>0){
                        foreach($review_object as $obj){
                                $lang_exclude[]=$obj->lang;
                                $versions[]=$obj->name.' - '.$obj->language->lang_desc;
                        }
                }
                
        }

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='additional-cost-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // collect user input data
        if(isset($_POST['Additionalcost']))
        {
                $model->attributes=$_POST['Additionalcost'];   
								
				$current_time=time();
				$model->created = $current_time;
                $model->modified = $current_time;
				$model->cr_ip = ip();
				$page_id = $model->prop_id;
				                    
                if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('The Additional Cost has been Added Successfully!'));                                
                    $model=new Additionalcost;
                    Yii::app()->controller->redirect(array('create','page_id'=>$page_id));
                }
        }    
		$model->prop_id = $page_id;
		            
        $this->render('cmswidgets.views.additionalcost.additional_cost_create_form_widget',array('model'=>$model,'lang_exclude'=>$lang_exclude,'versions'=>$versions));
    }   
}
