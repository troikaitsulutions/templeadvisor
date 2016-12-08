                   
                    <div class="head">
                        <div class="isw-grid"></div>
                        <h1><?php echo t('All Document Agreement creation'); ?></h1>                               
                        <div class="clear"></div>
                    </div>
                    <div class="block-fluid table-sorting">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'docagrrement-grid',
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
/*		array('name'=>'doc_name',
			'type'=>'raw',
			'value'=>'$data->groupcreation->group_creation_name',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'filter'=> CHtml::listData(Groupcreation::model()->findAll(array('order'=>'id asc')),'id','group_creation_name') ,
 

		    ),
		     
*/			 
		array('name'=>'doc_name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
		    ),
			
			array('name'=>'people_type',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->name->name',
		    ),
			
			array('name'=>'description',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
		    ),
			
			array('name'=>'attachment_file',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'CHtml::link($data->attachment_file,array("../resources/document_agrrement/$data->attachment_file"), array("target"=>"_blank"))',
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
                   