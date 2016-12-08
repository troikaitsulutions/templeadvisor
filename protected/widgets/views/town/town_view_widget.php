
<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t("Town's Information"); ?></h1>
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
			'name'=>'name',
			'type'=>'raw',		
			'value'=>CHtml::link($model->name,array("update","id"=>$model->id)),
		    ),
		array(
			'name'=>'source',
			'type'=>'raw',		
			'value'=>District::GetName($model->source),
		    ),
		array(
			'name'=>'latitude',
			'type'=>'raw',		
			'value'=>$model->latitude,
		    ),
		array(
			'name'=>'longitude',
			'type'=>'raw',		
			'value'=>$model->longitude,
		    ),
		
     
        array(
			'name'=>'content',
			'type'=>'raw',
			'value'=>$model->content,
			),
	),
)); ?>
  <div class="clear"></div>
</div>

<?php 

if ( ($model->latitude !='') && ($model->longitude!='') ) {

?>

<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t("See the location in google map"); ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
<iframe width="1020" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/?q=<?php echo $model->latitude; ?>,<?php echo $model->longitude; ?>&amp;oq=<?php echo $model->name; ?>&amp;ie=UTF8&amp;z=10&amp;output=embed"></iframe>

  <div class="clear"></div>
</div>
<?php } ?>