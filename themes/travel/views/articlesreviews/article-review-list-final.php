<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/custom.js', CClientScript::POS_HEAD);
		
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery-1.6.3.min.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/easyResponsiveTabs.js', CClientScript::POS_HEAD);
		
		
?>

<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
    <div class="theme-slogan">
      <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> 
      	<span> 
        	<a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="Contribute an Article" title="Contribute an Article"><?php echo t('Contribute an Article'); ?></a> 
            <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"><?php echo t('Rate & Review Temples'); ?></a> 
        </span> 
      </div>
      <div class="clr"></div>
    </div>
    <div class="temple_content_section">
      <div class="temple_content_left">
        <div class="temple_content_description">
          <h1>Contribute Article</h1>
          <div class="theme-god">
                    	<div id="horizontalTab">
                            <ul class="resp-tabs-list">
                                <li>Rating</li>
                                <li>Article</li>
                            </ul>
                            <div class="resp-tabs-container">
                                <div>
                                    <div class="temple_contribute">
                                    	<h2>Sri Thanjai Mamani Koil, Maha Vishnu Temple</h2>
                                        <p>
                                            <span>
                                                <img alt="" src="images/rating-star.gif">
                                            </span>
                                        </p>
                                        <p>Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river. Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance. Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river. Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance.</p>
                                        <a href="#">Read More</a>
                        			</div>
                                    <div class="temple_contribute">
                                    	<h2>Sri Thanjai Mamani Koil, Maha Vishnu Temple</h2>
                                        <p>
                                            <span>
                                                <img alt="" src="images/rating-star.gif">
                                            </span>
                                        </p>
                                        <p>Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river. Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance. Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river. Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance.</p>
                                        <a href="#">Read More</a>
                        			</div>
                                    <div class="temple_contribute">
                                    	<h2>Sri Thanjai Mamani Koil, Maha Vishnu Temple</h2>
                                        <p>
                                            <span>
                                                <img alt="" src="images/rating-star.gif">
                                            </span>
                                        </p>
                                        <p>Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river. Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance. Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river. Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance.</p>
                                        <a href="#">Read More</a>
                        			</div>
                                    <div class="temple_contribute bNone">
                                    	<a href="#" class="add-buttton">Add Your Rating</a>
                                        <div class="clr"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="temple_contribute">
                                        <h2 class="pad20">Sri Thanjai Mamani Koil, Maha Vishnu Temple <span>Written by, <strong>Anbarasan</strong>.</span></h2>
                                        <div class="article_date_time pad20">
                                            <ul>
                                                <li><img alt="" src="images/calender.gif"> June 05th, 2014</li>
                                                <li><img alt="" src="images/small-time-icon.gif"> 02:41 pm</li>
                                                <li><img alt="" src="images/comments-icon.gif"> Comments</li>
                                            </ul>
                                        </div>
                                          <p><em><img alt="" src="images/realted01.jpg"></em>Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river . Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance.</p>
                                         <a href="#" class="read">Read More</a>
                                         
                                	</div>
                                    <div class="temple_contribute bNone">
                                    <h2 class="pad20">Sri Thanjai Mamani Koil, Maha Vishnu Temple <span>Written by, <strong>Anbarasan</strong>.</span></h2>
                                        <div class="article_date_time pad20">
                                            <ul>
                                                <li><img alt="" src="images/calender.gif"> June 05th, 2014</li>
                                                <li><img alt="" src="images/small-time-icon.gif"> 02:41 pm</li>
                                                <li><img alt="" src="images/comments-icon.gif"> Comments</li>
                                            </ul>
                                        </div>
                                         <p><em><img alt="" src="images/realted01.jpg"></em>Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river . Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance.</p>
                                         <a href="#" class="read">Read More</a>
                                    </div>
                                    <div class="temple_contribute bNone">
                                    	<a href="#" class="add-buttton">Add Your Articles</a>
                                        <div class="clr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    	 
                    </div>
          
        </div>
      </div>
      <div class="temple_content_right">
        <div class="tmp_details">
          <?php $this->renderPartial('//layouts/recent-article-right-pane',array('layout_asset'=>$layout_asset)); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
