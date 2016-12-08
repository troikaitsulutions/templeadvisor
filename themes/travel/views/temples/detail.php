<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		
		Yii::app()->clientScript->registerCssFile($layout_asset.'/components/flexslider/flexslider.css');
		
		Yii::app()->clientScript->registerMetaTag(Gallery::GetLargeImage($Temple),null,null,array('property'=>'og:image'));
		
?>
<?php $this->renderPartial('//layouts/temple-detail-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'Temple' => $Temple )); ?>

<section id="content">
  <div class="container">
    <div class="row">
      <div id="main" class="col-md-9">
	    <div class="tab-container" id="hotel-features" >
		
          <ul class="tabs">
            <li class="active"><a data-toggle="tab" href="#photos-tab">Photos</a></li>
            <li><a data-toggle="tab" href="#map-tab">Map</a></li>
            
			<?php
				
				if( isset($Festivals) && count($Festivals)>0 ) 
					{ ?>
					<li><a data-toggle="tab" href="#calendar-tab">Festival Calendar</a></li>
			<?php	}
			?>
				
			<li><a data-toggle="tab" href="#etiquette-tab">Temple Etiquette</a></li>
			<li class="pull-right"><a class="button btn-small white-color dline" href="#"><span class="help_no">For Puja/Tour/Astrology Booking?</span><br> Call +91-904-203-0874</a></li>
          </ul>
		  
          <div class="tab-content">
            <div id="photos-tab" class="tab-pane fade in active">
              <?php

			$Pgallery = Gallery::model()->findAll(array( 
							'condition'=>'prop_id = :ID',
							'params'=>array(':ID'=>$Temple->id),
							'order'=>'img_order ASC',
						));
		?>
              <?php if ( isset($Pgallery) && count($Pgallery) ) { ?>
              <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                <ul class="slides">
                  <?php $i = 0; foreach ($Pgallery as $pg) { ?>
                  <li><img src="http://temples.s3.amazonaws.com/<?php echo $Temple->id; ?>/large/<?php echo $pg->img_url; ?>" alt="" height="500px" /></li>
                  <?php } ?>
                </ul>
              </div>
              <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                <ul class="slides">
                  <?php $i = 0; foreach ($Pgallery as $pg) { ?>
                  <li><img src="http://temples.s3.amazonaws.com/<?php echo $Temple->id; ?>/large/<?php echo $pg->img_url; ?>" alt="" /></li>
                  <?php } ?>
                </ul>
              </div>
              <?php } ?>
            </div>
            <div id="map-tab" class="tab-pane fade"> </div>
            
            
            <div id="etiquette-tab" class="tab-pane fade">
              <?php if($Temple->etiquette!='') { ?>
              <div class="overall-rating">
                <h2> <?php echo t('Temple Etiquette'); ?> </h2>
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
              <?php } ?>
            </div>
			<?php
				
				if( isset($Festivals) && count($Festivals)>0 ) 
					{ ?>
			<div id="calendar-tab" class="tab-pane fade">
			
			
                            <div class="travelo-box question-list">
                                <div class="toggle-container">
              
			<?php
			$i=1;
					foreach( $Festivals as $festival ) 
					{	
			?>
                                    <div class="panel style1">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#faq<?php echo $i; ?>" aria-expanded="false" class="collapsed"><?php echo $festival->name; ?>(<?php echo date('d-m-Y',$festival->fdate); ?>) </a>
                                        </h4>
                                        <div id="faq<?php echo $i; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-content">
                                                 <p><?php echo $festival->comment; ?></p>
											</div>
                                        </div>
                                    </div>
			<?php $i++; } ?>
			
				  </div>
                            </div>
            </div>
			<?php
					}
					
				
			?>
          </div>
        </div>
       <hr />
	   <div  id="hotel-main-content" class="tab-container style1">
          <ul class="tabs">
            <li class="active"><a href="#hotel-description" data-toggle="tab">Temple History</a></li>
			<li><a href="#hotel-availability" data-toggle="tab">Other Attractions</a></li>
			<?php
				if( isset($Articles) && count($Articles)>0 ) 
					{ 
			?>
			<li><a href="#related-articles" data-toggle="tab">Related Articles</a></li>
					<?php } ?>
            <li><a href="#hotel-amenities" data-toggle="tab">View and Write Reviews</a></li>
			
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="hotel-description">
              <div class="long-description">
                <h2>About <?php echo $Temple->name; ?></h2>
                
               
                <p class="dropcap"> <?php echo trim(strip_tags($Temple->content1, '<br><p>')); ?> </p>
              </div>
            </div>
            <div class="tab-pane fade" id="hotel-availability">
              <div class="overall-rating">
                <?php $this->renderPartial('//layouts/other-attraction-right-pane',array('layout_asset'=>$layout_asset,'Temple'=>$Temple)); ?>
                
              </div>
            </div>
            <div class="tab-pane fade" id="hotel-amenities">
			 <div class="overall-rating">
              <div class="guest-reviews">
                                        
                                       <?php
										if( isset($Reviews) && count($Reviews)>0 ) {
									   ?>
										<a href="#review-form" class="button btn-mini yellow pull-right">Post Your Review Now</a>
										<h2>Visitors's Reviews</h2>
										<?php
										foreach ($Reviews as $Review) {
									   ?>
									   <div class="guest-review table-wrapper">
                                            <div class="col-xs-3 col-md-2 author table-cell">
                                                <a href="#"><img src="<?php echo $layout_asset; ?>/images/testi-man.png" alt="" width="270" height="263" /></a>
                                                <p class="name"><?php echo $Review->name; ?></p>
                                                <p class="date"><?php echo date("M d,Y h:i A",$Review->created); ?></p>
                                            </div>
                                            <div class="col-xs-9 col-md-10 table-cell comment-container">
                                                <div class="comment-header clearfix">
                                                    <h4 class="comment-title"><?php echo $Review->heading; ?></h4>
                                                    
                                                </div>
                                                <div class="comment-content">
                                                    <p><?php echo $Review->comment; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } } ?>
                                       
                                    </div>
									
									 <div class="post-comment block">
                                <h2><?php echo t('Review this Temple'); ?><a name="review-form"></a></h2>
                                <div class="travelo-box">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'testimonials-form',
										'enableAjaxValidation'=>true,   
										'htmlOptions'=>array('class'=>'comment-form'),
										)); 
									?>
									<?php echo $form->errorSummary(array($model)); ?>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <?php echo $form->label($model,'name'); ?>
												<?php echo $form->textField($model, 'name',array ('class' => 'input-text full-width')); ?>
												<span class="error"><?php echo $form->error($model,'name'); ?> </span>
                                            </div>
                                            <div class="col-xs-6">
                                                <?php echo $form->label($model,'email'); ?>
												<?php echo $form->textField($model, 'email',array ('class' => 'input-text full-width')); ?>
												<span class="error"><?php echo $form->error($model,'email'); ?> </span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <?php echo $form->label($model,'heading'); ?>
											<?php echo $form->textField($model, 'heading',array ('class' => 'input-text full-width')); ?>
											<span class="error"><?php echo $form->error($model,'heading'); ?> </span>
										</div>

                                        <div class="form-group">
                                            <?php echo $form->label($model,'comment'); ?>
											<?php echo $form->textArea($model, 'comment', array('rows' => 15, 'cols' => 50, 'class'=>'input-text full-width')); ?> 
											<span class="error"><?php echo $form->error($model,'comment'); ?> </span>
										</div>
                                        
                                        <button type="submit" class="btn-large full-width">SEND TESTIMONIAL</button>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div> 
									
									</div>
            </div>
			
			<?php
				if( isset($Articles) && count($Articles)>0 ) 
					{ 
			?>
			
			<div class="tab-pane fade" id="related-articles">
              <div class="overall-rating">
			  
				<div class="page">
                            
                            <div class="post-content">
                                <div class="blog-infinite">
								<?php foreach ($Articles as $data) { ?>
								<div class="post">
	                                        <div class="post-content-wrapper">
	                                            <div class="details">
	                                                <h2 class="entry-title"><a href="<?php echo Yii::app()->createUrl('articles/articleread',array('aid'=>$data->id)); ?>">
													<?php echo $data->heading; ?></a></h2>
	                                                <div class="excerpt-container">
	                                                    <p><?php echo substr( trim (strip_tags($data->content1,'a')),0,600); ?>,..</p>
	                                                </div>
	                                                <div class="post-meta">
	                                                   
	                                                    <div class="entry-author fn">
	                                                        <i class="icon soap-icon-user"></i> Posted By:
	                                                        <a href="#" class="author"><?php echo $data->name; ?></a>
	                                                    </div>
	                                                    <div class="entry-action">
	                                                        <a href="#" class="button entry-comment btn-small"><i class="soap-icon-calendar-1"></i><span><?php echo date("M d,Y h:i A",$data->created); ?></span></a>
	                                                        <!--
															<a href="#" class="button btn-small"><i class="soap-icon-wishlist"></i><span></span></a>
	                                                        
															<span class="entry-tags"><i class="soap-icon-features"></i><span><a href="#">Adventure</a>, <a href="#">Romance</a></span></span>
															-->
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                            </div>
								<?php } ?>
                                    
                                </div>
                                
                            </div>
                        </div>
              
              </div>
            </div>
		<?php } ?>
            
          </div>
        </div>
        
	  </div>
    <?php $this->renderPartial('//layouts/temple-info-right-pane',array('layout_asset'=>$layout_asset,'Temple'=>$Temple)); ?>
    </div>
   
   <?php $this->renderPartial('//layouts/nearest-temple-right-pane',array('layout_asset'=>$layout_asset,'Temple'=>$Temple)); ?>
   <?php $this->renderPartial('//layouts/similar-temple',array('layout_asset'=>$layout_asset,'Temple'=>$Temple)); ?>
   
    
  </div>
