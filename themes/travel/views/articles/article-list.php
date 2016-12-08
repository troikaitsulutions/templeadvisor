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
                                <div class="blog-infinite articles">
                                    <?php
										$this->widget('zii.widgets.CListView', array(
										'dataProvider'=>$model->search(),
										'itemView'=>'_article',
										'id' => 'ArticleList',
										'summaryText' => 'Showing {start} to {end} of {count} Articles',
										'ajaxUpdate' => true,  // This is it.
										'pager'=>array('header'=>'<h5>Article Page </h5>'),
										'htmlOptions' => array('class' => 'grid-view rounded'),
										)); 					
									?> 
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


