<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
?>
<?php $this->renderPartial('//layouts/homam-detail-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'Temple' => $Temple )); ?>

<section id="content">
  <div class="container">
    <div class="row">
      <div id="main" class="col-md-9">
        <div class="col-md-9">
        <div class="featured-image">
                            <img alt="" src="<?php echo $layout_asset; ?>/images/tour-home/ta1.jpg" height="400px" width="600px">
                        </div>
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
          <h3>Homam Details</h3>
          <p>Sed aliquam nunc eget velit imperdiet, in rutrum mauris malesuada. Quisque ullamcorper vulputate nisi, et fringilla ante convallis quis. Nullam vel tellus non elit suscipit volutpat. Integer id felis et nibh rutrum dignissim ut non risus. In tincidunt urna quis sem luctus, sed accumsan magna pellentesque. Donec et iaculis tellus. Vestibulum ut iaculis justo, auctor sodales lectus. Donec et tellus tempus, dignissim maurornare, consequat lacus. Integer dui neque, scelerisque nec sollicitudin sit amet, sodales a erat. Duis vitae condimentum ligula. Integer eu mi nisl. Donec massa dui, commodo id arcu quis, venenatis scelerisque velit.</p>
          
          </div>
        
      </div>
      <div class="sidebar col-md-3">
        <div class="travelo-box">
          <address class="contact-details">
          <span class="contact-phone yellow">Rs. 5400 </span>
          </address>
          <article class="detailed-logo">
            <div class="details"> <a class="button yellow full-width uppercase btn-medium">BOOK NOW</a> </div>
          </article>
        </div>
        <div class="travelo-box">
          <h4>Other Homam</h4>
          <div class="image-box style14">
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-img.jpg" alt="" /></a> </figure>
              <div class="details with-button">
                <h5 class="box-title"><a href="#">Homam 1<small> Rs. 3250 </small></a></h5>
                <a class="button btn-mini yellow">GET DETAILS</a>
              </div>
            </article>
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-img.jpg" alt="" /></a> </figure>
              <div class="details with-button">
               <h5 class="box-title"><a href="#">Homam 2<small> Rs. 3250 </small></a></h5>
                <a class="button btn-mini yellow">GET DETAILS</a>
              </div>
            </article>
            <article class="box">
              <figure> <a href="#"><img src="<?php echo $layout_asset; ?>/images/tour-img.jpg" alt="" /></a> </figure>
              <div class="details with-button">
               <h5 class="box-title"><a href="#">Homam 3<small> Rs. 3250 </small></a></h5>
                <a class="button btn-mini yellow">GET DETAILS</a>
              </div>
            </article>
          </div>
        </div>
        <div class="travelo-box">
          <article class="detailed-logo">
            <div class="details"> <a class="button yellow full-width uppercase btn-medium">CONSULT OUR ASTROLOGER</a> </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</section>
