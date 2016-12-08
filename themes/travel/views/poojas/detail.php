<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		
		Yii::app()->clientScript->registerCssFile($layout_asset.'/components/flexslider/flexslider.css');
		
		Yii::app()->clientScript->registerMetaTag(Gallery::GetLargeImage($Temple),null,null,array('property'=>'og:image'));
	
?>
<?php $this->renderPartial('//layouts/pooja-detail-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'PujaDetail' => $PujaDetail )); ?>

<section id="content">
  <div class="container">
    <h2> <?php echo $Temple->name; ?> </h2>
    <div class="row">
      <div id="main" class="col-md-9">
        <div class="tab-container style1" id="hotel-main-content">
          <ul class="tabs">
            <li class="active"><a data-toggle="tab" href="#photos-tab">Temple Photos</a></li>
            <li><a data-toggle="tab" href="#calendar-tab">Event calendar</a></li>
            <li><a data-toggle="tab" href="#etiquette-tab">Deities</a></li>
            <li class="pull-right"><a class="button btn-small yellow-bg white-color" href="#">VIEW TEMPLE DETAILS</a></li>
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
            <div id="steet-view-tab" class="tab-pane fade" style="height: 500px;"> </div>
            <div id="calendar-tab" class="tab-pane fade"> </div>
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
          </div>
        </div>
      </div>
      <div class="sidebar col-md-3">
        <div class="travelo-box">
         <address class="contact-details">
          <span class="contact-phone yellow"> Rs. <?php echo $PujaDetail->sitecost;?> </span>
          </address>
          <div class="details"> <a class="button yellow full-width uppercase btn-medium">BOOK THIS PUJA</a> </div>
        </div>
        <div class="travelo-box">
          <h4>Other Pujas in this Temple</h4>
          <div class="image-box style14">
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/pooja-img.jpg" alt="" /></a> </figure>
               <div class="details with-button">
                <h5 class="box-title"><a href="#">Pooja 1</a><small> Rs. 250 </small></h5>
                <a class="button btn-mini yellow">Request this Puja</a>
              </div>
            </article>
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/pooja-img.jpg" alt="" /></a> </figure>
               <div class="details with-button">
                <h5 class="box-title"><a href="#">Pooja 2 <small> Rs. 250 </small></a></h5>
                <a class="button btn-mini yellow">Request this Puja</a>
              </div>
            </article>
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/pooja-img.jpg" alt="" /></a> </figure>
              <div class="details with-button">
                <h5 class="box-title"><a href="#">Pooja 3 <small> Rs. 250 </small></a></h5>
                <a class="button btn-mini yellow">Request this Puja</a>
              </div>
            </article>
          </div>
        </div>
        <div class="travelo-box">
          <article class="detailed-logo">
            <div class="details"> <a class="button yellow full-width uppercase btn-medium">BUY PUJA ITEMS ONLINE</a> </div>
          </article>
          <article class="detailed-logo">
            <div class="details"> <a class="button yellow full-width uppercase btn-medium">CONDUCT A HOMAM</a> </div>
          </article>
        </div>
      </div>
    </div>
    <div class="section gray-area most-popular">
      <div class="container">
        <?php $Featured = Temples::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND addtohome = 1',
			'order'=>'rand',
			'limit'=>6));
		  	if( isset($Featured) && count($Featured)>0 ) { 
	  ?>
        <div class="text-center description block">
          <h2>TEMPLES SIMILAR PUJAS</h2>
        </div>
        <div class="image-carousel style2" data-animation="slide" data-item-width="270" data-item-margin="30">
          <ul class="slides image-box style3">
            <?php 
			$i=1;
			foreach ( $Featured as $d) {
		?>
            <li class="box">
              <figure> <a class="popup-gallery" href="#" title=""><img src="<?php echo $layout_asset; ?>/images/tour-home/ta<?php echo $i++; ?>.jpg" alt="" width="270" height="160"></a> </figure>
              <div class="details text-center">
                <h4 class="box-title"><?php echo $d->name; ?></h4>
                <p class="offers-content">(15 Pujas)</p>
                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar.</p>
                <a href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$d->id));?>" class="button">VIEW DETAILS</a> </div>
            </li>
            <?php } ?>
          </ul>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php 
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/components/flexslider/jquery.flexslider.js', CClientScript::POS_END);
	
?>

