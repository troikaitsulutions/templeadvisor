<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
?>
<body class="home blog two-column right-sidebar" data-twttr-rendered="true">
<div id="page">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
  <div id="main" class="site-main container_16">
    <div class="inner">    	
      <div id="primary" class="grid_11 suffix_1">      	
        <div class="map-declare">
       		<!--Circle start --> 
            <ul class="temp-circle-cont">					
					<li>
                    	<div class="temp-circ-icons temp-circle-icons-1"><h3>Themes</h3></div>
						<div class="temp-circle-radius temp-circle-1">
							<div class="temp-circle-title">
								<img src="/assets/5b7d812e/images/themes.png" alt="Plan your trip" />				
							</div>
						</div>
					</li>
                    <li>
                    	<div class="temp-circ-icons temp-circle-icons-2"><h3>Region</h3></div>
						<div class="temp-circle-radius temp-circle-2">
							<div class="temp-circle-title">
								<img src="/assets/5b7d812e/images/temple.png" alt="Temples" />					
							</div>
						</div>
					</li>
					<li>
                    	<div class="temp-circ-icons temp-circle-icons-3"><h3>Map</h3></div>
						<div class="temp-circle-radius temp-circle-3">
							<div class="temp-circle-title">
									<img src="/assets/5b7d812e/images/map.png" alt="Articles &amp; Photos" />				
							</div>
						</div>
					</li>
				</ul>
                <!--Circle end --> 
        </div>
      
        <?php
			//$Temples = Temples::GetAllList();
			
			if ( isset($Temples) && count($Temples)>0 ) {
				foreach ( $Temples as $Temple ) {
		?>
        <article class="list">
          <div class="short-content">
            <?php if ( Gallery::GetPropThumbnail($Temple->id) ) { $img_src = Gallery::GetPropThumbnail($Temple->id); } else {  $img_src = $layout_asset.'/images/no-image.jpg'; } ?>
            <figure> <a title="<?php echo $Temple->name; ?>" href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$Temple->id)); ?>"> <img width="272" height="150" src="<?php echo $img_src; ?>" class="wp-post-image" alt="<?php echo $Temple->name; ?>">
              <div class="mask radius">
                <div class="mask-square"><i class="icon-tint"></i></div>
              </div>
              </a> </figure>
            <h1 class="entry-header"> <a title="<?php echo $Temple->name; ?>" href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$Temple->id)); ?>"><?php echo $Temple->name; ?></a> </h1>
            <div class="short-description">
              <p><?php echo substr( xml_clear($Temple->content1) ,0,250); ?>,..</p>
            </div>
            <div class="entry-meta">
              <p class="sponsors fleft"><i class="icon-heart-empty"></i> 2 Sponsors</p>
              <p class="fund fleft"><i class="icon-credit-card"></i> 10,000 Likes </p>
              <a class="buttons fright " href="#" title="Donate for this Cause">Full Info</a> </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </article>
        <?php } } ?>
        <ul class="pagination">
        <?php $this->widget('application.components.SimplaPager', array('pages'=>$pages)); ?>
        </ul>
      </div>
      <?php $this->renderPartial('//layouts/right-side-bar',array('layout_asset'=>$layout_asset)); ?>
      <div class="clear"></div>
    </div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
