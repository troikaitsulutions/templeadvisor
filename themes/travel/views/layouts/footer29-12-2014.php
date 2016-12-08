$page = Page::model()->findByPk(56);
$meta = Seo::GetPageSeo($page->uid);



<footer id="colophon" class="site-footer" role="contentinfo">
  <div id="tertiary" class="sidebar-container" role="complementary">
    <div class="container_16"> 
      
      <!-- First Widget Area -->
      <div class="grid_4 contact_us">
        <aside id="meta-0" class="one-fourth">
          <h3><?php echo t('Contact us'); ?></h3>
          <address class="vcard">
          <p class="adr"> <span class="llp">Temple Advisor LLP</span> NO.50, First Floor,<br>
            <span class="street-address"> Ramasamy Street, Valasaravakkam,</span><br>
            <span class="region"> Chennai - 87,</span> <span class="postal-code"> Tamil Nadu,</span> <span class="country-name"> India,</span> </p>
          <p>Phone:<span class="tel"> +91 44 42 11 99 06</span><br />
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
          
            <li><a href="<?php echo Yii::app()->createUrl('site/aboutus')?>" title="About TempleAdviser" ><?php echo $meta->title; ?></a></li>
            <li><a href="<?php echo Yii::app()->createUrl('site/termsconditions')?>" title="Terms &amp; Conditiions">Terms &amp; Conditiions</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('site/privacypolicy')?>" title="Privacy Policy">Privacy Policy</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('site/disclaimer')?>" title="Disclaimer">Disclaimer</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('site/sitemap')?>" title="Sitemap">Sitemap</a></li>
          </ul>
        </aside>
      </div>
      
      <!-- Third Widget Area -->
      <div class="grid_4 get_involved">
        <aside id="meta-2" class="widget widget_meta ">
          <h3><?php echo t('Get involved'); ?></h3>
          <ul>
            <li><a href="<?php echo Yii::app()->createUrl('site/writereviews')?>" title="
             Rate a Temple &amp; Write Your Reviews" >Rate a Temple &amp; Write Your Reviews </a></li>
            <li><a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>" title="Contribute an Article">Contribute an Article</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('articlesreviews/list')?>" title="Articles & Reviews">Articles & Reviews</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('temples/gallery')?>" title="Photo Gallery">Photo Gallery</a></li>
            <li><a href="#" title="Music Downloads">Music Downloads</a></li>
            <li><a href="#" title="Plan Your Trip">Plan Your Trip</a></li>
          </ul>
        </aside>
      </div>
      
      <!-- Forth Widget Area -->
      <div class="grid_4">
        <aside id="meta-2" class="widget widget_meta social_icons">
          <h3><?php echo t('Our Social Network'); ?></h3>
          <ul>
            <li><img src="<?php echo $layout_asset; ?>/images/facebook.png" /> <a href="https://www.facebook.com/templeadvisor" title="Join us on Facebook" target="_blank" >Join us on Facebook</a></li>
            <li><img src="<?php echo $layout_asset; ?>/images/twitter.png" /> <a href="https://twitter.com/TempleAdvisor" title="Follow us on Twitter">Follow us on Twitter</a></li>
            <li><img src="<?php echo $layout_asset; ?>/images/google_plus.png" /> <a href="#" title="Add us on Google+">Add us on Google+p</a></li>
            <!--	<li><img src="<?php echo $layout_asset; ?>/images/rss.png" /> <a href="#" title="Grab the RSS Feed">Grab the RSS Feed</a></li> -->
          </ul>
        </aside>
      </div>
      
      <!-- Fiveth Widget Area -->
      <div class="grid_4 newsletter">
        <aside>
          <div class="mail"> <img src="<?php echo $layout_asset; ?>/images/temp/mail.png" /> <?php echo t('Events Newsletter'); ?> </div>
          <div class="send_mail">
            <input class="email" name="email" placeholder="Email Id">
            <input type="submit" title="Subscribe" value="Subscribe" class="subcribe">
          </div>
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
