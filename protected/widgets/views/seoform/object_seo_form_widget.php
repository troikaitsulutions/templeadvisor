                          <div class="content-box-header">


                            <h3><?php echo t('Summary & SEO');?></h3>
                             <ul class="content-box-tabs">
                                <li><a class="default-tab current" href="#summary_box"><?php echo t('Summary');?></a></li>
                                <li><a href="#seo_box" class=""><?php echo t('SEO');?></a></li>
                             </ul>
                            </div> 

                            <div class="content-box-content" style="display: block;">

                                    <div class="tab-content default-tab" id="summary_box">
                                    
                                   <?php echo $form->label($model,'offer_desc'); ?>
                                   <?php echo $form->textArea($model,'offer_desc',array('id'=>'txt_offer_desc')); ?>
                                   <?php echo $form->error($model,'offer_desc'); ?> 
                                  
                                        
                                        <?php echo $form->label($model,'start_date'); ?>
                                        <?php 
                                        $this->widget('cms.extensions.timepicker.EJuiDateTimePicker',array(
                                            'model'=>$model,
                                            'attribute'=>'start_date',

                                            'options'=>array(
                                                'value'=>'12',
                                                'dateFormat'=>'yy-mm-dd',
                                                'timeFormat' => 'hh:mm:ss',
                                                'changeMonth' => true,
                                                'changeYear' => true,
                                                ),

                                            ));  
                                        ?>

                                        <?php echo $form->error($model,'start_date'); ?>
                                        
                                        <?php echo $form->label($model,'end_date'); ?>
                                        <?php 
                                        $this->widget('cms.extensions.timepicker.EJuiDateTimePicker',array(
                                            'model'=>$model,
                                            'attribute'=>'end_date',

                                            'options'=>array(
                                                'value'=>'12',
                                                'dateFormat'=>'yy-mm-dd',
                                                'timeFormat' => 'hh:mm:ss',
                                                'changeMonth' => true,
                                                'changeYear' => true,
                                                ),

                                            ));  
                                        ?>

                                        <?php echo $form->error($model,'end_date'); ?>

                                        
                                        
                                      
                                        
                                        
                                        
                                        
                                    </div>    
                                    <div class="tab-content" id="seo_box">
                                    
                                    	<?php echo $form->label($model,'object_googlecode'); ?>
                                        <?php echo $form->textArea($model,'object_googlecode',array('id'=>'txt_google_ga')); ?>
                                        <?php echo $form->error($model,'object_googlecode'); ?>
                                        
                                        <?php echo $form->label($model,'object_bingcode'); ?>
                                        <?php echo $form->textArea($model,'object_bingcode',array('id'=>'txt_bingcode')); ?>
                                        <?php echo $form->error($model,'object_bingcode'); ?>
                                        
                                        <?php echo $form->label($model,'object_canonical'); ?>
                                        <?php echo $form->textField($model,'object_canonical',array('id'=>'txt_canonical')); ?>
                                        <?php echo $form->error($model,'object_canonical'); ?>
                                   
                                        <?php echo $form->label($model,'object_slug'); ?>
                                        <?php echo $form->textField($model,'object_slug',array('id'=>'txt_object_slug')); ?>
                                        <?php echo $form->error($model,'object_slug'); ?>
                                        
                                        <?php echo $form->label($model,'object_title'); ?>
                                        <?php echo $form->textField($model,'object_title',array('id'=>'txt_object_title')); ?>
                                        <?php echo $form->error($model,'object_title'); ?>
                                        
                                        <?php echo $form->label($model,'object_description'); ?>
                                        <?php echo $form->textArea($model,'object_description',array('id'=>'txt_object_description')); ?>
                                        <?php echo $form->error($model,'object_description'); ?>
                                        
                                        <?php echo $form->label($model,'object_keywords'); ?>
                                        <?php echo $form->textArea($model,'object_keywords',array('id'=>'txt_object_keywords')); ?>
                                        <?php echo $form->error($model,'object_keywords'); ?>
                                        
                                                                      
                                        <?php echo $form->label($model,'allow_index',array('style'=>'display:inline')); ?>
										<?php echo $form->checkBox($model,'allow_index',array()); ?>	
           								<?php echo $form->error($model,'allow_index'); ?>
                                        
           
            							<?php echo $form->label($model,'allow_follow',array('style'=>'display:inline')); ?>
										<?php echo $form->checkBox($model,'allow_follow',array()); ?>
            							<?php echo $form->error($model,'allow_follow'); ?>
                                    </div>       

                            </div>

