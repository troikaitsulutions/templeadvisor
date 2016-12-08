<?php $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; ?>
<?php
$csrf_token_name = Yii::app()->request->csrfTokenName;
$csrf_token = Yii::app()->request->csrfToken;
    $str_js = "
        var fixHelper = function(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        };
 
        $('#gallery-grid table.items tbody').sortable({
            forcePlaceholderSize: true,
            forceHelperSize: true,
            items: 'tr',
            update : function () {
                serial = $('#gallery-grid table.items tbody').sortable('serialize', {key: 'items[]', attribute: 'class'})+ '&{$csrf_token_name}={$csrf_token}';
                $.ajax({
                    'url': '".Yii::app()->request->baseUrl."/begallery/sort',
                    'type': 'post',
                    'data': serial,
                    'success': function(data){
                    },
                    'error': function(request, status, error){
                        alert('We are unable to set the sort order at this time.  Please try again in a few minutes.');
                    }
                });
            },
            helper: fixHelper
        }).disableSelection();
    ";
	
	$gal_del = "
	$('#gal_del_all').click(function(){
		
		var idList    = $('input[type=checkbox]:checked').serialize();
		if(idList)
		{
			if(confirm('Are you sure want to delete?'))
				{
					$.get('".Yii::app()->request->baseUrl."/begallery/deleteall',idList,function(response){
					$.fn.yiiGridView.update('gallery-grid');
					});
				}
		}
	});
    ";
 
    Yii::app()->clientScript->registerScript('sortable-project', $str_js);
	Yii::app()->clientScript->registerScript('gal-del', $gal_del);
	Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
?>

<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo Temples::GetName($page_id);  ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
<?php
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-grid',
	'selectableRows'=>2,
	'dataProvider'=>$model->searchByobject($page_id),
	'filter'=>$model,
	'afterAjaxUpdate' => 'function(id, data)
            {
                $(".link-column a").attr("rel","prettyPhoto");
                $("a[rel^=\'prettyPhoto\']").prettyPhoto({\'id\':\'pretty_photo\',\'show_title\':false,\'overlay_gallery\':false,\'opacity\':0.8,\'deeplinking\':false,\'theme\':\'pp_default\'});
            }',
    'rowCssClassExpression'=>'"items[]_{$data->id}"',
    'summaryText'=>t('Displaying').' {start} - {end} '.t('in'). ' {count} '.t('results'),
	
	'pager' => array(
		'header'=>t('Go to page:'),
		'nextPageLabel' => t('Next'),
		'prevPageLabel' => t('previous'),
		'firstPageLabel' => t('First'),
		'lastPageLabel' => t('Last'),
        'pageSize'=> 50
	),

	'columns'=>array(
	
	array(
'class' => 'CCheckBoxColumn',

'value' => '$data["id"]',
'checkBoxHtmlOptions' => array('name' => 'idList[]'),
),
		
		 array(
            'name'=>'img_url',
			'type'=>'image',   
            'htmlOptions'=>array('align'=>'center','border'=>'5px','rel'=>'group'),
			'value'=>'Gallery::GetThumbnail($data)',
            'filter'=>false,
		    ),
			
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->name',
			'visible'=>(user()->isVillaOwner)?false:true
		    ),	
			
		array('name'=>'description',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->description',
			'visible'=>(user()->isVillaOwner)?false:true
		    ),
			
		array(
			'name'=>'crby',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'($data->crby==0)?"":$data->CreateUserName->display_name',
		    ),
			
		array(
			'name'=>'mod_by',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'($data->mod_by==0)?"":$data->ModUserName->display_name',
		    ), 
		array(
			'name'=>'created',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'date("d-m-Y",$data->created)',
		    ), 
		
	   			
		array
		(
		    'class'=>'CButtonColumn',
		    'template'=>'{update}',
			'visible'=>(user()->isVillaOwner)?false:true,
		    'buttons'=>array
		    (
			'update' => array
			(
			    'label'=>t('Edit'),
			    'imageUrl'=>false,
			    'url'=>'Yii::app()->createUrl("'.app()->controller->id.'/update", array("id"=>$data->id,"page_id"=>$data->prop_id))',
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
echo '<input type="button" id="gal_del_all" value="Delete" />';
?>
  <div class="clear"></div>
</div>

