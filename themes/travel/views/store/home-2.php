<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
			?>
<?php $this->renderPartial('//layouts/store-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>

<section id="content" class="tour">
  <div class="section gray-area most-popular">
    <div class="container">
      <h2><?php echo t('Store Categories'); ?></h2>
      <div class="image-carousel style2" data-animation="slide" data-item-width="270" data-item-margin="30">
        <ul class="slides image-box style3">
        
          <li class="box">
            <figure> <a class="popup-gallery" href="#" title=""><img src="<?php echo $layout_asset; ?>/images/books.jpg" alt="" width="270" height="160"></a> </figure>
            <div class="details text-center">
              <h4 class="box-title">BOOKS</h4>
              <p class="offers-content">(1524 Items Available)</p>
              <p class="description description-text">A collection of religious and spiritual books, calendars and prints.</p>
              <a href="<?php echo Yii::app()->createUrl('store/list'); ?>" class="button">SEE ALL</a> </div>
          </li>
          <li class="box">
            <figure> <a class="popup-gallery" href="#" title=""><img src="<?php echo $layout_asset; ?>/images/cds.jpg" alt="" width="270" height="160"></a> </figure>
            <div class="details text-center">
              <h4 class="box-title">CDs/DVDs</h4>
              <p class="offers-content">(124 Items Available)</p>
              <p class="description">A collection of devotional songs, music,chants and hymns.</p>
              <a href="<?php echo Yii::app()->createUrl('store/list'); ?>" class="button">SEE ALL</a> </div>
          </li>
          <li class="box">
            <figure> <a class="popup-gallery" href="#" title=""><img src="<?php echo $layout_asset; ?>/images/insence.jpg" alt="" width="270" height="160"></a> </figure>
            <div class="details text-center">
              <h4 class="box-title">POOJA ITEMS</h4>
              <p class="offers-content">(1895 Items Available)</p>
              <p class="description">Including lamps, Diyas, Incense Sticks and more</p>
              <a href="<?php echo Yii::app()->createUrl('store/list'); ?>" class="button">SEE ALL</a> </div>
          </li>
          <li class="box">
            <figure> <a class="popup-gallery" href="#" title=""><img src="<?php echo $layout_asset; ?>/images/metalitems1.jpg" alt="" width="270" height="160"></a> </figure>
            <div class="details text-center">
              <h4 class="box-title">IDOLS</h4>
              <p class="offers-content">(152 ITEMS AVAILABLE)</p>
              <p class="description">Stone and marble idols, metal *** and more</p>
              <a href="<?php echo Yii::app()->createUrl('store/list'); ?>" class="button">SEE ALL</a> </div>
          </li>
          <li class="box">
            <figure> <a class="popup-gallery" href="#" title=""><img src="<?php echo $layout_asset; ?>/images/metalitems1.jpg" alt="" width="270" height="160"></a> </figure>
            <div class="details text-center">
              <h4 class="box-title">OTHER ITEMS</h4>
              <p class="offers-content">(15 Items Available)</p>
              <p class="description">Malas and bracelets, yantras and more</p>
              <a href="<?php echo Yii::app()->createUrl('store/list'); ?>" class="button">SEE ALL</a> </div>
          </li>
        </ul>
      </div>
     
      
      <h2>Hot Offer Items</h2>
      <div class="row image-box style3 cruise listing-style1">
        <?php for($i=1; $i<5; $i++) { ?>
        <div class="col-sm-6 col-md-3">
          <article class="box">
            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0"> <a href="#" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="<?php echo $layout_asset; ?>/images/tour-home/ta<?php echo $i; ?>.jpg"></a> </figure>
            <div class="details"> <span class="price"><small style="text-decoration:line-through;">Rs. 320</small>Rs. 239</span>
              <h4 class="box-title">Offer Item <?php echo $i; ?> <small>CDs/DVDs</small></h4>
              <div class="feedback"> </div>
              <div class="row time">
                <div class="date col-xs-6"> <i class="soap-icon-clock yellow-color"></i>
                  <div> <span class="skin-color">Offer From</span><br />
                    Jan 6, 2016 </div>
                </div>
                <div class="departure col-xs-6"> <i class="soap-icon-clock yellow-color"></i>
                  <div> <span class="skin-color">Till</span><br />
                    Jan 24, 2016 </div>
                </div>
              </div>
              <p class="description fourty-space">Save up to <span class="skin-color">20%</span></p>
              <div class="action"> <a class="button btn-small" href="#">VIEW DETAILS</a> <a class="button btn-small yellow" href="#" >ADD TO CART</a> </div>
            </div>
          </article>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="global-map-area promo-box no-margin parallax" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="content-section description pull-right col-sm-9">
        <div class="table-wrapper hidden-table-sm">
          <div class="table-cell">
            <h2 class="m-title animated" data-animation-type="fadeInDown"> Tell us where you would like to go.<br />
              <em>12,000+ Hotel and Resorts Available!</em> </h2>
          </div>
          <div class="table-cell action-section col-md-4 no-float">
            <form action="hotel-list-view.php" method="post">
              <div class="row">
                <div class="col-xs-6 col-md-12">
                  <input type="text" class="input-text input-large full-width" value="" placeholder="Enter destination or hotel name" />
                </div>
                <div class="col-xs-6 col-md-12">
                  <button class="full-width btn-large animated" data-animation-type="fadeInUp" data-animation-delay="1">search hotels</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="image-container col-sm-4"> <img src="http://placehold.it/342x258" alt="" width="342" height="258" class="animated" data-animation-type="fadeInUp" data-animation-duration="2" /> </div>
    </div>
  </div>
  <div class="section most-popular">
    <div class="container">
      <h2>Best Selling Items</h2>
      <div class="image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
        <ul class="slides image-box hotel listing-style1">
          <li>
            <article class="box">
              <figure> <a href="#" class="popup-gallery"><img width="270" height="160" alt="" src="<?php echo $layout_asset; ?>/images/tour-home/ta1.jpg"></a> </figure>
              <div class="details"> <span class="price"> Rs. 360 </span>
                <h4 class="box-title">Item 1<small>CDs/DVDs</small></h4>
                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                <div class="action"> <a class="button btn-small" href="#">VIEW DETAILS</a> <a class="button btn-small yellow" href="#" >ADD TO CART</a> </div>
              </div>
            </article>
          </li>
          <li>
            <article class="box">
              <figure> <a href="#" class="popup-gallery"><img width="270" height="160" alt="" src="<?php echo $layout_asset; ?>/images/tour-home/ta2.jpg"></a> </figure>
              <div class="details"> <span class="price"> Rs. 560 </span>
                <h4 class="box-title">Item 2<small>Books</small></h4>
                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                <div class="action"> <a class="button btn-small" href="#">VIEW DETAILS</a> <a class="button btn-small yellow" href="#" >ADD TO CART</a> </div>
              </div>
            </article>
          </li>
          <li>
            <article class="box">
              <figure> <a href="#" class="popup-gallery"><img width="270" height="160" alt="" src="<?php echo $layout_asset; ?>/images/tour-home/ta3.jpg"></a> </figure>
              <div class="details"> <span class="price"> Rs. 1260 </span>
                <h4 class="box-title">Item 3<small>Pooja Items</small></h4>
                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                <div class="action"> <a class="button btn-small" href="#">VIEW DETAILS</a> <a class="button btn-small yellow" href="#" >ADD TO CART</a> </div>
              </div>
            </article>
          </li>
          <li>
            <article class="box">
              <figure> <a href="#" class="popup-gallery"><img width="270" height="160" alt="" src="<?php echo $layout_asset; ?>/images/tour-home/ta4.jpg"></a> </figure>
              <div class="details"> <span class="price"> Rs. 1360 </span>
                <h4 class="box-title">Item 4<small>Other Items</small></h4>
                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
<div class="action"> <a class="button btn-small" href="#">VIEW DETAILS</a> <a class="button btn-small yellow" href="#" >ADD TO CART</a> </div>
              </div>
            </article>
          </li>
          <li>
            <article class="box">
              <figure> <a href="#" class="popup-gallery"><img width="270" height="160" alt="" src="<?php echo $layout_asset; ?>/images/tour-home/ta5.jpg"></a> </figure>
              <div class="details"> <span class="price"> Rs. 360 </span>
                <h4 class="box-title">Item 5<small>Books</small></h4>
                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                <div class="action"> <a class="button btn-small" href="#">VIEW DETAILS</a> <a class="button btn-small yellow" href="#" >ADD TO CART</a> </div>
              </div>
            </article>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
