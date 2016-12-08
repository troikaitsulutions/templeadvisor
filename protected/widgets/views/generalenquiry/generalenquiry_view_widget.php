<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t("Enquiry's Information"); ?></h1>
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
			'value'=>$model->name,
		    ),
	
		array(
            'name'=>'email',
			'type'=>'raw',			
			'value'=>$model->email,                   
            ),
			
		array(
            'name'=>'phoneno',
			'type'=>'raw',			
			'value'=>$model->phoneno,                   
            ),
		
     
        array(
			'name'=>'remarks',
			'type'=>'raw',
			'value'=>$model->remarks,
			),
			
		 array(
			'header'=>'Date of Enquiry',
			'type'=>'raw',
			'value'=>date("d-m-Y",$model->created),
			),	
		
	),
)); ?>
  <div class="clear"></div>
</div>
