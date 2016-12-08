<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<meta charset="UTF-8" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo $layout_asset; ?>/images/favicon.ico" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png" />
	
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="google-site-verification" content="C2SLbTqHJEHf28x8oX1TO4HPcWNh182oRmMMAfJ1ckc" />
   
<?php
	
	$cs=Yii::app()->clientScript;
    $cssCoreUrl = $cs->getCoreScriptUrl();
   	//$cs->registerCoreScript('jquery');
    $cs->registerCoreScript('jquery.ui');
	//$cs->scriptMap=array( 'jquery.js'=>false );
	$cs->registerCssFile($layout_asset.'/css/style.css');
    $cs->registerCssFile($layout_asset.'/css/font-awesome.min.css');
    //$cs->registerCssFile($layout_asset.'/css/flexslider.css');
    //$cs->registerCssFile($layout_asset.'/css/font-awesome-ie7.min.css');
    //$cs->registerCssFile($layout_asset.'/css/keyframes.css');
    $cs->registerCssFile($layout_asset.'/css/grid.css');
	$cs->registerCssFile($layout_asset.'/css/skdslider.css');
	$cs->registerCssFile($layout_asset.'/css/responsive-banner.css');
	$cs->registerCssFile($layout_asset.'/css/temple_slider.css');
	//$cs->registerCssFile($layout_asset.'/css/tooltipster.css');
	//$cs->registerCssFile($layout_asset.'/css/grid.css');
	//$cs->registerCssFile($layout_asset.'/css/temple_final.css');
	//Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery-1.11.1.min.js', CClientScript::POS_HEAD);
	Yii::app()->clientScript->registerScriptFile('http://code.jquery.com/jquery-1.11.1.min.js', CClientScript::POS_HEAD);
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery-ui-1.10.2.custom.min.js', CClientScript::POS_HEAD);
	Yii::app()->clientScript->registerCssFile($layout_asset.'/css/jquery-ui-1.10.2.custom.min.css');
	
    ?>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56707900-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<?php echo $content; ?>

<?php 
	//$cs->registerScriptFile($layout_asset.'/js/jquery.min.js', CClientScript::POS_HEAD);
	//$cs->registerScriptFile($layout_asset.'/js/jquery-1.9.1.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile('http://html5shim.googlecode.com/svn/trunk/html5.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($layout_asset.'/js/base.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($layout_asset.'/js/jquery.fitvids.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/js/jquery.flexslider-min.js', CClientScript::POS_HEAD); 
    $cs->registerScriptFile($layout_asset.'/js/jquery.inview.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($layout_asset.'/js/jquery.scrollParallax.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($layout_asset.'/js/skdslider.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/js/jquery.flexisel.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/js/temple_slider.js', CClientScript::POS_HEAD);
	//$cs->registerScriptFile($layout_asset.'/js/jquery-1.4.2.min.js', CClientScript::POS_HEAD);
	//$cs->registerScriptFile($layout_asset.'/js/chilltip-packed.js', CClientScript::POS_HEAD);
	
	
	
	
	
	
?>

</html>