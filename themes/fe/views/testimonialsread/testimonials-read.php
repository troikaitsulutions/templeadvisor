<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
?>

<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
    
    <div class="theme-slogan">
      <div class="theme-slogan-left">
        <ul>
          <li><span><a href="/">Home</a></span></li>
          <li><span><a href="#" class="tmp_breadcrum3 sele"><?php echo $meta->breadcrumbs; ?> </a></span></li>
          <div class="clr"></div>
        </ul>
        <div class="clr"></div>
      </div>
      <div class="theme-slogan-right"> <span> <a href="#"><img  src="<?php echo $layout_asset; ?>/images/photo-gallery-icon.png" alt="Photo Gallery" title="Photo Gallery"> Photo Gallery</a> <a href="#"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"> Write a Review</a> </span> </div>
      <div class="clr"></div>
    </div>
    
    <div class="temple_content_section">
      <div class="temple_content_left">
       <?php for($i=0; $i<10; $i++) { ?>
        <div class="tmp_region_right_testi">
          <h3>Maha Vishnu Temple<span>by Tamilselvi</span></h3>
          <ul>
            <li><span><img alt="" src="<?php $layout_asset; ?>/images/calc.png"></span>june 05th, 2014</li>
            <li><span><img alt="" src="<?php $layout_asset; ?>/images/clock.png"></span>02:41 pm</li>
          </ul>
          <div class="clr"></div>
          <div class="tmp_region_testi_left"> <span><a href="#"><img alt="" src="<?php $layout_asset; ?>/images/testi-man.png"></a></span> </div>
          <div class="tmp_region_testi_right">
            <p>In the year 1688, the French builtandnbsp in a fort . Behind this fort, the Manakula Vinayakar temple was built. The temple is located near the sea shore with a lot of the sand (Manal) and hence the temple tank is known as Manarkulam. In India... <span class="alignright"><a href="#">Read More...</a></span> </p>
          </div>
          <div class="clr"></div>
        </div>
       <?php } ?>
        <div class="temple_contact_business">
          <h5>Add Your Testimonials</h5>
          <div class="form_testimonial">
            <p>
              <label>Name:</label>
              <input type="text" name="">
            </p>
            <p>
              <label>Email ID:</label>
              <input type="text" name="">
            </p>
            <p>
              <label>Heading:</label>
              <input type="text" name="">
            </p>
            <p>
              <label>Comment:</label>
              <textarea></textarea>
            </p>
            <p>
              <label>&nbsp;</label>
              <input type="Submit" value="Send" name="">
            </p>
          </div>
        </div>
      </div>
      <div class="temple_content_right">
        <div class="tmp_details">
          <h2><img alt="" src="<?php $layout_asset; ?>/images/bell-icon.png"> Festival and Events </h2>
          <div class="tmp_description">
            <ul>
              <li>Tiruchi Renganatthan Street</li>
              <li>Malaikottai radha veethi</li>
              <li>Tanjavur West Radha Veethi</li>
              <li>Kuthu vizhakku Festival</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="temple_content_right">
      <div class="tmp_details">
        <h2><img alt="Recent Artiles" src="<?php echo $layout_asset; ?>/images/bell-icon.png"> <?php echo t('Recent Articles'); ?> </h2>
        <div class="tmp_description">
          <ul>
            <a href="#">
            <li>Tiruchi Renganatthan Street</li>
            </a> <a href="#">
            <li>Malaikottai radha veethi</li>
            </a> <a href="#">
            <li>Tanjavur West Radha Veethi</li>
            </a> <a href="#">
            <li>Kuthu vizhakku Festival</li>
            </a>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
