<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class SliderCreateWidget extends CWidget
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
		                            
        //List of language that should exclude not to translate       
        
        $model = new Slider;
		
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='slider-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
			
		if (!empty($_FILES)) {
			
			Yii::import('common.extensions.file.CFile');
			$file = CUploadedFile::getInstanceByName('Slider[file]');
			$temp_name = time().'.'.$file->getExtensionName();
			$file->saveAs(RESOURCES_FOLDER.'/'.$temp_name);
			
			$img1 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
			//$img1->resizeToWidth(229);
			$img1->resize(1922,716);
			$img1->save(RESOURCES_FOLDER.'/slider/'.$temp_name);	
			unlink(RESOURCES_FOLDER.'/'.$temp_name);
					
					$img_no = Slider::model()->find(array(
						'order' => 'img_order DESC',
						'limit' => 1
					));
					$imgOr = 1;
					
					if( isset($img_no) && count($img_no)>0 ) { $imgOr = $img_no->img_order + 1; } 
					
					$current_time=time();
					
					$model->img_url = $temp_name;
					$model->img_order = $imgOr;
					$model->crby = Yii::app()->user->getId();
					$model->created = $current_time;
                	$model->modified = $current_time;
					$model->cr_ip = ip();
					$model->save();
				
			}
		            
        $this->render('cmswidgets.views.slider.slider_form_widget',array('model'=>$model));
    }   
}
