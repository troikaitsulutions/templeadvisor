<?php

/**
 * This is the Widget for Updating User Information.
 * 
 
 * @package cmswidgets.user
 *
 */
class UserUpdateWidget extends CWidget
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
        $user_id=isset($_GET['id']) ? (int)$_GET['id'] : 0;        
        if($user_id!==0) {            
            $model=User::model()->findbyPk($user_id);    
            $old_pass=(string)$model->password;
            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax']==='userupdate-form')
            {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }    
            // collect user input data
            if(isset($_POST['User']))
            {
                 $model->attributes=$_POST['User'];
                 if($model->password!=$old_pass){ $model->password=$model->hashPassword($model->password, USER_SALT); }
                 $model->scenario='update';
				 $file = CUploadedFile::getInstanceByName('User[avatar]');
				 $modela = User::model()->findbyPk($user_id);   
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
				 $model->login_ip = ip();
				 if($model->password!=$old_pass){
				  $model->original_password=$_POST['User']['password'];  
				 }
		    	 if($model->save())
				 {
 				    if($file){ 
					
					$file->saveAs(AVATAR_FOLDER.'/'.$temp_name); 
					
					Yii::app()->s3->putObjectFile(AVATAR_FOLDER.'/'.$temp_name, AWS_S3_BUCKET, 'peoples/thumb/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					unlink(AVATAR_FOLDER.'/'.$temp_name); }
                    user()->setFlash('success',t('Updated Successfully!'));                                        
                 }			
            }
            $this->render('cmswidgets.views.user.user_update_widget',array('model'=>$model));
        } else {
            throw new CHttpException(404,t('The requested page does not exist.'));
        }
    }   
}
