<footer id="colophon" class="site-footer" role="contentinfo">
  <div id="tertiary" class="sidebar-container" role="complementary">
    <div class="container_16"> 
      
      <!-- First Widget Area -->
      <div class="grid_4 contact_us">
        <aside id="meta-0" class="one-fourth">
          <h3><?php echo t('Contact us'); ?></h3>
          <address class="vcard">
          <p class="adr"> <span class="llp">Temple Advisor</span> NO.50, First Floor,<br>
            <span class="street-address"> Ramasamy Street, Valasaravakkam,</span><br>
            <span class="region"> Chennai - 87,</span> <span class="postal-code"> Tamil Nadu,</span> <span class="country-name"> India,</span> </p>
          	<p>Phone:<span class="tel"> +91 44 2486 1244</span><br />
            E-mail:<span class="email"> <a href="mailto:info@templeadvisor.com">info@templeadvisor.com</a></span><br />
            Website:<span class="url"> <a href="http://www.templeadvisor.com">www.templeadvisor.com</a></span><br />
          </p>
          </address>
        </aside>
      </div>
      
      <!-- Second Widget Area -->
      <div class="grid_4 company_policy">
        <aside id="meta-1" class="widget widget_meta">
          <h3><?php echo t('Company Policy'); ?></h3>
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
            
            <?php
		 	$page = Page::model()->findByPk(70);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="<?php echo Yii::app()->createUrl('site/sitemap')?>" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
            <?php } } ?>   
            
            
           
          </ul>
        </aside>
      </div>
      
      <!-- Third Widget Area -->
      <div class="grid_4 get_involved">
        <aside id="meta-2" class="widget widget_meta ">
          <h3><?php echo t('Get involved'); ?></h3>
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
            
             <?php
		 	$page = Page::model()->findByPk(65);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="#" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
            <?php } } ?>   
           
            <?php
		 	$page = Page::model()->findByPk(57);
		    if( isset($page) && count($page)>0 ) { 
		  	$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) { ?>
            <li><a href="#" title="<?php echo $meta->mainmenu; ?>" ><?php echo $meta->mainmenu; ?></a></li>
            <?php } } ?>   
            
            
          </ul>
        </aside>
      </div>
      
      <!-- Forth Widget Area -->
      <div class="grid_4">
        <aside id="meta-2" class="widget widget_meta social_icons">
          <h3><?php echo t('Our Social Network'); ?></h3>
          <ul>
            <li><img src="<?php echo $layout_asset; ?>/images/facebook.png" /> <a href="https://www.facebook.com/templeadvisor" title="Join us on Facebook" target="_blank" >Join us on Facebook</a></li>
            <li><img src="<?php echo $layout_asset; ?>/images/twitter.png" /> <a href="https://twitter.com/TempleAdvisor" title="Follow us on Twitter"  target="_blank">Follow us on Twitter</a></li>
            <li><img src="<?php echo $layout_asset; ?>/images/google_plus.png" /> <a href="https://plus.google.com/u/0/b/103046096673301887495/103046096673301887495/posts" title="Add us on Google+"  target="_blank">Add us on Google+</a></li>
            <!--	<li><img src="<?php echo $layout_asset; ?>/images/rss.png" /> <a href="#" title="Grab the RSS Feed">Grab the RSS Feed</a></li> -->
          </ul>
        </aside>
      </div>
      
      <!-- Fiveth Widget Area -->     
      <div class="grid_4 newsletter">
        <aside>
          <div class="mail"> <img src="<?php echo $layout_asset; ?>/images/mail.png" /> <?php echo t('Events Newsletter'); ?> </div>
          <form method="GET" action="<?php echo Yii::app()->createUrl('site/subscribeemail')?>">
          <div class="send_mail">
            <input class="email" name="email" placeholder="Email Id">
            <input type="submit" title="Subscribe" value="Subscribe" class="subcribe">
          </div>
          </form>
        </aside>
      </div>
      
      <div class="clear"></div>
    </div>
  </div>
  
  <!-- Site Info -->
  <div class="site-info">
    <p class="copy">Copyright &copy; <?php echo date('Y',time()); ?>.  All Rights reserved. </p>
  </div>
  <!-- .site-info --> 
</footer>
