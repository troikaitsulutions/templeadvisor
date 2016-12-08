  <div class="head">
  <div class="isw-grid"></div>
  

  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'taxonomy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>((Yii::app()->controller->id=='bepinfo')?$model:null),
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
	
	
	
	array(
			'header'=>'Property Image',
			'type'=>'image',
			'htmlOptions'=>array('class'=>'gridLeft','align'=>'center','border'=>'5px'),
			'value'=>'Gallery::GetPropThumbnail($data->id)',
            'filter'=>false,
			'visible'=>(Yii::app()->controller->id=='bepinfo')?true:false
		    ),
	
		array(
			'name'=>'id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft','style'=>'width:7%'),
			'value'=>'$data->id',
			'visible'=>(Yii::app()->controller->id=='bepinfo')?true:false
		    ),
		
        array(
			'name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>(Yii::app()->controller->id=='bepinfo')? 'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))': 'CHtml::link($data->name,array("bepinfo/view","id"=>$data->id))',
		    ),
			
		
		
		/* array(
			'name'=>'province',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'Province::GetName($data->province)',
		    ),
                
       array(
            'name'=>'lang',
			'type'=>'raw',			
			'value'=>'Language::convertLanguage($data->lang)', 
			'visible'=>(Yii::app()->controller->id=='bepinfo')?true:false                  
             ),*/
			 
		array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
            'filter'=>false,
			'visible'=>(Yii::app()->controller->id=='bepinfo')?true:false
		    ),
		
			array('header'=>'Language','value'=>'get_language($data)'),
/*        array
		(
		    'class'=>'CButtonColumn',
		    'template'=>'{translate}',
		    'visible'=>(Yii::app()->controller->id=='bepinfo')?( (user()->isAgent) ) ? false : ((Yii::app()->settings->get('system','language_number') > 1)?true:false):false,
		    'buttons'=>array
		    (
			'translate' => array
			(
			   'label'=>t('Translate'),
			    'imageUrl'=>false,
			    'url'=>'Yii::app()->createUrl("'.app()->controller->id.'/translate", array("pinfo_id"=>$data->id,"lang_id"=>3))',
			),
		    ),
		), 
		array('header'=>'Pdf','type'=>'raw','value'=>'show_invoice_details($data,"Pdf")','headerHtmlOptions'=>array('style'=>'width:5%;'),'htmlOptions'=>array('style'=>'text-align:center;'),'filter'=>'','visible'=>(Yii::app()->controller->id=='bepinfo')?true:false),
		*/                 			
		array
		(
		    'class'=>'CButtonColumn',
		    'template'=>'{update}',
			'visible'=>(Yii::app()->controller->id=='bepinfo')?(( (user()->isAgent) ) ? false : true):false,
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
			'visible'=>(Yii::app()->controller->id=='bepinfo')?(( (user()->isAgent)||(user()->isVillaOwner) ) ? false : true):false,
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
function get_language($data)
{
	$language=Language::model()->findAll();
	//echo app()->request->url;
	foreach($language as $lang_val)
	{
		
		if(app()->controller->id=='besite')
		{
			$controller='bepinfo';
			
		}
		else
		{
			$controller=app()->controller->id;
		}
		if(app()->request->url=='/mycms/')
		{
			$img_url='images/';
		}
		else
		{
			$img_url='../images/';
		}
		
		$translate=Translate::model()->find(array(condition=>'prop_id="'.$data->id.'" AND lang="'.$lang_val->lang_id.'"'));
		
		if($translate)
		{
		$url= Yii::app()->createUrl($controller.'/transupdate', array("id"=>$translate->id, "language"=>$lang_val->lang_id));
		//echo  '<a href="'.$url.'" style="color:#ff0">'.$lang_val->lang_desc.'</a>';
		
		if($lang_val->lang_short=='de')
		{
		 $limg=	"<img src='".$img_url."deutch.jpg' border='1' title='".$lang_val->lang_desc."'/>";
		 echo  '<a href="'.$url.'">'.$limg.'</a>&nbsp;';
		}
		
		else if($lang_val->lang_short=='es')
		{
		 $limg=	"<img src='".$img_url."spanish.jpg' border='1' title='".$lang_val->lang_desc."'/>";
		 echo  '<a href="'.$url.'">'.$limg.'</a>&nbsp;';
		}
		else if($lang_val->lang_short=='fr')
		{
		 $limg=	"<img src='".$img_url."french.jpg' border='1' title='".$lang_val->lang_desc."'/>";
		 echo  '<a href="'.$url.'">'.$limg.'</a>&nbsp;';
		}
	    else if($lang_val->lang_short=='ru')
		{
		 $limg=	"<img src='".$img_url."russian.jpg' border='1' title='".$lang_val->lang_desc."'/>";
		 echo  '<a href="'.$url.'">'.$limg.'</a>&nbsp;';
		}

		}
		else
		{
		$url= Yii::app()->createUrl($controller.'/translate', array("id"=>$data->id,"language"=>$lang_val->lang_id));
		
		if($lang_val->lang_short=='de')
		{
		 $limg=	"<img src='".$img_url."deutch-1.jpg' border='1' title='".$lang_val->lang_desc."'/>";
		 echo  '<a href="'.$url.'">'.$limg.'</a>&nbsp;';
		}
		
		else if($lang_val->lang_short=='es')
		{
		 $limg=	"<img src='".$img_url."spanish-1.jpg' border='1' title='".$lang_val->lang_desc."'/>";
		 echo  '<a href="'.$url.'">'.$limg.'</a>&nbsp;';
		}
		else if($lang_val->lang_short=='fr')
		{
		 $limg=	"<img src='".$img_url."french-1.jpg' border='1' title='".$lang_val->lang_desc."'/>";
		 echo  '<a href="'.$url.'">'.$limg.'</a>&nbsp;';
		}
	    else if($lang_val->lang_short=='ru')
		{
		 $limg=	"<img src='".$img_url."russian-1.jpg' border='1' title='".$lang_val->lang_desc."'/>";
		 echo  '<a href="'.$url.'">'.$limg.'</a>&nbsp;';
		}
		
		}
	}
}
function show_invoice_details($data,$type)
{

	 if($type=='Pdf')
	{
		return "<img src='../images/pdf.png' border='0' style='cursor:pointer;' title='Pdf' onclick=\"propery_pdf('$data->id')\">";
	}
}
?>
  <div class="clear"></div>
</div>

<script type="text/javascript">
function propery_pdf(id)
{
	window.open('<?php  echo Yii::app()->request->baseUrl;?>/bepinfo/pdf?id='+id);
}

</script>