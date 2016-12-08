
<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t('All Products');  ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
  <?php
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'direction-grid',
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
	
	array(
			'header'=>'Icon',
			'type'=>'image',
			'htmlOptions'=>array('class'=>'gridLeft','align'=>'center','border'=>'5px'),
			'value'=>'Product::GetThumbnail($data->icon_file)',
            'filter'=>false,
			'visible'=>true
		    ),
		
      			
		 
		 array(
			'name'=>'pcode',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->pcode',
		    ),
			
		 array(
			'name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ), 
			
		 
			
		array(
			'name'=>'category',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'Tcategory::GetName($data->category)',
		    ), 
			
		array(
			'name'=>'cost',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->cost',
		    ), 
			
		array(
			'name'=>'total',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->total',
		    ), 
			
		array(
			'name'=>'vendor',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'Villaowner::GetName($data->vendor)',
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
			    'url'=>'Yii::app()->createUrl("'.app()->controller->id.'/update", array("id"=>$data->id,"category"=>$data->category))',
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
