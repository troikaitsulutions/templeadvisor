<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
			?>
<?php $this->renderPartial('//layouts/store-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>

<section id="content" class="tour">
  <div class="section gray-area most-popular">
    <div class="container">
      <h2><?php echo t('Store Categories'); ?></h2>
      <?php 
		  $PCategory = Tcategory::model()->findAll(array('condition'=>'status = 1'));
		  if(isset($PCategory) && count($PCategory)>0 ) {
		?>
      <div class="image-carousel style2" data-animation="slide" data-item-width="270" data-item-margin="30">
        <ul class="slides image-box style3">
          <?php 
		  foreach ($PCategory as $pc ) {
			$Seo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$pc->uid)));
				if(isset($Seo) && count($Seo)>0 ) {
					
				$Cproduct = Product::model()->findAll(array('condition'=>'category = :PCAT AND status = 1','params'=>array(':PCAT'=>$pc->id)));
				
		
		?>
          <li class="box">
            <figure> <a href="#" title=""><img src="<?php echo Tcategory::GetThumbnail($pc->icon_file); ?>" alt="<?php echo  $pc->name; ?>" width="270" height="160"></a> </figure>
            <div class="details text-center">
              <h4 class="box-title"><?php echo  $pc->name; ?></h4>
              <p class="offers-content">(<?php echo count($Cproduct); ?> Items Available)</p>
              <p class="description description-text"><?php echo  $pc->comment; ?></p>
              <a href="#" class="button">SEE ALL</a> </div>
          </li>
          <?php } } ?>
        </ul>
      </div>
      <?php } ?>
      
      
  <?php 
  	$FI = Product::model()->findAll(array(
		'condition' => 'featured = 1 AND status = 1',
		'limit' => 4
	));
    if( isset($FI) && (count($FI)>0) ) {  
  ?>
      
      <h2>Hot Offer Items</h2>
	  
      <div class="row image-box style3 cruise listing-style1">
		<?php foreach ( $FI as $fitem ) { ?>
        <div class="col-sm-6 col-md-3">
          <article class="box">
            <figure> 
            <a href="#"><img width="270" height="160" alt="" src="<?php echo Product::GetThumbnail($fitem->icon_file); ?>"></a>
			</figure>
            <div class="details"> 
              <h4 class="box-title"><?php echo $fitem->name; ?> <small><?php echo Tcategory::GetName($fitem->category); ?></small></h4>
              <h5 style="text-align:center !important;"> <span class="price" <span class="price" style="text-align:center !important; padding-bottom:20px;"><!--<small style="text-decoration:line-through;">Rs. 320</small>--><?php echo 'Rs. '.$fitem->total; ?> </span> </h5>
              <div class="feedback"> </div>
              <div class="row time">
                <div class="date col-xs-6"> <i class="soap-icon-clock yellow-color"></i>
                  <div> <span class="skin-color">Offer From</span><br />
                    Jan 6, 2016 </div>
                </div>
                <div class="departure col-xs-6"> <i class="soap-icon-clock yellow-color"></i>
                  <div> <span class="skin-color">Till</span><br />
                    Jan 24, 2016 </div>
                </div>
              </div>
              <p class="description fourty-space">Save up to <span class="skin-color">20%</span></p>
              <div class="action"> 
              <a class="button btn-small" href="#">VIEW DETAILS</a> 
              <a class="button btn-small yellow" href="#" >ADD TO CART</a> </div>
            </div>
          </article>
        </div>
        <?php } ?>
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
  
  	$BS = Product::model()->findAll(array(
		'select'=>'*, rand() as rand',
		'condition' => 'best_selling = 1 AND status = 1',
		'order'=>'rand',
		'limit'=>10
		
	));
  
    if( isset($BS) && (count($BS)>0) ) {  
  ?>
  <div class="section most-popular">
    <div class="container">
      <h2><?php echo t('Best Selling Items'); ?></h2>
      <div class="image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
        <ul class="slides image-box hotel listing-style1">
          <?php foreach ( $BS as $item ) { ?>
          <li>
            <article class="box">
              <figure> <a href="#"><img width="270" height="160" alt="<?php echo $item->name; ?>" src="<?php echo Product::GetThumbnail($item->icon_file); ?>"></a> </figure>
              <div class="details"> 
                <h4 class="box-title" style="text-transform:capitalize;"><?php echo $item->name; ?><small><?php echo Tcategory::GetName($item->category); ?></small></h4>
                <h5 style="text-align:center !important;"><span class="price" <span class="price" style="text-align:center !important; padding-bottom:20px;"><?php echo 'Rs. '.$item->total; ?></span></h5>
                <p class="description" style="text-align:center;"><?php echo substr ( $item->short_desc , 0 , 35 ); ?></p>
                <div class="action"> <a class="button btn-small" href="#">VIEW DETAILS</a> <a class="button btn-small yellow" href="#" >ADD TO CART</a> </div>
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