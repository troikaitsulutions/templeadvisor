<?php if(Yii::app()->controller->action->id!='admin' && Yii::app()->controller->action->id!='index'){?><style>
table.items{border:#000000 1px solid; border-collapse:collapse;}
table.items td,th{border:#000000 1px solid;}
a{color:#000000; text-decoration:none;}

.gridmaxwidth  {   border:1px #000000 solid; border:#000000 }</style><?php } ?>

<?php if(Yii::app()->controller->id=='bevillaowner'){?>
<div class="head">
  <div class="isw-users"></div>
  <h1><?php  echo t('People'); ?></h1>
  <div class="clear"></div>
</div>

<?php }
else 
{?>
<div class="head">
  <div class="isw-grid"></div>
 <h1 align="center"><?php if((user()->isVillaOwner)){ ?> <?php echo t('My Personal Information'); ?><?php } else if(user()->isAgent) echo t('Recent Travel Agent'); else echo t('Recent Peoples'); ?></h1>       <?php if(Yii::app()->controller->id!='bevillaowner'){?><a href="<?php  echo Yii::app()->createUrl('bevillaowner/admin');?>" ><?php if((user()->isVillaOwner)){ }else{?><span style="float:right; padding:3px; margin-top:5px"  class="btn btn-large btn-warning">More</span><?php }} ?></a>
<div class="clear"></div></div>

<?php 
}?>

<div class="dialog" id="export_type_popup" style="display:none;" title="Export Option">                                
     <div id="export_type_form" style="padding:5px;">
     <table width="100%" border="0">
      <tr>
        <td><strong>File Name</strong></td>
      </tr>
      <tr>
        <td align="left"><?php echo CHtml::textField('export_file_name','',array('style'=>'width:80%;height:30px;margin-left:0px;'));?></td>
      </tr>
      <tr>
        <td><strong>Export Type</strong></td>
      </tr>
      <tr>
        <td><?php echo CHtml::dropDownList('export_file_type','',array('Excel'=>'Excel','Pdf'=>'Pdf'));?></td>
      </tr>
      <tr>
        <td><button class="btn btn-small" type="button" onClick="export_pdf()"><?php echo t('Export'); ?></button></td>
      </tr>
    </table>
     </div>
 </div>


<div class="block-fluid table-sorting">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'country-grid',
	'dataProvider'=>(Yii::app()->controller->id=='bevillaowner')? $model->search():$model->dashboardview(),
	'filter'=>( (Yii::app()->controller->id=='bevillaowner') ) ? $model : null,
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
		 'email', 
		 array('name'=>'address1','visible'=>(Yii::app()->controller->id=='bevillaowner')?true:false),
		 array('name'=>'zip','visible'=>(Yii::app()->controller->id=='bevillaowner')?true:false),
		 array('name'=>'tele','visible'=>(Yii::app()->controller->id=='bevillaowner')?true:false),
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
			'visible'=>(Yii::app()->controller->id=='bevillaowner')?true:false                  
		    ),      	
		
		/*array('header'=>'Pdf','type'=>'raw','value'=>'show_invoice_details1($data,"Pdf")','headerHtmlOptions'=>array('style'=>'width:5%;'),'htmlOptions'=>array('style'=>'text-align:center;'),'filter'=>'','visible'=>(Yii::app()->controller->action->id=='admin')?true:false),*/
	
		array
		(
		    'class'=>'CButtonColumn',
		    'template'=>'{update}',
			'visible'=>(user()->isAdmin)?(( (Yii::app()->controller->action->id=='admin') ) ? true : false):false,
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
			'visible'=>(user()->isAdmin)?(( (Yii::app()->controller->action->id=='admin') ) ? true : false):false,
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
var export_file_name = jQuery('#export_file_name').val();
	var export_file_type = jQuery('#export_file_type').val();
	if(export_file_name!='' && export_file_type!='')
	{

	var tele=$("[name='Villaowner[tele]']").val();
	var name=$("[name='Villaowner[name]']").val();
	var display_name=$("[name='Villaowner[display_name]']").val();
var email=$("[name='Villaowner[email]']").val();
var address1=$("[name='Villaowner[address1]']").val();
var zip=$("[name='Villaowner[zip]']").val();
var category=$("[name='Villaowner[category]']").val();


	
 if(export_file_type=='Pdf')
		{
	var baseurl = '<?php echo Yii::app()->createUrl('bevillaowner/bevillaownerpdf');?>?tele='+tele+'&name='+name+'&display_name='+display_name+'&email='+email+'&address1='+address1+'&zip='+zip+'&category='+category;
	}
	else
	{
		var baseurl = '<?php echo Yii::app()->createUrl('bevillaowner/bevillaownerexcel');?>?tele='+tele+'&name='+name+'&display_name='+display_name+'&email='+email+'&address1='+address1+'&zip='+zip+'&category='+category+'&export_file_name='+export_file_name;

	}
	window.open(baseurl);
	}
	else
	{
		if(export_file_name==''){ alert('Enter file name.'); jQuery('#export_file_name').focus(); return false; }
		else if(export_file_type==''){ alert('Choose file type.'); jQuery('#export_file_type').focus(); return false; }
	}
}

function export_open()
{
	jQuery('#export_file_name').val('');
	jQuery('#export_file_type').val('Excel');
	jQuery("#export_type_popup").dialog({autoOpen:false,modal:true,width:300});
	jQuery("#export_type_popup").dialog('open');
}</script>