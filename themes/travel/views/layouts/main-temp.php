<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);	
?>

<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->

<head>
<!-- Meta Tags -->
<meta charset="utf-8">
<link rel="shortcut icon" href="<?php echo $layout_asset; ?>/images/favicon.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Theme Styles -->

<?php
	
	$cs=Yii::app()->clientScript;
    $cssCoreUrl = $cs->getCoreScriptUrl();
   	$cs->registerCoreScript('jquery', CClientScript::POS_END);
    $cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
	$cs->registerCssFile($layout_asset.'/css/bootstrap.min.css');
    $cs->registerCssFile($layout_asset.'/css/font-awesome.min.css');
    $cs->registerCssFile($layout_asset.'/css/animate.min.css');
	$cs->registerCssFile($layout_asset.'/css/style.css');
	$cs->registerCssFile($layout_asset.'/css/custom.css');
	
	$cs->registerCssFile($layout_asset.'/components/jquery.bxslider/jquery.bxslider.css');
	$cs->registerCssFile($layout_asset.'/components/revolution_slider/css/settings.css');
	$cs->registerCssFile($layout_asset.'/components/revolution_slider/css/settings.css');
    $cs->registerCssFile($layout_asset.'/components/revolution_slider/css/style.css');
    $cs->registerCssFile($layout_asset.'/components/jquery.bxslider/jquery.bxslider.css');
	$cs->registerCssFile($layout_asset.'/components/flexslider/flexslider.css');
	
	$cs->registerCssFile($layout_asset.'/css/updates.css');
	$cs->registerCssFile($layout_asset.'/css/responsive.css');
    ?>
<!-- Javascript Page Loader 
    <script type="text/javascript" src="<?php echo $layout_asset; ?>/js/pace.min.js" data-pace-options='{ "ajax": false }'></script>
    <script type="text/javascript" src="<?php echo $layout_asset; ?>/js/page-loading.js"></script>-->
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

<div id="page-wrapper">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset )); ?>
  <?php echo $content; ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
<?php 
	
	$cs->registerScriptFile($layout_asset.'/js/jquery.noconflict.js', CClientScript::POS_END);
    $cs->registerScriptFile($layout_asset.'/js/modernizr.2.7.1.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($layout_asset.'/js/jquery-migrate-1.2.1.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/js/jquery.placeholder.js', CClientScript::POS_HEAD); 
    $cs->registerScriptFile($layout_asset.'/js/bootstrap.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/js/jquery.stellar.min.js', CClientScript::POS_END);
	$cs->registerScriptFile($layout_asset.'/js/waypoints.min.js', CClientScript::POS_END);
	$cs->registerScriptFile($layout_asset.'/js/theme-scripts.js', CClientScript::POS_END);
	$cs->registerScriptFile($layout_asset.'/js/scripts.js', CClientScript::POS_END);
	$cs->registerScriptFile($layout_asset.'/components/revolution_slider/js/jquery.themepunch.plugins.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/components/revolution_slider/js/jquery.themepunch.revolution.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/components/jquery.bxslider/jquery.bxslider.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/components/flexslider/jquery.flexslider.js', CClientScript::POS_HEAD);
?>
</html>