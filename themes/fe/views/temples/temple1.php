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
      <div class="theme-slogan-right"> <span><a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="Contribute an Article" title="Contribute an Article"><?php echo t('Contribute an Article'); ?></a> <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"> <?php echo t('Write a Review'); ?></a> </span> </div>
      <div class="clr"></div>
    </div>
    <div class="theme-part">
      <div class="tmp_region_left">
        
          <?php $this->renderPartial('//layouts/overview-left-pane',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
        
      </div>
      <div class="tem_reg_mid_sec">
          <div class="tmp_region_right_top">
            <div class="tmp_region_right_top_left"> <span><a href="<?php echo Yii::app()->createUrl('temples/bytheme'); ?>"><img title="Themes" alt="Themes" src="<?php echo $layout_asset; ?>/images/theme-god.jpg"></a> </span> </div>
            <div class="tmp_region_right_top_right">
            <a title="Themes" href="<?php echo Yii::app()->createUrl('temples/bytheme'); ?>" class="button">
            
              <p> <strong><?php echo t('Search By Themes'); ?></strong> </p>       </a> 
              <div class="serchbytheme">Locate temples using a favourate theme option - Deities, History or Beliefs. </div>      
            </div>
            <div class="clr"></div>
          </div>
          <div class="tmp_region_right_top">
            <div class="tmp_region_right_top_left"> <span><a href="<?php echo Yii::app()->createUrl('temples/byregion'); ?>"><img title="Region" alt="Region" src="<?php echo $layout_asset; ?>/images/theme-region.png"></a></span> </div>
            <div class="tmp_region_right_top_right"><a title="Go Ahead" href="<?php echo Yii::app()->createUrl('temples/byregion'); ?>"class="button">
              <p> <strong><?php echo t('Search By Region'); ?></strong> </p>
              </a>
              <div class="serchbytheme">Locate temples using a region sort - Northern, Southern, Western and Eastern India. </div>
            </div>
            <div class="clr"></div>
          </div>
          <div class="tmp_region_right_top">
            <div class="tmp_region_right_top_left"> <span><a href="<?php echo Yii::app()->createUrl('temples/bymap'); ?>"><img title="Map" alt="Map" src="<?php echo $layout_asset; ?>/images/theme-map.png"></a></span> </div>
            <div class="tmp_region_right_top_right"><a title="Go Ahead" href="<?php echo Yii::app()->createUrl('temples/bymap'); ?>" class="button">
              <p> <strong><?php echo t('Search By Map'); ?></strong> </p>
              </a>
              <div class="serchbytheme">Use the zoom option to locate your favourate temples on a street map. </div>
            </div>
            <div class="clr"></div>
          </div>
      </div>
      <div class="tem_reg_right_sec">
            <div class="tmp_ads">            	
                <div class="tmp_ads_content">
                    <img src="<?php echo $layout_asset; ?>/images/ad1.jpg" alt=""><br>
                    <img src="<?php echo $layout_asset; ?>/images/ad2.jpg" alt="">
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
