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
    <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset,'meta' => $meta)); ?>
    <div class="temple_content_section">
        	<div class="temple_content_left">
            	<div class="temple_content_description">
                	<h1>Write a Review</h1>
                    <div class="temple_review">
                    	<div class="temple_review_page">
                    	<p>
                        	<label>Temple Name:</label>
                            <input type="text" name="">
                        </p>
                        <p>
                        	<label>Name:</label>
                            <input type="text" name="">
                        </p>
                        <p>
                        	<label>Email ID:</label>
                            <input type="text" name="">
                        </p>
                        <p>
                        	<label>Drive Power:</label>
                            <span>
                            	<img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                            </span>
                            <em>Low <span>High</span></em>
                        </p>
                        <p>
                        	<label>Popularity:</label>
                            <span>
                            	<img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                            </span>
                            <em>Low <span>High</span></em>
                        </p>
                        <p>
                        	<label>Accessibility:</label>
                            <span>
                            	<img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                            </span>
                            <em>Low <span>High</span></em>
                        </p>
                        <p>
                        	<label>Facility and Food:</label>
                            <span>
                            	<img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                            </span>
                            <em>Low <span>High</span></em>
                        </p>
                        <p>
                        	<label>Cleanliness:</label>
                            <span>
                            	<img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                                <img alt="" src="<?php echo $layout_asset; ?>/images/star-rating.jpg">
                            </span>
                            <em>Low <span>High</span></em>
                        </p>
                        <p>
                        	<label>Comments:</label>
                            <textarea rows="3"></textarea>
                        </p>
                        <p>
                            <label>&nbsp;</label>
                            <input type="Submit" value="Send" name="">
                        </p>
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="temple_content_right">
            	
                <div class="tmp_details">
                	<h2><img alt="" src="<?php echo $layout_asset; ?>/images/bell-icon.png"> Recent Reviews  </h2>
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
  </div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
