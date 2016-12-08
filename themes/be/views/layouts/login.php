<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php 
        
        if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
			
        $this->renderPartial('header',array('backend_asset'=>$backend_asset));  
        
        ?>
</head>
<body>
<div class="outer_wrapper">
  <div class="wrapper">
    <header class="inner-page">
    </header>
    <div id="container_thanku">
      <section>
        <div id="site-content" style="margin:0 auto; width:400px; border-top:0px"> <?php echo $content; ?> </div>
      </section> 
    </div>
  </div>
</div>
</body>
</html>