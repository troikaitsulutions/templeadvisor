<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t("All Subscriber's"); ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subscribers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'summaryText'=>t('Displaying').' {start} - {end} '.t('in'). ' {count} '.t('results'),
	'pager' => array(
		'header'=>t('Go to page:'),
		'nextPageLabel' => t('Next'),
		'prevPageLabel' => t('previous'),
		'firstPageLabel' => t('First'),
		'lastPageLabel' => t('Last'),
        'pageSize' => Yii::app()->settings->get('system', 'page_size')
	),
	'template' => "{pager}\n{summary}\n{items}\n{pager}",
	'columns'=>array(
		array(
			'header'=>'ID',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->id',
		    ),	
       
		
		array(
			'header'=>'Email ID',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->email',
		    ),	
	
		array(
			'header'=>'Date',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'date("d-m-Y",$data->created)',
		    ), 
		array(
		    'class'=>'CButtonColumn',
		    'template'=>'{delete}',
			'visible'=>((user()->isAdmin ) ? true : false ),
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


?>
  <div class="clear"></div>
</div>