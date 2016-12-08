<div class="span6">
<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo $model->name;  ?></h1>
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
		
		 'days','agent',
			
		array(
			'name'=>'comment',
			'type'=>'raw',		
			'value'=>$model->comment,
		    ),	
		array(
			'name'=>'status',
			'type'=>'raw',		
			'value'=>($model->status==1)?"Active":"Disable",
		    ),	
	),
)); ?>
  <div class="clear"></div>
</div>
</div>
