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
       <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span> <a href="#"><img  src="<?php echo $layout_asset; ?>/images/photo-gallery-icon.png" alt="Photo Gallery" title="Photo Gallery"> Photo Gallery</a> <a href="#"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"> Write a Review</a> </span> </div>
      <div class="clr"></div>
    </div>
      
    <div class="temple_content_section">
      <div class="temple_content_left">
        <div class="temple_content_description">
          <h1><?php echo $meta->h1; ?></h1>
          <div class="temple_contact">
            <div class="temple_contact_business">
              <p>
                <label>Name:</label>
                <input type="text" name="">
              </p>
              <p>
                <label>Email ID:</label>
                <input type="text" name="">
              </p>
              <p>
                <label>Phone Number:</label>
                <input type="text" value="+91" name="">
              </p>
              <p>
                <label>Remarks:</label>
                <textarea cols="8" rows="4"></textarea>
              </p>
              <p>
                <label>&nbsp;</label>
                <input type="Submit" value="Send" name="">
              </p>
            </div>
            <div class="clr"></div>
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
