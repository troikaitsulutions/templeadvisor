
<div class="block-fluid table-sorting">
  <?php
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'season-grid',
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
			'name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ), 
	   array(
			'name'=>'s_type',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->s_type',
		    ), 
			
		array(
            'name'=>'lang',
			'type'=>'raw',			
			'value'=>'Language::convertLanguage($data->lang)',                   
         ),
			
		array(
			'name'=>'status',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'($data->status==1)?"Active":"Disable"',
		    ), 
		/*
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
		  */  			
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
