<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		
			?>

<section id="content">
  <?php
	$TourPackages = Tourcategory::model()->findAll(array('condition'=>'status = 1'));
	
	if( isset($TourPackages) && count($TourPackages)>0 ) {
		foreach ($TourPackages as $tp) {
			$Seo1 = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$tp->uid)));
?>
  <div class="section gray-area most-popular">
    <div class="container">
      <h1><?php echo $tp->name; ?></h1>
      <div class="row image-box car listing-style1">
        <?php
	  	$Ptours = Toursubcategory::model()->findAll(array('condition'=>'source = '.$tp->id));
	  	if( isset($Ptours) && count($Ptours)>0 ) {
			foreach ($Ptours as $pt ) {		
			 $Seo2 = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$pt->uid)));
	    ?>
        <div class="col-sm-6 col-md-3">
          <article class="box">
            <figure> <a href="#"><img alt="<?php echo $pt->name; ?>" src="<?php echo Toursubcategory::GetThumbnail($pt->icon_file); ?>"></a> </figure>
            <div class="details">
              <h4 class="box-title"><?php echo $Seo2->mainmenu; ?><!-- <small>TN, KN, KL, AP</small>--></h4>
              <p class="mile"><span class="skin-color">Total Packages:</span> 1542 Available</p>
              <div class="action"> <a class="button btn-small full-width" href="#">SELECT NOW</a> </div>
            </div>
          </article>
        </div>
        <?php } } ?>
      </div>
    </div>
  </div>
  <?php } } ?>
  <div class="global-map-area promo-box no-margin parallax" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="content-section description pull-right col-sm-9">
        <div class="table-wrapper hidden-table-sm">
          <div class="table-cell">
            <h2 class="m-title"> If peace and a break is the most sough after, <br />
              <em>then Pondicherry is surely one of the choicest holiday destinations in South India.</em> </h2>
          </div>
          <div class="table-cell action-section col-md-4 no-float">
            <form method="post" action="flight-list-view.html">
              <div class="row">
                <div class="col-xs-6 col-md-12"> 
                  <!-- <input type="text" class="input-text input-large full-width" value="" placeholder="Enter destination or hotel name" />
                  --> 
                </div>
                <div class="col-xs-6 col-md-12"> <a href="http://tourism.pondicherry.gov.in/" target="_blank" class="button btn-large animated" data-animation-type="bounce" data-animation-delay="0.5">Book With Us Now</a> </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="image-container col-sm-4"> <img src="<?php echo $layout_asset; ?>/images/ads.jpg" alt="" class="animated" data-animation-type="fadeInUp" /> </div>
    </div>
  </div>
</section>
<?php 
  	$FT = Tourpackage::model()->findAll(array(
		'condition' => 'featured = 1 AND status = 1'
	));
    if( isset($FT) && (count($FT)>0) ) {  
  ?>
<div class="section gray-area most-popular">
  <div class="container">
    <h2>Last Minute Packages</h2>
    <div data-item-margin="30" data-item-width="270" data-animation="slide" class="image-carousel style2">
      <div class="flex-viewport" style="overflow: hidden; position: relative;">
        <ul class="slides image-box hotel listing-style1">
          <?php foreach ( $FT as $fitem ) { ?>
          <li style="width: 270px; float: left; display: block;">
            <article class="box">
              <figure> <a href="#"> <img alt="<?php echo $fitem->name; ?>" src="<?php echo Tourpackage::GetThumbnail($fitem->icon_file); ?>" draggable="false"> </a> </figure>
              <div class="details">
                <h4 class="box-title"><?php echo $fitem->name; ?></h4>
                <h5 class="box-title"> <span class="price" style="text-align:center !important; padding-bottom:20px;"><?php echo 'Rs. '.$fitem->total; ?></span> </h5>
                <div class="row time">
                  <div class="date col-xs-6 first"> <i class="soap-icon-calendar yellow-color"></i>
                    <div> <span class="skin-color">Duration</span><br />
                      4D 3N </div>
                  </div>
                  <div class="departure col-xs-6 last"> <i class="soap-icon-car yellow-color"></i>
                    <div> <span class="skin-color">Mode of Travel</span><br />
                      Car/Bus </div>
                  </div>
                </div>
                <a class="button btn-small full-width" href="#">GET DETAILS</a> </div>
            </article>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php 
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/components/flexslider/jquery.flexslider.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery.stellar.min.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/waypoints.min.js', CClientScript::POS_END);
?>
