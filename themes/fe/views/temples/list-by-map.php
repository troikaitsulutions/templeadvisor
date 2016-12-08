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
      <?php $this->renderPartial('//layouts/bcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span><a href="<?php echo Yii::app()->createUrl('temples/bytheme'); ?>"><img  src="<?php echo $layout_asset; ?>/images/theme-god-icon.png" alt="Search By Themes" title="Search By Themes"><?php echo t('Search By Themes'); ?></a><a href="<?php echo Yii::app()->createUrl('temples/byregion'); ?>"><img  src="<?php echo $layout_asset; ?>/images/theme-region-icon.png" alt="Search By Region" title="Search By Region"><?php echo t('Search By Region'); ?></a> </span> </div>
      <div class="clr"></div>
    </div>
    <div class="temple_main clearfix">
      <div class="temple_wrapper temple_search_box">
        <div class="temple_search_outer">
          <div class="temple_search_inner">
            <div class="tmp_search_head"> <img alt="" src="<?php echo $layout_asset; ?>/images/search-icon.png">
              <h1><?php echo t('Find great temples in your place'); ?>.</h1>
            </div>
            <div class="tmp_search_place">
              <form action="" method="GET">
              <label>Name</label>
              <input type="text" placeholder="Temple Name or Deity" name="q" <?php if(isset($_GET['q'])) echo 'value = "'.$_GET['q'],'"'; ?> >
              <label>Where</label>
              <input type="text" placeholder="City/Town or State" name="l" <?php if(isset($_GET['l'])) echo 'value = "'.$_GET['l'],'"'; ?> >
              <button type="submit" title="Search" >Search</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="temple_map">
        <div class="temp-map" id="temp-map"> </div>
      </div>
      <div class="temple_wrapper">
        <div class="temple_slider"> 
          
          <!--
          <div class="temple_map_slider"> 
          
            <div class="arrow_box">
              <h1 class="logo">Discover Other Nearby Temples</h1>
            </div>
            <div class="temple_theme_slider">
              <div class="tmp_left_arrow"><a href="#"><img alt="Previous" src="<?php echo $layout_asset; ?>/images/circle-left-arrow.png"></a></div>
              <div class="tmp_mid_slider"> <a class="tmp_slider1" href="#"><img src="<?php echo $layout_asset; ?>/images/temple1.jpg"></a> <a class="tmp_slider2" href="#"><img src="<?php echo $layout_asset; ?>/images/temple2.jpg"></a> <a class="tmp_slider3" href="#"><img src="<?php echo $layout_asset; ?>/images/temple3.jpg"></a> <a class="tmp_slider4" href="#"><img src="<?php echo $layout_asset; ?>/images/temple4.jpg"></a> <a class="tmp_slider5" href="#"><img src="<?php echo $layout_asset; ?>/images/temple5.jpg"></a> </div>
              <div class="tmp_right_arrow"><a href="#"><img alt="Next" src="<?php echo $layout_asset; ?>/images/circle-right-arrow.png"></a></div>
            </div>
          </div>
         -->
          <?php $this->renderPartial('//layouts/top-temple-list',array('layout_asset'=>$layout_asset)); ?>
          <!--
          <div class="temple_map_slider"> 
           
            <div class="arrow_box">
              <h1 class="logo">Most Viewed Temples</h1>
            </div>
            <div class="temple_theme_slider">
              <div class="tmp_left_arrow"><a href="#"><img alt="Previous" src="<?php echo $layout_asset; ?>/images/circle-left-arrow.png"></a></div>
              <div class="tmp_mid_slider"> <a class="tmp_slider1" href="#"><img src="<?php echo $layout_asset; ?>/images/temple1.jpg"></a> <a class="tmp_slider2" href="#"><img src="<?php echo $layout_asset; ?>/images/temple2.jpg"></a> <a class="tmp_slider3" href="#"><img src="<?php echo $layout_asset; ?>/images/temple3.jpg"></a> <a class="tmp_slider4" href="#"><img src="<?php echo $layout_asset; ?>/images/temple4.jpg"></a> <a class="tmp_slider5" href="#"><img src="<?php echo $layout_asset; ?>/images/temple5.jpg"></a> </div>
              <div class="tmp_right_arrow"><a href="#"><img alt="Next" src="<?php echo $layout_asset; ?>/images/circle-right-arrow.png"></a></div>
            </div>
          </div>
          --> 
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
<?php 

Yii::import('common.extensions.EGMap.*');

$markers = array();
$gMap = new EGMap();
$gMap->zoom = 5;
$gMap->setWidth(1184);
$gMap->setHeight(400);
$gMap->setCenter('23.3938567', '77.5766397');


	//setup info windows:
    $info_window_b = new EGMapInfoWindow('<div>I am a marker with custom image!</div>');


    //setup marker icon
    $icon = new EGMapMarkerImage($layout_asset."/images/temple.png");
    $icon->setSize(30, 30);
    $icon->setAnchor(16, 16.5);
    $icon->setOrigin(0, 0);

if ( isset($AllTemples) && count($AllTemples) ) {
	foreach ( $AllTemples as $temple ) {
$marker = new EGMapMarker($temple->latitude, $temple->longitude, array('title' => $temple->name ));
$marker->addHtmlInfoWindow($info_window_b); 
$gMap->addMarker($marker);
$markers[] = $marker;

		} 
	}

$gMap->appendMapTo('#temp-map');
// initialize the afterInit array that
// will hold after map initialization
// script code
$afterInit = array();
//
// loop through markers and
// call global function to generate
// the element that will hold the
// callback trigger event
foreach($markers as $marker){
    $afterInit[] = 'generateListElement('.$marker->getJsName().');'.PHP_EOL;
}
// now render map and pass the afterInit code
$gMap->renderMap($afterInit);

?>
</body>
