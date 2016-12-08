<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		//Yii::app()->clientScript->registerCssFile($layout_asset.'/css/style-orange.css');	
			?>

<section id="content" class="tour">
  <div class="section white-bg most-popular">
    <div class="container">
      <div class="text-center description block">
        <h1>Most Popular Tour Packages</h1>
        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed pulvinar massa idend porta nequetiam</p>
      </div>
      <div class="tour-packages row add-clearfix image-box">
        <div class="col-sm-6 col-md-4">
          <article class="box animated" data-animation-type="fadeInLeft">
            <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-home/ta1.jpg" alt=""></a>
              <figcaption> <span class="price">Rs. 500</span>
                <h2 class="caption-title">Tour Package 1</h2>
              </figcaption>
            </figure>
          </article>
        </div>
        <div class="col-sm-6 col-md-4">
          <article class="box animated" data-animation-type="fadeInDown">
            <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-home/ta2.jpg" alt=""></a>
              <figcaption> <span class="price">Rs. 4000</span>
                <h2 class="caption-title">Tour Package 2</h2>
              </figcaption>
            </figure>
          </article>
        </div>
        <div class="col-sm-6 col-md-4">
          <article class="box animated" data-animation-type="fadeInRight"> <span class="discount"><span class="discount-text">10% Discount</span></span>
            <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-home/ta3.jpg" alt=""></a>
             <figcaption> <span class="price">Rs. 3500</span>
                <h2 class="caption-title">Tour Package 3</h2>
              </figcaption>
            </figure>
          </article>
        </div>
        <div class="col-sm-6 col-md-4">
          <article class="box animated" data-animation-type="fadeInLeft">
            <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-home/ta4.jpg" alt=""></a>
             <figcaption> <span class="price">Rs. 9000</span>
                <h2 class="caption-title">Tour Package 4</h2>
              </figcaption>
            </figure>
          </article>
        </div>
        <div class="col-sm-6 col-md-4">
          <article class="box animated" data-animation-type="fadeInUp"> <span class="discount"><span class="discount-text">10% Discount</span></span>
            <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-home/ta5.jpg" alt=""></a>
              <figcaption> <span class="price">Rs. 12,000</span>
                <h2 class="caption-title">Tour Package 5</h2>
              </figcaption>
            </figure>
          </article>
        </div>
        <div class="col-sm-6 col-md-4">
          <article class="box animated" data-animation-type="fadeInRight">
            <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-home/ta6.jpg" alt=""></a>
              <figcaption> <span class="price">Rs. 20,000</span>
                <h2 class="caption-title">Tour Package 6</h2>
              </figcaption>
            </figure>
          </article>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 animated" data-animation-type="fadeInLeft">
          <h2>Limited Time Offers</h2>
          <div class="toggle-container box" id="accordion1">
            <div class="panel style1">
              <h5 class="panel-title"> <a href="#acc1" data-toggle="collapse" data-parent="#accordion1"><span class="price"><small>From</small>$30</span>Travel Insurance Single Person</a> </h5>
              <div class="panel-collapse collapse in" id="acc1">
                <div class="panel-content">
                  <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed pulvinar massa iden porta nequetiam elerisque mi id habitant morbi tristique senectus.</p>
                </div>
                <!-- end content --> 
              </div>
            </div>
            <div class="panel style1">
              <h5 class="panel-title"> <a class="collapsed" href="#acc2" data-toggle="collapse" data-parent="#accordion1"><span class="price"><small>From</small>$126</span>Inflight Dinner/ Lunch Deal</a> </h5>
              <div class="panel-collapse collapse" id="acc2">
                <div class="panel-content">
                  <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed pulvinar massa iden porta nequetiam elerisque mi id habitant morbi tristique senectus.</p>
                </div>
                <!-- end content --> 
              </div>
            </div>
            <div class="panel style1">
              <h5 class="panel-title"> <a class="collapsed" href="#acc3" data-toggle="collapse" data-parent="#accordion1"><span class="price"><small>From</small>$360</span>Luxury Appartment for Family</a> </h5>
              <div class="panel-collapse collapse" id="acc3">
                <div class="panel-content">
                  <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed pulvinar massa iden porta nequetiam elerisque mi id habitant morbi tristique senectus.</p>
                </div>
                <!-- end content --> 
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 animated" data-animation-type="fadeInRight">
          <h2>What Travelers Say?</h2>
          <div class="testimonial style1 box">
            <ul class="slides ">
              <li>
                <p class="description">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize your entire trip using their extremely fast website and up to date listings. I’m super excited about my next trip to Paris.</p>
                <div class="author clearfix"> 
                  <h5 class="name">Tourist Name<small>guest</small></h5>
                </div>
              </li>
              <li>
                <p class="description">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize your entire trip using their extremely fast website and up to date listings. I’m super excited about my next trip to Paris.</p>
                <div class="author clearfix"> 
                  <h5 class="name">Tourist Name<small>guest</small></h5>
                </div>
              </li>
              <li>
                <p class="description">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize your entire trip using their extremely fast website and up to date listings. I’m super excited about my next trip to Paris.</p>
                <div class="author clearfix"> 
                  <h5 class="name">Tourist Name<small>guest</small></h5>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
 
  
  <div class="global-map-area promo-box no-margin parallax" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="content-section description pull-right col-sm-9">
                        <div class="table-wrapper hidden-table-sm">
                            <div class="table-cell">
                                <h2 class="m-title">
                                    Comfortable and modern flight experience.<br /><em>400+ Airlines to Travel The World!</em>
                                </h2>
                            </div>
                            <div class="table-cell action-section col-md-4 no-float">
                                <form method="post" action="flight-list-view.html">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-12">
                                            <input type="text" class="input-text input-large full-width" value="" placeholder="Enter destination or hotel name" />
                                        </div>
                                        <div class="col-xs-6 col-md-12">
                                            <button class="full-width btn-large">search flights</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="image-container col-sm-4">
                        <img src="http://placehold.it/290x234" alt="" class="animated" data-animation-type="fadeInUp" />
                    </div>
                </div>
            </div>
  
  <div class="section most-popular">
    <div class="container">
      <h2>Last Minute Packages</h2>
      <div class="image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
        <ul class="slides tour-locations">
          <li>
            <article class="box">
              <figure> <a href="#" class="hover-effect"> <img src="<?php echo $layout_asset; ?>/images/tour-home/ta7.jpg" alt=""> </a> </figure>
              <div class="details"> <span class="price">$620</span>
                <h4 class="box-title">Hawaii City Tour</h4>
                <hr>
                <ul class="features check">
                  <li>City Tour In 3 Hours</li>
                  <li>Enjoy World Famous Restaurant</li>
                  <li>Wine Tester Trips</li>
                  <li>Night Street Life in Downtown </li>
                </ul>
                <hr>
                <div class="text-center">
                  <div class="time"> <i class="soap-icon-clock yellow-color"></i> <span>01 Nov 2014 - 08 Nov 2014</span> </div>
                </div>
                <a href="#" class="button btn-small full-width">BOOK NOW</a> </div>
            </article>
          </li>
          <li>
            <article class="box">
              <figure> <a href="#" class="hover-effect"> <img src="<?php echo $layout_asset; ?>/images/tour-home/ta8.jpg" alt=""> </a> </figure>
              <div class="details"> <span class="price">$534</span>
                <h4 class="box-title">Italy Family Tour</h4>
                <hr>
                <ul class="features check">
                  <li>City Tour In 3 Hours</li>
                  <li>Enjoy World Famous Restaurant</li>
                  <li>Wine Tester Trips</li>
                  <li>Night Street Life in Downtown </li>
                </ul>
                <hr>
                <div class="text-center">
                  <div class="time"> <i class="soap-icon-clock yellow-color"></i> <span>01 Nov 2014 - 08 Nov 2014</span> </div>
                </div>
                <a href="#" class="button btn-small full-width">BOOK NOW</a> </div>
            </article>
          </li>
          <li>
            <article class="box">
              <figure> <a href="#" class="hover-effect"> <img src="<?php echo $layout_asset; ?>/images/tour-home/ta9.jpg" alt=""> </a> </figure>
              <div class="details"> <span class="price">$718</span>
                <h4 class="box-title">Chicago Long Tour</h4>
                <hr>
                <ul class="features check">
                  <li>City Tour In 3 Hours</li>
                  <li>Enjoy World Famous Restaurant</li>
                  <li>Wine Tester Trips</li>
                  <li>Night Street Life in Downtown </li>
                </ul>
                <hr>
                <div class="text-center">
                  <div class="time"> <i class="soap-icon-clock yellow-color"></i> <span>01 Nov 2014 - 08 Nov 2014</span> </div>
                </div>
                <a href="#" class="button btn-small full-width">BOOK NOW</a> </div>
            </article>
          </li>
          <li>
            <article class="box">
              <figure> <a href="#" class="hover-effect"> <img src="<?php echo $layout_asset; ?>/images/tour-home/ta10.jpg" alt=""> </a> </figure>
              <div class="details"> <span class="price">$426</span>
                <h4 class="box-title">Sydney Tour</h4>
                <hr>
                <ul class="features check">
                  <li>City Tour In 3 Hours</li>
                  <li>Enjoy World Famous Restaurant</li>
                  <li>Wine Tester Trips</li>
                  <li>Night Street Life in Downtown </li>
                </ul>
                <hr>
                <div class="text-center">
                  <div class="time"> <i class="soap-icon-clock yellow-color"></i> <span>01 Nov 2014 - 08 Nov 2014</span> </div>
                </div>
                <a href="#" class="button btn-small full-width">BOOK NOW</a> </div>
            </article>
          </li>
          <li>
            <article class="box">
              <figure> <a href="#" class="hover-effect"> <img src="<?php echo $layout_asset; ?>/images/tour-home/ta11.jpg" alt=""> </a> </figure>
              <div class="details"> <span class="price">$620</span>
                <h4 class="box-title">Florida Tour</h4>
                <hr>
                <ul class="features check">
                  <li>City Tour In 3 Hours</li>
                  <li>Enjoy World Famous Restaurant</li>
                  <li>Wine Tester Trips</li>
                  <li>Night Street Life in Downtown </li>
                </ul>
                <hr>
                <div class="text-center">
                  <div class="time"> <i class="soap-icon-clock yellow-color"></i> <span>01 Nov 2014 - 08 Nov 2014</span> </div>
                </div>
                <a href="#" class="button btn-small full-width">BOOK NOW</a> </div>
            </article>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php 
	//Yii::app()->clientScript->registerScript('LastMin', $LastMin); 
	//Yii::app()->clientScript->registerScriptFile($layout_asset.'/components/flexslider/jquery.flexslider-min.js');
?>
