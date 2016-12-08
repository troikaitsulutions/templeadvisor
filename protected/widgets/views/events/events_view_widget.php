<?php $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; ?>
<div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo Temples::GetName($page_id);  ?></h1>                               
                        <div class="clear"></div>
                    </div>
                    <div class="block-fluid table-sorting">
 <?php  // echo t("Property Name : ").Object::item($model->object_id);  ?>
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
			'value'=>CHtml::link($model->name,array("update","id"=>$model->id,"page_id"=>$model->prop_id)),
		    ),	
		array(
			'name'=>'from_date',
			'type'=>'raw',		
			'value'=>date("d-M-Y",$model->from_date),
		    ),
		array(
			'name'=>'to_date',
			'type'=>'raw',		
			'value'=>date("d-M-Y",$model->to_date),
		    ),
			
		array(
			'name'=>'comment',
			'type'=>'raw',		
			'value'=>$model->comment,
		    ),	
		array(
			'name'=>'status',
			'type'=>'raw',		
			'value'=>($model->status==1)?"Active":"Disable",
		    ),	
	),
)); ?>
 <div class="clear"></div>
                    </div>