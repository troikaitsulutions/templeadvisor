 <div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo t("Article"); ?></h1>                               
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
			'name'=>'email_id',
			'type'=>'raw',		
			'value'=> $model->email_id,
		    ),
			
		
            array(
			'name'=>'content1',
			'type'=>'raw',
			'value'=>$model->content1,
			),
	),
)); ?>
 <div class="clear"></div>
                    </div>
