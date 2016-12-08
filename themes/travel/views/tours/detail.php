<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
?>
<?php $this->renderPartial('//layouts/tours-detail-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'Temple' => $Temple )); ?>

<section id="content">
  <div class="container">
    
    <div class="row">
      <div id="main" class="col-md-9">
        <div class="tab-container style1" id="hotel-main-content">
          <ul class="tabs">
            <li class="active"><a data-toggle="tab" href="#photos-tab">Destination Photos</a></li>
            <li><a data-toggle="tab" href="#calendar-tab">Destination Covered</a></li>
            <li><a data-toggle="tab" href="#calendar-tab">Terms of Condition</a></li>
            <li class="pull-right"><a class="button btn-small yellow-bg white-color" href="#">HELP ? +91 44 2486 1244</a></li>
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
                  <li><img src="http://temples.s3.amazonaws.com/<?php echo $Temple->id; ?>/large/<?php echo $pg->img_url; ?>" alt="" /></li>
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
          </div>
        </div>
        <div class="travelo-box" id="tour-details">
          <h2>General Information About Destinations</h2>
          <p>Sed aliquam nunc eget velit imperdiet, in rutrum mauris malesuada. Quisque ullamcorper vulputate nisi, et fringilla ante convallis quis. Nullam vel tellus non elit suscipit volutpat. Integer id felis et nibh rutrum dignissim ut non risus. In tincidunt urna quis sem luctus, sed accumsan magna pellentesque. Donec et iaculis tellus. Vestibulum ut iaculis justo, auctor sodales lectus. Donec et tellus tempus, dignissim maurornare, consequat lacus. Integer dui neque, scelerisque nec sollicitudin sit amet, sodales a erat. Duis vitae condimentum ligula. Integer eu mi nisl. Donec massa dui, commodo id arcu quis, venenatis scelerisque velit.</p>
          <h2> Itinerary:</h2>
          <h3>Day 1: Murudeshwar - Jog Falls - Murudeshwar</h3>
          <p>Boarding at hotel RNS Residency, take rest and come to breakfast at 9.30 and proceed for Jog Falls. After enjoying in the water fall, we will leave for the hotel. After reaching the hotel, go to the temple. Enjoy boat activity and water sports. Evening free time for relaxation.</p>
          <h3>Day 2: Murudeshwar - Idgunji - Gokarna</h3>
          <p>After breakfast, proceed to Gokarna Mahabaleshwara. On the way, we will visit Idugunji Maha Ganapati, the very old Ganesh Mandir. After that, we will see Om Beach and historically well known Gokarna Mahabaleshwar temple, enjoy the beaches then we proceed to Ankola - Hotel Honey Beach Resort. Evening free time for relaxation, enjoy the resort own beach and sunset from the resort lobby.</p>
          <h3>Day 3: Ankola - Kurumgad Island ( Karwar )</h3>
          <p>After breakfast, proceed to Kurumgad Island. From Karwar port, enjoy the journey to Kurumgad Island on a fairy boat. By reaching the island, relax in our tents or cottages. After lunch, take rest in cottages in afternoon time or you can enjoy fishing also, in the evening time you can roam around island and enjoy the various scenic spots, after that you can enjoy non- veg/ veg barbeque. Post dinner, enjoy the bonfire.</p>
          <h3>Day 4: Kurumgad - Paloleim</h3>
          <p>After breakfast at Island will go far in the sea to watch the dolphins after that proceed to Paloleim Beach. After reaching Paloleim by afternoon, take lunch and take rest in the shacks provided to you just opposite to the blue sea. In the evening, enjoy clean and picturistic half moon shaped with full of coconut grooves safe beach - enjoy candle light dinner in the evening on the beach.</p>
          <h3>Day 5: Paloleim - Panaji/ Madgoan</h3>
          <p>After breakfast, proceed to Madgoan/ Panaji bus stand/ railway station. </p>
        </div>
      </div>
      <div class="sidebar col-md-3">
        <div class="travelo-box">
          <address class="contact-details">
          <span class="contact-phone yellow"> From Rs. 5400 </span>
          </address>
         <article class="detailed-logo">
            <div class="details"> <a class="button yellow full-width uppercase btn-medium">BOOK NOW</a> </div>
          </article>
          <article class="detailed-logo">
            <div class="details"> <a class="button yellow full-width uppercase btn-medium">GET DETAILS</a> </div>
          </article>
        </div>
        <div class="travelo-box">
          <h4>Similar Tour Packages</h4>
          <div class="image-box style14">
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-img.jpg" alt="" /></a> </figure>
              <div class="details with-button">
                <h5 class="box-title"><a href="#">Tour Package 1<small> From Rs. 3250 </small></a></h5>
                <a class="button btn-mini yellow">Book a Trip</a>
              </div>
            </article>
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-img.jpg" alt="" /></a> </figure>
              <div class="details with-button">
                <h5 class="box-title"><a href="#">Tour Package 2<small> From Rs. 3800 </small></a></h5>
                <a class="button btn-mini yellow">Book a Trip</a>
              </div>
            </article>
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-img.jpg" alt="" /></a> </figure>
              <div class="details with-button">
                <h5 class="box-title"><a href="#">Tour Package 3<small> From Rs. 12250 </small></a></h5>
                <a class="button btn-mini yellow">Book a Trip</a>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
