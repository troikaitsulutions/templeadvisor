<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		
?>
<div class="about-author block">
                                
                                <div class="about-author-container">
                                    <div class="about-author-content">
                                        <div class="avatar">
                                            <img src="<?php echo $layout_asset; ?>/images/testi-man.png" width="96" height="96" alt="">
                                        </div>
                                        <div class="description">
                                            <h4><?php echo $data->heading; ?></h4>
                                            <p><?php echo $data->comment; ?></p>
                                        </div>
                                    </div>
                                    
									
									 <div class="post-meta">
                                                   
                                                    <div class="entry-author fn">
                                                        <i class="icon soap-icon-user"></i> Posted By:
                                                        <a href="#" class="author"><?php echo $data->name; ?></a>
                                                    </div>
                                                    <div class="entry-action">
                                                        <a href="#" class="button entry-comment btn-small"><i class="soap-icon-calendar-1"></i><span><?php echo date("M d,Y h:i A",$data->created); ?></span></a>
                                                        <!--
														<a href="#" class="button btn-small"><i class="soap-icon-wishlist"></i><span></span></a>
                                                        
														<span class="entry-tags"><i class="soap-icon-features"></i><span><a href="#">Adventure</a>, <a href="#">Romance</a></span></span>
														-->
                                                    </div>
                                                </div>
									
                                </div>
                            </div>
							<hr>