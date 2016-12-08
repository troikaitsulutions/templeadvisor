<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t("Testimonial's Information"); ?></h1>
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
            'name'=>'email',
			'type'=>'raw',			
			'value'=>$model->email,                   
            ),
			
		array(
            'name'=>'Heading',
			'type'=>'raw',			
			'value'=>$model->heading,                   
            ),
		
     
        array(
			'name'=>'comment',
			'type'=>'raw',
			'value'=>$model->comment,
			),
			
		 array(
			'name'=>'Date of Enquiry',
			'type'=>'raw',
			'value'=>date("d-m-Y",$model->created),
			),	
		
	),
)); ?>
  <div class="clear"></div>
</div>
