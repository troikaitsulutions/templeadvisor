<div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo Pinfo::getPageName($page_id);  ?></h1>                               
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
			'name'=>'Service Type',
			'type'=>'raw',		
			'value'=>$model->s_type,
		    ),	
		array(
			'name'=>'name',
			'type'=>'raw',		
			'value'=>CHtml::link($model->name,array("update","id"=>$model->id)),
		    ),
		array(
			'name'=>'Content',
			'type'=>'raw',		
			'value'=>$model->content,
		    ),	
		array(
            'name'=>'lang',
			'type'=>'raw',			
			'value'=>Language::convertLanguage($model->lang),                   
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