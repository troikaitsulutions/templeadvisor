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
      <?php $this->renderPartial('//layouts/bcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span> <a href="#"><img  src="<?php echo $layout_asset; ?>/images/photo-gallery-icon.png" alt="Photo Gallery" title="Photo Gallery"> Photo Gallery</a> <a href="#"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"> Write a Review</a> </span> </div>
      <div class="clr"></div>
    </div>
    <div class="theme-part">
      <div class="tmp_region_left">
        <?php $this->renderPartial('//layouts/overview-left-pane',array('layout_asset'=>$layout_asset)); ?>
        <div class="tmp_photo-region_left">
          <h3>Reviews and Ratings</h3>
          <ul>
            <li><a href="#">Sri Meenakshi</a></li>
            <li><a href="#">Sri Maharanedung</a></li>
            <li><a href="#">Sri Swaminatha Swamy</a></li>
            <li><a href="#">Sri Dhenupureeswarar</a></li>
          </ul>
        </div>
      </div>
      <div class="theme-part-right">
        <div class="tmp_region_right">
          <div class="tmp_region_right_top">
            <div class="tmp_region_right_top_left"> <span> <img title="Themes" alt="Themes" src="<?php echo $layout_asset; ?>/images/theme-god.png"> </span> </div>
            <div class="tmp_region_right_top_right">
              <p> <strong>Themes</strong> In the year 1688, the French builtandnbsp in a fort . Behind this fort, the Manakula Vinayakar temple was built. The temple is located near the sea shore with a lot of the sand (Manal) and hence the temple tank is known as Manarkulam. In India... </p>
              <ul>
                <li class="flr"><strong><a title="Full Info" href="#">Go Ahead</a></strong></li>
              </ul>
            </div>
            <div class="clr"></div>
          </div>
          <div class="tmp_region_right_top">
            <div class="tmp_region_right_top_left"> <span> <img title="Region" alt="Region" src="<?php echo $layout_asset; ?>/images/theme-region.png"> </span> </div>
            <div class="tmp_region_right_top_right">
              <p> <strong>Region</strong> In the year 1688, the French builtandnbsp in a fort . Behind this fort, the Manakula Vinayakar temple was built. The temple is located near the sea shore with a lot of the sand (Manal) and hence the temple tank is known as Manarkulam. In India... </p>
              <ul>
                <li class="flr"><strong><a title="Full Info" href="#">Go Ahead</a></strong></li>
              </ul>
            </div>
            <div class="clr"></div>
          </div>
          <div class="tmp_region_right_top">
            <div class="tmp_region_right_top_left"> <span> <img title="Map" alt="Map" src="<?php echo $layout_asset; ?>/images/theme-map.png"> </span> </div>
            <div class="tmp_region_right_top_right">
              <p> <strong>Map</strong> In the year 1688, the French builtandnbsp in a fort . Behind this fort, the Manakula Vinayakar temple was built. The temple is located near the sea shore with a lot of the sand (Manal) and hence the temple tank is known as Manarkulam. In India... </p>
              <ul>
                <li class="flr"><strong><a title="Full Info" href="#">Go Ahead</a></strong></li>
              </ul>
            </div>
            <div class="clr"></div>
          </div>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
