<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
		$slider_js = "
		jQuery(document).ready(function(){
			jQuery('#demo').skdslider({'delay':5000, 'fadeSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoStart':true});
		});
		";
		
		Yii::app()->clientScript->registerScript('temple-slider1', $slider_js);
?>


<script type="text/javascript">

$(window).load(function() {
    $("#flexiselDemo1").flexisel();
    $("#flexiselDemo2").flexisel({
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $("#flexiselDemo3").flexisel({
        visibleItems: 5,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $("#flexiselDemo4").flexisel({
        clone:false
    });
    
});
</script>

<body class="home blog two-column right-sidebar" data-twttr-rendered="true">
<div id="page">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
 
  <div class="bannerSlider-section">
      <div id="banner">
        <div id="demo" class="skdslider">
          <ul>
            <li><img src="<?php echo $layout_asset; ?>/images/temp/image1.jpg" /> </li>
            <li><img src="<?php echo $layout_asset; ?>/images/temp/image2.jpg" /> </li>
            <li><img src="<?php echo $layout_asset; ?>/images/temp/image3.jpg" /> </li>
            <li><img src="<?php echo $layout_asset; ?>/images/temp/image4.jpg" /> </li>
            <li><img src="<?php echo $layout_asset; ?>/images/temp/image5.jpg" /></li>
            <!--<li><img src="<?php echo $layout_asset; ?>/images/temp/image6.jpg" /></li>
            <li><img src="<?php echo $layout_asset; ?>/images/temp/image7.jpg" /></li>
            <li><img src="<?php echo $layout_asset; ?>/images/temp/image8.jpg" /></li>
            <li><img src="<?php echo $layout_asset; ?>/images/temp/image9.jpg" /></li>
            <li><img src="<?php echo $layout_asset; ?>/images/temp/image10.jpg" /></li>
            <li><img src="<?php echo $layout_asset; ?>/images/temp/image11.jpg" /></li> -->
          </ul>
        </div>
      </div>
      <div class="temple_image" align="center">
      	<img src="<?php echo $layout_asset; ?>/images/s1.png" alt="" align="center">
        <div class="grid_16c" id="banner_middle_content">
            <ul>
              <li><a href="<?php echo Yii::app()->createUrl('temples/list')?>" title="Temples"><img class="temples" src="<?php echo $layout_asset; ?>/images/temp/Temples.png" alt="Temples" /></a> </li>
              <li><a href="#" title="Plan your Trip"><img class="plan_trip" src="<?php echo $layout_asset; ?>/images/temp/plan-your-trip.png" alt="Plan your Trip" /></a></li>
              <li><a href="#" title="Articles and Reviews"><img class="articles_reviews" src="<?php echo $layout_asset; ?>/images/temp/Article-and-Photos.png" alt="Articles and Reviews" /></a></li>
            </ul>                        
      </div>
      </div>
      <div class="left_menu">
        <div  class="left_menu_01"><a href="#" title="Overview"><img src="<?php echo $layout_asset; ?>/images/temp/overview.png" alt="Overview" title="Overview" ></a>
          <div class="left_menu_text"><a href="#" title="Overview">Overview</a></div>
        </div>
        
        <div  class="left_menu_02">
            <div class="pray_chants">
             <img class="wave" src="<?php echo $layout_asset; ?>/images/temp/pray.png" alt="Prayers &amp; Chants" title="Prayers &amp; Chants" >
                 <div class="play_controls">
                     <a href="#"><img src="<?php echo $layout_asset; ?>/images/temp/pause.png" alt="Pause" title="Pause" ></a> <a href="#"><img src="<?php echo $layout_asset; ?>/images/temp/previous.png" alt="Previous" title="Previous" ></a>  <a href="#"><img class="mtop" src="<?php echo $layout_asset; ?>/images/temp/play.png" alt="Play" title="Play" ></a> <a href="#"><img src="<?php echo $layout_asset; ?>/images/temp/next.png" alt="Next" title="Next" ></a> <a href="#"><img src="<?php echo $layout_asset; ?>/images/temp/sound.png" alt="Sound" title="Sound" ></a>
                 </div>
              <div class="left_menu_text"><a href="#" title="Prayers &amp; Chants">Prayers &amp; Chants</a></div>
            </div>
          
        </div>
        
        <div  class="left_menu_03">
          <a href="#" title="Photogallery"><img class="photogallery" src="<?php echo $layout_asset; ?>/images/temp/photogallery.png" alt="Photogallery" title="Photogallery" ></a>
          <div class="left_menu_text"><a href="#" title="Photogallery">Photogallery</a></div>
          
        </div>
        
      </div>
      <div class="right_menu">
        <div  class="right_menu_01">
         <a href="<?php echo Yii::app()->createUrl('site/aboutus')?>" title="Contribute an Article"><img src="<?php echo $layout_asset; ?>/images/temp/About.png" alt="Contribute an Article" title="Contribute an Article" ></a>
            <div class="left_menu_text"><a href="<?php echo Yii::app()->createUrl('site/aboutus')?>" title="Contribute an Article">Contribute an Article</a></div>
         
        </div>
        <div  class="right_menu_02">
          <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>" title="Write a Review"><img src="<?php echo $layout_asset; ?>/images/temp/Write-a-Review.png" alt="Write a Review" title="Write a Review" ></a>
            <div class="left_menu_text"><a href="<?php echo Yii::app()->createUrl('site/writereviews')?>" title="Write a Review">Write a Review</a></div>
         
        </div>
        <div  class="right_menu_03">
          <a href="<?php echo Yii::app()->createUrl('site/contactus')?>" title="Testimonials"><img src="<?php echo $layout_asset; ?>/images/temp/testimonial.png" alt="Testimonials" title="Testimonials"></a>
            <div class="left_menu_text"><a href="<?php echo Yii::app()->createUrl('site/contactus')?>" title="Testimonials">Testimonials</a></div>
          
        </div>
      </div>
      
  </div>
  
  <div id="main" class="site-main container_16">
    <div class="inner">
    	<div class="top-contant">
        	<span><img src="assets/5b7d812e/images/temp/om.jpg" alt="" /></span>
            <span><img src="assets/5b7d812e/images/temp/om-sakaram.jpg" alt="" /></span>
        </div>
      	<div class="scroll-colm">
        	<div class="gird_17 one-four">
            	<span><a href="#" title="Lord Ganesh" ><img src="assets/5b7d812e/images/temp/ganesh.jpg" alt="Lord Ganesh" /></a></span>
                <h2>Lord Ganesh</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div class="gird_17 one-four">
            	<span><a href="#" title="Lord Shiva" ><img src="assets/5b7d812e/images/temp/shiva.jpg" alt="Lord Shiva" /></a></span>
                <h2>Lord Shiva</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div class="gird_17 one-four">
            	<span><a href="#" title="Lord Vishnu" ><img src="assets/5b7d812e/images/temp/vishnu.jpg" alt="Lord Vishnu" /></a></span>
                <h2>Lord Vishnu</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div class="gird_17 one-four">
            	<span><a href="#" title="Goddess Devi" ><img src="assets/5b7d812e/images/temp/devi.jpg" alt="Goddess Devi" /></a></span>
                <h2>Goddess Devi</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="disc">
        	<div class="disc-left">
            	<div class=" visu-left fl">
            		<h3>Discover</h3>
                	<p>Over 100,000 Hindu Temples By wish, Deity, Category or Location</p>
                    <a href="#" title="More detail">More details</a>
                </div>
                <div class="visu-right fr">
                	<span><img src="assets/5b7d812e/images/temp/discover.jpg" alt="" /></span>
                </div>
            </div>
            <div class="disc-right">
            	<div class="visu-left fl">
            		<h3>Did you know?</h3>
                	<p>Vishnu&acute;s third eye and the trinity representation....</p>
                    <a href="#" title="More detail">More details</a>
                </div>
                <div class="visu-right fr">
                	<span><img src="assets/5b7d812e/images/temp/did-know.jpg" alt="" /></span>
                </div>
            </div>
            <div class="clr"></div>
        </div>
        <div class="scroll-colm2">
        	<h3>Featured Events</h3>
            <!--<div class="nbs-flexisel-nav-left">
            	<a href="#" title="Previous"><img src="assets/5b7d812e/images/temp/scroll-prew.png" alt="Previous" /></a>
            </div> -->
            <ul id="#flexiselDemo2">
            	<li class="gird_14">
                        <span><img src="assets/5b7d812e/images/temp/feat-events01.jpg" alt="" /></span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <strong><a href="#">Malaikottai radha veethi</a></strong>
                </li>
                <li class="vs01 gird_14">
                        <span><img src="assets/5b7d812e/images/temp/feat-events02.jpg" alt="" /></span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <strong><a href="#">Malaikottai radha veethi</a></strong>
                </li>
                <li class="vs02 gird_14">
                        <span><img src="assets/5b7d812e/images/temp/feat-events03.jpg" alt="" /></span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <strong><a href="#">Malaikottai radha veethi</a></strong>
                </li>
                <li class="vs03 gird_14">
                        <span><img src="assets/5b7d812e/images/temp/feat-events04.jpg" alt="" /></span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <strong><a href="#">Malaikottai radha veethi</a></strong>
               </li>
            </ul>
            
            <!--<ul id="flexiselDemo3"> 
                <li>
                	<span><img src="assets/5b7d812e/images/temp/feat-events01.jpg" alt="" /></span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <strong><a href="#">Malaikottai radha veethi</a></strong>
                </li>   
                <li>
                	<span><img src="assets/5b7d812e/images/temp/feat-events01.jpg" alt="" /></span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <strong><a href="#">Malaikottai radha veethi</a></strong>
                </li> 
                <li>
                	<span><img src="assets/5b7d812e/images/temp/feat-events01.jpg" alt="" /></span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <strong><a href="#">Malaikottai radha veethi</a></strong>
                </li> 
                <li>
                	<span><img src="assets/5b7d812e/images/temp/feat-events01.jpg" alt="" /></span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <strong><a href="#">Malaikottai radha veethi</a></strong>
                </li> 
                <li>
                	<span><img src="assets/5b7d812e/images/temp/feat-events01.jpg" alt="" /></span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <strong><a href="#">Malaikottai radha veethi</a></strong>
                </li>                                                                          
            </ul> -->
        	<!--<div class="nbs-flexisel-nav-right">
            	<a href="#" title="Next"><img src="assets/5b7d812e/images/temp/scroll-next.png" alt="Next" /></a>
            </div> -->
            
                        
            <div class="clr"></div>
        </div>
        <div class="scroll-colm3">
        	<h3>Featured Temple</h3>
            <!--<div class="nbs-flexisel-nav-left flexisel_nav">
            	<a href="#" title="Previous"><img src="assets/5b7d812e/images/temp/scroll-prew.png" alt="Previous" /></a>
            </div> -->
            <ul id="#flexiselDemo55">
            	<li class="gird_14 templebg-01">
                	<h4>Sri Meenakshi</h4>
                    <span><img src="assets/5b7d812e/images/temp/feat-temple01.jpg" alt="" /></span>
                    <p>Lorem Ipsum is simply dummy text of the printing and...</p>
                    <strong><a href="#">Read More >></a></strong>
                </li>
                <li class="vs01 gird_14 templebg-02">
                	<h4>Sri Maharanedung</h4>
                	<span><img src="assets/5b7d812e/images/temp/feat-temple02.jpg" alt="" /></span>
                    <p>Lorem Ipsum is simply dummy text of the printing and...</p>
                    <strong><a href="#">Read More >></a></strong>
                </li>
                <li class="vs02 gird_14 templebg-03">
                	<h4>Sri Swaminatha Swamy</h4>
                	<span><img src="assets/5b7d812e/images/temp/feat-temple03.jpg" alt="" /></span>
                    <p>Lorem Ipsum is simply dummy text of the printing and...</p>
                    <strong><a href="#">Read More >></a></strong>
                </li>
                <li class="vs03 gird_14 templebg-04">
                	<h4>Sri Dhenupureeswarar </h4>
                	<span><img src="assets/5b7d812e/images/temp/feat-temple04.jpg" alt="" /></span>
                    <p>Lorem Ipsum is simply dummy text of the printing and...</p>
                    <strong><a href="#">Read More >></a></strong>
               </li>
            </ul>
        	<!--<div class="nbs-flexisel-nav-right flexisel_nav">
            	<a href="#" title="Next"><img src="assets/5b7d812e/images/temp/scroll-next.png" alt="Next" /></a>
            </div> -->
            
                        
            <div class="clr"></div>
        </div>
    </div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>


</body>
