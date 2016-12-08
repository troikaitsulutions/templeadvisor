<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class TimingCreateWidget extends CWidget
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
        $model = new Timing;
        //If it has guid, it means this is a translated version
		$id=isset($_GET['id']) ? strtolower(trim($_GET['id'])) : '';        
        $page_id=isset($_GET['page_id']) ? strtolower(trim($_GET['page_id'])) : '';        
        //List of language that should exclude not to translate       
     
        if(isset($_POST['ajax']) && $_POST['ajax']==='timing-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // collect user input data
        if(isset($_POST['Timing']))
        {
				
                $model->attributes=$_POST['Timing'];   
				$current_time=time();
				
				$model->prop_id= $page_id;
				$model->created = $current_time;
                $model->modified = $current_time;
				$model->crby = Yii::app()->user->getId(); 
				$model->cr_ip = ip();
                if($model->save()){           
                    //Start to save the Page Block
                    user()->setFlash('success',t('Added Successfully!'));                                
                    $model=new Timing;
                    Yii::app()->controller->redirect(array('create','page_id'=>$page_id));
                }
        }    
        $this->render('cmswidgets.views.timing.timing_create_form_widget',array('model'=>$model));
    }   
}
