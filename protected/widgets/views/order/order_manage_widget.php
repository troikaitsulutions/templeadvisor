<div class="workplace">
<div class="form">
  <div class="row-fluid">
    <div class="span12">
      <div class="head">
        <div class="isw-users"></div>
        <h1><?php echo t("Temple's Rank List"); ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid tabs">
        <ul>
          <li><a href="#tabs-1"><?php echo t('State'); ?></a></li>
          <li><a href="#tabs-2"><?php echo t('District'); ?></a></li>
          <li><a href="#tabs-3"><?php echo t('Region'); ?></a></li>
        </ul>
     <div id="tabs-1">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'country-order-grid',
	'dataProvider'=> $model->searchbystateorder(),
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
	
	array('header'=>'Category',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Order::getRankCategory($data->category)',
		    ),
	
	
		array('header'=>'State Name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'State::GetName($data->state)',
		    ),
	
		array('header'=>'State Rank',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->state_order',
		    ),
		   
		
		array('header'=>'Temple Name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			
			'value'=>'CHtml::link(Temples::GetName($data->name),array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
 
		 array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
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
?>
        </div>
        
        <div id="tabs-2">
          <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'district-order-grid',
	'dataProvider'=>$model->searchbydistrictorder(),
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
	
	array('header'=>'Category',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Order::getRankCategory($data->category)',
		    ),
	
	
	array('header'=>'District Name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'District::GetName($data->district)',
		    ),
	
		
		array('header'=>'District Rank',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->district_order',
		    ),
		   
		
		array('header'=>'Temple Name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			
			'value'=>'CHtml::link(Temples::GetName($data->name),array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
	
			    
		 array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
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
?>
        </div>
        
        <div id="tabs-3">
      <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'region-order-grid',
	'dataProvider'=>$model->searchbyregionorder(),
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
	
	array('header'=>'Category',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Order::getRankCategory($data->category)',
			
		    ),
	
	
	array('header'=>'Region Name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Reg::GetName($data->region)',
		    ),
		   
	
		array('header'=>'Region Rank',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->region_order',
		    ),
		   
		
		array('header'=>'Temple Name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
		
			'value'=>'CHtml::link(Temples::GetName($data->name),array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),

		 array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
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
?>
        </div>
        
      </div>
    </div>
    <br class="clear" />
  </div>
</div>


