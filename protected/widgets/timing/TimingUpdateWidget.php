<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class TimingUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Timing', $id);
        $page_id = isset($_GET['page_id']) ? strtolower(trim($_GET['page_id'])) : '';
		
        if(isset($_POST['ajax']) && $_POST['ajax']==='timing-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        //Define Blocks in Regions
        $regions_blocks=array();
        // collect user input data
        if(isset($_POST['Timing']))
        {
                $model->attributes=$_POST['Timing'];    
				$current_time=time();
                $model->modified = $current_time;    
				$model->mod_ip = ip();    
				$model->mod_by = Yii::app()->user->getId();           
                if($model->save()){           
               //Start to save the Page Block
                user()->setFlash('success',t('Update Successfully!'));
				 $model=new Timing;
                 Yii::app()->controller->redirect(array('create','page_id'=>$page_id));                                                                               
                }
        }                
        $this->render('cmswidgets.views.timing.timing_create_form_widget',array('model'=>$model));            
    }   
}
