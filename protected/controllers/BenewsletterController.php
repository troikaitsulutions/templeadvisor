<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BenewsletterController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('New'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                );
		 
	}
		 function actionChangecategory()
	{                            	
			//GxcHelpers::deleteModel('Seo', $seo->id);
			
			$this->renderpartial('change_category');
			
			
	}
	
		public function actionSendtolist()
	{                            	
			//GxcHelpers::deleteModel('Seo', $seo->id);
			 $group_id=$_GET['group_id'];
			$id_value=$_GET['id_value'];	
			
			$getnewsletteriddata=Newsletter::model()->find(array('select'=>'content,subject','condition'=>"id=".$id_value.""));
		$content=$getnewsletteriddata->content;
		$subject=$getnewsletteriddata->subject;
	
			
			$seding_mail=Recipient::model()->findAll(array('select'=>'recipent_email,recipent_first_name,recipent_last_name,recipent_phone_no','condition'=>"group_creation_id='$group_id'"));
	//$live_auction_id=Auction::model()->findAll(array('select'=>'auc_id,rrp_uk,close_date,auc_name,status','condition'=>"auc_id='23'"));
	foreach($seding_mail as $send_mail_details)
	{
	 $recipent_email = $send_mail_details->recipent_email;
	  $recipent_first_name = $send_mail_details->recipent_first_name;
	  $recipent_last_name = $send_mail_details->recipent_last_name;
	  $recipent_phone_no = $send_mail_details->recipent_phone_no;
	  
	  
		$headers="From: Ciaoitalyvillas <info@ciaoitalyvillas.com> \r\nReply-To: <info@ciaoitalyvillas.com> ";
						$headers .= 'MIME-Version: 1.0' . "\n"; 
		                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
						
	 $g= mail($recipent_email,$subject,$content,$headers);
	  
	
	 }	
	 if($g)
	{
	echo "Mail sent";
	}
	else
	{
	echo "Mail Not sent";
	}	//$this->renderpartial('changecategory');
			
			
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('newsletter_create');
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->render('newsletter_update');
	}
	
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
        $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		$this->render('newsletter_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('newsletter_admin');
	}
        
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Newsletter', $id);
	}
          
        
}