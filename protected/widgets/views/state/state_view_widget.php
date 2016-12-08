 <div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo t("State's Information"); ?></h1>                               
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
			'name'=>'source',
			'type'=>'raw',		
			'value'=>Countrylist::GetName(Country::GetName($model->source)),
		    ),
			array(
            'name'=>'lang',
			'type'=>'raw',			
			'value'=>Language::convertLanguage($model->lang),                   
            ),
     
            array(
			'name'=>'content',
			'type'=>'raw',
			'value'=>$model->content,
			),
	),
)); ?>
 <div class="clear"></div>
                    </div>
