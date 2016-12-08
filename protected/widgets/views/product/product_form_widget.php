<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'product-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary($model); ?> 
  <div class="row-fluid">
    <div class="span6">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('Product info');  ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'name'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'name'); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'pcode'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'pcode'); ?> <span><?php echo $form->error($model,'pcode'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'singer'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'singer'); ?> <span><?php echo $form->error($model,'singer'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'music_director'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'music_director'); ?> <span><?php echo $form->error($model,'music_director'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'producer'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'producer'); ?> <span><?php echo $form->error($model,'producer'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'media_type'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'media_type'); ?> <span><?php echo $form->error($model,'media_type'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'file_type'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'file_type'); ?> <span><?php echo $form->error($model,'file_type'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
       
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'tracklist'); ?></div>
          <div class="span6"> <?php echo $form->textArea($model, 'tracklist'); ?> <span><?php echo $form->error($model,'tracklist'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
         <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'short_desc'); ?></div>
          <div class="span6"> <?php echo $form->textArea($model, 'short_desc'); ?> <span><?php echo $form->error($model,'short_desc'); ?></span> </div>
          <div class="clear"></div>
        </div>

        
        
        
      </div>
    </div>
    <div class="span6">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('product ');  ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'height'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'height'); ?> <span><?php echo $form->error($model,'height'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'width'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'width'); ?> <span><?php echo $form->error($model,'width'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'depth'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'depth'); ?> <span><?php echo $form->error($model,'depth'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'weight'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'weight'); ?> <span><?php echo $form->error($model,'weight'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'pages'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'pages'); ?> <span><?php echo $form->error($model,'pages'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'print'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'print'); ?> <span><?php echo $form->error($model,'print'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'edition'); ?></div>
          <div class="span6"> <?php echo $form->textField($model, 'edition'); ?> <span><?php echo $form->error($model,'edition'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'language'); ?></div>
          <div class="span6"> <?php echo $form->dropDownList($model,'language', Planguage::GetAll() ,array()); ?> <span><?php echo $form->error($model,'language'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'vendor'); ?></div>
          <div class="span6"> <?php echo $form->dropDownList($model,'vendor',  Villaowner::GetPriest(),array()); ?> <span><?php echo $form->error($model,'vendor'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'description'); ?></div>
          <div class="span6"> <?php echo $form->textArea($model, 'description'); ?> <span><?php echo $form->error($model,'description'); ?></span> </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span9">
      <p>
        <button class="btn btn-large" type="submit">
        <?php if($model->isNewRecord) : ?>
        <?php echo t('Add'); ?>
        <?php else : ?>
        <?php echo t('Update'); ?>
        <?php endif; ?>
        </button>
      </p>
    </div>
  </div>
  <br class="clear" />
  <?php $this->endWidget(); ?>
</div>
<!-- form -->


</div>
