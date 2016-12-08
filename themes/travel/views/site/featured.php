<?php
	$featured = Temples::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND addtohome = 1',
			'order'=>'rand',
			'limit'=>4
	)); 
?>

<div class="grid_16 third-home-widget-area">
  <aside id="wpltfbs-f2w" class="widget WPlookCauses">
    <div class="widget-title">
      <h3><?php echo t('Featured Temples'); ?></h3>
      <div class="viewall fright"><a href="#" class="radius" title="View all chauses"><?php echo 'view all'; ?></a></div>
      <div class="clear"></div>
    </div>
    <div class="widget-causes-body"> 
      <!-- First cause -->
      <?php if( ($featured) ) {
        		foreach ($featured as $f) {
	    ?>
      <article class="cause-item">
      <?php if ( Gallery::GetPropThumbnail($f->id) ) { $img_src = Gallery::GetPropThumbnail($f->id); } else {  $img_src = $layout_asset.'/images/no-image.jpg'; } ?>
        <figure> <a title="<?php echo $f->name; ?>" href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$f->id)); ?>"> <img width="272" height="150" src="<?php echo $img_src; ?>" class="wp-post-image" alt="<?php echo $f->name; ?>">
          <div class="mask radius">
            <div class="mask-square"><i class="icon-tint"></i></div>
          </div>
          </a> </figure>
        <h3 class="entry-header"> <a title="<?php echo $f->name; ?>" href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$f->id)); ?>"><?php echo $f->name; ?></a> </h3>
        <div class="short-description">
          <p><?php echo substr( xml_clear($f->content1) ,0,150); ?>,..</p>
        </div>
      </article>
      <?php } } ?>
    </div>
  </aside>
</div>
<div class="clear"></div>
