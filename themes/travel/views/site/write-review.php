<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
			
	
?>

<section id="content">
  <div class="container">
    <div class="row">
      <div id="main" class="col-md-9">
        <div id="hotel-features" class="tab-container">
          <div class="tab-content">
            <div class="tab-pane fade in active" id="hotel-write-review">
              <div class="main-rating table-wrapper full-width hidden-table-sms intro">
                <div class="table-cell col-sm-8">
                  <div class="overall-rating">
                    <h4>Your overall Rating of this property</h4>
                    <div class="star-rating clearfix">
                      <div class="five-stars-container">
                        <div class="five-stars" style="width: 80%;"></div>
                      </div>
                      <span class="status">VERY GOOD</span> </div>
                    <div class="detailed-rating">
                      <ul class="clearfix">
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>service</label>
                            <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>Value</label>
                            <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>Sleep Quality</label>
                            <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>Cleanliness</label>
                            <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>location</label>
                            <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>rooms</label>
                            <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>swimming pool</label>
                            <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>fitness facility</label>
                            <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <form class="review-form">
                <div class="form-group col-md-5 no-float no-padding">
                  <h4 class="title">Title of your review</h4>
                  <input type="text" name="review-title" class="input-text full-width" value="" placeholder="enter a review title" />
                </div>
                <div class="form-group">
                  <h4 class="title">Your review</h4>
                  <textarea class="input-text full-width" placeholder="enter your review (minimum 200 characters)" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <h4 class="title">What sort of Trip was this?</h4>
                  <ul class="sort-trip clearfix">
                    <li><a href="#"><i class="soap-icon-businessbag circle"></i></a><span>Business</span></li>
                    <li><a href="#"><i class="soap-icon-couples circle"></i></a><span>Couples</span></li>
                    <li><a href="#"><i class="soap-icon-family circle"></i></a><span>Family</span></li>
                    <li><a href="#"><i class="soap-icon-friends circle"></i></a><span>Friends</span></li>
                    <li><a href="#"><i class="soap-icon-user circle"></i></a><span>Solo</span></li>
                  </ul>
                </div>
                <div class="form-group col-md-5 no-float no-padding">
                  <h4 class="title">When did you travel?</h4>
                  <div class="selector">
                    <select class="full-width">
                      <option value="2014-6">June 2014</option>
                      <option value="2014-7">July 2014</option>
                      <option value="2014-8">August 2014</option>
                      <option value="2014-9">September 2014</option>
                      <option value="2014-10">October 2014</option>
                      <option value="2014-11">November 2014</option>
                      <option value="2014-12">December 2014</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <h4 class="title">Add a tip to help travelers choose a good room</h4>
                  <textarea class="input-text full-width" rows="3" placeholder="write something here"></textarea>
                </div>
                <div class="form-group col-md-5 no-float no-padding">
                  <h4 class="title">Do you have photos to share? <small>(Optional)</small> </h4>
                  <div class="fileinput full-width">
                    <input type="file" class="input-text" data-placeholder="select image/s" />
                  </div>
                </div>
                <div class="form-group">
                  <h4 class="title">Share with friends <small>(Optional)</small></h4>
                  <p>Share your review with your friends on different social media networks.</p>
                  <ul class="social-icons icon-circle clearfix">
                    <li class="twitter"><a title="Twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                    <li class="facebook"><a title="Facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                    <li class="googleplus"><a title="GooglePlus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                    <li class="pinterest"><a title="Pinterest" href="#" data-toggle="tooltip"><i class="soap-icon-pinterest"></i></a></li>
                  </ul>
                </div>
                <div class="form-group col-md-5 no-float no-padding no-margin">
                  <button type="submit" class="btn-large full-width">SUBMIT REVIEW</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="sidebar col-md-3">
        <article class="detailed-logo">
          
          <div class="details">
            <h2 class="box-title">Hilton Hotel and Resorts<small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space">Bastille, Paris france</span></small></h2>
            <span class="price clearfix"> <small class="pull-left">avg/night</small> <span class="pull-right">$620</span> </span>
            <div class="feedback clearfix">
              <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
              <span class="review pull-right">270 reviews</span> </div>
            <p class="description">Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
            <a class="button yellow full-width uppercase btn-small">add to wishlist</a> </div>
        </article>
        <div class="travelo-box contact-box">
          <h4>Need Travelo Help?</h4>
          <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
          <address class="contact-details">
          <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span> <br>
          <a class="contact-email" href="#">help@travelo.com</a>
          </address>
        </div>
        <div class="travelo-box">
          <h4>Similar Listings</h4>
          <div class="image-box style14">
            <article class="box">
              <figure> <a href="#"><img src="http://placehold.it/63x59" alt="" /></a> </figure>
              <div class="details">
                <h5 class="box-title"><a href="#">Plaza Tour Eiffel</a></h5>
                <label class="price-wrapper"> <span class="price-per-unit">$170</span>avg/night </label>
              </div>
            </article>
            <article class="box">
              <figure> <a href="#"><img src="http://placehold.it/63x59" alt="" /></a> </figure>
              <div class="details">
                <h5 class="box-title"><a href="#">Sultan Gardens</a></h5>
                <label class="price-wrapper"> <span class="price-per-unit">$620</span>avg/night </label>
              </div>
            </article>
            <article class="box">
              <figure> <a href="#"><img src="http://placehold.it/63x59" alt="" /></a> </figure>
              <div class="details">
                <h5 class="box-title"><a href="#">Park Central</a></h5>
                <label class="price-wrapper"> <span class="price-per-unit">$322</span>avg/night </label>
              </div>
            </article>
          </div>
        </div>
        <div class="travelo-box book-with-us-box">
          <h4>Why Book with us?</h4>
          <ul>
            <li> <i class="soap-icon-hotel-1 circle"></i>
              <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
              <p>Nunc cursus libero pur congue arut nimspnty.</p>
            </li>
            <li> <i class="soap-icon-savings circle"></i>
              <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
              <p>Nunc cursus libero pur congue arut nimspnty.</p>
            </li>
            <li> <i class="soap-icon-support circle"></i>
              <h5 class="title"><a href="#">Excellent Support</a></h5>
              <p>Nunc cursus libero pur congue arut nimspnty.</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
