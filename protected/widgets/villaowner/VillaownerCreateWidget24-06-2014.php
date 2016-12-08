<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class VillaownerCreateWidget extends CWidget
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
        $model = new Villaowner;

        $this->performAjaxValidation(array($model));
        
        if(isset($_POST['Villaowner']))
        {
			$model->attributes=$_POST['Villaowner'];  
			$file = CUploadedFile::getInstanceByName('Villaowner[avatar]');
			if($file)
			{
				$temp_name = time().'.'.$file->getExtensionName();
				$model->avatar = $temp_name;
			}	
			$current_time=time();
			$model->created = $current_time;
			$model->modified = $current_time;
			$model->cr_ip = ip();
			$model->lang = 2;                  
			$model->uid = uniqid();
			  
			$valid=$model->validate();

		    if($valid)
			{
				if($model->avatar!='')
				{
					$file->saveAs(RESOURCES_FOLDER.'/'.$temp_name);
					$img = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img->resize(64,64);
					$img->save(RESOURCES_FOLDER.'/th_'.$temp_name);
					if(Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/'.$temp_name, "temples", 'peoples/fullsize/'.$temp_name, S3::ACL_PUBLIC_READ))
					{
						Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/th_'.$temp_name, "temples", 'peoples/thumb/'.$temp_name, S3::ACL_PUBLIC_READ);
					}
					unlink(RESOURCES_FOLDER.'/'.$temp_name);
					unlink(RESOURCES_FOLDER.'/th_'.$temp_name);
				}
				if($model->save())
				{   
                    user()->setFlash('success',t('People Added Successfully!'));                                                            
                    $model=new Villaowner;
                }
			}
        }   
        $this->render('cmswidgets.views.villaowner.villaowner_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='villaowner-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
} ?>