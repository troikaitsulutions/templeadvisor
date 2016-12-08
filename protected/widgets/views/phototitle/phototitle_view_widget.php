<div class="row-fluid">
<div class="span5">

 <div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo t("Information about Photo Title's"); ?></h1>                               
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
			'name'=>'alt_text',
			'type'=>'raw',		
			'value'=>CHtml::link($model->alt_text,array("update","id"=>$model->id)),
		    ),
		array(
			'name'=>'description',
			'type'=>'raw',		
			'value'=>CHtml::link($model->description,array("update","id"=>$model->id)),
		    ),
		
		
		
          
	),
)); ?>
 <div class="clear"></div>
                    </div>
</div>
</div>