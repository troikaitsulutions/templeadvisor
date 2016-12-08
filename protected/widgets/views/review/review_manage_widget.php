<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t('All Temples Reviews'); ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'taxonomy-grid',
	'dataProvider'=>$model->search(),
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
		/*array('name'=>'id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->id',
		    ),*/
        array(
			'name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
		
		array(
			'name'=>'parent',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'Temples::GetName($data->parent)',
		    ),
		
		
		
		array(
			'name'=>'divine_power',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->divine_power',
		    ),
		array(
			'name'=>'popularity',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->popularity',
		    ),
		array(
			'name'=>'accessibility',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->accessibility',
		    ),
		array(
			'name'=>'facility_food',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->facility_food',
		    ),
		array(
			'name'=>'cleanliness',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->cleanliness',
		    ),
		
		array(
			'name'=>'comments',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->comments',
		    ),
		
			
		array(
			'name'=>'date_added',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'Date("d-M-Y",$data->date_added)',
		    ),
                
      
		array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
            'filter'=>false
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
			    'url'=>'Yii::app()->createUrl("'.app()->controller->id.'/update", array("id"=>$data->id))',
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