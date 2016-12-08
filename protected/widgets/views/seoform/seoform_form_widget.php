
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->label($mseo,'slug'); ?></div>
            <div class="span7"> <?php echo $form->textField($mseo,'slug',array('id'=>'txt_slug')); ?> <span><?php echo $form->error($mseo,'slug'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($mseo,'mainmenu'); ?></div>
            <div class="span7"> <?php echo $form->textField($mseo,'mainmenu',array('id'=>'txt_mainmenu')); ?> <span><?php echo $form->error($mseo,'mainmenu'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($mseo,'breadcrumbs'); ?></div>
            <div class="span7"> <?php echo $form->textField($mseo,'breadcrumbs',array('id'=>'txt_breadcrumbs')); ?> <span><?php echo $form->error($mseo,'breadcrumbs'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($mseo,'h1'); ?></div>
            <div class="span7"> <?php echo $form->textField($mseo,'h1',array('id'=>'txt_h1')); ?> <span><?php echo $form->error($mseo,'h1'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($mseo,'h2'); ?></div>
            <div class="span7"> <?php echo $form->textField($mseo,'h2'); ?> <span><?php echo $form->error($mseo,'h2'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($mseo,'h3'); ?></div>
            <div class="span7"> <?php echo $form->textField($mseo,'h3'); ?> <span><?php echo $form->error($mseo,'h3'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($mseo,'title'); ?></div>
            <div class="span7"> <?php echo $form->textField($mseo,'title',array('id'=>'txt_title')); ?> <span><?php echo $form->error($mseo,'title'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($mseo,'description'); ?></div>
            <div class="span7"> <?php echo $form->textArea($mseo,'description'); ?> <span><?php echo $form->error($mseo,'description'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($mseo,'keywords'); ?></div>
            <div class="span7"> <?php echo $form->textArea($mseo,'keywords'); ?> <span><?php echo $form->error($mseo,'keywords'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
          <div class="span3"><?php echo $form->labelEx($mseo,'allow_index'); ?></div>
          <div class="span3">  <?php echo $form->dropDownList($mseo,'allow_index',array('0'=>'No Index','1'=>'Index'),array()); ?> <span><?php echo $form->error($mseo,'margin_cost'); ?></span> </div>
           <div class="span3"><?php echo $form->labelEx($mseo,'allow_follow'); ?></div>
          <div class="span3">  <?php echo $form->dropDownList($mseo,'allow_follow',array('0'=>'No Follow','1'=>'Follow'),array()); ?> <span><?php echo $form->error($mseo,'allow_follow'); ?></span> </div>
         <div class="clear"></div>
        </div>
          
      </div>    
          
      