<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            
        array('name'=>'id',
			'type'=>'raw',			
			'value'=>$model->id,
		    ),
                
		array(
			'name'=>'fname',
			'type'=>'raw',		
			'value'=>$model->fname,
		    ),
			
		array(
			'name'=>'page',
			'type'=>'raw',
			'value'=>Object::item($model->parent),
		    ),

		array(
			'name'=>'email_id',
			'type'=>'raw',
			'value'=>$model->email_id,
		    ),
			
		array(
			'name'=>'description',
			'type'=>'raw',		
			'value'=>$model->description,
		    ),
        
        array(
            'name'=>'lang',
			'type'=>'raw',			
			'value'=>Language::convertLanguage($model->lang),                   
             )  
	),
)); ?>
