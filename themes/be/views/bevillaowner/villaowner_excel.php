<?php $this->widget('common.components.widgets.tlbExcelView', array(
    'id'                   => 'property-grid',
    'dataProvider'         => $model->search(),
    'grid_mode'            => $production, // Same usage as EExcelView v0.33
    //'template'           => "{summary}\n{items}\n{exportbuttons}\n{pager}",
    'title'                => $_GET['export_file_name'],
    'creator'              => 'Ciao Italy Villas',
    /*'subject'              => mb_convert_encoding('Something important with a date in French: ' . utf8_encode(strftime('%e %B %Y')), 'ISO-8859-1', 'UTF-8'),
    'description'          => mb_convert_encoding('Etat de production généré à la demande par l\'administrateur (some text in French).', 'ISO-8859-1', 'UTF-8'),*/
    'lastModifiedBy'       => 'Ciao Italy Villas',
    'sheetTitle'           => 'Report on ' . date('m-d-Y H-i'),
    'keywords'             => '',
    'category'             => '',
    'landscapeDisplay'     => true, // Default: false
    'A4'                   => true, // Default: false - ie : Letter (PHPExcel default)
    'RTL'                  => false, // Default: false - since v1.1
    'pageFooterText'       => '&RThis is page no. &P of &N pages', // Default: '&RPage &P of &N'
    'automaticSum'         => true, // Default: false
    'decimalSeparator'     => ',', // Default: '.'
    'thousandsSeparator'   => '.', // Default: ','
    //'displayZeros'       => false,
    //'zeroPlaceholder'    => '-',
    'sumLabel'             => 'Column totals:', // Default: 'Totals'
    //'borderColor'          => '00FF00', // Default: '000000'
    //'bgColor'              => 'FFFF00', // Default: 'FFFFFF'
    //'textColor'            => 'FF0000', // Default: '000000'
    'rowHeight'            => 30, // Default: 15
    'headerBorderColor'    => 'FF0000', // Default: '000000'
    'headerBgColor'        => 'CCCCCC', // Default: 'CCCCCC'
    'headerTextColor'      => '0000FF', // Default: '000000'
    'headerHeight'         => 45, // Default: 20
    'footerBorderColor'    => '0000FF', // Default: '000000'
    'footerBgColor'        => '00FFCC', // Default: 'FFFFCC'
    'footerTextColor'      => 'FF00FF', // Default: '0000FF'
    'footerHeight'         => 30, // Default: 20
    'columns'              => array(

		
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
			'value'=>'($data->status==1)?"Active":"Disable"',
            'filter'=>false
		    ),      	
									array('header'=>'Pdf','type'=>'raw','value'=>'show_invoice_details1($data,"Pdf")','headerHtmlOptions'=>array('style'=>'width:5%;'),'htmlOptions'=>array('style'=>'text-align:center;'),'filter'=>'','visible'=>(Yii::app()->controller->action->id=='admin')?true:false),
	
		
		
	

		) // an array of your CGridColumns
)); ?>