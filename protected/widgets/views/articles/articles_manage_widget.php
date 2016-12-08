
<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t('All Articles'); ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'temples-grid',
	'dataProvider'=>$model->search(),
	'filter'=>((Yii::app()->controller->id=='bearticles')?$model:null),
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
			'name'=>'id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft','style'=>'width:7%'),
			'value'=>'$data->id',
			'visible'=>true
		    ),
		
        array(
			'name'=>'heading',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>(Yii::app()->controller->id=='bearticles')? 'CHtml::link($data->heading,array("'.app()->controller->id.'/view","id"=>$data->id))': 'CHtml::link($data->name,array("betemples/view","id"=>$data->id))',
		    ),
			
		
		
	
			 
		array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
            'filter'=>false,
			
		    ),
			
		array(
			'name'=>'crby',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'User::GetUserName($data->crby)',
			 'filter'=>false,
		    ),
			
		array(
			'name'=>'mod_by',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'User::GetUserName($data->mod_by)',
			 'filter'=>false,
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
)); 


