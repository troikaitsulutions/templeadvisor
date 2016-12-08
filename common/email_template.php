<?php

/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
 
/**
 * This is the shortcut to Yii::app()
 */


function eMailHeader()
{
				return '<div id="civ-header" style="width: 800px;height: 160px;display: block;background: url(http://www.ciaoitalyvillas.com/assets/97b21c32/images/logo.png) top left no-repeat!important;">
	<a href="'.FRONT_SITE_URL.'"><img id="logo-img" src="'.FRONT_SITE_URL.'resources/logo.png" alt="Ciao Italy Villas Logo" title="Ciao Italy Villas" style="width: 326px;height: 140px;display: block;position: relative;top: 9px;left: 10px;" /></a>
  </div>';
}	


function eMailSubject($id)
{
	$pinfo = Maildoc::model()->findByPk($id);
	return $pinfo->title;  
}

function eMailDescription( $enquiry_data_body, $id )
{	
	$pinfo = Maildoc::model()->findByPk($id);  
	if($pinfo)
	{
		
		return '<div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;padding: 10px;background: #FFF688;">'.$pinfo->description.'</div><div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;">'.$enquiry_data_body.'</div><div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;padding: 10px;background: #FFF688;">'.$pinfo->signature.'</div>';	
	}
	else if($enquiry_data_body!='')
	{
		return '<div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;">'.$enquiry_data_body.'</div>';	
	}
}

function eMail_body( $enquiry_data_body, $mail_doc_content, $mail_doc_signature )
{	
	 
	if($mail_doc_content)
	{
		
		return '<div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;padding: 10px;background: #FFF688;">'.$mail_doc_content.'</div><div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;">'.$enquiry_data_body.'</div><div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;padding: 10px;background: #FFF688;">'.$mail_doc_signature.'</div>';	
	}
	else if($enquiry_data_body!='')
	{
		return '<div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;">'.$enquiry_data_body.'</div>';	
	}
}

function eMail_Description( $enquiry_data_body, $id, $recipient )
{	
	$pinfo = Maildoc::model()->findByPk($id);  
	if($pinfo)
	{
		
		return '<div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;padding: 10px;background: #FFF688;"> Dear '.$recipient.'<br>'.$pinfo->description.'</div><div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;">'.$enquiry_data_body.'</div><div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;padding: 10px;background: #FFF688;">'.$pinfo->signature.'</div>';	
	}
	else if($enquiry_data_body!='')
	{
		return '<div class="civ-generic" style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;margin: 10px;">'.$enquiry_data_body.'</div>';	
	}
}
	

function eMailFooter()
{
	return '<div id="civ-footer" style="width: auto;min-height: 160px;padding: 10px;display: block;background-color: #FFF8AF;overflow: hidden;">
			<h1 style="font: bold 22pt "Times New Roman", Times, serif;color: #AD3335;display: inline-block;">Follow Us On</h1>
			 <div id="details" style="width: auto;height: auto;float: right;">
			  <h1 style="fontoblique 16pt "Times New Roman", Times, serif;color: #AD3335;margin-top: 10px;">Ciao Italy Pty Ltd</h1>
			  <p style="font: normal 10pt Arial, Helvetica, sans-serif;">
			  Villa Rentals & Vacations in Italy<br />
			  <strong>Website : </strong><a href="http://www.ciaoitalyvillas.com" title="Ciao Italy Pty Ltd" style="text-decoration: none;color: #AD3335;">www.ciaoitalyvillas.com</a><br />
			  <br />
			  <strong>Email:</strong> <br />
			  info@ciaoitalyvillas.com<br />
			  ciaoitalyltd@gmail.com<br />
			  <strong>Ph & Fax USA - </strong>+1 415 3662939<br />
			  <strong>Ph & Fax Australia - </strong>+61 294755353<br />
			  <strong> Skype :</strong> traveltuscany
			  </p>
			</div>
			<ul id="civ-sn-icons">
			  <li style="float: left;list-style: none;margin-right: 10px;"><a href="https://www.facebook.com/CiaoItalyVillas" style="text-decoration: none;border: none;outline: none;"><img src="'.FRONT_SITE_URL.'resources/fb-sn-icon.png" alt="Facebook" title="Facebook" style="width: 60px;height: 60px;outline: none;"></a></li>
			  <li style="float: left;list-style: none;margin-right: 10px;"><a href="http://www.twitter.com/ciaoitalyvillas" style="text-decoration: none;border: none;outline: none;"><img src="'.FRONT_SITE_URL.'resources/twitter-sn-icon.png" alt="Twitter" title="Twitter" style="width: 60px;height: 60px;outline: none;"></a></li>
			  <li style="float: left;list-style: none;margin-right: 10px;"><a href="http://www.pinterest.com/tuscanvillas" style="text-decoration: none;border: none;outline: none;"><img src="'.FRONT_SITE_URL.'resources/pinterest-sn-icon.png" alt="Pinterest" title="Pinterest" style="width: 60px;height: 60px;outline: none;"></a></li>
			  <li style="float: left;list-style: none;margin-right: 10px;"><a href="https://plus.google.com/u/0/115223660316741048852" style="text-decoration: none;border: none;outline: none;"><img src="'.FRONT_SITE_URL.'resources/google-sn-icon.png" alt="Google +" title="Google +" style="width: 60px;height: 60px;outline: none;"></a></li>
			  <li style="float: left;list-style: none;margin-right: 10px;"><a href="https://www.youtube.com/TuscanyTrip" style="text-decoration: none;border: none;outline: none;"><img src="'.FRONT_SITE_URL.'resources/youtube-sn-icon.png" alt="YouTube" title="YouTube" style="width: 60px;height: 60px;outline: none;"></a></li>
			</ul>
		  </div>';
}	

