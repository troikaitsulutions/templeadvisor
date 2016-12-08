<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		$temple_id = isset($_GET['temple']) ? strtolower(trim($_GET['temple'])) : ''; 
		
?>


<section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
					<div class="page">
						<div class="post-content">
							<div class="blog-infinite">
								<div class="post">
									<div class="post-content-wrapper">
										<div class="details">
					
											<div class="col-md-9 no-float no-padding center-block">
												<div class="intro text-center block">
													<h2>Post Your Article Here</h2>
													<p>Post articles on Temples, worship, religious practices, deities, festivals, temple events and more.</p>
												</div>
												<?php //$this->render('cmswidgets.views.notification'); ?>
												<?php $form=$this->beginWidget('CActiveForm', array(
															'id'=>'contribute-my-article',
															
															'enableAjaxValidation'=>true, 
															'htmlOptions' => array('enctype' => 'multipart/form-data'),
															'htmlOptions'=>array('class'=>'contact-form'),
												)); 
												?>
												<?php echo $form->errorSummary(array($model, $mseo)); ?>
													<div class="row form-group">
														<div class="col-xs-6">
															<?php echo $form->label($model,'name'); ?>
															<?php echo $form->textField($model, 'name',array ('class' => 'input-text full-width')); ?>
															<span class="error"><?php echo $form->error($model,'name'); ?> </span>
														</div>
														
														<div class="col-xs-6">
															<?php echo $form->label($model,'email_id'); ?>
															<?php echo $form->textField($model, 'email_id',array ('class' => 'input-text full-width')); ?>
															<span class="error"><?php echo $form->error($model,'email_id'); ?> </span>
														</div>
														
														
													</div>
													
													<div class="row form-group">
														<div class="col-xs-6">
															<?php echo $form->label($model,'heading'); ?>
															<?php echo $form->textField($model, 'heading',array ('class' => 'input-text full-width')); ?>
															<span class="error"><?php echo $form->error($model,'heading'); ?> </span>
														</div>
														
														<div class="col-xs-6">
															<?php echo $form->label($model,'phoneno'); ?>
															<?php echo $form->textField($model, 'phoneno',array ('class' => 'input-text full-width')); ?>
															<span class="error"><?php echo $form->error($model,'phoneno'); ?> </span>
														</div>
														
														
													</div>
													
													
													<div class="form-group">
														<?php echo $form->label($model,'content1'); ?>
														<?php echo $form->textArea($model, 'content1', array('rows' => 15, 'cols' => 50, 'class'=>'input-text full-width')); ?> 
														<span class="error"><?php echo $form->error($model,'content1'); ?> </span>
														
													</div>
													<div class="row form-group">
														<div class="col-xs-6">
															<?php echo $form->labelEx($model,'img_url_1'); ?>
															<?php echo $form->fileField($model, 'img_url_1',array ('class' => 'input-text full-width'));?> 
															<span class="error"><?php echo $form->error($model,'img_url_1'); ?></span>
															
															
														</div>
														<div class="col-xs-6">
															<?php echo $form->labelEx($model,'img_url_2'); ?>
															<?php echo $form->fileField($model, 'img_url_2',array ('class' => 'input-text full-width'));?> 
															<span class="error"><?php echo $form->error($model,'img_url_2'); ?></span>
															
															
														</div>
													</div>
													<div class="row form-group">
														<div class="col-xs-6">
															<?php echo $form->labelEx($model,'img_url_3'); ?>
															<?php echo $form->fileField($model, 'img_url_3',array ('class' => 'input-text full-width'));?> 
															<span class="error"><?php echo $form->error($model,'img_url_3'); ?></span>
															
														</div>
														<div class="col-xs-6">
															<?php echo $form->labelEx($model,'img_url_4'); ?>
															<?php echo $form->fileField($model, 'img_url_4',array ('class' => 'input-text full-width'));?> 
															<span class="error"><?php echo $form->error($model,'img_url_4'); ?></span>
															
														</div>
													</div>
													
													
													<button type="submit" class="btn-large full-width">SEND MY ARTICLE</button>
												<?php $this->endWidget(); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
												
											
                                       
                        
                    </div>
                    <div class="sidebar col-sm-4 col-md-3">
                        <div class="travelo-box">
                            <h5 class="box-title">Search Articles</h5>
                            <div class="with-icon full-width">
                                <input type="text" class="input-text full-width" placeholder="Article name or Content">
                                <button class="icon custom-bg white-color"><i class="soap-icon-search"></i></button>
                            </div>
                        </div>
                        
        <?php $this->renderPartial('//layouts/recent-article-right-pane',array('layout_asset'=>$layout_asset,'count'=>8)); ?>
                        
                        
                       
                    </div>
                </div>
            </div>
        </section>


