<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		//Yii::app()->clientScript->registerCssFile($layout_asset.'/css/style-orange.css');	
			?>
<?php $this->renderPartial('//layouts/bcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'BreadCrumbs' => $BreadCrumbs )); ?>

<section id="content">
  <div class="container">
    <?php if( isset($AllProducts) && count($AllProducts)>0 ) { ?>
    <div id="main">
      <div class="row">
        <div class="col-sm-4 col-md-3">
          <h4 class="search-results-title"><i class="soap-icon-search"></i><b><?php echo $item_count; ?></b> results found.</h4>
          <div class="toggle-container filters-container">
            <div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Deity</a> </h4>
              <div id="accomodation-type-filter" class="panel-collapse collapse">
                <div class="panel-content">
                  <ul class="check-square filters-option">
                    <li><a href="#">Shiva<small>(263)</small></a></li>
                    <li><a href="#">Maha Vishnu<small>(232)</small></a></li>
                    <li><a href="#">Brahma<small>(1)</small></a></li>
                    <li class="active"><a href="#">Devi / Shakti<small>(177)</small></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#historical-type-filter" class="collapsed">Region</a> </h4>
              <div id="historical-type-filter" class="panel-collapse collapse">
                <div class="panel-content">
                  <ul class="check-square filters-option">
                    <li><a href="#">South India <small>(263)</small></a></li>
                    <li class="active"><a href="#">North India <small>(232)</small></a></li>
                    <li><a href="#">East India<small>(1)</small></a></li>
                    <li><a href="#">West India<small>(177)</small></a></li>
                  </ul>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-sm-8 col-md-9">
          
          <div class="sort-by-section clearfix">
            <h4 class="sort-by-title block-sm">Sort results by:</h4>
            <ul class="sort-bar clearfix block-sm">
              <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
              <!--<li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
              <li class="clearer visible-sms"></li>
              <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>rating</span></a></li>
              -->
              <li class="sort-by-popularity active"><a class="sort-by-container" href="#"><span>State</span></a></li>
            </ul>
            <!--
            <ul class="swap-tiles clearfix block-sm">
              <li class="swap-list"> <a href="hotel-list-view.html"><i class="soap-icon-list"></i></a> </li>
              <li class="swap-grid active"> <a href="hotel-grid-view.html"><i class="soap-icon-grid"></i></a> </li>
              <li class="swap-block"> <a href="hotel-block-view.html"><i class="soap-icon-block"></i></a> </li>
            </ul>
            --> 
          </div>
          <hr />
          <div class="row image-box flight listing-style1">
            <?php  foreach ( $AllProducts as $product ) { ?>
            <div class="col-sm-6 col-md-4"> 
              <article class="box">
                <figure> <a href="#"><img alt="<?php echo $product->name; ?>" src="<?php echo Product::GetThumbnail($product->icon_file); ?>"></a> </figure>
                <div class="details">
                  <h4 class="box-title"><?php echo $product->name; ?> </h4>
                 <h5 class="box-title"> <span class="price" style="text-align:center !important; padding-bottom:20px;"><?php echo 'Rs. '.$product->total; ?></span> </h5>
                  <div class="action"> <a class="button btn-small" href="<?php echo Yii::app()->createUrl('store/info',array('store'=>'online-store'));?>">VEIW DETAIL</a> 
                  <a class="button btn-small yellow" href="#">ADD TO CART</a> </div>
                </div>
              </article>
            </div>
            <?php } ?>
          </div>
          <div class="paginate">
            <?php  $this->widget('application.components.SimplaPager', array('pages'=>$pages)); ?>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>
