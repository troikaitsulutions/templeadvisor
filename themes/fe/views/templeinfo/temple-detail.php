<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
	
?>

<body class="home blog two-column right-sidebar" data-twttr-rendered="true">
<div id="page">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
  
  <!-- Small Teaser -->
  
  <div id="main" class="site-main container_16">
    <div class="inner">
      <div id="primary" class="grid_11 suffix_1">
        <article class="single">
          <div class="entry-content">
            <figure> <img width="848" height="352" src="images/temp/big-04.jpg" class="wp-post-image" alt="Image alt">
              <div class="mask-open radius">
                <div class="square-info radius">
                  <div class="square-info-margins">
                    <div class="progress-detailes"> <span class="progress-percent radius fleft">33%<span class="arrow"></span></span> <span class="progress-money radius fright">$7,567,000<span class="arrow"></span></span>
                      <div class="clear"></div>
                    </div>
                    <progress max="100" value="33"></progress>
                    <div class="meta fleft">
                      <p class="sponsors"><i class="icon-heart-empty"></i> 83 Sponsors</p>
                      <p class="fund"><i class="icon-credit-card"></i> $2,479,000 </p>
                    </div>
                    <div class="fright"> <a class="buttons fright " href="#" title="Donate for this Cause">Donate <i class="icon-tint"></i></a> </div>
                    <div class="clear"></div>
                  </div>
                </div>
              </div>
            </figure>
            <div class="long-description">
              <h3>Education provides children with opportunities to escape poverty, gain a voice in their community and experience a better quality of life. But worldwide, more than 120 million children are unable to attend school. </h3>
              <br />
              <p>Pellentesque ut porta libero. Curabitur non auctor nisi. Maecenas turpis diam, egestas eget dictum id, condimentum nunc. Fusce tempor in purus sed mattis. Nulla cursus eleifend eros sit amet tempor. Donec nisl lacus, ornare sed velit id, accumsan feugiat est. Mauris bibendum libero ac luctus tincidunt.</p>
              <p>Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec neque nisi, facilisis id nulla ut, laoreet hendrerit elit. Suspendisse ligula ipsum, rhoncus et facilisis lobortis, vulputate sit amet turpis. Pellentesque ut porta libero. Curabitur non auctor nisi. Maecenas turpis diam, egestas eget dictum id, malesuada condimentum nunc. Fusce tempor in purus sed mattis. Nulla cursus eleifend eros sit amet tempor.
                Donec nisl lacus, ornare sed velit id, accumsan feugiat est. Mauris bibendum libero ac luctus tincidunt.</p>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </article>
      </div>
      <?php $this->renderPartial('//layouts/right-side-bar',array('layout_asset'=>$layout_asset)); ?>
    </div>
  </div>
  
  <!-- Footer -->
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
  <!-- #colophon .site-footer --> 
  
</div>
<!-- /#page -->
</body>
