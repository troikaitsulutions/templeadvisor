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
          <h1><?php echo t('Contribute an Article'); ?></h1>
          <div class="theme-god">
                    	<div id="horizontalTab">
                            <ul class="resp-tabs-list">
                                <li>Rating</li>
                                <li>Article</li>
                            </ul>
                            <div class="resp-tabs-container">
                                <div>
                                    <div class="temple_contribute">
                                    	<h4>Sri Thanjai Mamani Koil, Maha Vishnu Temple</h4>
                                        <p>
                                            <span>
                                                <img alt="" src="<?php $layout_asset; ?>images/rating-star.gif">
                                            </span>
                                        </p>
                                        <p>Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river. Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance. Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river. Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance.</p>
                                        <a href="#">Read More</a>
                        			</div>
                                    <div class="temple_contribute">
                                    	<h4>Sri Thanjai Mamani Koil, Maha Vishnu Temple</h4>
                                        <p>
                                            <span>
                                                <img alt="" src="<?php $layout_asset; ?>images/rating-star.gif">
                                            </span>
                                        </p>
                                        <p>Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river. Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance. Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river. Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance.</p>
                                        <a href="#">Read More</a>
                        			</div>
                                    <div class="temple_contribute">
                                    	<h4>Sri Thanjai Mamani Koil, Maha Vishnu Temple</h4>
                                        <p>
                                            <span>
                                                <img alt="" src="<?php $layout_asset; ?>images/rating-star.gif">
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
                                        <h1 class="pad20">Sri Thanjai Mamani Koil, Maha Vishnu Temple <br><span>Written by, <strong>Anbarasan</strong>.</span></h1>
                                        <div class="article_date_time pad20">
                                            <ul>
                                                <li><img alt="" src="<?php $layout_asset; ?>/images/calender.gif"> June 05th, 2014</li>
                                                <li><img alt="" src="<?php $layout_asset; ?>/images/small-time-icon.gif"> 02:41 pm</li>
                                                <li><img alt="" src="<?php $layout_asset; ?>/images/comments-icon.gif"> Comments</li>
                                            </ul>
                                        </div>
                                          <p><em><img alt="" src="<?php $layout_asset; ?>/images/realted01.jpg"></em>Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river . Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance.</p>
                                         <a href="#" class="read">Read More</a>
                                         
                                	</div>
                                    <div class="temple_contribute bNone">
                                    <h1 class="pad20">Sri Thanjai Mamani Koil, Maha Vishnu Temple <br><span>Written by, <strong>Anbarasan</strong>.</span></h1>
                                        <div class="article_date_time pad20">
                                            <ul>
                                                <li><img alt="" src="<?php $layout_asset; ?>/images/calender.gif"> June 05th, 2014</li>
                                                <li><img alt="" src="<?php $layout_asset; ?>/images/small-time-icon.gif"> 02:41 pm</li>
                                                <li><img alt="" src="<?php $layout_asset; ?>/images/comments-icon.gif"> Comments</li>
                                            </ul>
                                        </div>
                                         <p><em><img alt="" src="<?php $layout_asset; ?>/images/realted01.jpg"></em>Once sage Parasara sprayed nectar that he obtained from the ocean of milk in the Manimutha river . Then he built a ashram on the banks of the river and started performing penance with other sages. There were three demons- Thanjakan, Thandakan and Tharakasura who had got the deadliest boons from lord Shiva. They began to create obstacles to the  penance.</p>
                                         <a href="#" class="read">Read More</a>
                                    </div>
                                    <div class="temple_contribute bNone">
                                    	<a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>" class="add-buttton">Add Your Articles</a>
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
