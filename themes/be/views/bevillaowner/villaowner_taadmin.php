<?php 
$this->pageTitle=t('Manage Villa owners Information');
$this->pageHint=t('Here you can manage all Info for this Villa owners'); 
?>

<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t('Travel Agent'); ?></h1>
  <div class="clear"></div>
</div>

<div class="block-fluid table-sorting">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'country-grid',
	'dataProvider'=>$model->tasearch(),
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
			'value'=>'CHtml::link($data->name,array("bevillaowner/view","id"=>$data->id))',
		    ),
		array('name'=>'display_name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->display_name',
		    ),
		 'email', 
		 array('name'=>'address1'),
		 array('name'=>'zip'),
		 array('name'=>'tele'),
		 array('name'=>'category',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Category::GetName($data->category)',
		    ),
		 array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
            'filter'=>false,
		    ),      	
									array('header'=>'Pdf','type'=>'raw','value'=>'show_invoice_details1($data,"Pdf")','headerHtmlOptions'=>array('style'=>'width:5%;'),'htmlOptions'=>array('style'=>'text-align:center;'),'filter'=>''),
	
	),
)); 

 function show_invoice_details1($data,$type)
{

	 if($type=='Pdf')
	{
		return "<img src='../images/pdf.png' border='0' style='cursor:pointer;' title='Pdf' onclick=\"villaowner_pdf('$data->id')\">";
	}
}?>
  <div class="clear"></div>
</div>
<script>
function villaowner_pdf(id)
{
	window.open('<?php  echo Yii::app()->request->baseUrl;?>/bevillaowner/pdf/'+id);
}
</script>