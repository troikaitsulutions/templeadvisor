<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		$list = (isset($_GET['list'])) ? $_GET['list'] : ''; 
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
                                                <h2 class="entry-title">
												<?php echo $Contributemyarticles->heading; ?></h2>
                                                <div class="excerpt-container article">
                                                    <p><?php echo $Contributemyarticles->content1 ; ?></p>
                                                </div>
                                                <div class="post-meta">
                                                   
                                                    <div class="entry-author fn">
                                                        <i class="icon soap-icon-user"></i> Posted By:
                                                        <a href="#" class="author"><?php echo $Contributemyarticles->name; ?></a>
                                                    </div>
                                                    <div class="entry-action">
                                                        <a href="#" class="button entry-comment btn-small"><i class="soap-icon-calendar-1"></i><span><?php echo date("M d,Y h:i A",$Contributemyarticles->created); ?></span></a>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="sidebar col-sm-4 col-md-3">
                        <div class="travelo-box">
                            <h5 class="box-title">Search Articles</h5>
                            <div class="with-icon full-width">
                                <input type="text" class="input-text full-width" placeholder="Article name or Content">
                                <button class="icon custom-bg white-color"><i class="soap-icon-search"></i></button>
                            </div>
                        </div>
                        
        <?php $this->renderPartial('//layouts/recent-article-right-pane',array('layout_asset'=>$layout_asset)); ?>
                        
                        
                       
                    </div>
                </div>
            </div>
        </section>


