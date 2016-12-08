<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
			
?>
<section id="content">
  <div class="container">
    <div class="row">
      <div id="main" class="col-sm-8 col-md-9">
        <div class="page">
          <div class="post-content">
            <div class="blog-infinite">
              <div class="post">
                <div class="post-content-wrapper">
                  <div class="details">
                    <h2 class="entry-title"><?php echo $meta->h2; ?></h2>
                    <div class="excerpt-container">
                      <p><?php echo $page->content; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php  $this->renderPartial('//layouts/contact-address-right-pane',array('layout_asset'=>$layout_asset));  ?>
    </div>
  </div>
</section>
