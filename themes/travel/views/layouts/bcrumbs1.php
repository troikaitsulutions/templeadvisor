<!--
<div class="theme-slogan-left">
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="<?php echo Yii::app()->createUrl('temples')?>">Temples</a></li>
    <li><span class="active"><?php echo $meta->breadcrumbs; ?></span></li>
    <div class="clr"></div>
  </ul>
  <div class="clr"></div>
</div>
-->
<div class="page-title-container">
  <div class="container">
  <ul class="breadcrumbs pull-right">
      <li><a href="<?php echo $BreadCrumbs[0]['url']; ?>"><?php echo $BreadCrumbs[0]['label']; ?></a></li>
      <li><a href="<?php echo $BreadCrumbs[1]['url']; ?>"><?php echo $BreadCrumbs[1]['label']; ?></a></li>
      <li class="active"><?php echo $BreadCrumbs[2]['label']; ?></li>
    </ul>
    <div class="page-title pull-left">
      <h2 class="entry-title"><?php echo $meta->h1; ?></h2>
    </div>
    
  </div>
</div>
   

 
