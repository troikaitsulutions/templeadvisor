<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php  echo Yii::app()->request->baseUrl;?>/protected/assets/backend/pdf/default-styles.css" type="text/css" rel="stylesheet" />
<title><?php echo $model->tt_name; ?> : Ciao Italy Villas</title>
</head>

<body>
<div id="tt_wrapper-content" style="height:850px!important; overflow:hidden!important;">
  <div style=" margin:15px; padding-top:10px;">
    <div id="tt_splash-image"><img src="<?php echo Gallery::GetPropPdfLargeImg($model->id);?>"  id="checkfunction"/></div>
  </div>
  <h1 class="tt_intro-heading"><?php echo $model->tt_name;?></h1>
  <div class="tt_intro" style=" height:170px; overflow:hidden; margin-left:15px; margin-right:15px;"> <?php echo $model->content1; ?> </div>
</div>
<pagebreak  type="NEXT-ODD" />
<div id="tt_wrapper-content" style="height:850px!important; overflow:hidden!important;">
  <div id="tt_p2-left-column">
    <h1>Information</h1>
    <h3>Location</h3>
    <div style="padding-top:-15px">
      <div style="background-color:#E7CF92;" >
        <ul>
          <li><?php echo Plocation::GetName($model->location); ?></li>
        </ul>
      </div>
    </div>
    <h3>Bedrooms</h3>
    <div style="padding-top:-15px">
      <div style="background-color:#E7CF92;" >
        <ul>
          <?php if($model->sleep>0){?>
          <li>Sleeps: <?php echo $model->sleep;?></li>
          <?php } ?>
          <?php if($model->bedroom>0){?>
          <li>Bedrooms: <?php echo $model->bedroom;?></li>
          <?php } ?>
          <?php if($model->mbed>0){?>
          <!--<li>Double Rooms: <?php //echo $model->mbed;?></li>-->
          <?php } ?>
          <?php if($model->tbed>0){?>
          <li>Twin Rooms: <?php echo $model->tbed;?></li>
          <?php } ?>
          <?php if($model->msbed>0){?>
          <li>Single Rooms: <?php echo $model->msbed;?></li>
          <?php } ?>
          <?php if($model->ssbed>0){?>
          <li>Sofa Beds: <?php echo $model->ssbed;?></li>
          <?php } ?>
          <?php if($model->sleep>0){?>
          <!--<li>Extra Beds: <?php //echo $model->sleep;?></li>-->
          <?php } ?>
        </ul>
      </div>
    </div>
    <h3>Bathrooms</h3>
    <div style="padding-top:-15px">
      <div style="background-color:#E7CF92;" >
        <ul>
          <?php if($model->bathroom>0){?>
          <li>Total Bathrooms: <?php echo $model->bathroom;?></li>
          <?php } ?>
          <?php if($model->bathwtub>0){?>
          <li>Bathrooms with Tub: <?php echo $model->bathwtub;?></li>
          <?php } ?>
          <?php if($model->bathwts>0){?>
          <li>Bathrooms with Shower: <?php echo $model->bathwts;?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <h3>Location and Facilities</h3>
    <div style="padding-top:-15px">
      <div style="background-color:#E7CF92;" >
        <ul>
          <?php if(Town::GetName($model->town)!=''){?>
          <li>Town Places: <?php echo Town::GetName($model->town);?></li>
          <?php } ?>
          
          <?php if(Countrylist::GetName(Country::GetName($model->country))!=''){?>
          <li>Country: <?php echo Countrylist::GetName(Country::GetName($model->country));?></li>
          <?php } ?>
          <?php if(Type::GetName($model->ptype)!=''){?>
          <li>Property Type: <?php echo Type::GetName($model->ptype); ?></li>
          <?php } ?>
          <?php if(Province::GetName($model->province)!=''){?>
          <li>Surface Area: <?php echo Province::GetName($model->province);?></li>
          <?php } ?>
          <?php if($model->view>0){?>
          <li>Property View: <?php echo $model->view;?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <h3>Features &amp; Accessories</h3>
    <table>
      <tr>
        <?php $ammenties_array=explode('|',$model->amenities); 
		  $amtt_array=array('1001','1007','1012','1017','1024','1029','1035','1042','1048','1055','1065','1070','1075','1092','1097','1103','1109','1114','1119','1125','1132','1137','1142','1147','1152','1157','1162','1167','1172','1177','1182','1187','1192','1197','1202','1207','1212','1217','1222','1242','1247','1252','1257','1262','1267','1272','1277','1282','1287','1292','1297','1302','1307','1312','1317','1322','1327','1332','1337','1342','1347','1352','1357','1362','1367','1372','1377','1382','1387','1392','1397','1402','1407','1412','1413','1414','1415');
		  $i=0;
		 if(!empty($ammenties_array))
		 {
			 foreach($amtt_array as $amant_value)
			 {
				 if(in_array($amant_value, $ammenties_array)) 
				 {$i=$i+1;
				 $amenities = Amenities::model()->find(array('condition'=>"id='$amant_value'"));
				 ?>
        <td><img src="<?php  echo Yii::app()->request->baseUrl;?>/protected/assets/backend/pdf/images/<?php echo $amant_value;?>-1.png" title="<?php echo $amenities->name;?>"/></td>
        <?php }  if($i==8){ echo '</tr><tr>'; $i=0;} } 
		 } 
?>
      </tr>
    </table>
  </div>
  <div id="tt_p2-right-column">
    <div class="tt_p2-feature-image">
      <?php 	$model2=Gallery::model()->findBySql("SELECT * FROM  `tt_gallery` WHERE  `prop_id` =  '$model->id' LIMIT 1,1");?>
      <img src="http://tt-prop-photos.s3.amazonaws.com/<?php echo $model->id;?>/fullsize/<?php echo $model2->img_url;?>"/></div>
    <?php if($model->other_services!=''){?>
    <h3>Other Services Available</h3>
    <div style="height:140px; overflow:hidden!important; text-align:justify;">
      <?php if($model->tourist_sights!='') echo substr($model->other_services,0,600); else echo substr($model->other_services,0,1600);?>
    </div>
    <?php } ?>
    <?php if($model->tourist_sights!=''){?>
    <h3>Tourist Sites and/or Other Activities in the Area</h3>
    <div style="height:140px; text-align:justify;">
      <?php if($model->other_services!='') echo substr($model->tourist_sights,0,600); else echo substr($model->tourist_sights,0,1600);?>
    </div>
    <?php } ?>
  </div>
</div>
<pagebreak  type="NEXT-ODD" />
<?php 
  $photos = Gallery::model()->findAll(array(
  	'condition'=>'prop_id='.$model->id,
  	'order' => 'img_order ASC','limit'=>12
  ));
  if($photos) {
  ?>
<div id="tt_wrapper-content" align="center" style="height:850px!important; overflow:hidden!important;">
  <table width="85%" align="center">
    <tr>
      <?php $i=0;foreach ($photos as $ph) { $i=$i+1; ?>
      <td><img src="<?php echo Gallery::GetThumbnail($ph); ?>"/></td>
      <?php if($i==3){ $i=0; echo '</tr><tr>'; } } ?>
    </tr>
  </table>
  <?php } ?>
</div>
<script>function date() {
alert();}

this.zoom=100;</script>