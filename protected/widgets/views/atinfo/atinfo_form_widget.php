<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'atinfo-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?>
    <div class="span6" style="float:right;"> </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Attraction Informations'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span1"><?php echo t('Location'); ?></div>
            <div class="span3"> <?php echo $form->dropDownList($model,'state',State::GetAll(), array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loaddistrict',
							'data'=>array('state'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Atinfo_district").html(data.dropDownDistricts);
								$("#Atinfo_town").html(data.dropDownTowns); 
							}',  
                        )
	 ) ); ?> <span><?php echo $form->error($model,'state'); ?> </span> </div>
            <div class="span3"> <?php echo $form->dropDownList($model,'district',District::GetAll(), array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadtown',
							'data'=>array('district'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Atinfo_town").html(data.dropDownTowns); 
							}',  
                        )
	 )); ?> <span><?php echo $form->error($model,'district'); ?></span> </div>
            <div class="span2"><?php echo $form->label($model,'type'); ?></div>
            <div class="span3">
              <?php  echo $form->dropDownList($model,'type',Atinfo::GetAllWithType());?>
              <span><?php echo $form->error($model,'type'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span1"><?php echo $form->label($model,'name'); ?></div>
            <div class="span4"><?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?> </span></div>
            <div class="span1"><?php echo $form->label($model,'comment'); ?></div>
            <div class="span4"> <?php echo $form->textArea($model,'comment',array()); ?> <span><?php echo $form->error($model,'comment'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span2"><?php echo $form->label($model,'status'); ?></div>
            <div class="span2"><?php echo $form->dropDownList($model,'status',ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?> </span> </div>
            <div class="span3"> </div>
            <div class="span1">
              <button class="btn btn-large" type="submit"><?php echo t('Save'); ?></button>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="block-fluid accordion">
        
        <h3><?php echo t('Additional Info'); ?></h3>
          <div>
            <div class="row-form">
              <div class="span2"><?php echo $form->label($model,'best_time'); ?></div>
              <div class="span3"> <?php echo $form->textField($model,'best_time', array()); ?> <span><?php echo $form->error($model,'best_time'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($model,'visit_hour'); ?></div>
              <div class="span3"> <?php echo $form->textField($model,'visit_hour', array()); ?> <span><?php echo $form->error($model,'mobile'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span2"><?php echo t(''); ?></div>
              <div class="span1"> <?php echo t('Name'); ?> </div>
              <div class="span1"> <?php echo t('From'); ?> </div>
              <div class="span1"> <?php echo t('To'); ?> </div>
              <div class="span1"> <?php echo t('Name'); ?> </div>
              <div class="span1"> <?php echo ('From'); ?> </div>
              <div class="span1"> <?php echo ('To'); ?> </div>
              <div class="span1"> <?php echo t('Name'); ?> </div>
              <div class="span1"> <?php echo ('From'); ?> </div>
              <div class="span1"> <?php echo ('To'); ?> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span2"><?php echo t('Timing Details'); ?></div>
              <div class="span1"> <?php echo $form->textField($model,'t1_name', array()); ?> <span><?php echo $form->error($model,'t1_name'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 't1_from',ConstantDefine::getTiming1(),array()); ?> <span><?php echo $form->error($model,'t1_from'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 't1_to',ConstantDefine::getTiming2(),array()); ?> <span><?php echo $form->error($model,'t1_to'); ?> </span> </div>
              <div class="span1"> <?php echo $form->textField($model,'t2_name', array()); ?> <span><?php echo $form->error($model,'t2_name'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 't2_from',ConstantDefine::getTiming1(),array()); ?> <span><?php echo $form->error($model,'t2_from'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 't2_to',ConstantDefine::getTiming2(),array()); ?> <span><?php echo $form->error($model,'t2_to'); ?> </span> </div>
              <div class="span1"> <?php echo $form->textField($model,'t3_name', array()); ?> <span><?php echo $form->error($model,'t3_name'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 't3_from',ConstantDefine::getTiming1(),array()); ?> <span><?php echo $form->error($model,'t3_from'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 't3_to',ConstantDefine::getTiming2(),array()); ?> <span><?php echo $form->error($model,'t3_to'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span2"><?php echo t('Best Season For'); ?></div>
              <div class="span1"> <?php echo $form->textField($model,'m1_name', array()); ?> <span><?php echo $form->error($model,'m1_name'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'm1_from',ConstantDefine::getMonth(),array()); ?> <span><?php echo $form->error($model,'m1_from'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'm1_to',ConstantDefine::getMonth(),array()); ?> <span><?php echo $form->error($model,'m1_to'); ?> </span> </div>
              <div class="span1"> <?php echo $form->textField($model,'m2_name', array()); ?> <span><?php echo $form->error($model,'m2_name'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'm2_from',ConstantDefine::getMonth(),array()); ?> <span><?php echo $form->error($model,'m2_from'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'm2_to',ConstantDefine::getMonth(),array()); ?> <span><?php echo $form->error($model,'m2_to'); ?> </span> </div>
              <div class="span1"> <?php echo $form->textField($model,'m3_name', array()); ?> <span><?php echo $form->error($model,'m3_name'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'm3_from',ConstantDefine::getMonth(),array()); ?> <span><?php echo $form->error($model,'m3_from'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'm3_to',ConstantDefine::getMonth(),array()); ?> <span><?php echo $form->error($model,'m3_to'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span2"><?php echo t('Holiday Details'); ?></div>
              <div class="span1"> <?php echo $form->textField($model,'h1_name', array()); ?> <span><?php echo $form->error($model,'h1_name'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'h1_from',ConstantDefine::getDays(),array()); ?> <span><?php echo $form->error($model,'h1_from'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'h1_to',ConstantDefine::getDays(),array()); ?> <span><?php echo $form->error($model,'h1_to'); ?> </span> </div>
              <div class="span1"> <?php echo $form->textField($model,'h2_name', array()); ?> <span><?php echo $form->error($model,'h2_name'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'h2_from',ConstantDefine::getMonth(),array()); ?> <span><?php echo $form->error($model,'h2_from'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'h2_to',ConstantDefine::getMonth(),array()); ?> <span><?php echo $form->error($model,'h2_to'); ?> </span> </div>
              <div class="span1"> <?php echo $form->textField($model,'h3_name', array()); ?> <span><?php echo $form->error($model,'h3_name'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'h3_from',ConstantDefine::getMonth(),array()); ?> <span><?php echo $form->error($model,'h3_from'); ?> </span> </div>
              <div class="span1"> <?php echo $form->dropDownList($model, 'h3_to',ConstantDefine::getMonth(),array()); ?> <span><?php echo $form->error($model,'h3_to'); ?> </span> </div>
              <div class="clear"></div>
            </div>
          </div>
        
          <h3><?php echo t('Where to Get it / Contact Info'); ?></h3>
          <div>
            <div class="row-form">
              <div class="span1">
                <div class="span2"><?php echo $form->label($model,'town'); ?></div>
              </div>
              <div class="span3"> <?php echo $form->dropDownList($model,'town', Town::GetAll(), array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadzip',
							'data'=>array('town'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Atinfo_latitude").val(data.latitude);
								$("#Atinfo_longitude").val(data.longitude); 
							}',  
                        )
	 )); ?> <span><?php echo $form->error($model,'town'); ?></span> </div>
              <div class="span1"><?php echo $form->label($model,'address'); ?></div>
              <div class="span4"> <?php echo $form->textArea($model,'address', array()); ?> <span><?php echo $form->error($model,'address'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span1"><?php echo t('GPS'); ?></div>
              <div class="span2"> <?php echo $form->textField($model,'latitude', array()); ?> <span><?php echo $form->error($model,'latitude'); ?> </span> </div>
              <div class="span2"> <?php echo $form->textField($model,'longitude', array()); ?> <span><?php echo $form->error($model,'longitude'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($model,'facility'); ?></div>
              <div class="span3"><?php echo $form->dropDownList($model,'facility',  Atfacility::GetAll(),array('id'=>'s2_1', 'style'=>'width: 100%', 'multiple'=>'multiple')); ?> <span><?php echo $form->error($model,'facility'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span2"><?php echo $form->label($model,'contact_people'); ?></div>
              <div class="span3"> <?php echo $form->textField($model,'contact_people', array()); ?> <span><?php echo $form->error($model,'contact_people'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($model,'email'); ?></div>
              <div class="span3"> <?php echo $form->textField($model,'email', array()); ?> <span><?php echo $form->error($model,'email'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span2"><?php echo $form->label($model,'tele'); ?></div>
              <div class="span3"> <?php echo $form->textField($model,'tele', array()); ?> <span><?php echo $form->error($model,'tele'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($model,'mobile'); ?></div>
              <div class="span3"> <?php echo $form->textField($model,'mobile', array()); ?> <span><?php echo $form->error($model,'mobile'); ?> </span> </div>
              <div class="clear"></div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
</div>
<!-- //Render Partial for Javascript Stuff --> 
