<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class BestseasonUpdateWidget extends CWidget
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
		$page_id=isset($_GET['page_id']) ? (int)$_GET['page_id'] : 0;
        $model=  GxcHelpers::loadDetailModel('Bestseason', $id);
            
      
        //Guid of the Object
        //$guid=$model->guid;                            
        
        //List of language that should exclude not to translate       
        $lang_exclude=array();
        
        //List of translated versions
        $versions=array();                             
         

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='bestseason-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        //Define Blocks in Regions
        $regions_blocks=array();
        
        
        
        
        // collect user input data
        if(isset($_POST['Bestseason']))
        {
                                              
                
                
                $model->attributes=$_POST['Bestseason'];    
				$current_time=time();
                $model->modified = $current_time;    
				$model->mod_ip = ip();    
				$model->mod_by = Yii::app()->user->getId();  
				$model->from_date=strtotime($model->from_date);
				$model->to_date=strtotime($model->to_date);            
                if($model->save()){           
                    
                   
                    //Start to save the Page Block
                    user()->setFlash('success',t('Update Season Successfully!'));  
					Yii::app()->controller->redirect(array('admin','page_id'=>$page_id));                                                                            
                }
        }
		
		 $model->from_date=date('Y-m-d H:i:s',$model->from_date);
		$model->to_date=date('Y-m-d H:i:s',$model->to_date);               
        $this->render('cmswidgets.views.bestseason.bestseason_form_widget',array('model'=>$model,'lang_exclude'=>$lang_exclude,'versions'=>$versions));            

        
        
            
        
    }   
}