function EmailFirstProperty($ids)
{
	$ids_arr = explode(',',$ids); $ids_arr = array_filter($ids_arr);
	if(count($ids_arr)==1)
	{
		$pinfo = Pinfo::model()->find(array('select'=>'id,content1,tt_name,sleep,bedroom,town,province,region','condition'=>"id='".$ids_arr[0]."'"));  
		if($pinfo)
		{
		return '<div class="civ-full-width" style="width: auto;min-height: 100px;margin: 10px;padding: 10px;display: block;background-color: #FFF688;overflow: hidden;">
				<div class="img-box" style="width: 150px;height: 150px;margin-right: 10px;background-color: #999;display: inline-block;float: left;"><img src="'.Gallery::GetPropThumbnail($ids_arr[0]).'" width="150" height="150"></div>
				<p style="font: normal 10pt Arial, Helvetica, sans-serif;text-align: justify;"><a href="'.GetPropertyURL($pinfo->id).'" style="text-decoration: none;color: #AD3335;"><strong>&nbsp; &nbsp; '.$pinfo->tt_name.' ('.$pinfo->id.')</strong></a><br><strong>&nbsp; &nbsp; Sleeps</strong>:'.$pinfo->sleep.'<br><strong>&nbsp; &nbsp; Bedrooms</strong>:'.$pinfo->bedroom.'<br><strong>&nbsp; &nbsp; Town</strong>:'.$pinfo->Town->name.'<br><strong>&nbsp; &nbsp; Province</strong>:'.$pinfo->provincename->name.'<br><strong>&nbsp; &nbsp; Region</strong>:'.$pinfo->regionname->name.'</p>
			  </div>';
		}
	}
}

function properties($ids)
{
	$ids_arr = explode(',',$ids); $ids_arr = array_filter($ids_arr);
	if(count($ids_arr)>1)
	{   
	    $ids = implode(',',$ids_arr);
		$content = '';
		$content.='<div class="civ-3-column-wrapper" style="width: auto;min-height: 200px;margin: 0 auto;margin-bottom: 10px;padding: 0px 10px;display: block;overflow: hidden;clear: both;">';
		$Pinfo = Pinfo::model()->findAll(array('select'=>'id,content1,tt_name,sleep,bedroom,town,province,region','condition'=>'id in ('.$ids.')'));  
		foreach($Pinfo as $data):
			$content.='<div class="civ-3-column" style="width: 228px;min-height: 270px;height: 100%;display: inline-block;float: left;background-color: #FFF688;margin-right: 5px;padding: 10px;margin-bottom:10px;">
					  <div class="civ-3-column-img-box" style="width: 228px;height: 145px;display: block;background-color: #999;"><a href="'.GetPropertyURL($pinfo->id).'" style="text-decoration: none;color: #AD3335;"><img src="'.Gallery::GetPropThumbnail($data->id).'" width="228" height="145"></a></div>
					  <p style="font: normal 8pt Arial, Helvetica, sans-serif;text-align: justify;margin-top: 10px;"><a href="'.GetPropertyURL($pinfo->id).'" style="text-decoration: none;color: #AD3335;"><strong>'.$data->tt_name.' ('.$data->id.')</strong></a><br><strong>Sleeps</strong>:'.$data->sleep.'<br><strong>Bedrooms</strong>:'.$data->bedroom.'<br><strong>Town</strong>:'.$data->Town->name.'<br><strong>Province</strong>:'.$data->provincename->name.'<br><strong>Region</strong>:'.$data->regionname->name.'<br></p>
					</div>';
		endforeach;
		$content.='</div>';
		return $content;
	}
}

