<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
?>
<?php $this->renderPartial('//layouts/store-detail-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'Temple' => $Temple )); ?>

<section id="content">
  <div class="container car-detail-page">
    <div class="row">
      <div id="main" class="col-md-9">
        <div class="col-md-9">
          <?php

			$Pgallery = Gallery::model()->findAll(array( 
							'condition'=>'prop_id = :ID',
							'params'=>array(':ID'=>$Temple->id),
							'order'=>'img_order ASC',
						));
		?>
          <?php if ( isset($Pgallery) && count($Pgallery) ) { ?>
          <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
            <ul class="slides">
              <?php $i = 0; foreach ($Pgallery as $pg) { ?>
              <li><img src="http://temples.s3.amazonaws.com/<?php echo $Temple->id; ?>/large/<?php echo $pg->img_url; ?>" alt="" /></li>
              <?php } ?>
            </ul>
          </div>
          <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
            <ul class="slides">
              <?php $i = 0; foreach ($Pgallery as $pg) { ?>
              <li><img src="http://temples.s3.amazonaws.com/<?php echo $Temple->id; ?>/large/<?php echo $pg->img_url; ?>" alt="" /></li>
              <?php } ?>
            </ul>
          </div>
          <?php } ?>
        </div>
        <div class="col-md-3">
          <dl class="term-description">
            <dt>Author:</dt>
            <dd>Someone</dd>
            <dt>Publisher:</dt>
            <dd>AAA Company</dd>
            <dt>Weight:</dt>
            <dd>540 Gms</dd>
            <dt>Pages:</dt>
            <dd>458</dd>
            <dt>Dimension:</dt>
            <dd>12cmx6cmx1cm</dd>
          </dl>
        </div>
       
        <div class="col-sm-12" id="car-details">
          <h3>Product Details</h3>
          <p>Sed aliquam nunc eget velit imperdiet, in rutrum mauris malesuada. Quisque ullamcorper vulputate nisi, et fringilla ante convallis quis. Nullam vel tellus non elit suscipit volutpat. Integer id felis et nibh rutrum dignissim ut non risus. In tincidunt urna quis sem luctus, sed accumsan magna pellentesque. Donec et iaculis tellus. Vestibulum ut iaculis justo, auctor sodales lectus. Donec et tellus tempus, dignissim maurornare, consequat lacus. Integer dui neque, scelerisque nec sollicitudin sit amet, sodales a erat. Duis vitae condimentum ligula. Integer eu mi nisl. Donec massa dui, commodo id arcu quis, venenatis scelerisque velit.</p>
          
          <h3>Shipping Policy</h3>
          <p>Sed aliquam nunc eget velit imperdiet, in rutrum mauris malesuada. Quisque ullamcorper vulputate nisi, et fringilla ante convallis quis. Nullam vel tellus non elit suscipit volutpat. Integer id felis et nibh rutrum dignissim ut non risus. In tincidunt urna quis sem luctus, sed accumsan magna pellentesque. Donec et iaculis tellus. Vestibulum ut iaculis justo, auctor sodales lectus. Donec et tellus tempus, dignissim maurornare, consequat lacus. Integer dui neque, scelerisque nec sollicitudin sit amet, sodales a erat. Duis vitae condimentum ligula. Integer eu mi nisl. Donec massa dui, commodo id arcu quis, venenatis scelerisque velit.</p>
          
          <h3>Returns Policy</h3>
          <p>Sed aliquam nunc eget velit imperdiet, in rutrum mauris malesuada. Quisque ullamcorper vulputate nisi, et fringilla ante convallis quis. Nullam vel tellus non elit suscipit volutpat. Integer id felis et nibh rutrum dignissim ut non risus. In tincidunt urna quis sem luctus, sed accumsan magna pellentesque. Donec et iaculis tellus. Vestibulum ut iaculis justo, auctor sodales lectus. Donec et tellus tempus, dignissim maurornare, consequat lacus. Integer dui neque, scelerisque nec sollicitudin sit amet, sodales a erat. Duis vitae condimentum ligula. Integer eu mi nisl. Donec massa dui, commodo id arcu quis, venenatis scelerisque velit.</p>
        </div>
        
      </div>
      <div class="sidebar col-md-3">
        <div class="travelo-box">
          <address class="contact-details">
          <span class="contact-phone yellow"> Rs. 5400 </span>
          </address>
          <div class="details"> <a class="button yellow full-width uppercase btn-medium">ADD TO CART</a> </div>
        </div>
        <div class="travelo-box">
          <h4>Similar Products</h4>
          <div class="image-box style14">
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-img.jpg" alt="" /></a> </figure>
              <div class="details with-button">
                <h5 class="box-title"><a href="#">Item 1<small>Rs. 3250 </small></a></h5>
                <a class="button btn-mini yellow">View Details</a> </div>
            </article>
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-img.jpg" alt="" /></a> </figure>
              <div class="details with-button">
                <h5 class="box-title"><a href="#">Item 2<small>Rs. 3800 </small></a></h5>
                <a class="button btn-mini yellow">View Details</a> </div>
            </article>
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-img.jpg" alt="" /></a> </figure>
              <div class="details with-button">
                <h5 class="box-title"><a href="#">Item 3<small>Rs. 12250 </small></a></h5>
                <a class="button btn-mini yellow">View Details</a> </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
