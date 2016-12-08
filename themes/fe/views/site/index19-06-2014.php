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
          <li><img src="<?php echo $layout_asset; ?>/images/temp/image6.jpg" /></li>
          <li><img src="<?php echo $layout_asset; ?>/images/temp/image7.jpg" /></li>
          <li><img src="<?php echo $layout_asset; ?>/images/temp/image8.jpg" /></li>
          <li><img src="<?php echo $layout_asset; ?>/images/temp/image9.jpg" /></li>
          <li><img src="<?php echo $layout_asset; ?>/images/temp/image10.jpg" /></li>
          <li><img src="<?php echo $layout_asset; ?>/images/temp/image11.jpg" /></li>
        </ul>
      </div>
    </div>
    <div class="temple_image" align="center"><img src="<?php echo $layout_asset; ?>/images/temp/s1.png" alt="image allt" align="center"></div>
    <div class="left_menu">
      <div  class="left_menu_01"><img src="<?php echo $layout_asset; ?>/images/temp/Themes1.png" >
        <div class="left_menu_text"><a href="#">Themes</a></div>
      </div>
      <div  class="left_menu_02">
        <h1><img src="<?php echo $layout_asset; ?>/images/temp/most popular.png" >
          <div class="left_menu_text"><a href="#">Most Popular</a></div>
        </h1>
      </div>
      <div  class="left_menu_03">
        <h1><img src="<?php echo $layout_asset; ?>/images/temp/Region.png" >
          <div class="left_menu_text"><a href="#">Region</a></div>
        </h1>
      </div>
    </div>
    <div class="right_menu">
      <div  class="right_menu_01">
        <h1><img src="<?php echo $layout_asset; ?>/images/temp/About.png" >
          <div class="left_menu_text"><a href="<?php echo Yii::app()->createUrl('site/aboutus')?>">About Us</a></div>
        </h1>
      </div>
      <div  class="right_menu_02">
        <h1><img src="<?php echo $layout_asset; ?>/images/temp/Write a Review.png" >
          <div class="left_menu_text"><a href="<?php echo Yii::app()->createUrl('site/writereviews')?>">Write a Review</a></div>
        </h1>
      </div>
      <div  class="right_menu_03">
        <h1><img src="<?php echo $layout_asset; ?>/images/temp/Contact Us.png">
          <div class="left_menu_text"><a href="<?php echo Yii::app()->createUrl('site/contactus')?>">Contact Us</a></div>
        </h1>
      </div>
    </div>
    <div class="grid_16c" id="banner_middle_content">
      <ul>
        <li><a href="<?php echo Yii::app()->createUrl('temples/list')?>">Temples</a> </li>
      </ul>
      <p>&nbsp;</p>
      <ul>
        <li><a href="#">Plan your Trip</a></li>
      </ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <ul>
        <li><a href="#">Article and Photos</a></li>
      </ul>
    </div>
  </div>
 
  <div id="main" class="site-main container_16">
    <div class="inner">
    
      <div class="grid_12 first-home-widget-area">
        <aside id="flexlatestnews" class="WPlookLatestNews flex-container-news" >
          <div class="widget-title mright mleft" >
            <h3><?php echo t('Latest Article &amp; Photos'); ?></h3>
            <div class="clear"></div>
          </div>
          <div class="latestnews-body flexslider-news">
            <ul class="slides">
              <?php foreach ($Lart as $La) { ?>
              <li>
                <div class="image fright"><img class="radius" src="<?php echo Gallery::GetPropLargeImg($La->id); ?>" alt="<?php echo $La->name; ?>"></div>
                <div class="content fleft">
                  <h3><?php echo $La->name; ?></h3>
                  <p class="category">By : <?php echo $La->people. ' Date:'.date('d-M-Y',$La->created); ?></p>
                  <p class="description"><?php echo substr( xml_clear($La->content1) ,0,250); ?>,..</p>
                  <div class="flex-button-red"><a class="radius" href="#"><?php echo t('Read More'); ?> <i class="icon-angle-right"></i></a></div>
                </div>
                <div class="clear"></div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </aside>
      </div>
     
     <?php $Rev = Review::model()->find(array(
				'condition' => 'status = 1 AND addtohome = 1'
			)); 
			
	if ( isset($Rev) && count($Rev)>0 ) {		
  	?>
     
      <div class="grid_4 second-home-widget-area">
        <aside id="wpltfbd-2" class="widget WPlookCauses">
          <div class="widget-title">
            <h3><?php echo 'What People Says'; ?></h3>
            <div class="viewall fright"><a href="#" class="radius" title="View all chauses"><?php echo 'view all'; ?></a></div>
            <div class="clear"></div>
          </div>
          <div class="widget-event-body">
            <article class="event-item">
              <figure> <a title="Image title" href="#"> <img  src="<?php echo $layout_asset; ?>/images/temp/slider-thumb2.jpg" class="wp-post-image" alt="Image alt">
                <div class="mask radius">
                  <div class="mask-square"><i class="icon-link"></i></div>
                </div>
                </a> </figure>
              <h3 class="entry-header"> <a title="Change a Life Through Education Lorem Ipsum dolar sit and dolar" href="05-event-single.html">Supporting a day centre</a> </h3>
              <div class="entry-meta-widget">
                <div class="date">
                  <time datetime="2013-04-25T19:02:42+00:00"><i class="icon-calendar"></i> June 29, 2013</time>
                </div>
                <div class="location"><i class="icon-map-marker"></i> <a href="#">51 Sherbrooke W., Montreal</a></div>
                <div class="facebook"><i class="icon-facebook-sign"></i> <a href="#">Facebook</a></div>
              </div>
            </article>
          </div>
        </aside>
      </div>
      
      <?php } } ?>
      <?php $this->renderPartial('featured',array('layout_asset'=>$layout_asset)); ?>
    </div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