function tours($ids)
{
	$content = 'Thank you for your interest in the following tours.';
	foreach(explode(',',$ids) as $data):
		$tour = Tour::model()->find(array('condition'=>"id='$data'"));
		$content.='<p>'.$tour->title.'</p>';
	endforeach;
		return $content;
}

function eMailContent($header, $body, $footer)
{
	
	 $mail_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml" style="text-decoration: none;color: #AD3335;">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>Untitled Document</title>
					</head>
					<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="width: 100%; background-color: #FFFBD6; margin:0; padding:0; -webkit-font-smoothing: antialiased;font-family: Georgia, Times, serif;color: #AD3335;">
					<div id="civ-main-wrapper" style="width: 800px;height: auto;min-height: 200px;margin: 0 auto;display: block; background-color: #FFFBD6;">'.$header.$body.$footer.'</div>
					</body>
					</html>';
					
	return $mail_body;
	
}

function eMailContentdesc($body)
{
	
	 $mail_body = '<div>'.$body.'</div>';
					
	return $mail_body;
	
}

function pdfHeader($prop_id)
{
	$model=Pinfo::model()->findByPk($prop_id);
	$minr = prop_min_price($prop_id);
	return '<div id="header">
		  <div id="tt_title">
			<img src="'.FRONT_SITE_URL.'resources/logo.png" id="tt_logo-img" style="margin-left:10px;margin-top:0px;" alt="Travel Tuscany Logo" title="Travel Tuscany" />
			<h1 >Ciao Italy Villas</h1>
			<h3>Villa Rentals Since 2001</h3>
		  </div>
		  <h1 id="tt_header-location">'.Town::GetName($model->town).',&nbsp;'.Province::GetName($model->province).', Tuscany</h1>
		  <h1 id="tt_header-price">From '.$minr.' Euros per week</h1>
		</div>';
}

function pdfHeaderFoodWine()
{
	return '<div id="header">
		  <div id="tt_title">
			<img src="'.FRONT_SITE_URL.'resources/logo.png" id="tt_logo-img" style="margin-left:10px;margin-top:0px;" alt="Travel Tuscany Logo" title="Travel Tuscany" />
			<h1 >Ciao Italy Villas</h1>
			<h3>Villa Rentals Since 2001</h3>
		  </div>
		</div>';
}

