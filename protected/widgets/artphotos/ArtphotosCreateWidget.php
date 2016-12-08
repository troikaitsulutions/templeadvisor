<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ArtphotosCreateWidget extends CWidget
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
		$page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0;                              
        //List of language that should exclude not to translate       
        
        $model = new Artphotos;
		
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
			
		if (!empty($_FILES)) {
			
			Yii::import('common.extensions.file.CFile');
			$file = CUploadedFile::getInstanceByName('Artphotos[file]');
			$temp_name = toSlug(Temples::GetName($page_id)).'_'.time().'.'.$file->getExtensionName();
			
			$file->saveAs(RESOURCES_FOLDER.'/'.$temp_name);
			
			$img = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
			
			if ( $img->getHeight() > $img->getWidth() ) { $img->resizeToHeight(600); }
			else { $img->resizeToWidth(832); }
			
			$img->save(RESOURCES_FOLDER.'/'.$temp_name);
			
			$img1 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
			$img1->resize(220,160);
			$img1->save(RESOURCES_FOLDER.'/th_'.$temp_name);
			
			
			if (Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/'.$temp_name, AWS_S3_BUCKET, $page_id.'/large/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) )) 						
				{  
					Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/th_'.$temp_name, AWS_S3_BUCKET, $page_id.'/thumb/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
				
    				unlink(RESOURCES_FOLDER.'/'.$temp_name);
					unlink(RESOURCES_FOLDER.'/th_'.$temp_name);
			
					
					$img_no = Artphotos::model()->find(array(
						'condition'=>'prop_id = :PR',
						'params'=> array(':PR' => $page_id),
						'order' => 'img_order DESC',
						'limit' => 1
					));
					$imgOr = 1;
					
					if( isset($img_no) && count($img_no)>0 ) { $imgOr = $img_no->img_order + 1; } 
					
					$current_time=time();
					$model->prop_id = $page_id;
					$model->img_url = $temp_name;
					$model->img_order = $imgOr;
					$model->created = $current_time;
                	$model->modified = $current_time;
					$model->cr_ip = ip();
					$model->crby = Yii::app()->user->getId();
					$model->save();
				} }
			
 
        // collect user input data
        if(isset($_POST['Gallery']))
        {
			
			
               /* $model->attributes=$_POST['Avail'];   
								
				$current_time=time();
				$model->created = $current_time;
                $model->modified = $current_time;
				$model->cr_ip = ip();
				$model->from_date = strtotime($model->from_date);
				$model->to_date = strtotime($model->to_date);
				$page_id = $model->prop_id;
				                    
                if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('The Offer has been Added Successfully!'));                                
                    $model=new Soffer;
                    Yii::app()->controller->redirect(array('create','page_id'=>$page_id));
                } */
        }    
		//$model->prop_id = $page_id;
		            
        $this->render('cmswidgets.views.gallery.gallery_form_widget',array('model'=>$model));
    }   
}
