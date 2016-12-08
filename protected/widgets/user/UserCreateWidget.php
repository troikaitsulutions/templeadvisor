<?php

/**
 * This is the Widget for create new User.
 * 
 
 * @package cmswidgets.user
 *
 */
class UserCreateWidget extends CWidget
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
                                      
        $model=new UserCreateForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='usercreate-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['UserCreateForm']))
        {
                $model->attributes=$_POST['UserCreateForm'];
                // validate user input password
                if($model->validate()){
                    
                        $new_user = new User;
                        $new_user->scenario='create';
                        $new_user->username=$model->username;
                        $new_user->email=$model->email;
                        $new_user->display_name=$model->display_name;
                        $new_user->password=$model->password;
						$new_user->original_password=$model->password;    
						$new_user->people_type=$model->people_type;    
						$new_user->people_id=$model->people_id;      
						$new_user->login_ip = ip();                  
 						if(isset($new_user->docs)) { $new_user->docs = implode(',',$model->docs); }
						if($new_user->save()){
                            user()->setFlash('success',t('Create new User Successfully!'));
							
							$mess = 'Dear '.$model->display_name.',<br> Please find below your personal User ID & password in order for you to log in through the www.templeadviser.com website.<br><br>';
							
							$mess .= 'To log in go to www.templeadviser.com/besite/login <br><br>';
							
							$mess .='Your User ID : '. $model->username.'<br><br>';
							$mess .='Password : '. $model->password.'<br><br>';
							$mess .='Thanks and Regards <br> Temple Adviser Team ';
							
							$subject = 'User id and password from Temple Adviser';
							
							$message = new YiiMailMessage;
							$message->setBody($mess, 'text/html');
							$message->subject = $subject;
							$message->addTo($model->email);
							$message->from = 'info@templeadviser.com';
							
							if(isset($new_user->docs)) { $Docagrrement = Docagrrement::model()->findAll(array('select'=>'attachment_file,id','condition'=>"id in ($new_user->docs)")); }
							if(isset($Docagrrement))
							{
								foreach($Docagrrement as $data)
								{
									$UserAgreementStatus = new UserAgreementStatus;
									$UserAgreementStatus->user_id = $new_user->user_id;
									$UserAgreementStatus->doc = $data->id;
									$UserAgreementStatus->sent_status = 1;
									$UserAgreementStatus->created = time();
									$UserAgreementStatus->cr_by = Yii::app()->user->getId();
									$UserAgreementStatus->cr_ip = ip();
									$UserAgreementStatus->save();
									
									$swiftAttachment = Swift_Attachment::fromPath( RESOURCES_FOLDER.'/document_agrrement/'.$data->attachment_file);
									$message->attach($swiftAttachment);
								}
							}
							
							Yii::app()->mail->send($message);    
                        }
                        
                        $model= new UserCreateForm;
                        Yii::app()->controller->redirect(array('create'));

                }
        }

        $this->render('cmswidgets.views.user.user_create_widget',array('model'=>$model));
    }   
}
