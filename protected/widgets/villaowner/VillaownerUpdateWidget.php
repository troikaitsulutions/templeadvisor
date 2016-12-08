<?php


/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class VillaownerUpdateWidget extends CWidget
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
       if(!isset($_GET['id']))
	   {
		   $user = User::model()->find(array('condition'=>"user_id='".user()->id."'"));
		   $id=$user->people_id;
       }
	   else
	   {
		   $id=$_GET['id'];
	   }
       $model =  GxcHelpers::loadDetailModel('Villaowner', $id);
			
        if(isset($_POST['ajax']) && $_POST['ajax']==='villaowner-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // collect user input data
        if(isset($_POST['Villaowner']))
        {
			$model->attributes=$_POST['Villaowner'];  
			$current_time=time();
			$model->modified = $current_time;	
			$model->mod_ip = ip();        
			$modela = Villaowner::model()->findbyPk($id);   
			$file = CUploadedFile::getInstanceByName('Villaowner[avatar]');
			 if($file)
			 {
				$temp_name = time().'.'.$file->getExtensionName();
				$exist = $modela->avatar;
				$model->avatar = $temp_name;
			 }
			 else
			 {
				$model->avatar = $modela->avatar;
			 }			  
			if($model->save())
			{     
				if($file)
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
					if($exist!='')
					{
						Yii::app()->s3->deleteObject("temples", 'peoples/thumb/'.$exist);
						Yii::app()->s3->deleteObject("temples", 'peoples/fullsize/'.$exist);
						//unlink('http://tt-prop-photos.s3.amazonaws.com/peoples/thumb/'.$exist);
						//unlink('http://tt-prop-photos.s3.amazonaws.com/peoples/fullsize/'.$exist);
					}
				}      
				//Start to save the Page Block
				user()->setFlash('success',t("The people's information has been updated Successfully!"));
				if(isset($_GET['id']))
				{                                       
					$model=new Villaowner;
					Yii::app()->controller->redirect(array('admin'));
				}
			} 
        }                
        $this->render('cmswidgets.views.villaowner.villaowner_form_widget',array('model'=>$model));            
    }   
}
