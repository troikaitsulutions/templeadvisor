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
	$cs->registerCoreScript('jquery');
    $cs->registerCoreScript('jquery.ui');
	//$cs->scriptMap=array( 'jquery.js'=>false );
	$cs->registerCssFile($layout_asset.'/css/bootstrap.min.css');
    $cs->registerCssFile($layout_asset.'/css/font-awesome.min.css');
    $cs->registerCssFile($layout_asset.'/css/animate.min.css');
	$cs->registerCssFile($layout_asset.'/css/style.css');
	$cs->registerCssFile($layout_asset.'/css/custom.css');
	$cs->registerCssFile($layout_asset.'/css/updates.css');
	$cs->registerCssFile($layout_asset.'/css/responsive.css');
?>
	
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo 'http://'.$_SERVER['HTTP_HOST']; ?>/protected/assets/travel/css/ie.css" />
    <![endif]-->
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
	
	<!-- Javascript Page Loader 
    
	<script type="text/javascript" src="<?php echo $layout_asset; ?>/js/pace.min.js" data-pace-options='{ "ajax": false }'></script>
    <script type="text/javascript" src="<?php echo $layout_asset; ?>/js/page-loading.js"></script>
	
	-->
	
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56707900-1', 'auto');
  ga('send', 'pageview');

</script>

<div id="page-wrapper">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset )); ?>
  <?php echo $content; ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
<?php 
	
	$cs->registerScriptFile($layout_asset.'/js/jquery.noconflict.js', CClientScript::POS_END);
    $cs->registerScriptFile($layout_asset.'/js/jquery-migrate-1.2.1.min.js', CClientScript::POS_END);
	$cs->registerScriptFile($layout_asset.'/js/jquery.placeholder.js', CClientScript::POS_END); 
    $cs->registerScriptFile($layout_asset.'/js/bootstrap.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/js/theme-scripts.js', CClientScript::POS_END);
	$cs->registerScriptFile($layout_asset.'/js/scripts.js', CClientScript::POS_END);
	//$cs->registerScriptFile('https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js', CClientScript::POS_HEAD);
	//$cs->registerScriptFile('https://code.jquery.com/ui/1.12.0/jquery-ui.js', CClientScript::POS_HEAD);
	
	
	
?>
</html>