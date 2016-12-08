<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ReviewUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Review', $id);
            
      
        //Guid of the Object
        $guid=$model->guid;                            
        
        //List of language that should exclude not to translate       
        $lang_exclude=array();
        
        //List of translated versions
        $versions=array();                             
         

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='review-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        //Define Blocks in Regions
        $regions_blocks=array();
        
        
        
        
        // collect user input data
        if(isset($_POST['Review']))
        {
                                              
                
                
                $model->attributes=$_POST['Review'];    
				$current_time = time();
                $model->modified = $current_time;    
				
				$model->mod_ip = ip();
				$model->mod_by = Yii::app()->user->getId(); 
				               
                if($model->save()){           
                    
                   
                    //Start to save the Page Block
                    user()->setFlash('success',t('Update Review Successfully!'));                                                                               
                }
        }  
		             
        $this->render('cmswidgets.views.review.review_form_widget',array('model'=>$model,'lang_exclude'=>$lang_exclude,'versions'=>$versions));            

        
        
            
        
    }   
}
