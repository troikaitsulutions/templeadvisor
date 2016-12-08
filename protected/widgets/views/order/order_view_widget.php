 <div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo t("People Category Information"); ?></h1>                               
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
			'name'=>'Category',
			'type'=>'raw',		
			'value'=>Order::getRankCategory($model->category),
		    ),
				
                
		array(
			'name'=>'Temple Name',
			'type'=>'raw',		
			'value'=>CHtml::link($model->name,array("update","id"=>$model->id)),
		    ),
			
			
	array('name'=>'state',
			'type'=>'raw',			
			'value'=>State::GetName($model->state),
		    ),
				
			
	array('name'=>'state_order',
			'type'=>'raw',			
			'value'=>$model->state_order,
		    ),	
			
			
	array('name'=>'district',
			'type'=>'raw',			
			'value'=>District::GetName($model->district),
		    ),
				
			
	array('name'=>'district_order',
			'type'=>'raw',			
			'value'=>$model->district_order,
		    ),			
			
			
			
	array('name'=>'region',
			'type'=>'raw',			
			'value'=>Reg::GetName($model->region),
		    ),
				
			
	array('name'=>'region_order',
			'type'=>'raw',			
			'value'=>$model->region_order,
		    ),					
			
			
			
	),
)); ?>
 <div class="clear"></div>
                    </div>
