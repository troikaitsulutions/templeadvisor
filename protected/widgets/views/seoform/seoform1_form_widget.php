
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model1,'slug'); ?></div>
            <div class="span7"> <?php echo $form->textField($model1,'slug'); ?> <span><?php echo $form->error($model1,'slug'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model1,'mainmenu'); ?></div>
            <div class="span7"> <?php echo $form->textField($model1,'mainmenu'); ?> <span><?php echo $form->error($model1,'mainmenu'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model1,'breadcrumbs'); ?></div>
            <div class="span7"> <?php echo $form->textField($model1,'breadcrumbs'); ?> <span><?php echo $form->error($model1,'breadcrumbs'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model1,'h1'); ?></div>
            <div class="span7"> <?php echo $form->textField($model1,'h1'); ?> <span><?php echo $form->error($model1,'h1'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model1,'h2'); ?></div>
            <div class="span7"> <?php echo $form->textField($model1,'h2'); ?> <span><?php echo $form->error($model1,'h2'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model1,'title'); ?></div>
            <div class="span7"> <?php echo $form->textField($model1,'title'); ?> <span><?php echo $form->error($model1,'title'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model1,'description'); ?></div>
            <div class="span7"> <?php echo $form->textArea($model1,'description'); ?> <span><?php echo $form->error($model1,'description'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model1,'keywords'); ?></div>
            <div class="span7"> <?php echo $form->textArea($model1,'keywords'); ?> <span><?php echo $form->error($model1,'keywords'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model1,'allow_index'); ?></div>
            <div class="span7"> 
			<?php echo $form->radioButtonList($model1,'allow_index',array('0'=>'No Index','1'=>'Index'),array('separator'=>' ','labelOptions'=>array('style'=>'display:inline'))); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model1,'allow_follow'); ?></div>
            <div class="span7"> 
			<?php echo $form->radioButtonList($model1,'allow_follow',array('0'=>'No Follow','1'=>'Follow'),array('separator'=>' ','labelOptions'=>array('style'=>'display:inline'))); ?> </div>
            <div class="clear"></div>
          </div>
        </div>
      