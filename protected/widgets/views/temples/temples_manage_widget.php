
<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t('All Temples'); ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'temples-grid',
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
			'header'=>'Temple Image',
			'type'=>'html',
			'htmlOptions'=>array('class'=>'gridLeft','align'=>'center','border'=>'5px','height'=>'100px', 'width'=>'120px'),
			'value' => 'CHtml::image(Gallery::GetPropThumbnail($data->id), $data->name, array("width"=>150))',
            'filter'=>false,
			'visible'=>true
		    ),
			
		array(
			'name'=>'id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft','style'=>'width:7%'),
			'value'=>'$data->id',
			'visible'=>true
		    ),
		
        array(
			'name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),	
			
		array(
			'name'=>'religion',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'filter'=>CHtml::listData(Religion::model()->findAll(),'id','name'),
			'value'=>'Religion::GetName($data->religion)',
		    ),
		
		array(
			'name'=>'deity',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->deity',
		    ),
		
		/*array(
			'name'=>'sdeity',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'filter'=>CHtml::listData(Diety::model()->findAll(),'id','name'),
			'value'=>'$data->DietyName->name',
		    ),
			*/
			
			
		array(
			'name'=>'crby',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'($data->crby!=0)?$data->CreateUserName->display_name:""',
		    ),
			
		array(
			'name'=>'mod_by',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'($data->mod_by!=0)?$data->ModUserName->display_name:""',
		    ), 
		array(
            'header'=>'Action',
			'type'=>'raw',			
			'value'=>'Temples::get_actionchanges($data)'                  
             ),	
			
		
                array
		(
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