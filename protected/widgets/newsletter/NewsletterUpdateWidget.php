<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class NewsletterUpdateWidget extends CWidget
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
       $model =  GxcHelpers::loadDetailModel('Newsletter', $id);
			
		    
			
			$mseo=Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
			
			
		
            $this->performAjaxValidation(array($model,$mseo));
        
		if(isset($_POST['save'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Newsletter'];  
				$mseo->attributes=$_POST['Seo']; 
			
								
				$current_time=time();
				$mseo->created = $model->created = $current_time;				
                $mseo->modified = $model->modified = $current_time;
				$model->cr_ip = ip();
				//$mseo->crby = $model->crby = Yii::app()->user->user_id;
				                    
				  $model->uid = uniqid();
				  $mseo->uid = $model->uid;
				  
				  $valid=$model->validate();
				  $valid=$mseo->validate() && $valid;
       			   
				  
				   if($valid)
        			{
                		if($model->save() && $mseo->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Newsletter Added Successfully!'));                                                            
                    $model=new Newsletter;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        }   
		
        // collect user input data
       if(isset($_POST['save_send'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Newsletter'];  
				$mseo->attributes=$_POST['Seo']; 
				$mailing_list_id= $_POST['Newsletter']['mlist'];
				$mail_content= $_POST['Newsletter']['content'];
				$mail_name= $_POST['Newsletter']['name'];
				//$mailing_list_id= $_POST['Newsletter']['mlist'];
				
				$current_time=time();
				$mseo->created = $model->created = $current_time;				
                $mseo->modified = $model->modified = $current_time;
				$model->cr_ip = ip();
				//$mseo->crby = $model->crby = Yii::app()->user->user_id;
				                    
				  $model->uid = uniqid();
				  $mseo->uid = $model->uid;
				  
				  $valid=$model->validate();
				  $valid=$mseo->validate() && $valid;
       			   
				  
				   if($valid)
        			{
                	if($model->save() && $mseo->save()){
					$seding_mail=Recipient::model()->findAll(array('select'=>'recipent_email,recipent_first_name,recipent_last_name,recipent_phone_no','condition'=>"group_creation_id='$mailing_list_id'"));
	//$live_auction_id=Auction::model()->findAll(array('select'=>'auc_id,rrp_uk,close_date,auc_name,status','condition'=>"auc_id='23'"));
	foreach($seding_mail as $send_mail_details)
	{
	 $recipent_email = $send_mail_details->recipent_email;
	  $recipent_first_name = $send_mail_details->recipent_first_name;
	  $recipent_last_name = $send_mail_details->recipent_last_name;
	  $recipent_phone_no = $send_mail_details->recipent_phone_no;
	  
	   $subject =$mail_name;
		$headers="From: Ciaoitalyvillas <info@ciaoitalyvillas.com> \r\nReply-To: <info@ciaoitalyvillas.com> ";
						$headers .= 'MIME-Version: 1.0' . "\n"; 
		                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
						
	  mail($recipent_email,$subject,$mail_content,$headers);
	
	 }
					  
                    //Start to save the Page Block
                    user()->setFlash('success',t('Newsletter Added Successfully!'));                                                            
                    $model=new Newsletter;
                   Yii::app()->controller->redirect(array('admin'));
                } }
        }               
        $this->render('cmswidgets.views.newsletter.newsletter_form_widget',array('model'=>$model,'mseo'=>$mseo));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='newsletter-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
