<div class="bannerSlider-section">
    <div id="banner">
      <div id="demo" class="skdslider">
        <ul>
          <li><img src="<?php echo $layout_asset; ?>/images/banner/1.JPG" alt="" /> </li>
          <li><img src="<?php echo $layout_asset; ?>/images/banner/2.jpg" alt="" /> </li>
          <li><img src="<?php echo $layout_asset; ?>/images/banner/3.jpg" alt="" /> </li>
          <li><img src="<?php echo $layout_asset; ?>/images/banner/4.jpg" alt="" /> </li>
          <li><img src="<?php echo $layout_asset; ?>/images/banner/5.jpg" alt="" /> </li>
          <li><img src="<?php echo $layout_asset; ?>/images/banner/6.jpg" alt="" /> </li>
          <li><img src="<?php echo $layout_asset; ?>/images/banner/7.jpg" alt="" /> </li>
          <li><img src="<?php echo $layout_asset; ?>/images/banner/8.jpg" alt="" /> </li>
        </ul>
      </div>
      
      <div class="banner-right-new">
      <ul>
      <li><a href="<?php echo Yii::app()->createUrl('temples')?>" title="Temples" <?php echo ((Yii::app()->controller->id == 'temples')) ? 'class="current_page_item"' : ''; ?> ><img src="<?php echo $layout_asset; ?>/images/homebannerright/temple-home-new.jpg" alt="temple" /></a></li>
      <li><a href="#" title="Coming Soon"><img src="<?php echo $layout_asset; ?>/images/homebannerright/plan-home-new.jpg" alt="Coming Soon" /></a></li>
      <li><a href="<?php echo Yii::app()->createUrl('articles')?>" > <img src="<?php echo $layout_asset; ?>/images/homebannerright/articles-home-new.jpg" alt="articles" /></a></li>
      </ul>
      </div>
      
      <div style="clear:both;"></div>
    </div>
  <div style="clear:both;"></div>
  </div>