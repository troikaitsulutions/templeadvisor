<?php $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; ?>
<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo Temples::GetName($page_id);  ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
<?php
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'direction-grid',
	'dataProvider'=>$model->searchByobject($page_id),
	'filter'=>$model,
        'summaryText'=>t('Displaying').' {start} - {end} '.t('in'). ' {count} '.t('results'),
	'pager' => array(
		'header'=>t('Go to page:'),
		'nextPageLabel' => t('Next'),
		'prevPageLabel' => t('previous'),
		'firstPageLabel' => t('First'),
		'lastPageLabel' => t('Last'),
        'pageSize'=> Yii::app()->settings->get('system', 'page_size')
	),
	'columns'=>array(
		
      			
		 array(
			'name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id,"page_id"=>$data->prop_id))',
		    ), 
			
		array('name'=>'from_date',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'date("d-M-Y",$data->from_date)',
		    ),
		array('name'=>'to_date',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'date("d-M-Y",$data->to_date)',
		    ),
			
		 array(
			'name'=>'comment',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->comment',
		    ), 
			
		array(
			'name'=>'status',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'($data->status==1)?"Active":"Disable"',
		    ), 
		
	   
		    			
		array
		(
		    'class'=>'CButtonColumn',
		    'template'=>'{update}',
		    'buttons'=>array
		    (
			'update' => array
			(
			    'label'=>t('Edit'),
			    'imageUrl'=>false,
			    'url'=>'Yii::app()->createUrl("'.app()->controller->id.'/update", array("id"=>$data->id,"page_id"=>$data->prop_id))',
			),
		    ),
		),
                array
		(
		    'class'=>'CButtonColumn',
		    'template'=>'{delete}',
		    'buttons'=>array
		    (
			'delete' => array
			(
                            'label'=>t('Delete'),
			    'imageUrl'=>false,
			),

		    ),
		),
		
	),
)); ?>
  <div class="clear"></div>
</div>