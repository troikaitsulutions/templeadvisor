<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="<?php  echo Yii::app()->request->baseUrl;?>/pdf/default-styles.css" type="text/css" rel="stylesheet" />

<title>Travel Tuscany</title>
</head>

<body>
  <div id="tt_wrapper-main"> 
    <div id="header">
      <div id="tt_title" style="margin-top:10px;">
        <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/travel-tuscany-logo.jpg" id="tt_logo-img" style="margin-left:10px;" alt="Travel Tuscany Logo" title="Travel Tuscany" />
        <h1 >TravelTuscany.net</h1>
        <h3>Villa Rentals Since 1999</h3>
      </div>
      <h1 id="tt_header-location" style="margin-left:10px;">Location Location</h1>
      <h1 id="tt_header-price" style="margin-left:10px;">From nnnn Euros per week</h1>
    </div>
    <div id="tt_wrapper-content">
      <div id="tt_splash-image"><img src="<?php echo Gallery::GetPropPdfLargeImg($model->id);?>" width="807" height="500"/></div>
      <h1 class="tt_intro-heading"><?php echo $model->name;?></h1>
      <div class="tt_intro">
    <?php echo $model->content1;?>
      </div>
    </div>
    <div id="footer" >
      <p>
<strong>CIAO ITALY PTY LTD</strong> ABN # 64163065192 Level 1, 1 West Terrace Bankstown NSW 2200 Australia<br />
Ph & Fax USA - +1 415 3662939 &nbsp;  Ph & Fax Australia - +61 294755353<br />
<span class="tt_is-url">www.traveltuscany.net</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="tt_is-webmail">info@traveltuscany.net</span>
      </p>
    </div>
  </div>
  <div id="tt_wrapper-main"> 
    <div id="header">
      <div id="tt_title" style="margin-top:10px;">
        <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/travel-tuscany-logo.jpg" id="tt_logo-img" style="margin-left:10px;" alt="Travel Tuscany Logo" title="Travel Tuscany" />
        <h1 >TravelTuscany.net</h1>
        <h3>Villa Rentals Since 1999</h3>
      </div>
      <h1 id="tt_header-location" style="margin-left:10px;">Location Location</h1>
      <h1 id="tt_header-price" style="margin-left:10px;">From nnnn Euros per week</h1>
    </div>
    <div id="tt_wrapper-content">
     <div id="tt_p2-left-column"> 
      	<h1>Information</h1>
        <h3>Location</h3><div style="padding-top:-15px">
       <div style="background-color:#E7CF92;" >
        <ul>
          <li><?php echo Plocation::GetName($model->location); ?></li>
        </ul></div></div>
        <h3>Bedrooms</h3><div style="padding-top:-15px">
       <div style="background-color:#E7CF92;" > <ul>
          <li>Sleeps:  <?php echo $model->sleep;?></li>
          <li>Bedrooms: <?php echo $model->bedroom;?></li>
          <li>Double Rooms: <?php //echo $model->mbed;?></li>
          <li>Twin Rooms: <?php echo $model->tbed;?></li>
          <li>Single Rooms: <?php echo $model->msbed;?></li>
          <li>Sofa Beds: <?php echo $model->ssbed;?></li>
          <li>Extra Beds: <?php //echo $model->sleep;?></li>
        </ul></div></div>
        <h3>Bathrooms</h3><div style="padding-top:-15px">
       <div style="background-color:#E7CF92;" >
        <ul>
          <li>Total Bathrooms: <?php echo $model->bathroom;?></li>
          <li>Bathrooms with Tub: <?php echo $model->bathwtub;?></li>
          <li>Bathrooms with Shower: <?php echo $model->bathwts;?></li>
        </ul></div></div>
        <h3>Location and Facilities</h3><div style="padding-top:-15px">
       <div style="background-color:#E7CF92;" >
        <ul>
          <li>Town Places: <?php echo Town::GetName($model->town);?></li>
          <li>Area: <?php echo $model->address1;?></li>
          <li>Country: <?php echo Countrylist::GetName(Country::GetName($model->country));?></li>
          <li>Property Type: <?php echo Type::GetName($model->ptype); ?></li>
          <li>Surface Area: <?php echo Province::GetName($model->province);?></li>
          <li>Property View: <?php echo $model->view;?></li>
        </ul></div></div>
        <h3>Features &amp; Accessories</h3>
        <div >
    <?php $ammenties_array=explode('|',$model->amenities); 
		  $amtt_array=array('1001','1007','1012','1017','1024','1029','1035','1042','1048','1055','1065','1070');
		 if(!empty($ammenties_array))
		 {
			foreach($amtt_array as $amant_value){?>
			<?php if (in_array($amant_value, $ammenties_array)) {?>
		 <div style="padding-right:5px; padding-bottom:5px; float:left;width:30px;"> <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/<?php echo $amant_value;?>-1.png"/></div>
		  <?php } else{?>
		 <div style="padding-right:5px;padding-bottom:5px;float:left; width:30px;">   <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/<?php echo $amant_value;?>-0.png"/></div>
		   <?php }?>

        <?php } } 
		else{ foreach($amtt_array as $amant_value){?>
        
      <div style="padding-right:5px;float:left; padding-bottom:5px;  width:30px;">   <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/<?php echo $amant_value;?>-0.png"/></div>
		<?php }}?>
              </div>
        
