                                                     
                                    
                                    	<?php echo $form->label($model,'object_h1'); ?>
                                        <?php echo $form->textArea($model,'object_h1',array('id'=>'txt_h1')); ?>
                                        <?php echo $form->error($model,'object_h1'); ?>
                                        
                                        <?php echo $form->label($model,'object_h2'); ?>
                                        <?php echo $form->textArea($model,'object_h2',array('id'=>'txt_h2')); ?>
                                        <?php echo $form->error($model,'object_h2'); ?>
                                        
                                        <?php echo $form->label($model,'object_mainmenu'); ?>
                                        <?php echo $form->textField($model,'object_mainmenu',array('id'=>'txt_menuname')); ?>
                                        <?php echo $form->error($model,'object_mainmenu'); ?>
                                        
                                        <?php echo $form->label($model,'object_footermenu'); ?>
                                        <?php echo $form->textField($model,'object_footermenu',array('id'=>'txt_footermenu')); ?>
                                        <?php echo $form->error($model,'object_footermenu'); ?>
                                        
                                        <?php echo $form->label($model,'object_breadcrumbs'); ?>
                                        <?php echo $form->textField($model,'object_breadcrumbs',array('id'=>'txt_breadcrumbs')); ?>
                                        <?php echo $form->error($model,'object_breadcrumbs'); ?>
                                        
										<?php echo $form->labelEx($model,'comment_status'); ?>
                                        <?php echo $form->dropDownList($model,'comment_status',  ConstantDefine::getObjectCommentStatus()); ?>
                                        <?php echo $form->error($model,'comment_status'); ?>
                                        
                                        <?php echo $form->labelEx($model,'allow_enquiry'); ?>
                                        <?php echo $form->dropDownList($model,'allow_enquiry',  ConstantDefine::getObjectCommentStatus()); ?>
                                        <?php echo $form->error($model,'allow_enquiry'); ?>
                                        
                                        <?php echo $form->labelEx($model,'allow_reserve'); ?>
                                        <?php echo $form->dropDownList($model,'allow_reserve',  ConstantDefine::getObjectCommentStatus()); ?>
                                        <?php echo $form->error($model,'allow_reserve'); ?>
                                   
                                        
                                  

                            

