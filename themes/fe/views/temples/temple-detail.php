<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
		Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?v=3.exp');
		
		$Js_Map = "function initialize() {
  					var myLatlng = new google.maps.LatLng(".$Temple->latitude.",".$Temple->longitude.");
					var mapOptions = {
					  zoom: 10,
					  center: myLatlng
					}
					var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
					 var marker = new google.maps.Marker({
						position: myLatlng,
						map: map,
						title: '".$Temple->name."'
					  });

				  }
				  
				  google.maps.event.addDomListener(window, 'load', initialize);
				  
				  /* $('a[data-toggle='tooltip']').tooltip({ animated: 'fade', placement: 'bottom'}); */
				  
				  ";
				  
		Yii::app()->clientScript->registerScript('Js_google_map', $Js_Map);
?>

<body>
<div id="page">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
  <div id="main" class="site-main container_16">
    <div class="inner clearfix">
      <div class="theme-slogan">
        <?php $this->renderPartial('//layouts/bcrumbs1',array('layout_asset'=>$layout_asset,'meta' => $meta)); ?>
        <div class="theme-slogan-right"> 
        <!-- <span> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="<?php echo t('Contribute an Article'); ?>" title="<?php echo t('Contribute an Article'); ?>"><?php echo t('Contribute an Article'); ?></a> <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="<?php echo t('Write a Review'); ?>" alt="<?php echo t('Write a Review'); ?>"> <?php echo t('Write a Review'); ?></a> </span> -->
        </div>
        <div class="clr"></div>
      </div>
      <div class="temple_content_section">
        <div class="temple_content_left">
          <div class="temple_content_description">
            <h1><?php echo $Temple->name; ?>
              <?php  if ($Temple->sdeity) { echo ' of '.Diety::GetName($Temple->sdeity); }
		  if ($Temple->avatar) { echo ' in the form of '.Avatar::GetName($Temple->avatar); }
		  ?>
              <!--  <img src="<?php echo $layout_asset; ?>/images/rating-star.gif" alt="Rating" /> --></h1>
            <div class="temple_address">
              <div class="temple_addres_details"><img src="<?php echo $layout_asset; ?>/images/map_pointer.png" alt="Google Map Pointer"/>
                <p> <?php echo $Temple->address1; ?>,
                  <?php if( $Temple->address2 != '') { echo $Temple->address2.','; } ?>
                  <?php if( $Temple->town != 0) { echo Town::GetName($Temple->town).'<br />'; } ?>
                  <?php if( $Temple->district != 0) { echo District::GetName($Temple->district).','; } ?>
                  <?php if( $Temple->state != 0) { echo State::GetName($Temple->state).' - IN'; } ?>
                </p>
              </div>
              <div class="temple_check_plan">
                <div class="tmp_check_fb"> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle',array('temple'=>$Temple->id))?>"><img src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon1.png" alt="contribute an article" /><?php echo t('Contribute an Article'); ?></a> </div>
                <!-- <div class="tmp_check_fb"> <a href="#"><img src="<?php echo $layout_asset; ?>/images/check-icon.png" alt="Check the Trip Plan" /> Check the Trip Plan</a> </div> -->
                <div class="tmp_check_fb"> <a href="<?php echo Yii::app()->createUrl('site/writereviews',array('temple'=>$Temple->id))?>"><img src="<?php echo $layout_asset; ?>/images/write-review-icon1.png" alt="write review icon" /> <?php echo t('Write a Review'); ?></a> </div>
              </div>
              <div class="clr"></div>
              <div class="temple_browse_map">
                <h2><?php echo t('Browse Map'); ?></h2>
                <div id="map-canvas" class="tmp_browse_map_area" style="height: 100%; margin: 0px; padding: 0px"> </div>
              </div>
            </div>
            <div class="temple_image_section clearfix">
              <div class="tmp_img"> <img src="<?php echo Gallery::GetLargeImage($Temple); ?>" alt="<?php echo $Temple->name; ?>" style="width:550px;" /> 
             
              <?php $imgs = Gallery::model()->findAll(array('condition'=>'prop_id = :PID','params'=>array(':PID'=>$Temple->id)));
			  if(isset($imgs) && count($imgs)>2 ) { 
			  ?>
              <div class="rr-img-more"><a href="<?php echo Yii::app()->createUrl('temples/gallery',array('prop_id'=>$Temple->id))?>"><?php echo t('View More Images'); ?></a></div> 
              <?php } ?>
              
              </div>
              <div class="tmp_desc_right">
                <?php 
			  $Timings =  Timing::model()->findAll(array('condition'=>'prop_id = :PID','params'=>array(':PID'=>$Temple->id)));
			  if( isset($Timings) && count($Timings)>0 ) {
			  ?>
                <h2><?php echo t('Temple Timings'); ?></h2>
                <p>
                  <?php foreach($Timings as $Timing ) { 
               
			   echo Timing::getTiming1($Timing->open_time).' to '.Timing::getTiming2($Timing->close_time).' ('.$Timing->name.') <br />'; 
               } ?>
                  <?php } ?>
                <h2><?php echo t('Main Deity'); ?></h2>
                <p><strong><?php echo $Temple->deity; ?></strong></p>
                <p><strong><?php echo Diety::GetName($Temple->sdeity); ?></strong>
                  <?php if ($Temple->avatar!=0) { echo ' in <strong>'.Avatar::GetName($Temple->avatar).'</strong> form.'; } ?>
                </p>
                <?php if($Temple->posture!='') { ?>
                <h2><?php echo t('Posture'); ?></h2>
                <p> <?php echo Posture::GetName($Temple->posture);  ?> </p>
                <?php } ?>
                <?php if($Temple->other_deity!='') { ?>
                <h2><?php echo t('Other Deities'); ?></h2>
                <p> <?php echo $Temple->other_deity; ?> </p>
                <?php } ?>
              </div>
            </div>
            <div class="temple_text_section">
              <?php if($Temple->famous_for!='') { ?>
              <h2 class="rrh2size"><?php echo t('Temple Famous for'); ?> :</h2>
              <p><?php echo $Temple->famous_for; ?></p>
              <?php } ?>
              <?php if($Temple->belief!=0) { ?>
              <h2 class="rrh2size"><?php echo t('Belief / Faith'); ?> :</h2>
              <p>
                <?php 
			  
			  $bs = explode("|",$Temple->belief);
			  foreach ($bs as $b) {
				echo Belief::GetName($b).', ';  
			  }
		
			  ?>
              </p>
              <?php } ?>
              <?php if($Temple->thirtham_sthalavruksham!='') { ?>
              <h2 class="rrh2size"><?php echo t('Temple Tank and Sacred Tree'); ?> :</h2>
              <p><?php echo $Temple->thirtham_sthalavruksham; ?></p>
              <?php } ?>
              <?php if($Temple->name!='') { ?>
              <h2 class="rrh2size"><?php echo t('About ').$Temple->name; ?> :</h2>
              <p><?php echo $Temple->content1; ?></p>
              <?php } ?>
             
              
            </div>
          </div>
        </div>
        <div class="temple_content_right">
          <?php if($Temple->etiquette!='') { ?>
          <div class="tmp_details">
            <h2><img src="<?php echo $layout_asset; ?>/images/icon_06.png" alt="<?php echo t('Temple Etiquettes'); ?>" /> <?php echo t('Temple Etiquette'); ?> </h2>
            <div class="tmp_description">
              <ul>
                <?php 
			  
			  $eq = explode("|",$Temple->etiquette);
			  sort($eq);
			 foreach ($eq as $e) { ?>
                <li class="tip"><a><?php echo Etiquettes::GetName($e); ?></a>
                <p class="tooltipL"><strong><?php echo Etiquettes::GetName($e); ?></strong> <br> 
                ---------------------<br>
                <span><?php echo Etiquettes::GetDesc($e); ?></span></p>
                 </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <?php } ?>
          <?php if($Temple->festival!='') { ?>
          <div class="tmp_details">
            <h2><img src="<?php echo $layout_asset; ?>/images/bell-icon.png" alt="<?php echo t('Festival and Events'); ?>" /> <?php echo t('Festival and Events'); ?> </h2>
            <div class="tmp_description"> <?php echo $Temple->festival; ?> </div>
          </div>
          <?php } ?>
          <?php $this->renderPartial('//layouts/nearest-temple-right-pane',array('layout_asset'=>$layout_asset,'Temple'=>$Temple)); ?>
          <div class="tmp_details">
            <?php $this->renderPartial('//layouts/other-attraction-right-pane',array('layout_asset'=>$layout_asset,'Temple'=>$Temple)); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
