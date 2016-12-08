<?php
	//Need to add the jwplayer for embedding video
		if(YII_DEBUG)
            $player_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.player'), false, -1, true);
         else 
            $player_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.player'), false, -1, false);
		 
		 $cs=Yii::app()->clientScript;
		 $cs->registerScriptFile($player_asset.'/jwplayer.js', CClientScript::POS_HEAD);	
?> 
<script type='text/javascript'>
		var player_path='<?php echo $player_asset; ?>';
		var media_count=1;
</script>	
	
<script type="text/javascript">

	$(document).ready(function () {
	
	
           
        
        
    });
    
</script>  