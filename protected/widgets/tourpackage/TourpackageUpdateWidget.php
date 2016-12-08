<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class TourpackageUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Tourpackage', $id);
		
		$mseo = Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
			
		
            
      
	  	$this->performAjaxValidation(array($model, $mseo));
		
        // collect user input data
        if(isset($_POST['Tourpackage'], $_POST['Seo']))
        {
                Yii::import('common.extensions.file.CFile');
				
				$model->attributes=$_POST['Tourpackage'];
				$mseo->attributes=$_POST['Seo'];     
				$current_time=time();
                $mseo->modified = $model->modified = $current_time;    
				$mseo->mod_ip = $model->mod_ip = ip();    
				$mseo->mod_by = $model->mod_by = Yii::app()->user->getId();  
				
				if (is_array($model->temples)) {
						$model->temples = implode("|",$model->temples);
				}  
				
				 if(isset($model->icon_file)) {  
				$IconFile = CUploadedFile::getInstance($model,'icon_file');
				
				
				if( isset($IconFile) ) {
					
					$temp_name = toSlug($model->name).'_'.time().'.'.$IconFile->getExtensionName();
					$IconFile->saveAs(RESOURCES_FOLDER.'/'.$temp_name);
					
					$img1 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img2 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img3 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img4 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img5 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img6 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					
					$img1->resize(270,160);
					$img1->save(RESOURCES_FOLDER.'/270x160_'.$temp_name);
					
					$img2->resize(127,75);
					$img2->save(RESOURCES_FOLDER.'/127x75_'.$temp_name);
					
					$img3->resize(210,124);
					$img3->save(RESOURCES_FOLDER.'/210x124_'.$temp_name);
					
					$img4->resize(150,89);
					$img4->save(RESOURCES_FOLDER.'/150x89_'.$temp_name);
					
					$img5->resize(240,143);
					$img5->save(RESOURCES_FOLDER.'/240x143_'.$temp_name);
					
					$img6->resize(870,468);
					$img6->save(RESOURCES_FOLDER.'/870x468_'.$temp_name);
					
					
					if (Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/270x160_'.$temp_name, AWS_S3_BUCKET, 'tours/packages/270x160/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) )) 						
						{  
							Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/127x75_'.$temp_name, AWS_S3_BUCKET, 'tours/packages/127x75/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					 
					 		Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/210x124_'.$temp_name, AWS_S3_BUCKET, 'tours/packages/210x124/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					 
					 		Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/150x89_'.$temp_name, AWS_S3_BUCKET, 'tours/packages/150x89/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
				
					 Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/240x143_'.$temp_name, AWS_S3_BUCKET, 'tours/packages/240x143/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					
					 Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/870x468_'.$temp_name, AWS_S3_BUCKET, 'tours/packages/870x468/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					
					
					$model->icon_file =   $temp_name;
    				//unlink(RESOURCES_FOLDER.'/'.$temp_name);
					//unlink(RESOURCES_FOLDER.'/th_'.$temp_name);
				} }
				}  
				
				$valid=$model->validate();
				$valid=$mseo->validate() && $valid;
				
				
                                       
                 if($valid)
        			{
				         
                if($model->save() && $mseo->save()){           
                    user()->setFlash('success',t('Update tour Successfully!'));  
					$model=new Tourpackage;
					Yii::app()->controller->redirect(array('create'));                                                                            
                }
					}
        }
		if(isset($model->temples) && $model->temples!=='')
                $model->temples=explode('|',$model->temples);  
		          
        $this->render('cmswidgets.views.tourpackage.tourpackage_form_widget',array('model'=>$model,'mseo'=>$mseo));            
    }   
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='tourpackage-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
