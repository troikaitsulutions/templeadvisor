<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BesendmailController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		 
		    $this->menu=array(
                        
                        array('label'=>t('Book Now'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                );
	}

	public function actionSuggestedlist()
	{                            	
			$names = $_GET['names'];
			$emails = $_GET['emails'];
			if(!is_array($emails)) $emails = explode(',',$emails);
			if(!is_array($names)) $names = explode(',',$names);
			$people = $_GET['people'];
			if(count($emails)==0)
			{
				$peoples = People::model()->findByPk($people);
				$names = explode(',',$peoples->name);
				$emails = explode(',',$peoples->email);
			}
			$template = $_GET['template'];
			if($template=='') $template = 0;
			$enquiry_data_body = $_GET['description'];
			$id_value = $_GET['id_value'];
			
			if($enquiry_data_body!='') $enquiry_data_body.= '<br><br>';
			$enquiry_data_body .= EmailFirstProperty($id_value).properties($id_value);
			
			$i=0;
			foreach($emails as $email):
				$name = $names[$i];
				$i++;
				
				$eMailBody = eMailContent( eMailHeader(), eMailDescription( $enquiry_data_body, $template ), eMailFooter() );
				email_campaigner_send_mail ( $email, eMailSubject($template), $eMailBody, Yii::app()->params['adminEmail'] );
			endforeach;
	}
} ?>