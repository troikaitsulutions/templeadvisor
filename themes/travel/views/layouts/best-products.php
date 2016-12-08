<?php 
		  $PCategory = Tcategory::model()->findAll(array('condition'=>'status = 1'));
		  if(isset($PCategory) && count($PCategory)>0 ) {
?>

<div class="section container online-solution">
  <h2>Our Store</h2>
  <div class="image-carousel style2" data-animation="slide" data-item-width="270" data-item-margin="30">
        <ul class="slides image-box style3">
        <?php 
		  foreach ($PCategory as $pc ) {
			$Seo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$pc->uid)));
				if(isset($Seo) && count($Seo)>0 ) {
		?>
        <li class="box grey-bg">
            <figure> <a href="#" title="<?php echo  $pc->name; ?>">
            <img src="<?php echo Tcategory::GetThumbnail($pc->icon_file); ?>" alt="<?php echo  $pc->name; ?>" width="270" height="160"></a> </figure>
            <div class="details text-center">
              <h4 class="box-title"><?php echo  $pc->name; ?></h4>
           
              <p class="description description-text"><?php echo  $pc->comment; ?></p>
              <a href="#" class="button">SEE ALL</a> </div>
        </li>
        <?php } } ?> 
        </ul>
      </div>
</div>
<?php } ?>
