
<div class="arrow_box">
  <h1 class="logo"><?php echo t('Explore the Top Temples'); ?></h1>
</div>
<div class="temple_theme_slider">
  <!--
  <div class="tmp_left_arrow"><a href="#"><img alt="Previous" src="<?php echo $layout_asset; ?>/images/circle-left-arrow.png"></a></div>
  -->
  <div class="tmp_mid_slider">
    <?php $Featured = Temples::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND addtohome = 1',
			'order'=>'rand',
			'limit'=>5));
		  	if( isset($Featured) && count($Featured)>0 ) {
				foreach ( $Featured as $ft ) { 
		   ?>
    <a class="tmp_slider1" href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$ft->id));?>"><img src="<?php echo Gallery::GetPropThumbnail($ft->id); ?>" alt="<?php echo $ft->name; ?>" title="<?php echo $ft->name; ?>" /></a>
    <?php } } ?>
  </div>
 <!-- 
  <div class="tmp_right_arrow"><a href="#"><img alt="Next" src="<?php echo $layout_asset; ?>/images/circle-right-arrow.png"></a></div>
 -->
</div>
</div>
