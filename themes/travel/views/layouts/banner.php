<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
			
		$home_js = 'tjq(document).ready(function() {
            tjq(".revolution-slider").revolution(
            {
                dottedOverlay:"none",
                delay:2500,
                startwidth:1170,
                startheight:400,
                onHoverStop:"on",
                hideThumbs:10,
                fullWidth:"on",
                forceFullWidth:"on",
                navigationType:"none",
                shadow:0,
                spinner:"spinner4",
                hideTimerBar:"on",
            });
        });';
		
	Yii::app()->clientScript->registerCssFile($layout_asset.'/components/revolution_slider/css/settings.css');
	Yii::app()->clientScript->registerCssFile($layout_asset.'/components/revolution_slider/css/settings.css');
    Yii::app()->clientScript->registerCssFile($layout_asset.'/components/revolution_slider/css/style.css');
?>

<div id="slideshow">
  <div class="fullwidthbanner-container">
    <div class="revolution-slider" style="height: 0; overflow: hidden;">
      <ul>
        <li data-masterspeed="350" data-slotamount="7" data-transition="turnoff-vertical"> <img src="<?php echo $layout_asset; ?>/images/home-slider/golden-temple.jpg" alt="Golden Temple"> </li>
		<li data-masterspeed="350" data-slotamount="7" data-transition="turnoff-vertical"> <img src="<?php echo $layout_asset; ?>/images/home-slider/konark-rock-temple.jpg" alt="Konark Rock Temple"> </li>
		<li data-masterspeed="350" data-slotamount="7" data-transition="turnoff-vertical"> <img src="<?php echo $layout_asset; ?>/images/home-slider/prahadeeshwara-temple.jpg" alt="Prahadeeshwara Temple"> </li>
		<li data-masterspeed="350" data-slotamount="7" data-transition="turnoff-vertical"> <img src="<?php echo $layout_asset; ?>/images/home-slider/ranakpur-jain-temple.jpg" alt="Ranakpur Jain temple"> </li>
		<li data-masterspeed="350" data-slotamount="7" data-transition="turnoff-vertical"> <img src="<?php echo $layout_asset; ?>/images/home-slider/annamalaiyar-temple.jpg" alt="Annamalaiyar Temple"> </li>
		<li data-masterspeed="350" data-slotamount="7" data-transition="turnoff-vertical"> <img src="<?php echo $layout_asset; ?>/images/home-slider/sanchi-stupa.jpg" alt="Sanchi Stupa"> </li>
        <li data-masterspeed="350" data-slotamount="7" data-transition="turnoff-vertical"> <img src="<?php echo $layout_asset; ?>/images/home-slider/masroor-rock-cut-temple.jpg" alt="Masroor Rock Cut Temple"> </li>
		<li data-masterspeed="350" data-slotamount="7" data-transition="turnoff-vertical"> <img src="<?php echo $layout_asset; ?>/images/home-slider/trayambakeshwar-rishikesh.jpg" alt="Trayambakeshwar Rishikesh"> </li>
      </ul>
    </div>
  </div>
</div>
<?php
	Yii::app()->clientScript->registerScript('sortable-project', $home_js); 
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/components/revolution_slider/js/jquery.themepunch.plugins.min.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/components/revolution_slider/js/jquery.themepunch.revolution.min.js', CClientScript::POS_END);
?>