<div >
    <?php $ammenties_array=explode('|',$model->amenities); 
		  $amtt1_array=array('1075','1092','1097','1103','1109','1114','1119','1125','1132','1137','1142','1147','1152','1157','1162','1167','1172','1177','1182','1187','1192','1197','1202','10207','1212','1217','1222','1242','1247','1252','1257','1262','1267','1272','1277','1282','1287','1292','1297','1302','1307','1312','1317','1322','1327','1332','1337','1342','1347','1352','1357','1362','1367','1372','1377','1382','1387','1392','1397','1402','1407','1412','1413','1414','1415');
		 if(!empty($ammenties_array))
		 {
			foreach($amtt1_array as $amant1_value){?>
			<?php if (in_array($amant_value, $ammenties_array)) {?>
		 <div style="padding-right:5px; padding-bottom:5px; float:left;width:30px;"> <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/<?php echo $amant1_value;?>-1.png"/></div>
		  <?php } else{?>
		 <div style="padding-right:5px;padding-bottom:5px;float:left; width:30px;">   <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/<?php echo $amant1_value;?>-0.png"/></div>
		   <?php }?>

        <?php } } 
		else{ foreach($amtt1_array as $amant1_value){?>
        
      <div style="padding-right:5px;float:left; padding-bottom:5px;  width:30px;">   <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/<?php echo $amant1_value;?>-0.png"/></div>
		<?php }}?>
              </div>
             
             </div>
      
      <div id="tt_p2-right-column"> 
        <div class="tt_p2-feature-image"><?php 	$model2=Gallery::model()->findBySql("SELECT * FROM  `tt_gallery` WHERE  `prop_id` =  '$model->id' LIMIT 1,1");?><img src="http://tt-prop-photos.s3.amazonaws.com/<?php echo $model->id;?>/fullsize/<?php echo $model2->img_url;?>"/></div>
        <h3>Other Services Available</h3>
        <?php echo $model->other_services;?>
        <h3>Tourist Sites and/or Other Activities in the Area</h3>
		<?php echo $model->tourist_sights;?>
        </p>
      </div>
      
    </div>
    <div id="footer" >
      <p>
<strong>CIAO ITALY PTY LTD</strong> ABN # 64163065192 Level 1, 1 West Terrace Bankstown NSW 2200 Australia<br />
Ph & Fax USA - +1 415 3662939 &nbsp;  Ph & Fax Australia - +61 294755353<br />
<span class="tt_is-url">www.traveltuscany.net</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="tt_is-webmail">info@traveltuscany.net</span>
      </p>
    </div>
  </div>
  <div id="tt_wrapper-main"> 
      
    <div id="header">
      <div id="tt_title" style="margin-top:10px;">
        <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/travel-tuscany-logo.jpg" id="tt_logo-img" style="margin-left:10px;" alt="Travel Tuscany Logo" title="Travel Tuscany" />
        <h1 >TravelTuscany.net</h1>
        <h3>Villa Rentals Since 1999</h3>
      </div>
      <h1 id="tt_header-location" style="margin-left:10px;">Location Location</h1>
      <h1 id="tt_header-price" style="margin-left:10px;">From nnnn Euros per week</h1>
    </div>
    <?php 
  $photos = Gallery::model()->findAll(array(
  	'condition'=>'prop_id='.$model->id,
  	'order' => 'img_order ASC',
  ));
  
  if($photos) {
  
  ?>
    <div id="tt_wrapper-content">
     <?php foreach ($photos as $ph) { ?>
      <div class="tt_gallery-img"><img src="<?php echo Gallery::GetThumbnail($ph); ?>" width="256" height="192"/></div>
       <?php } ?>
    </div>
    <?php } ?>
    <div id="footer">
      <p>
<strong>CIAO ITALY PTY LTD</strong> ABN # 64163065192 Level 1, 1 West Terrace Bankstown NSW 2200 Australia<br />
Ph & Fax USA - +1 415 3662939 &nbsp;  Ph & Fax Australia - +61 294755353<br />
<span class="tt_is-url">www.traveltuscany.net</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="tt_is-webmail">info@traveltuscany.net</span>
      </p>
    </div>
  </div>
</body>
</html>
<!--<script>window.print();</script>-->