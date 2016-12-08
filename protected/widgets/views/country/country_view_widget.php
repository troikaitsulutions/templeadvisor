 <div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo t("Country's Information"); ?></h1>                               
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
			'value'=>CHtml::link(Countrylist::GetName($model->name),array("update","id"=>$model->id)),
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
