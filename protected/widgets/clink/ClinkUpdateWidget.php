<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ClinkUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Clink', $id);
            
      
        //Guid of the Object
                                
        
        //List of language that should exclude not to translate       
        $lang_exclude=array();
        
        //List of translated versions
        $versions=array();                             
         

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='clink-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        //Define Blocks in Regions
        $regions_blocks=array();
        
        
        
        
        // collect user input data
        if(isset($_POST['Clink']))
        {
                                              
                
                
                $model->attributes=$_POST['Clink'];
				if(count($_POST['Clink']['text_format']) !=0)
				{
				$text_format=implode(',',$_POST['Clink']['text_format']);
				}
				else
				{
				$text_format=$_POST['Clink']['text_format'];
				}				
    
				$current_time=time();
                $model->modified = $current_time;  
				$model->font_size= $_POST['Clink']['font_size'];
				$model->text_format= $text_format;
                if($model->save()){           
                    
                   
                    //Start to save the Page Block
                    user()->setFlash('success',t('Update Link Successfully!'));                                                                               
                }
        }                
        $this->render('cmswidgets.views.clink.clink_form_widget',array('model'=>$model,'lang_exclude'=>$lang_exclude,'versions'=>$versions));            

        
        
            
        
    }   
}
