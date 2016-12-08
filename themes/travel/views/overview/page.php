<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		$list = (isset($_GET['list'])) ? $_GET['list'] : ''; 
			?>


<section id="content">
  <div class="container">
    
    <div id="main">
      <div class="row">
        <div class="col-sm-4 col-md-3">
          
		<div class="toggle-container filters-container1">
          
            <div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#region-filter">Overview</a> </h4>
              <div id="region-filter" class="panel-collapse collapse in">
                <div class="panel-content">
                  <ul class="check-square filters-option">
                    
			<?php 
				$overviews1 = Overview::model()->findByPk(1513);
				if(isset($overviews1) && count($overviews1)>0 ) {
						$seo1 = Seo::model()->find(array('condition'=>'uid=:UID','params'=>array(':UID'=>$overviews1->uid)));
			?>			
				<?php if ( $seo1->slug == $list) { ?>
				<li class="active" id="<?php echo $overviews1->id; ?>" ><a href="<?php echo Yii::app()->createUrl('overview/index',array('list'=>$seo1->slug)); ?>"> <?php echo $overviews1->title; ?>  </a></li>
				<?php } else { ?>
				
				<li id="<?php echo $overviews1->id; ?>" ><a href="<?php echo Yii::app()->createUrl('overview/index',array('list'=>$seo1->slug)); ?>"> <?php echo $overviews1->title; ?>  </a></li>\
				
				<?php } ?>
				
								
			<?php } ?>   
			
			<?php 
				$overviews1 = Overview::model()->findByPk(1514);
				if(isset($overviews1) && count($overviews1)>0 ) {
						$seo1 = Seo::model()->find(array('condition'=>'uid=:UID','params'=>array(':UID'=>$overviews1->uid)));
			?>		
				
				<?php if ( $seo1->slug == $list) { ?>
				
				<li class="active" id="<?php echo $overviews1->id; ?>" ><a href="<?php echo Yii::app()->createUrl('overview/index',array('list'=>$seo1->slug)); ?>"> <?php echo $overviews1->title; ?>  </a></li>
				
				<?php } else { ?>	
				
				<li id="<?php echo $overviews1->id; ?>" ><a href="<?php echo Yii::app()->createUrl('overview/index',array('list'=>$seo1->slug)); ?>"> <?php echo $overviews1->title; ?>  </a></li>
				
				<?php } } ?>   
						
                  </ul>
                </div>
              </div>
            </div>
			
			 <div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#overview-filter2">Hindu</a> </h4>
              <div id="overview-filter2" class="panel-collapse collapse in">
                <div class="panel-content">
                  <ul class="check-square filters-option">
                    
			<?php 
				$overviews = Overview::model()->findAll(array('condition'=>'status=1 AND  id != 1513 AND id !=1514','params'=>array(':UID'=>$meta->uid)));
				
				if(isset($overviews) && count($overviews)>0 ) {
					
					foreach ($overviews as $overview) {
						
						$seo = Seo::model()->find(array('condition'=>'uid=:UID','params'=>array(':UID'=>$overview->uid)));
			?>		
				
				<?php if ( $seo->slug == $list) { ?>
				<li class="active" id="<?php echo $overview->id; ?>" ><a href="<?php echo Yii::app()->createUrl('overview/index',array('list'=>$seo->slug))?>"> <?php echo $overview->title; ?>  </a></li>
					<?php } else { ?>
					<li id="<?php echo $overview->id; ?>" ><a href="<?php echo Yii::app()->createUrl('overview/index',array('list'=>$seo->slug))?>"> <?php echo $overview->title; ?>  </a></li>	
					<?php } } } ?>   
                  </ul>
                </div>
              </div>
            </div>
        </div>
        </div>
        
		<div class="col-sm-8 col-md-9 box">
		<div class="page">
          <div class="post-content">
            <div class="blog-infinite">
              <div class="post">
                <div class="post-content-wrapper">
                  <div class="details overview">
                    <h2 class="entry-title"><?php echo $meta->h2; ?></h2>
                    <div class="excerpt-container">
                      <p><?php echo $page->description; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>


