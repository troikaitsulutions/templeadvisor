<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            
        array('name'=>'object_id',
			'type'=>'raw',			
			'value'=>$model->object_id,
		    ),
                
		array(
			'name'=>'object_name',
			'type'=>'raw',		
			'value'=>CHtml::link($model->object_name,array("update","id"=>$model->object_id)),
		    ),
            'object_title', 
			'object_slug',
       
             array(
			'name'=>'object_date',
			'value'=>date("Y-m-d H:i:s", $model->object_date)
			),
                 
		array(
			'name'=>'object_status',
			'type'=>'raw',			
			'value'=>Object::convertObjectStatus($model->object_status),
			),
			
			array(
            'name'=>'lang',
			'type'=>'raw',			
			'value'=>Language::convertLanguage($model->lang),                   
                ),
     
            array(
			'name'=>'object_content',
			'type'=>'raw',
			'value'=>$model->object_content,
			),
	),
)); ?>
