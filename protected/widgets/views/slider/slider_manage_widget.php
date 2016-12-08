
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
 
        $('#slider-grid table.items tbody').sortable({
            forcePlaceholderSize: true,
            forceHelperSize: true,
            items: 'tr',
            update : function () {
                serial = $('#slider-grid table.items tbody').sortable('serialize', {key: 'items[]', attribute: 'class'})+ '&{$csrf_token_name}={$csrf_token}';
                $.ajax({
                    'url': '".Yii::app()->request->baseUrl."/beslider/sort',
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
 
    Yii::app()->clientScript->registerScript('sortable-project', $str_js);
	Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
?>

<div class="head">
  <div class="isw-grid"></div>
  <h1>Slider Photos</h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
<?php
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'slider-grid',
	'dataProvider'=>$model->search(),
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
            'name'=>'img_url',
			'type'=>'image',   
            'htmlOptions'=>array('align'=>'center','border'=>'5px','rel'=>'group','width'=>'30px','height'=>'30px'),
			'value'=>'Slider::GetThumbnail($data)',
            'filter'=>false,
		    ),
			
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->name',
		    ),	
			
		array('name'=>'description',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->description',
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