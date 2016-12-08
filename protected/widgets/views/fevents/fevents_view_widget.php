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
            'name'=>'lang',
			'type'=>'raw',			
			'value'=>Language::convertLanguage($model->lang),                   
                ),
		'content'
             
                
	),
)); ?>
