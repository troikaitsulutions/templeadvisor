 <div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo t("Property's Review"); ?></h1>                               
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
			'name'=>'parent',
			'type'=>'raw',
			'value'=>Temples::GetName($model->parent),
		    ),
		'divine_power', 'popularity', 'accessibility', 'facility_food', 'cleanliness',
		array(
			'name'=>'comments',
			'type'=>'raw',
			'value'=>$model->comments,
		    ),

	),
)); ?>
 <div class="clear"></div>
                    </div>