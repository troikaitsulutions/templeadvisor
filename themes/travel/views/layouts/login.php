<?php 
        
        if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
			
        $this->renderPartial('header',array('backend_asset'=>$backend_asset));  
        
        ?>
        
<?php
 	//if(YII_DEBUG)
    //	$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('common.front_layouts.default.assets'), false, -1, true);
	//else 
	//	$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('common.front_layouts.default.assets'), false, -1, false);
?>
<?php //$this->renderPartial('common.front_layouts.default.header',array('layout_asset'=>$layout_asset)); ?>
        

<body>
<div class="outer_wrapper">
  <div class="wrapper">
    <header class="inner-page">
      <?php //$this->renderPartial('common.front_layouts.default.headerlogo',array('page'=>$page, 'flag'=>$flag, 'layout_asset'=>$layout_asset)); ?>
      <?php //$this->renderPartial('common.front_layouts.default.topmenu',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
    </header>
    <div id="container_thanku">
      <section>
        <?php // $this->renderPartial('common.front_layouts.default.second-row-menu',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
        <?php // $this->renderPartial('common.front_layouts.default.breadcrumbs',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
        
        <div id="site-content" style="margin:0 auto; width:400px; border-top:0px"> <?php echo $content; ?> </div>
      </section>
      <!--* End - Section *--> 
    </div>
    <?php //$this->renderPartial('common.front_layouts.default.footer',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
  </div>
</div>
<?php //$this->renderPartial('common.front_layouts.default.footermenu',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
</body>
</html>