 <div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo t("Content Link's Information"); ?></h1>                               
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
			'name'=>'title',
			'type'=>'raw',		
			'value'=>CHtml::link($model->title,array("update","id"=>$model->id)),
		    ),
			
		array(
			'name'=>'anchor',
			'type'=>'raw',
			'value'=>$model->anchor,
		    ),
			
		array(
			'name'=>'url',
			'type'=>'raw',
			'value'=>$model->url,
		    ),
					array(
			'name'=>'text_format',
			'type'=>'raw',
			'value'=>$model->text_format,
		    ),

		array(
			'name'=>'font_size',
			'type'=>'raw',
			'value'=>$model->font_size,
		    ),


	),
)); ?>
 <div class="clear"></div>
                    </div>