</section>
<?php 
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/components/flexslider/jquery.flexslider.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile('http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false', CClientScript::POS_HEAD);
?>

<script type="text/javascript">
       
        $('a[href="#map-tab"]').on('shown.bs.tab', function (e) {
            var center = panorama.getPosition();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });
        $('a[href="#steet-view-tab"]').on('shown.bs.tab', function (e) {
            fenway = panorama.getPosition();
            panoramaOptions.position = fenway;
            panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
            map.setStreetView(panorama);
        });
        var map = null;
        var panorama = null;
        var fenway = new google.maps.LatLng(<?php echo $Temple->latitude; ?>, <?php echo $Temple->longitude; ?>);
		//var fenway = new google.maps.LatLng(48.855702, 2.292577);
        var mapOptions = {
            center: fenway,
            zoom: 8
        };
        var panoramaOptions = {
            position: fenway,
            pov: {
                heading: 34,
                pitch: 10
            }
        };
		
        function initialize() {
            tjq("#map-tab").height(tjq("#hotel-main-content").width() * 0.6);
            map = new google.maps.Map(document.getElementById('map-tab'), mapOptions);
			var marker = new google.maps.Marker({
			position: fenway,
			title:"<?php echo $Temple->name; ?>"
			});

			// To add the marker to the map, call setMap();
			marker.setMap(map);
			
            panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
            map.setStreetView(panorama);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
