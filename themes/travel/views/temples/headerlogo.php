
<div id="toolbar" class="clearfix">
  <div class="container_16">
    <div class="grid_16">
      <ul class="fl">
        <li class="phone"><a href="tel_3A+1 554 555 5555">Tel.: +91 44 42 11 99 06</a></li>
        <li class="rss"><a href="#"><i class="icon-rss"></i></a></li>
        <li class="contact"><a href="#"><i class="icon-envelope"></i></a></li>
        <li class="share"><a href="#"><i class="icon-share"></i></a>
          <ul class="share-items radius-bottom">
            <li class="share-item-fb radius"><a href="https://www.facebook.com/templeadviser" target="_blank"><i class="icon-facebook-sign"></i></a></li>
            <li class="share-item-tw radius"><a href="#"><i class="icon-twitter-sign"></i></a></li>
            <li class="share-item-gp radius"><a href="#"><i class="icon-google-plus-sign"></i></a></li>
          </ul>
        </li>
      </ul>
      <ul class="fr search">
        <li>
          <div class="search-form">
            <form method="get" id="searchform" action="">
              <div>
                <input class="radius" type="text" size="" name="s" id="s" placeholder="Search temple name, destination etc.," onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
                <a href="#" class="searchIcon"><i class="icon-search"></i></a> </div>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<header id="branding" class="site-header" role="banner">
  <div id="sticky_navigation" >
    <div class="container_16">
      <hgroup class="fleft grid_5">
        <h1><a href="<?php echo FRONT_SITE_URL; ?>"><img src="<?php echo $layout_asset; ?>/images/temple_adviser_logo.jpg" alt="Temple Advisor" title="Temple Advisor"></a></h1>
      </hgroup>
      <nav role="navigation" class="site-navigation main-navigation grid_11" id="site-navigation">
        <div class="menu-wplook-main-menu-container">
          <ul id="menu-wplook-main-menu" class="menu">
            <li class="menu-item"><a href="<?php echo FRONT_SITE_URL; ?>" title="Home" <?php echo ((Yii::app()->controller->id == 'site') && (Yii::app()->controller->action->id == 'site')) ? 'class="current_page_item"' : ''; ?> >Home</a></li>
            <li class="menu-item "><a href="<?php echo Yii::app()->createUrl('temples')?>" title="Temples" <?php echo ((Yii::app()->controller->id == 'temples')) ? 'class="current_page_item"' : ''; ?> >Temples</a></li>
            <li class="menu-item "><a href="#" title="Plan Your Trip">Plan Your Trip</a></li>
            <li class="menu-item "><a href="#" title="Contact Us" <?php echo ((Yii::app()->controller->id == 'site') && (Yii::app()->controller->action->id == 'contactus')) ? 'class="current_page_item"' : ''; ?> >Contact Us</a>
            <ul class="sub-menu">
              <li><a href="<?php echo Yii::app()->createUrl('site/generalenquiry')?>"><?php echo t('General Enquiry'); ?></a></li>
              <li><a href="<?php echo Yii::app()->createUrl('site/businessenquiry')?>"><?php echo t('Business Enquiry'); ?></a></li>
            </ul>
            </li>
          </ul>
        </div>
      </nav>
      <div class="clear"></div>
    </div>
  </div>
</header>
