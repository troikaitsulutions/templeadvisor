<?php
	//Need to add the jwplayer for embedding video
		if(YII_DEBUG)
            $player_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.player'), false, -1, true);
         else 
            $player_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.player'), false, -1, false);
		 
		 $cs=Yii::app()->clientScript;
		 $cs->registerScriptFile($player_asset.'/jwplayer.js', CClientScript::POS_HEAD);	
?> 

	
<script type="text/javascript">

	function act()
	{
var idList    = $('input[type=checkbox]:checked').serialize();
if(idList)
{
if(confirm(''Are you sure want to delete?'))
{
$.post('/cms/category/delete',idList,function(response){
$.fn.yiiGridView.update('cat-grid');
});
}
}
}
    
</script>  