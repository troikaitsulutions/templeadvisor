<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t('All Newsletters'); ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'newsletter-grid',
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
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
			
		array('name'=>'subject',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->subject',
		    ),
		array('name'=>'mlist',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->groupcreation->group_creation_name',
		    ),
			
		array('name'=>'created',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'date("d-M-Y",$data->created)',
		    ),
			
		array('header'=>'Mail','type'=>'raw','value'=>'"<a href=\"#\" onclick=tyre_add1(\"$data->id\")>send mail</a>"', 'headerHtmlOptions'=>array('style'=>'width:5%; text-align:center;'),'htmlOptions'=>array('style'=>'text-align:center;'),'filter'=>''),
			
			
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
 <div class="row-fluid">  
         <div class="dialog" id="mailpopup" style="display: none; width: 467px;" title="Send Email">                                
       		 <div id="mailpopup_form" style="padding:5px;"></div>
    	 </div><script>function tyre_add1(id)
{
var url="<?php  echo Yii::app()->request->baseUrl;?>/benewsletter/changecategory";
var heading="Mail form";

	jQuery('#mailpopup_form').html('');
	jQuery("#mailpopup").dialog({autoOpen:false,modal:true,width:500,buttons:{  "Ok": function() {validate_forms();},'Cancel': function() {$( this ).dialog( "close" );} }});
	if(id!='')
	{
		url=url+"?id="+id;
		jQuery.get(url,{},function(data){jQuery('#mailpopup_form').html(data);});
		$("#mailpopup").dialog('open')
		
	}
	else
	{
	alert('please select anyone Properties');
	}
}</script>