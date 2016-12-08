

<header id="branding" class="site-header" role="banner">
  <div id="sticky_navigation">
    <div class="container_16" style="line-height:0px;">
      <hgroup class="tmp_logo">
        <h1><a href="<?php echo FRONT_SITE_URL; ?>"><img src="<?php echo $layout_asset; ?>/images/temple_adviser_logo.jpg" alt="Temple Advisor" title="Temple Advisor"></a></h1>
      </hgroup>
      
      <nav role="navigation" class="site-navigation main-navigation grid_11" id="site-navigation">
        <div class="menu-wplook-main-menu-container">
          <ul id="menu-wplook-main-menu" class="menu">
            <li class="menu-item"><a href="<?php echo FRONT_SITE_URL; ?>" title="Home" <?php echo ((Yii::app()->controller->id == 'site') && (Yii::app()->controller->action->id == 'index')) ? 'class="current_page_item"' : ''; ?> ><?php echo t('Home'); ?></a></li>
            <li class="menu-item "><a href="<?php echo Yii::app()->createUrl('temples')?>" title="Temples" <?php echo ((Yii::app()->controller->id == 'temples')) ? 'class="current_page_item"' : ''; ?> ><?php echo t('Temples'); ?></a></li>
            <li class="menu-item "><a href="#">Plan Your Trip<br /><span class="rr-spans-menu">Coming Soon</span></a></li>
            <li class="menu-item "><a href="#" title="Contact Us" <?php echo ((Yii::app()->controller->id == 'site') && ( ( Yii::app()->controller->action->id == 'generalenquiry') || ( Yii::app()->controller->action->id == 'businessenquiry') ) ) ? 'class="current_page_item"' : ''; ?> ><?php echo t('Contact Us'); ?></a>
            <ul class="sub-menu">
              <li><a href="<?php echo Yii::app()->createUrl('site/generalenquiry')?>"><?php echo t('General Enquiry'); ?></a></li>
              <li><a href="<?php echo Yii::app()->createUrl('site/businessenquiry')?>"><?php echo t('Business Enquiry'); ?></a></li>
            </ul>
            </li>
          </ul>
        </div>
      </nav>
      
      <div id="toolbar">
          <ul>
            <li class="phone"><a href="#">Tel.: +91 44 2486 1244</a></li>
            <li class="rss"><a href="#"><i class="icon-rss"></i></a></li>
            <li class="contact"><a href="<?php echo Yii::app()->createUrl('site/generalenquiry')?>"><i class="icon-envelope"></i></a></li>
            <li class="share"><a href="#"><i class="icon-share"></i></a>
              <ul class="share-items radius-bottom">
                <li class="share-item-fb radius"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->request->url; ?>" target="_blank"><i class="icon-facebook-sign"></i></a></li>
                <li class="share-item-tw radius"><a href="https://twitter.com/TempleAdvisor"><i class="icon-twitter-sign"></i></a></li>
                <li class="share-item-gp radius"><a href="https://plus.google.com/u/0/b/103046096673301887495/103046096673301887495/posts"><i class="icon-google-plus-sign"></i></a></li>
              </ul>
            </li>
          </ul>
          <ul class="search">
            <li>
              <div class="search-form">
                <form method="GET" name='QuickSearch' action="<?php echo Yii::app()->createUrl('temples/search'); ?>">
                  <div>
                    <input class="radius" type="text" size="" name="q" id="s" placeholder="Search Temple name or Deity or City/Town" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                     </div>
                </form>
              </div>
            </li>
          </ul>
    </div>
      <div class="clear"></div>
    </div>
  </div>
</header>
