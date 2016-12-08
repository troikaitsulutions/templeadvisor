<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);		
?>

<header id="header" class="navbar-static-top style1">
  <div class="container">
    <h1 class="logo navbar-brand"> <a href="<?php echo FRONT_SITE_URL; ?>" title="Temple Advisor"> <img src="<?php echo $layout_asset; ?>/images/ta-logo.jpg" alt="Temple Advisor" /> </a> </h1>
    <div class="col-sm-6 col-md-3 top-search">
	
	<?php $q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : ''; ?>
	<input name="site_search" value="<?php echo $q; ?>" type="text" class="input-text full-width" id="sitesearch" placeholder="Search Temple name or Deity or City/Town" />
    
	<div class="icon-search"> </div>
    </div>
    <address class="contact-details">
    <span class="contact-phone"><i class="soap-icon-phone circle"></i> (+91) 904-203-0874</span>
    <ul class="social-icons style2 clearfix">
      <li class="facebook"><a title="facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
      <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
      <li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
      
      <!--
      <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
      <li class="vimeo"><a title="vimeo" href="#" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>
      <li class="dribble"><a title="dribble" href="#" data-toggle="tooltip"><i class="soap-icon-dribble"></i></a></li>
      <li class="flickr"><a title="flickr" href="#" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>
      -->
    </ul>
    </address>
  </div>
  <div class="hidden-mobile container"> </div>
  <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle"> Mobile Menu Toggle </a>
  <div id="main-menu">
    <nav role="navigation" class="container">
      <ul class="menu">
        <li class="menu-item-has-children"> <a href="<?php echo FRONT_SITE_URL; ?>">Home</a></li>
        
        <?php
			$CountryList = Country::model()->findByPk(1016);
			if(isset($CountryList) && count($CountryList)>0 ) {
				$CountrySeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$CountryList->uid)));
				  if(isset($CountrySeo)) {
		?>
        <li class="menu-item-has-children"> <a href="<?php echo $this->createUrl('temples/index',array('country' => $CountrySeo->slug)); ?>"><?php echo $CountrySeo->mainmenu; ?></a></li>
        <?php } } ?>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('tours/index',array('country'=>'tours-around-india'))?>">Tour Packages</a></li>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('poojas/index',array('pooja'=>'online-pujas')); ?>">Online Pujas</a></li>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('homams/list',array('homam'=>'online-homams'))?>">Online Homam</a></li>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('astrology/index')?>">Online Astrology</a></li>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('store/index',array('store'=>'online-store'))?>">Online Store</a></li>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('site/aboutus')?>">About us</a></li>
      </ul>
    </nav>
  </div>
  <nav id="mobile-menu-01" class="mobile-menu collapse">
  
  
    <ul id="mobile-primary-menu" class="menu">
       <li class="menu-item-has-children"> <a href="<?php echo FRONT_SITE_URL; ?>">Home</a></li>
        
        <?php
			$CountryList = Country::model()->findByPk(1016);
			if(isset($CountryList) && count($CountryList)>0 ) {
				$CountrySeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$CountryList->uid)));
				  if(isset($CountrySeo)) {
		?>
        <li class="menu-item-has-children"> <a href="<?php echo $this->createUrl('temples/index',array('country' => $CountrySeo->slug)); ?>"><?php echo $CountrySeo->mainmenu; ?></a></li>
        <?php } } ?>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('tours/index',array('country'=>'tours-around-india'))?>">Tour Packages</a></li>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('poojas/index',array('pooja'=>'online-poojas'))?>">Online Pooja</a></li>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('homams/list',array('homam'=>'online-homams'))?>">Online Homam</a></li>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('astrology/index')?>">Online Astrology</a></li>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('store/index',array('store'=>'online-store'))?>">Online Store</a></li>
        <li class="menu-item-has-children"> <a href="<?php echo Yii::app()->createUrl('site/aboutus')?>">About us</a></li>
     
	  
        <ul>
          <li><a href="dashboard1.html">Dashboard 1</a></li>
          <li><a href="dashboard2.html">Dashboard 2</a></li>
          <li><a href="dashboard3.html">Dashboard 3</a></li>
          <li class="menu-item-has-children"> <a href="#">7 Footer Styles</a>
            <ul>
              <li><a href="#">Default Style</a></li>
              <li><a href="footer-style1.html">Footer Style 1</a></li>
              <li><a href="footer-style2.html">Footer Style 2</a></li>
              <li><a href="footer-style3.html">Footer Style 3</a></li>
              <li><a href="footer-style4.html">Footer Style 4</a></li>
              <li><a href="footer-style5.html">Footer Style 5</a></li>
              <li><a href="footer-style6.html">Footer Style 6</a></li>
            </ul>
          </li>
          <li class="menu-item-has-children"> <a href="#">8 Header Styles</a>
            <ul>
              <li><a href="#">Default Style</a></li>
              <li><a href="header-style1.html">Header Style 1</a></li>
              <li><a href="header-style2.html">Header Style 2</a></li>
              <li><a href="header-style3.html">Header Style 3</a></li>
              <li><a href="header-style4.html">Header Style 4</a></li>
              <li><a href="header-style5.html">Header Style 5</a></li>
              <li><a href="header-style6.html">Header Style 6</a></li>
              <li><a href="header-style7.html">Header Style 7</a></li>
            </ul>
          </li>
          <li class="menu-item-has-children"> <a href="#">7 Inner Start Styles</a>
            <ul>
              <li><a href="#">Default Style</a></li>
              <li><a href="inner-starts-style1.html">Inner Start Style 1</a></li>
              <li><a href="inner-starts-style2.html">Inner Start Style 2</a></li>
              <li><a href="inner-starts-style3.html">Inner Start Style 3</a></li>
              <li><a href="inner-starts-style4.html">Inner Start Style 4</a></li>
              <li><a href="inner-starts-style5.html">Inner Start Style 5</a></li>
              <li><a href="inner-starts-style6.html">Inner Start Style 6</a></li>
            </ul>
          </li>
          <li class="menu-item-has-children"> <a href="#">3 Search Styles</a>
            <ul>
              <li><a href="search-style1.html">Search Style 1</a></li>
              <li><a href="search-style2.html">Search Style 2</a></li>
              <li><a href="search-style3.html">Search Style 3</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>

<?php
	$SearchJs = "$(document).ready(function () {
		
	$('.icon-search').click(function(){
	
		if( $.trim( $('#sitesearch').val() )!='') 
		{
			window.location.href = '/search/index?q='+ $.trim( $('#sitesearch').val() );
			return false;
			
				
		}
	});
	
	$('#sitesearch').keyup(function(e){
		if(e.keyCode == 13)
		{
			if( $.trim( $('#sitesearch').val() )!='') 
			{
				window.location.href = '/search/index?q='+ $.trim( $('#sitesearch').val() );
				return false;
			}
		}
	});
		
    });";
	
	Yii::app()->clientScript->registerScript('TopSearch', $SearchJs);
?>
