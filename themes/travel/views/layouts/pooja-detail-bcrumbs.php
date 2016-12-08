<div class="page-title-container detail-page-title-container">
  <div class="container">
	<ul class="breadcrumbs pull-right">
      <li><a href="/">HOME</a></li>
      <li><a href="<?php echo Yii::app()->createUrl('poojas/index',array('pooja'=>'online-pujas')); ?>">All Pujas</a></li>
      <!-- <li><a href="#">SHORTCODES</a></li> -->
      <li class="active"><?php echo $meta->breadcrumbs; ?></li>
    </ul>
	
    <div class="page-title pull-left">
      <h1 class="box-title"><?php echo $PujaDetail->name; ?></h1>
    </div>
    
    <div class="col-xs-12">
      <p><?php echo $PujaDetail->comment; ?></p>
    </div>
  </div>
</div>
