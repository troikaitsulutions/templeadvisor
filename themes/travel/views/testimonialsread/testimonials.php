<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		$list = (isset($_GET['list'])) ? $_GET['list'] : ''; 
			?>


<section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="page">
                            
                            <div class="post-content">
                                <div class="blog-infinite">
                                    <?php
										$this->widget('zii.widgets.CListView', array(
										'dataProvider'=>$model->search(),
										'itemView'=>'_testimonials',
										'id' => 'TestimonialList',
										'summaryText' => 'Showing {start} to {end} of {count} Testimonials',
										'ajaxUpdate' => true,  // This is it.
										'pager'=>array('header'=>'<h5>Testimonial Page </h5>'),
										'htmlOptions' => array('class' => 'grid-view rounded'),
										)); 					
									?> 
                                </div>
								
                               <div class="post-comment block">
                                <h2><?php echo t('Add Your Testimonials'); ?></h2>
                                <div class="travelo-box">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'testimonials-form',
										'enableAjaxValidation'=>true,   
										'htmlOptions'=>array('class'=>'comment-form'),
										)); 
									?>
									<?php echo $form->errorSummary(array($model)); ?>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <?php echo $form->label($model,'name'); ?>
												<?php echo $form->textField($model, 'name',array ('class' => 'input-text full-width')); ?>
												<span class="error"><?php echo $form->error($model,'name'); ?> </span>
                                            </div>
                                            <div class="col-xs-6">
                                                <?php echo $form->label($model,'email'); ?>
												<?php echo $form->textField($model, 'email',array ('class' => 'input-text full-width')); ?>
												<span class="error"><?php echo $form->error($model,'email'); ?> </span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <?php echo $form->label($model,'heading'); ?>
											<?php echo $form->textField($model, 'heading',array ('class' => 'input-text full-width')); ?>
											<span class="error"><?php echo $form->error($model,'heading'); ?> </span>
										</div>

                                        <div class="form-group">
                                            <?php echo $form->label($model,'comment'); ?>
											<?php echo $form->textArea($model, 'comment', array('rows' => 15, 'cols' => 50, 'class'=>'input-text full-width')); ?> 
											<span class="error"><?php echo $form->error($model,'comment'); ?> </span>
										</div>
                                        
                                        <button type="submit" class="btn-large full-width">SEND TESTIMONIAL</button>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div> 
                            </div>
                        </div>
                    </div>
                    <div class="sidebar col-sm-4 col-md-3">

                        
        <?php $this->renderPartial('//layouts/recent-article-right-pane',array('layout_asset'=>$layout_asset)); ?>
                        
                        
                       
                    </div>
                </div>
            </div>
        </section>


