<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t('All Properties'); ?></h1>
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
	
	
	
	array(
			'name'=>'id',
			'type'=>'image',
			'htmlOptions'=>array('class'=>'gridLeft','align'=>'center','border'=>'5px'),
			'value'=>'Gallery::GetPropThumbnail($data->id)',
		    ),
	
		array(
			'name'=>'id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->id',
		    ),
		
        array(
			'name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
			
		array(
			'name'=>'tt_name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->tt_name',
		    ),
		
		array(
			'name'=>'province',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'Province::GetName($data->province)',
		    ),
                
        array(
            'name'=>'lang',
			'type'=>'raw',			
			'value'=>'Language::convertLanguage($data->lang)',                   
             ),
			 
		array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
            'filter'=>false
		    ),
		array(
            'name'=>'mstatus',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
            'filter'=>false
		    ),
        array
		(
		    'class'=>'CButtonColumn',
		    'template'=>'{translate}',
		    'visible'=>Yii::app()->settings->get('system','language_number') > 1,
		    'buttons'=>array
		    (
			'translate' => array
			(
			   'label'=>t('Translate'),
			    'imageUrl'=>false,
			    'url'=>'Yii::app()->createUrl("'.app()->controller->id.'/create", array("guid"=>$data->guid))',
			),
		    ),
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