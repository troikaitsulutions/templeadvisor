<div class="temple_contact_business">
    <h5><?php echo t('Refine Your Results'); ?></h5>
       
    	 <?php $form=$this->beginWidget('CActiveForm', array(
        				'id'=>'list-by-region',
        				'enableAjaxValidation'=>true,       
        			)); 
					?>
    				
          <div class="form_list-by-region">
           <div id="filter_region"> <?php echo CHtml::dropDownList('region_filter',array(), Reg::GetAll(), array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadrstate',
							'data'=>array('region'=>'js:this.value'),
							'success' => 'function(data) { 
								$("#state_filter").html(data.dropDownStates);
							}'  
                        ))
	 ); ?> </div>
          <div id="filter_state"> <?php echo CHtml::dropDownList('state_filter',array(), State::GetAll(), array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadrdistrict',
							'data'=>array('state'=>'js:this.value'),
							'success' => 'function(data) { 
								$("#district_filter").html(data.dropDownDistricts);
							}'  
                        )
	 ) ); ?> </div>
          <div id="filter_district"> <?php echo CHtml::dropDownList('district_filter',array(), District::GetAll()); ?> </div> 
          </div>
           <?php $this->endWidget(); ?>
</div>
        
