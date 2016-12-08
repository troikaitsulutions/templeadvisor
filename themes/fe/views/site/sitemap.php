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
    
    <div class="theme-slogan">
       <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="Contribute an Article" title="Contribute an Article"><?php echo t('Contribute an Article'); ?></a> <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"><?php echo t('Rate & Review Temples'); ?></a>  </span> </div>
      <div class="clr"></div>
    </div>
    
    <div class="temple_content_section">
    
    <div class="sitemap">
    <h1><?php echo $meta->h1; ?></h1>
    
    <div class="sitemap-one">
    <div class="sitemap-one-sec">
    <h4><a href="<?php echo FRONT_SITE_URL; ?>" title="Home" <?php echo ((Yii::app()->controller->id == 'site') && (Yii::app()->controller->action->id == 'index')) ? 'class="current_page_item"' : ''; ?> ><?php echo t('Home'); ?></a></h4>
    <h4><a href="<?php echo Yii::app()->createUrl('temples')?>" title="Temples" <?php echo ((Yii::app()->controller->id == 'temples')) ? 'class="current_page_item"' : ''; ?> ><?php echo t('Temples'); ?></a></h4>
    <ul>
    <li><a href="<?php echo Yii::app()->createUrl('temples/bytheme'); ?>">Search By Themes</a></li>
    <li><a href="<?php echo Yii::app()->createUrl('temples/byregion'); ?>">Search By Region</a></li>
    <li><a href="<?php echo Yii::app()->createUrl('temples/bymap'); ?>">Search By Map</a></li>
    </ul>
   </div>
    <div class="sitemap-one-sec">
    <h4>Company</h4>
    <ul>
    <?php
		    $page = Page::model()->findByPk(56);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="<?php echo Yii::app()->createUrl('site/aboutus')?>" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
			<?php } } ?>
   <?php
		 	$page = Page::model()->findByPk(71);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="<?php echo Yii::app()->createUrl('site/termsconditions')?>" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
            <?php } } ?>   
            
             <?php
		 	$page = Page::model()->findByPk(61);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="<?php echo Yii::app()->createUrl('site/privacypolicy')?>" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
            <?php } } ?>   
            
             <?php
		 	$page = Page::model()->findByPk(62);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="<?php echo Yii::app()->createUrl('site/disclaimer')?>" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
            <?php } } ?>  
    </ul>
    </div>
     <div class="sitemap-one-sec">
    <h4>Get involved</h4>
    <ul>
     <?php
		 	$page = Page::model()->findByPk(72);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="<?php echo Yii::app()->createUrl('site/writereviews')?>" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
            <?php } } ?>   
            
            <?php
		 	$page = Page::model()->findByPk(64);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
            <?php } } ?>   
          
          
           <?php
		 	$page = Page::model()->findByPk(69);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="<?php echo Yii::app()->createUrl('articles')?>" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
            <?php } } ?>   
           
            <?php
		 	$page = Page::model()->findByPk(67);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="<?php echo Yii::app()->createUrl('temples/gallery')?>" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
            <?php } } ?>   
    </ul>
    </div>
    <div class="sitemap-one-sec">
    <h4>Contact</h4>
    <ul>
     <li><a href="<?php echo Yii::app()->createUrl('site/generalenquiry')?>"><?php echo t('General Enquiry'); ?></a></li>
              <li><a href="<?php echo Yii::app()->createUrl('site/businessenquiry')?>"><?php echo t('Business Enquiry'); ?></a></li>
    </ul>
    </div>
    </div>
    
    <div class="sitemap-two">
    <h4>List of Temples</h4>
    <ul>
    <?php $Featured = Temples::model()->findAll(array('condition'=>'status = 1'));
		  	if( isset($Featured) && count($Featured)>0 ) {
				foreach ( $Featured as $ft ) { 
		   ?>
        <li> <a href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$ft->id));?>"> <?php echo $ft->name; ?>  </a> </li>
    <?php } } ?>
    </ul>
    </div>
    
      
    </div>
    
    </div>
  </div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