function pdfFooter()
{
	return '<div id="footer" >
				  <p>
			<strong>CIAO ITALY PVT LTD</strong> ABN # 64163065192 Level 1, 1 West Terrace Bankstown NSW 2200 Australia<br />
			Ph & Fax USA - +1 415 3662939 &nbsp;  Ph & Fax Australia - +61 294755353<br />
			<span class="tt_is-url">www.ciaoitalyvillas.com</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="tt_is-webmail">info@ciaoitalyvillas.com</span>
				  </p>
				</div>';
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 function headcontent()
{
return  "<div style='background:##FFFAD5!important;'>
<div style='border-bottom:#000000 1px solid; border-top:#000000 1px solid; height:130px; padding:10px;'>
	<div class='logo' align='center' style='margin-top:25px;width:23%;float:left;'><img src='".FRONT_SITE_URL."resources/logo.png' width='340' height='173' /></div>
    <div class='address' style='width:74%; font-size:16px; font-weight:bold;float:left;'>&nbsp;&nbsp;&nbsp;Unit 1 , Level 1 , West Terrace Bank ,NSW 2200 Australia <br>
     &nbsp;&nbsp;&nbsp;ABN # 64163065192<br>
      &nbsp;&nbsp;&nbsp;voicemail &amp; fax USA - +1 415 3662939<br>
     &nbsp;&nbsp;&nbsp;voicemail &amp; fax Australia - +61 294755353<br>
      &nbsp;&nbsp;&nbsp;www.ciaoitalyvillas.com<br>
      &nbsp;&nbsp;&nbsp;info@ciaoitalyvillas.com<br>
    </div>
</div>";
}

function customer_details( $cutomer_id, $invoice_id )
{
/*$bcustomer = Booking::model()->find(array('condition'=>"customer_id='$cutomer_id'"));
		if($bcustomer)
		{*/
		$bpeople = People::model()->find(array('condition'=>"id='$cutomer_id'"));
		$invoice = Invoice::model()->findByPk($invoice_id);

return "<div class='customer_details' style='border-bottom:#000000 1px solid; padding:10px; font-weight:bold; margin-bottom:10px;'>
	<div class='title' style='color:#A91D0E; font-size:18px;'>Reservation Details</div>
<table width='100%' border='0' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='22%' align='left' valign='top'>Customer Name</td>
    <td width='1%' align='center' valign='top'>:</td>
    <td width='26%' align='left' valign='top'>".$bpeople->name."</td>
    <td align='left' valign='top'>Complete Address</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$bpeople->address1.",".$bpeople->address2.",".$bpeople->town.",".$bpeople->province."</td>
  </tr>
  <tr>
    <td align='left' valign='top'>Total Number in group</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$invoice->peoples."</td>
    <td align='left' valign='top'>Telephone (Home) </td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$bpeople->tele."</td>
  </tr>
  <tr>
    <td align='left' valign='top'>Adults</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$invoice->adults."</td>
    <td align='left' valign='top'>Telephone (Work) </td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$bpeople->tele2."</td>
  </tr>
  <tr>
    <td height='23' align='left' valign='top'>Children( Specify Ages )</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$invoice->children."</td>
    <td align='left' valign='top'>Mobile Phone</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$bpeople->mobile."</td>
  </tr>
  <tr>
    <td align='left' valign='top'>Infant</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$invoice->infants."</td>
    <td align='left' valign='top'>Fax</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$bpeople->fax."</td>
  </tr>
  <tr>
    <td align='left' valign='top'>Nationality</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$bpeople->country."</td>
    <td align='left' valign='top'>Email</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$bpeople->email."</td>
  </tr>
  
</table>
</div>
";
//}
}


function prop_details_view($booking_id)
{

$binvoice = Invoice::model()->find(array('condition'=>"booking_id='$booking_id'"));
		if($binvoice)
		{
		$booking_type='Additional Cost';
      $badditionalcost = Invoiceadditionalcharges::model()->findAll(array('condition'=>"booking_id='$booking_id' and type='$booking_type'"));  
      $baothercost = Invoiceadditionalcharges::model()->findAll(array('condition'=>"booking_id='$booking_id' and type='Other Services'"));  
	  
	  if(count($badditionalcost)!=0){$addi_label="Additional :";}else{$addi_label="";}
	  if(count($baothercost)!=0){$other_label="Others :";}else{$other_label="";}
		$bookinres1 = $bookinres2 = '';  
 foreach($badditionalcost as $badditionalcostdata){
      $tot+=$badditionalcostdata->cost;
      $bfindaddname = Additionalcost::model()->find(array('condition'=>"id='$badditionalcostdata->charges'"));
      $bookinres1.= $bfindaddname->Additional->name." : ".$badditionalcostdata->cost." Euro ".$badditionalcostdata->comment; }
	  
  foreach($baothercost as $babaothercostdata){
          $tot1+=$babaothercostdata->cost;
          $bfindaddname1 =Otherservices::model()->find(array('condition'=>"id='$babaothercostdata->charges'"));
          $bookinres2.= $bfindaddname1->Additional->name." : ".$babaothercostdata->cost.$babaothercostdata->cost; }	  
		  
$bookinres= "<div class='package_details' style='border-bottom:#000000 1px solid; padding:10px; font-weight:bold;height:490px'>
	
<table width='100%' border='0' cellspacing='0' cellpadding='5'>
  <tr>
    <td width='15%' align='left' valign='top'>Booking Code</td>
    <td width='4%' align='center' valign='top'>:</td>
    <td width='31%' align='left' valign='top'>".$binvoice->invoice_no."</td>
    <td width='1%'>&nbsp;</td>
    <td width='19%' align='left' valign='top'>Property name </td>
    <td width='1%' align='center' valign='top'>:</td>
    <td width='29%' align='left' valign='top'>".$binvoice->Pinfo->tt_name."</td>
  </tr>
  <tr>
    <td align='left' valign='top'>Check in</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".date("d-M-Y",$binvoice->fdate)." </td>
    <td>&nbsp;</td>
    <td align='left' valign='top'>Checkout on</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".date("d-M-Y",$binvoice->tdate)."</td>
    </tr>
  <tr>
    <td align='left' valign='top'>Rate  for</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$binvoice->price_per."</td>
    <td>&nbsp;</td>
    <td align='left' valign='top'>Total Rental Rate</td>
    <td align='center' valign='top'>:</td>
    <td align='left' valign='top'>".$binvoice->total_price."&nbsp;Euro</td>
    </tr>
  <tr>
    <td colspan='7' align='left' valign='top'>Extra Costs (by cash on arrival ):</td>
    </tr>
  
  <tr>
    <td align='left' valign='top' ></td>
    <td colspan='6' align='left' valign='top'>".$bookinres1."</td>
  </tr>
  
  <tr>
    <td colspan='7' align='left' valign='top'>Other Services:</td>
    </tr>
  
  <tr>
    <td align='left' valign='top' ></td>
    <td colspan='6' align='left' valign='top'>".$bookinres2."</td>
  </tr>
  
</table>
</div>";

return $bookinres;
}
}

function terns_condition($id)
{
	$pinfo = Pinfo::model()->find(array('select'=>'id,content1,tt_name,sleep,bedroom,town,province,region','condition'=>"id='".$id."'"));  
		
		
return "<div class='terms' style='border-bottom:#000000 1px solid; padding:8px; font-size:12px'>
	
	<div class='title' style='color:#A91D0E; font-size:18px;'>Terms & Conditions</div>
<p>
<strong>The booking process and rental terms for :</strong>".$pinfo->tt_name.",&nbsp;".Town::GetName($pinfo->town).",&nbsp;".Province::GetName($pinfo->province)."
<br />
Reservations are valid if the following conditions are respected:<br />
- On receipt of a booking form signed by the client this contract becomes binding. With the signature the clients becomes responsible for the rental according to Italian Law<br />
- Upon booking confirmation payment of a deposit of 30% of the total amount and balance payment within 60 days prior to arrival. If the holidays start within 60 days prior to Booking, the total payment is due within 5 days after booking confirmation. Bookings are valid for 7 days after receipt of the signed contract. Payment must be received within this time, otherwise the reservation is cancelled.
</p>

<p><strong>The rental rate for 2014:</strong> As published on our website <strong>www.ciaoitalyvillas.com</strong> at the time of booking, the applied rate is the rate on this booking contract and will not be altered, unless a special discount has been agreed to by the owner.</p>

<p><strong>Price includes:</strong> full furnishings, linens sufficient for the number of guests, pots and pans, kitchen ware. The owner is not obliged to supply extra kitchenware items; each property has sufficient quantities for the number of guests it accommodates.</p>

<p><strong>Price does NOT include:</strong> Final cleaning fee: 75 Euro Heating: 40euro per day Refundable damage deposit: 400 Euro Cell tel hire: 15 euro Air conditioning 9 euro per day Baby Bed and High chair would be 50 euro per week Mid week change of Linen and Towels : 14 euro for sheets per double bed 7 euro for sheets per single bed 5 euro per set of towel.Tourist Tax:2.5 Euros per person per night for the first four nights of stay. Children under 12 are free of charge.</p>

<p><strong>Security Deposit:</strong> A security deposit, if stipulated by the individual property owner must be presented in euro cash to the property owner or his/her representative on arrival and will be refunded at the end of the rental period after inspection of the property for damages. Please note that some owners will accept other currency equivalents.The property will NOT be consigned to the tenant unless the security deposit is paid in full in cash on arrival.</p>

<p><strong>Final Cleaning Fee:</strong> If applicable is due in cash upon arrival. This fee does not include trash removal from the properties. A fee will be applied for trash left at the property on checkout.</p>

<p><strong>Telephone:</strong>some properties supply a cellular tel is supplied at a cost + charges for outgoing calls. The credit can be checked for the consumption by dialing free of charge. The owners are not responsible to act as a answering and message service for guests, remember these are self catering properties therefore it is advised to hire the tel to receive calls if you do not have a cellular tel, there is no charge for airtime therefore no charge for incoming calls. A recharge card can be easily purchased at tabacchi, bars,shops and supermarkets.If the property has a fixed telephone then the renter is responsible for any calls made during the rental period.</p>

<p><strong>Number of persons:</strong> The number of persons (adults and children) may not exceed the maximum number of sleeping places :.Additional, non authorized guests can be cause for immediate eviction.</p>

<p><strong>Arrivals:</strong> Are met from 16.00-19.00:(unless arranged differently prior to arrival). After 8pm, the tenant will have to find an alternative accommodation, unless prior agreement is met with the property owner regarding a later arrival. It is the responsibility of the tenant to communicate the arrival time to the property owner. It is further advised to telephone the owner upon your arrival in Italy. The owner is obliged to meet the tenants ONLY ONCE and in the case when a group arrives at different time intervals, the first in the group is responsible for the payment of the security deposit and cleaning fee, the keys will be consigned and access granted only on payment of these fees and is the first group is responsible to meet the later arriving guests. The owners are not to be disturbed for late guests that are not met by their group.</p>

<p><strong>Departures:</strong> Check-out is no later than 10:00am , please check on your receipt as some properties require a earlier checkout and others will accept a later time. Tenants leaving before 8am on the morning of checkout will have the security deposit refunded after inspection of the property, then the security deposit will be refunded in the form of a wire transfer/money gram. Inspections (8-10am on day of checkout) There are no checkouts the day prior due to problems that have occurred with renters keeping keys, gate openers and damage after inspection.</p>

<p><strong>In addition:</strong>The property cannot be sublet. Please also ask the period during which the pools are open and available for guests which is generally from 15 May till 30 September depending on weather conditions. Also note that the period in which heating is allowed is subject to Italian Laws and change from year to year.</p>

<p><strong>Self Catering:</strong> This property is self-catering, the tenant is responsible for the purchase of all food items, detergent, garbage bags, dish soap, hand-soap and toilet paper. As a courtesy owners often provide hand-soap, garbage bags and toilet paper for arrival. However, the tenant is responsible to purchase these items once they have been consumed.</br>
Note : The tenant is also responsible for garbage/trash removal, there is a fee for trash left on the rental property. There are bins close to the property where the trash is to be disposed, this will be indicated on arrival.</p>

</div>
<div class='terms' style='border-bottom:#000000 1px solid; padding:10px; font-size:12px'>

<p><strong>Forms of payment:</strong> Money Order, Wire transfer or International Money Order (All payments must be made in AUS$ calculated using the euro buy rate of the day that will be provided by us. We use the site www.xe.com/fx ( which is a Foreign Exchange site) to calculate the real time EURO BUY exchange rate. Please note that this is NOT the midmarket rate or the EURO sell rate but the Euro BUY rate.
<strong>Cash - balance payment only on prior approval from the owner and Ciao Italy Pty Ltd CREDIT CARDS By completing the form on this contract we can also process (not through Pay Pal), Visa, MC & Amex cards. All credit card payments have a 4% processing fee added 
PAYPAL - this is the easiest and fastest and honestly preferred method . You must also add the 4% fee to paypal payments. You can also use your credit card through the PayPal system All payments made through the Pay Pal Online Payment Service please send the payment to ciaoitalyltd@gmail.com . 
It is preferable to send payments in AUSTRALIAN dollars , please ask us for the conversion before sending the payment.</p>

<p>If you prefer to send a wire transfer the complete account details are as follows</p>

Westpac Bank, Bankstown Branch, NSW, Australia<br />
Account Name : Ciao Italy Pty Ltd<br />
BSB - 032061 (Bankstown)<br />
Account 445579<br />
The Westpac SWIFT code for overseas payments is WPACAU2S.<br />
If your bank requires 11 characters, use WPACAU2SXXX<br /><br />
Official / Cashers Checks or Money Orders can be sent in AU$ currency to the following address. Before sending please make sure to check with us as to the Euro BUY exchange rate . 
A copy of the check MUST be faxed to us on either of the above number in the document header for our records and for tracking purposes. 
Registered office address: Unit 1, Level 1, West Terrace Bankstown NSW 2200. Australia<br />
<br /><strong>
NO PERSONAL CHECKS WILL BE ACCEPTED AS A METHOD OF PAYMENT</strong><br />

<p><strong>Receipts:</strong>A signed receipt and confirmation slip will be emailed or faxed to the rental party on receipt of deposit and final payment.</p>
<p><strong>Directions:</strong> A full explanation as to directions to the property will be furbished by the property manager on complete payment of the rental rate. Please purchase good maps on arrival and remember to bring the contact numbers with you, please call if delayed or arriving before the communicated arrival time.</p>
<p><strong>Cancellation by client:</strong> The cancellation in writing will apply from the date of receipt by owner/agent of the written cancellation.
<p>The following charges will apply:</p>
More than 60 days prior to arrival date -forfeit of the deposit<br />
60 days prior to arrival date or less -100% loss of the total rental amount.<br />
It is advisable to take out a comprehensive travel insurance to cover costs in the event of cancellation. The owner cannot accept any responsibility in the event the client cancels for any reason.<br /><br />
Cancellation by owner:In the unlikely event of cancellation by the owner and an acceptable alternative is not found then the owner must refund all money paid.<br /></p>

</div>

<div class='terms' style='border-bottom:#000000 1px solid; padding:10px; font-size:12px'>
<p><strong>Insurance:</strong> It is the responsibility of the client to obtain travel and health insurance to cover any unforseen health problems, emergencies or cancellations of travel or accommodation. Ciao Italy Pty Ltd does not take any responsibility for any cancellations on behalf of the renter and his/her family/guests/visitors to the property. Our terms and conditions with regards to cancellations apply as clearly stated above.
The UNDERSIGNED (renter), for and in consideration of the privilege of renting a vacation property from Ciao Italy Pty Ltd hereby assumes responsibility for said accommodation, the occupants and the contents.
The UNDERSIGNED further waives and relinquishes any and all claims for damage and assumes all risks for injury or loss of any kind, character or description, against Ciao Italy Pty Ltd, it`s successors, or assigns, it`s officers, agents or employees, arising out of injury, damages or loss either to person or property of the UNDERSIGNED or any guest in said rental accommodation including gardens and grounds, gates and access roads.</p>
<p><strong>Animals:</strong> Please ask prior to booking if the owner of the house will accept animals. The presence of unauthorised animals is a good reason for eviction without right to any reimbursement.</p>
<p><strong>On Arrival:</strong> Please have the security deposit and cleaning fee ready. Ask for explanations of operation instructions for the : Television, Sat TV, Oven and washing machine or any appliances applicable to the property. Also please take care that you open the curtains fully before opening the windows or doors to avoid damages, check whilst the owner is doing the check in that you are comfortable with how the doors and windows operate without forcing them. There are normally information booklets in the property with emergency numbers, local restaurants and attractions, if you require any assistance the owners are happy to help you but remember in most cases they are not at the property all day therefore it is a good idea to ask for
assistance when you check into the property.</p>
<p><strong>Complaints:</strong> Any complaints are to be taken up with the owner, in the event of unsatisfactory recourse then the renter must contact Ciao Italy Pty Ltd. The descriptions of the properties are made in good faith and we cannot be held responsible for alterations carried out by the owners without any information provided to us. If the client has cause for complaint, he should inform our agency on arrival day (Saturday) or maximum by close of business on the following Monday. No complaint can be considered valid and no refund will be paid unless this procedure is observed. We reserve the right to verify the causes of complaint and if the client is upheld to be right, he will be compensated in proportion to the damage up to a maximum of the rental price paid. If necessary our agency can transfer the client to another similar or better property, with the only bound of availability. Should the client accept the exchange, he cannot ask for any other compensation. In no case we will pay hotel or other accommodation costs. If the client vacates the property before an agreement with our agency about the complaint, he will forfeit the right to compensation. Weather conditions, presence of insects, lack of water or electricity due to work in progress depending on state-run organisations or major force cause damages will not be considered as valid complaint cause. Please remember that in the country there are insects this is a natural part of nature and is not considered just cause to vacate a property.
Church bells are also not considered just cause to vacate a property.</p>

</div>

<div class='terms' style='border-bottom:#000000 1px solid; padding:10px; font-size:14px'>
<p><strong>Preferred payment method - Wire Transfer, Paypal and Credit Card:</strong></p>
<p>For all credit card payments, Pay Pal, Visa, MC or AMEX there is a 4% processing fee added. The full amount will be processed in $AUS and the rate applied will be the EURO BUY exchange rate provided on the day processed : www.xetrade.com/fx - this is their foreign exchange site</p>
<strong>Please indicate which: Visa:_____________Mastercard:_____________AMEX:___________</strong><br /><br />
<strong>** PLEASE COMPLETE BELOW ONLY FOR PAYMENTS USING AMERICAN EXPRESS. FOR VISA & MASTERCARD WE WILL SEND YOU A REQUEST THROUGH THE PAYPAL WEBSITE, YOU THEN FOLLOW INSTRUCTIONS TO PAY USING YOUR VISA OR MC AND YOU DO NOT NEED TO HAVE A PAYPAL ACCOUNT TO PAY IN THIS WAY.<br /><br />
<p>Full billing address (street name and number, city, state, postcode/zip code, country):</p>
Name on Card:<br />
Expiry Date:<br />
Card Number:<br />
4 Security Digits on the FRONT of the card:<br />
Daytime Tel:<br /><br />

</div>
<div class='terms' style='border-bottom:#000000 1px solid; padding:10px; font-size:12px'>


<p>I authorize Ciao Italy Pty Ltd to charge my credit card for the amount of:1800,00 euro`s +4% fee for the above rental, accepting the terms and conditions stated in the above contract and acknowledging that the fee will be converted to AUS$ using the Euro buy rate of the day.</p><p>
**Please indicate if you would like us to charge 30% DEPOSIT or the FULL RENTAL AMOUNT (this choice is applicable ONLY if arrival date is more than 60 days from the date of booking)**</p>
<p>Please note that if we do not hear from you with regards to an alternative form of payment by 50 days before the rental date then we reserve the right to go ahead and charge the credit card provided above for the final balance. The renter, by signing this booking form acknowledges and authorises this.</p>
</div>

<div class='terms' style='border-bottom:#000000 1px solid; padding:10px;'>

<strong>Special requests:</strong> Please circle or tick next to which services you would like further information on and we will send this via email<br />
<strong>Car Rental &nbsp;&nbsp;<input type='checkbox' style='height:20px;width:20px'>&nbsp;&nbsp;Cooking Classes&nbsp;&nbsp;<input type='checkbox' style='height:20px;width:20px'>  &nbsp;&nbsp;
Chef Service<input type='checkbox' style='height:22px;width:20px'> &nbsp;&nbsp;Baby Cot or High Chair&nbsp;&nbsp;
<input type='checkbox' style='height:20px;width:22px'>  &nbsp;&nbsp;Day Trips & Wine Excursions  &nbsp;&nbsp;
<input type='checkbox' style='height:20px;width:22px'> &nbsp;&nbsp;Hot Air Ballooning &nbsp;&nbsp;
 <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Wine excursions&nbsp;&nbsp;
 <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Wine Appreciation Course &nbsp;&nbsp;
 <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Driver Service&nbsp;&nbsp;
 <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Chef in a Villa Dinner Service&nbsp;&nbsp;
 <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Florence Guided Walking Tour&nbsp;&nbsp;
  <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Florence Guided Walking Tour&nbsp;&nbsp;
   <input type='checkbox' style='height:20px;width:22px'>
   &nbsp;&nbsp;Single Day Cooking class  &nbsp;&nbsp;&nbsp;&nbsp;
    <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Multi day Cooking Class   &nbsp;&nbsp;
   <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Cooking class with Food Market tour   &nbsp;
   <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Chef Service at your villa   &nbsp;
   <input type='checkbox' style='height:20px;width:22px'>&nbsp;Day Trips &amp; Wine Excursions   &nbsp;
   <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Wine Appreciation Course   &nbsp;
    <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Florence Guided Walking Tour   &nbsp;
     <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Rome and Venice Walking Tour &nbsp;
      <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Venice Guided Tour &nbsp;
       <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Rome Guided Tour &nbsp;
        <input type='checkbox' style='height:20px;width:22px'>&nbsp;&nbsp;Baby Cot or High Chair &nbsp;
        <input type='checkbox' style='height:20px;width:22px'>
        &nbsp;Customized tour for your group&nbsp;  </strong>( <strong>we offer a huge selection so please dont hesitate to ask </strong>)<br />
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class='signature' style='float:right; margin:15px; margin-top:50px; margin-right:50px; color:#000000; font-weight:bold; font-size:14px;'>Signature(with date)</div></div>";

}


function eMailtermsdesc($enquiry_data_body,$customer_data_body,$package_data_body,$terms_conditions)
{	
		
	return '<div>'.headcontent().$customer_data_body.$enquiry_data_body.$package_data_body.$terms_conditions.'</div>';
}

?>