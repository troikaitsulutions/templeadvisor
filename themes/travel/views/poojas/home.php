<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
?>
<?php $this->renderPartial('//layouts/pooja-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>

<section id="content" class="tour">
  <div class="section most-popular">
    <div class="container">
      <?php
	  	$PoojaPurposes = Pujapurpose::model()->findAll(array('condition'=>'status = 1'));
		if( isset($PoojaPurposes) && count($PoojaPurposes)>0 ) { 
	  ?>
      <div class="text-center description block">
        <h1><?php echo t('Puja By Purpose'); ?></h1>
        <p>Select the puja based on the purpose or your need</p>
      </div>
      <div class="image-carousel style2" data-animation="slide" data-item-width="270" data-item-margin="30">
        <ul class="slides image-box style3">
          <?php 

			foreach ( $PoojaPurposes as $p) {
				$Seo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$p->uid)));
				if(isset($Seo) && count($Seo)>0 ) {
					
				$PoojaList = Poojalist::model()->findAll(array('condition'=>'purpose = :PUR AND status = 1', 'params'=>array(':PUR'=>$p->id)));
				if(count($PoojaList)>0)
				{
				
		?>
          <li class="box">
            <article class="box box-low-height">
              <figure> <a href="<?php echo Yii::app()->createUrl('poojas/list',array('pooja'=>'online-pujas', 'pcategory'=>$Seo->slug));?>">
              <img width="270" height="160" alt="<?php echo $p->name; ?>" src="<?php echo Purpose::GetThumbnail($p->icon_file); ?>"></a> </figure>
              <div class="details text-center">
                <h4 class="box-title home-featured-name"><?php echo $p->name; ?></h4>
                <p class="offers-content">(<?php echo count($PoojaList); ?> Pujas)</p>
                <p class="description description-text"><?php echo $p->comment; ?></p>
                <a href="<?php echo Yii::app()->createUrl('poojas/list',array('pooja'=>'online-pujas', 'pcategory'=>$Seo->slug));?>" class="button btn-small full-width">Select Purpose</a> </div>
            </article>
          </li>
		  
				<?php } } } ?>
        </ul>
      </div>
      <?php } ?>
      <?php
	  	$DietyPoojas = Diety::model()->findAll(array('condition'=>'status = 1 AND pooja_diety=1'));
		if( isset($DietyPoojas) && count($DietyPoojas)>0 ) { 
	  ?>
      <div class="text-center description block">
        <h1><?php echo t('Puja By Deity'); ?></h1>
        <p>Select the puja based on the deity</p>
      </div>
      <div class="image-carousel style2" data-animation="slide" data-item-width="270" data-item-margin="30">
        <ul class="slides image-box style3">
          <?php 
			$i=1;
			foreach ( $DietyPoojas as $d) {
			
			$PoojaList = Poojalist::model()->findAll(array('condition'=>'deity = :PUR AND status = 1', 'params'=>array(':PUR'=>$d->id)));
		?>
          <li class="box">
            <figure> <a href="<?php echo Yii::app()->createUrl('poojas/list');?>" title=""><img src="<?php echo Diety::GetThumbnail($d->icon_file); ?>" alt="<?php echo $d->name; ?>" width="270" height="160"></a> </figure>
            <div class="details text-center">
              <h4 class="box-title"><?php echo $d->name; ?></h4>
              <p class="offers-content">(<?php echo count($PoojaList); ?> Pujas)</p>
              <p class="description description-text"><?php echo $d->comment; ?></p>
              <a href="<?php echo Yii::app()->createUrl('poojas/list');?>" class="button btn-small full-width"> SELECT DEITY </a> </div>
          </li>
          <?php } ?>
        </ul>
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="global-map-area promo-box no-margin parallax" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="content-section description pull-right col-sm-9">
        <div class="table-wrapper hidden-table-sm">
          <div class="table-cell">
            <h2 class="m-title animated" data-animation-type="fadeInDown"> Tell us where you would like to go.<br />
              <em>12,000+ Hotel and Resorts Available!</em> </h2>
          </div>
          <div class="table-cell action-section col-md-4 no-float">
            <form action="hotel-list-view.php" method="post">
              <div class="row">
                <div class="col-xs-6 col-md-12">
                  <input type="text" class="input-text input-large full-width" value="" placeholder="Enter destination or hotel name" />
                </div>
                <div class="col-xs-6 col-md-12">
                  <button class="full-width btn-large animated" data-animation-type="fadeInUp" data-animation-delay="1">search hotels</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="image-container col-sm-4"> <img src="http://placehold.it/342x258" alt="" width="342" height="258" class="animated" data-animation-type="fadeInUp" data-animation-duration="2" /> </div>
    </div>
  </div>
   <?php 
  	$FI = Poojalist::model()->findAll(array(
		'condition' => 'featured = 1 AND status = 1'
	));
    if( isset($FI) && (count($FI)>0) ) {  
  ?>
  
  <div class="section gray-area most-popular">
    <div class="container">
      <h2>Most Popular pujas</h2>
      <div class="image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
        <ul class="slides image-box hotel listing-style1">
          
          <?php foreach ( $FI as $fitem ) { ?>
          <li>
            <article class="box">
              <figure> <a href="#" class="popup-gallery"><img width="270" height="160" alt="<?php echo $fitem->name; ?>" src="<?php echo Poojalist::GetThumbnail($fitem->icon_file); ?>"></a> </figure>
              <div class="details"> 
                <h4 class="box-title puja-name"><?php echo $fitem->name; ?><small><?php echo Temples::GetName($fitem->temple); ?></small></h4>
                <h5 style="text-align:center !important;"><span class="price" <span class="price" style="text-align:center !important;"><?php echo 'Rs. '.$fitem->total; ?></span></h5>
                <p class="description"><?php echo substr($fitem->comment,0,75); ?></p>
                <div class="action"> <a class="button btn-small" href="#">REQUEST NOW</a> <a class="button btn-small yellow" href="#" >TEMPLE DETAIL</a> </div>
              </div>
            </article>
          </li>
          <?php } ?>
          
          
          
        </ul>
      </div>
    </div>
  </div>
  
<?php } ?>
</section>
<?php 
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/components/flexslider/jquery.flexslider.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery.stellar.min.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/waypoints.min.js', CClientScript::POS_END);
?>
