<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ClinkCreateWidget extends CWidget
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
        $model = new Clink;
                        
        //If it has guid, it means this is a translated version
        $guid=isset($_GET['guid']) ? strtolower(trim($_GET['guid'])) : '';                                      
        //List of language that should exclude not to translate       
        $lang_exclude=array();        
        //List of translated versions
        $versions=array();                
        // If the guid is not empty, it means we are creating a translated version of a content
        // We will exclude the translated language and include the name of the translated content to $versions
       

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='clink-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // collect user input data
        if(isset($_POST['Clink']))
        {
                $model->attributes=$_POST['Clink'];  
				if(count($_POST['Clink']['text_format']) !=0 &&($_POST['Clink']['text_format']))
				{
				$text_format=implode(',',$_POST['Clink']['text_format']);
				}
				else
				{
				$text_format=$_POST['Clink']['text_format'];
				}				
				$current_time=time();
				$model->created = $current_time;
                $model->modified = $current_time;
				$model->font_size= $_POST['Clink']['font_size'];
				$model->text_format= $text_format;
				
                if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('The Content Link has been Added Successfully!'));                                                            
                   $model=new Clink;
                    Yii::app()->controller->redirect(array('admin'));
                }
        }                
        $this->render('cmswidgets.views.clink.clink_form_widget',array('model'=>$model,'lang_exclude'=>$lang_exclude,'versions'=>$versions));            

        
        
            
        
    }   
}
