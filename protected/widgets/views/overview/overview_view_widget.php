<?php $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; ?>
<?php     
       if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
?>

<div>

 <div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo t("Overview Informations"); ?></h1>                               
                        <div class="clear"></div>
                    </div>
                    <div class="block-fluid table-sorting">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            
        array('name'=>'id',
			'type'=>'raw',			
			'value'=>$model->id,
		    ),
			
			
		array(
			'name'=>'title',
			'type'=>'raw',		
			'value'=>CHtml::link($model->title,array("update","id"=>$model->id)),
		    ),
				
                
		array(
			'name'=>'description',
			'type'=>'raw',		
			'value'=>$model->description,
		    ),
			
	
			
	),
)); ?>
 <div class="clear"></div>
                    </div>

</div>
 <div class="dr"><span></span></div>
 
 
<?php 
  $photos = Ovgallery::model()->findAll(array(
  	'condition'=>'prop_id='.$model->id,
  	'order' => 'img_order ASC',
  ));
  
  if($photos) {
  
  ?>
<div class="row-fluid">
  <div class="span12">
    <div class="head">
      <div class="isw-picture"></div>
      <h1><a href="<?php echo Yii::app()->createUrl('beovgallery/admin?page_id='.$id);?>" target="_blank" style="color:#FFFFFF;"><?php echo t('Photos'); ?></a></h1>
      <?php
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'buttons'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('/beovgallery/admin','page_id'=>$id),'visible'=>( (user()->isAgent) ) ? false : true,),
					
						),
					));
					?>
      <div class="clear"></div>
    </div>
    <div class="block thumbs">
      <?php foreach ($photos as $ph) { ?>
      <div class="thumbnail"> <a class="fancybox" rel="group" href="<?php echo Ovgallery::GetLargeImage($ph); ?>"><img src="<?php echo Ovgallery::GetThumbnail($ph); ?>" width="210px" class="img-polaroid"/></a>
        <div class="caption">
          <h5><?php echo t($ph->name); ?></h5>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="clear"></div>
  </div>
</div>
</div>
<?php } ?>