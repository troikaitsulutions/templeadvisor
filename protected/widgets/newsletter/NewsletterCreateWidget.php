<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class NewsletterCreateWidget extends CWidget
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
        $model = new Newsletter;
		$mseo = new Seo;
		
                        
        //If it has guid, it means this is a translated version
        $guid=isset($_GET['guid']) ? strtolower(trim($_GET['guid'])) : '';                                      
        //List of language that should exclude not to translate       
        $lang_exclude=array();        
        //List of translated versions
        $versions=array();                
        // If the guid is not empty, it means we are creating a translated version of a content
        // We will exclude the translated language and include the name of the translated content to $versions

        // if it is ajax validation request
        $this->performAjaxValidation(array($model,$mseo));
        
        // collect user input data
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
		             
        $this->render('cmswidgets.views.newsletter.newsletter_form_widget',array('model'=>$model,'mseo'=>$mseo,'lang_exclude'=>$lang_exclude,'versions'=>$versions));            
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
