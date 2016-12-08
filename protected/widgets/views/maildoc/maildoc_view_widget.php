 <div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo t("Back Link's Information"); ?></h1>                               
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
			'name'=>'title',
			'type'=>'raw',		
			'value'=>CHtml::link($model->title,array("update","id"=>$model->id)),
		    ),
			
		array(
			'name'=>'description',
			'type'=>'raw',
			'value'=>$model->description,
		    ),

		array(
			'name'=>'signature',
			'type'=>'raw',
			'value'=>$model->signature,
		    ),
        
        array(
            'name'=>'lang',
			'type'=>'raw',			
			'value'=>Language::convertLanguage($model->lang),                   
                )
	),
)); ?>
 <div class="clear"></div>
                    </div>