<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t("Enquiry's Information"); ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
  <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            
        array('name'=>'id',
			'type'=>'raw',			
			'value'=>$model->id,
		    ),
                
		array(
			'name'=>'name',
			'type'=>'raw',		
			'value'=>$model->name,
		    ),
		array(
			'name'=>'companyname',
			'type'=>'raw',		
			'value'=>$model->companyname,
		    ),
			
		array(
			'name'=>'city',
			'type'=>'raw',		
			'value'=>$model->city,
		    ),
		array(
			'name'=>'state',
			'type'=>'raw',		
			'value'=>State::GetName($model->state),
		    ),
		array(
			'name'=>'nob',
			'type'=>'raw',		
			'value'=>Businessenquiry::getNaturalOfBusiness($model->nob),
		    ),
		array(
            'name'=>'email',
			'type'=>'raw',			
			'value'=>$model->email,                   
            ),
			
			array(
            'name'=>'phoneno',
			'type'=>'raw',			
			'value'=>$model->phoneno,                   
            ),
			
			array(
            'name'=>'ep',
			'type'=>'raw',			
			'value'=>Businessenquiry::getEnquiryPurpose($model->ep),                   
            ),
     
        array(
			'name'=>'comments',
			'type'=>'raw',
			'value'=>$model->comments,
			),
			
		 array(
			'header'=>'Date of Enquiry',
			'type'=>'raw',
			'value'=>date("d-m-Y",$model->created),
			),	
	),
)); ?>
  <div class="clear"></div>
</div>
