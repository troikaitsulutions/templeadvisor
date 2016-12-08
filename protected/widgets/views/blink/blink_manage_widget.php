<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'blink-grid',
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
		array('name'=>'id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->id',
		    ),
        array(
			'name'=>'title',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'CHtml::link($data->title,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
			
		array(
			'name'=>'anchor',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->anchor',
		    ),
			
		array(
			'name'=>'url',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->url',
		    ),
		array(
			'name'=>'group',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'Group::groupName($data->group)',
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
