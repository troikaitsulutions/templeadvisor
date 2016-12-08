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
			'name'=>'fname',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'CHtml::link($data->fname,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
			
		array(
			'name'=>'email_id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->email_id',
		    ),
		array(
			'name'=>'description',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->description',
		    ),
		/*array(
			'name'=>'page',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'Object::item($data->parent)',
		    ),*/
                
        array(
            'name'=>'lang',
			'type'=>'raw',			
			'value'=>'Language::convertLanguage($data->lang)',                   
                ),
		
	),
)); ?>
