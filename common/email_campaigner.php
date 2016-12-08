<?php

/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
 
/**
 * This is the shortcut to Yii::app()
 */

function email_campaigner_send_mail ( $to, $subject, $content, $from )
{
		$headers = 'From: '. $from . "\r\n" . 'Reply-To: '. $from . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\n"; 
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
		mail( $to, $subject, $content, $headers );
}



class bookingmail
{
	function email_campaigner_booking_send_mail ( $to, $subject, $content,$pdfcontent, $from, $prop_id )
	{
		$pdfnew=$content;
		$message = new YiiMailMessage;
		$message->subject = $subject;
		$message->setBody($content, 'text/html');                
		$message->addTo($to);
		//$message->addTo('vengades.nrv3@gmail.com');
		$message->from = $from;  
		
		//property details pdf attachment start here
		$model=Pinfo::model()->findByPk($prop_id);
		$header = pdfHeader($prop_id); 
		$footer = pdfFooter();
		$mPDF = Yii::app()->ePdf->mpdf('','A4');
		$mPDF->SetHTMLHeader($header); 
		$mPDF->SetHTMLFooter($footer); 
		$mPDF->WriteHTML($this->render('application.views.bepinfo.admin_pdf', array('model'=>$model), true));
		$result = $mPDF->Output( toSlug($model->tt_name).'.pdf', 'S' );
		$attachment = Swift_Attachment::newInstance($result, toSlug($model->tt_name).'.pdf', 'application/pdf');
		$message->attach($attachment);
		
		
		$mPDF1 = Yii::app()->ePdf->mpdf1('','A4');
		$mPDF1->WriteHTML($pdfcontent);
		$result = $mPDF1->Output('Booking-Form-'.toSlug($model->tt_name).'.pdf', 'S' );
		$attachment = Swift_Attachment::newInstance($result,'Booking-Form-'.toSlug($model->tt_name).'.pdf', 'application/pdf');
		$message->attach($attachment);
		//property details pdf attachment end here
		
		//Terms and condition pdf attachment start here
		$Maildoc = Maildoc::model()->find(array('condition'=>"id='16'"));
		if($Maildoc->file_attache!='')
		{
			$files = explode(',',$Maildoc->file_attache);
			foreach($files as $data)
			{
				$swiftAttachment = Swift_Attachment::fromPath('../resources/maildoc/'.$data);
				$message->attach($swiftAttachment);
			}
		}
		//Terms and condition pdf attachment end here
		
		
		Yii::app()->mail->send($message);   
	}
	
}
?>