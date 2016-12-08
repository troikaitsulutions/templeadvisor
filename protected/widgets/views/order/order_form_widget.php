<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'order-form',
        'enableAjaxValidation'=>false,       
        )); 
?>
    <?php echo $form->errorSummary(array($model, $order)); ?>
    <div class="span6" style="float:right;"> </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t("Add Temple's Rank"); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span4"><?php echo t('Temple Name'); ?></div>
            <div class="span3"><?php echo t('Region Rank'); ?></div>
            <div class="span3"><?php echo t('State Rank'); ?></div>
            <div class="span2"><?php echo t('District Rank'); ?></div>
            <div class="clear"></div>
          </div>
          <?php 
		
		$Temples = Temples::model()->findAll(array('order'=>'district ASC')); 
		if ( isset($Temples) && count($Temples)>0 ) {
			foreach ( $Temples as $Temple) {
				
			$valu = Order::model()->find(array('condition'=>'prop_id = :PID', 'params'=>array(':PID'=>$Temple->id))); 
		?>
          <div class="row-form">
            <div class="span4"> <?php echo $Temple->name; ?></div>
            <div class="span1"> <?php echo Reg::GetName($Temple->region); ?></div>
            <div class="span1"> <?php echo CHtml::textField('region_'.$Temple->id,(isset($valu))?$valu->region_order:''); ?> </div>
            <div class="span2"> <?php echo State::GetName($Temple->state); ?></div>
            <div class="span1"> <?php echo CHtml::textField('state_'.$Temple->id,(isset($valu))?$valu->state_order:''); ?> </div>
            <div class="span2"> <?php echo District::GetName($Temple->district); ?></div>
            <div class="span1"> <?php echo CHtml::textField('district_'.$Temple->id,(isset($valu))?$valu->district_order:''); ?> </div>
            <div class="clear"></div>
          </div>
          <?php } } ?> 
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="row-fluid">
      <div class="span9">
        <p>  <?php echo $form->hiddenField($model,'name',array('value'=>'order')); ?> 
          <button class="btn btn-medium" type="submit"><?php echo t('Save'); ?></button>
        </p>
      </div>
    </div>
    <br class="clear" />
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
</div>
<!-- //Render Partial for Javascript Stuff -->
<?php //$this->render('cmswidgets.views.order.order_form_javascript',array('model'=>$model,'form'=>$form)); ?>
