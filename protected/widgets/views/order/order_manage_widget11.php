<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t('All People Category'); ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'town-grid',
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
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'CHtml::link(Temples::GetName($data->name),array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
		
        array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
            'filter'=>false
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


























<div class="workplace">
<div class="form">
  <div class="row-fluid">
    <div class="span12">
      <div class="head">
        <div class="isw-users"></div>
        <h1><?php echo t('Temple Order'); ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid tabs">
        <ul>
          <li><a href="#tabs-1"><?php echo t('Country'); ?></a></li>
          <li><a href="#tabs-2"><?php echo t('State'); ?></a></li>
          <li><a href="#tabs-3"><?php echo t('District'); ?></a></li>
          <li><a href="#tabs-4"><?php echo t('Town'); ?></a></li>
          <li><a href="#tabs-5"><?php echo t('Region'); ?></a></li>
        </ul>
        <div id="tabs-1">
          <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'country-order-grid',
	'dataProvider'=> $model->searchbycat( ),
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
		
		array('name'=>'country_order',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->country_order',
		    ),
		   
		
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'headerHtmlOptions'=>array('style'=>'width:10%'),
			'value'=>'CHtml::link(Temples::GetName($data->name),array("'.app()->controller->id.'/view","id"=>$data->id))',
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
	'id'=>'villa-owner-grid',
	'dataProvider'=>$model->searchbycat(101),
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
		
		array('name'=>'state_order',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->state_order',
		    ),
		   
		
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'headerHtmlOptions'=>array('style'=>'width:10%'),
			'value'=>'CHtml::link(Temples::GetName($data->name),array("'.app()->controller->id.'/view","id"=>$data->id))',
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
	'id'=>'villa-owner-grid',
	'dataProvider'=>$model->searchbycat(100),
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
		array('name'=>'district_order',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->district_order',
		    ),
		   
		
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'headerHtmlOptions'=>array('style'=>'width:10%'),
			'value'=>'CHtml::link(Temples::GetName($data->name),array("'.app()->controller->id.'/view","id"=>$data->id))',
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
        <div id="tabs-4">
          <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'villa-owner-grid',
	'dataProvider'=>$model->searchbycat(103),
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
		
		array('name'=>'district_order',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->district_order',
		    ),
		   
		
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'headerHtmlOptions'=>array('style'=>'width:10%'),
			'value'=>'CHtml::link(Temples::GetName($data->name),array("'.app()->controller->id.'/view","id"=>$data->id))',
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
        <div id="tabs-5">
          <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'villa-owner-grid',
	'dataProvider'=>$model->searchbycat(105),
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
			
			
			array('name'=>'district_order',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->district_order',
		    ),
		   
		
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'headerHtmlOptions'=>array('style'=>'width:10%'),
			'value'=>'CHtml::link(Temples::GetName($data->name),array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
			
		/*	array('header'=>'Pdf','type'=>'raw','value'=>'show_invoice_details1($data,"Pdf")','headerHtmlOptions'=>array('style'=>'width:5%;'),'htmlOptions'=>array('style'=>'text-align:center;'),'filter'=>'','visible'=>($_GET['id'] !='103')?true:false),
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
)); 
?>
        </div>
        <div id="tabs-6">
          <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'villa-owner-grid',
	'dataProvider'=>$model->searchbycat(102),
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
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'headerHtmlOptions'=>array('style'=>'width:10%'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
			
		array('name'=>'display_name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->display_name',
		    ),
		   
		array('name'=>'email',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->email',
		    ),

			
			    
		 array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
            'filter'=>false,
			             
		    ),      	
		/*	array('header'=>'Pdf','type'=>'raw','value'=>'show_invoice_details1($data,"Pdf")','headerHtmlOptions'=>array('style'=>'width:5%;'),'htmlOptions'=>array('style'=>'text-align:center;'),'filter'=>'','visible'=>($_GET['id'] !='103')?true:false),
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
)); 
?>
        </div>
      </div>
    </div>
    <br class="clear" />
  </div>
</div>
<?php

 function get_username($data)
{
	$user = User::model()->find(array('condition'=>"people_id='".$data."'"));
	if( isset($user) && count($user)>0 )
    return $user->username;
}
 function get_password($data)
{
	$user = User::model()->find(array('condition'=>"people_id='".$data."'"));
	if( isset($user) && count($user)>0 )
    return $user->original_password;
}

 function get_properties($data)
{
	$properties = Pinfo::model()->find(array('select'=>'group_concat(name) as name','condition'=>"owner='".$data."'"));
    return '<div style="word-break: break-all;">'.$properties->name.'</div>';
}

?>

