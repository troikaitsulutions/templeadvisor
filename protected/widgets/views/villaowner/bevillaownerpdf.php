<style>
table.items{border:#000000 1px solid; border-collapse:collapse;}
table.items td,th{border:#000000 1px solid;}
a{color:#000000; text-decoration:none;}

.gridmaxwidth  {   border:1px #000000 solid; border:#000000 }</style>

<div class="head">
  <div class="isw-grid"></div>
 <h1 align="center"><?php if(user()->isAgent) echo t('Travel Agent Details'); else echo t('People Details'); ?></h1>    
<div class="clear"></div></div>



<div class="block-fluid table-sorting">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'country-grid',
	'dataProvider'=>$model->search(),

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
			'value'=>
			(Yii::app()->controller->id=='bevillaowner')? 'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))':'CHtml::link($data->name,array("bevillaowner/view","id"=>$data->id))',
		    ),
		array('name'=>'display_name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->display_name',
		    ),
		 'email', 'address1', 'zip', 'tele', 
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
            'filter'=>false
		    ),      	
									array('header'=>'Pdf','type'=>'raw','value'=>'show_invoice_details1($data,"Pdf")','headerHtmlOptions'=>array('style'=>'width:5%;'),'htmlOptions'=>array('style'=>'text-align:center;'),'filter'=>'','visible'=>(Yii::app()->controller->action->id=='admin')?true:false),
	
		
		
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
function export_pdf()
{
	var tele=$("[name='Villaowner[tele]']").val();
	var name=$("[name='Villaowner[name]']").val();
	var display_name=$("[name='Villaowner[display_name]']").val();
var email=$("[name='Villaowner[email]']").val();
var address1=$("[name='Villaowner[address1]']").val();
var zip=$("[name='Villaowner[zip]']").val();
var category=$("[name='Villaowner[category]']").val();


	
 
	var baseurl = '<?php echo Yii::app()->createUrl('bevillaowner/bevillaownerpdf');?>?tele='+tele+'&name='+name+'&display_name='+display_name+'&email='+email+'&address1='+address1+'&zip='+zip+'&category='+category;
	window.open(baseurl);
}</script>