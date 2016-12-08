<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class GalleryUpdatealtWidget extends CWidget
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
        $id=isset($_GET['page_id']) ? (int)$_GET['page_id'] : 0;
        //$model=  GxcHelpers::loadDetailModel('Gallery', $id);
        $models = Gallery::model()->findAll(array(
			'condition'=>'prop_id = :PID',
			'params'=>array(':PID'=>$id),
			'order'=>'img_order',
		));    
      
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
       
        $regions_blocks=array();
        
        
        if(isset($_POST['Gallery']))
        {
               // $model->attributes=$_POST['Gallery'];    
				//print_r($model->attributes);
				
				foreach ($models as $model) {
					
				$gallery =  GxcHelpers::loadDetailModel('Gallery', $model->id);
				
				$current_time=time();
				$gallery->modified = $current_time;
				$gallery->mod_by = Yii::app()->user->getId();  
				$gallery->mod_ip = ip();
				
				$gallery->src = $_POST[$model->id.'src'];
				
				$gallery->name = $_POST[$model->id.'_en_name'];
				
				
				
				$gallery->alt_text = $_POST[$model->id.'_en_alt_text'];
				
				
				
				$gallery->description = $_POST[$model->id.'_en_description'];
				
				
				$gallery->save();
				}
		$models = Gallery::model()->findAll(array(
			'condition'=>'prop_id = :PID',
			'params'=>array(':PID'=>$id)
		));
        }   
		       
        $this->render('cmswidgets.views.gallery.gallery_alt_widget',array('models'=>$models,'id'=>$id));             
    }   
}
