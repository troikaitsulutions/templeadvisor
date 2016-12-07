<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
?>

<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
    <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset,'meta' => $meta)); ?>
    <div class="temple_content_section">
        	<div class="temple_content_left">
            	<div class="tmp_region_right_testi">
                	<h3>Disclaimer</h3>
                   
                    <div class="clr"></div>
                    
                      <p> <p><b>Visitors are requested to go through the disclaimer before registering for this site.</b><br>

•  &nbsp;The website and its content are for general information purposes only not intended to advise anyone.<br>

•  &nbsp;We try to provide website content that is found true and accurate as of the date but do not warranty regarding the accuracy of any of the contents.<br>

•  &nbsp;We disclaim all liability in respect of any information on this website. <br>

•  &nbsp;The website does not consider any of its content to form any part of any contract between us or constitute any type of offer by this website. <br>

•  &nbsp;Certain disclaimers may apply in addition to certain content or parts of the site. <br>

•  &nbsp;This website is not responsible for and excludes all liability in connection with browsing this Web site.<br>

•  &nbsp;The website is not responsible for information or downloading any materials from it, including any errors or misleading statements. <br>

•  &nbsp;The information at this Web site might include opinions or views which are not necessarily those of this website or any associated company or any person in relation to whom they would have any liability or responsibility. <br>

•  &nbsp;All content and information of the website may be changed or updated without notice.<br>

•  &nbsp;The website does not take any liability for any claims for services provided by us. <br>

•  &nbsp;The views and opinions of the authors of content published at this website does not necessarily state or reflect the opinion of this website or its owners, and cannot be used for advertising or product endorsement purposes. <br>

•  &nbsp;References to Web sites are specific suggestions only and do not necessarily constitute or imply an endorsement. <br>

•  &nbsp;Links to other Web sites, are provided solely for visitors' know how. Links taken to other sites are done so at your own risk and this website accepts no liability for any linked sites or their content. <br>

•  &nbsp;When visiting external Web sites take time to review those Websites' privacy policies and other terms of use to learn more about, what, why and how they collect and use any personally identifiable information. <br>
</p> </p>
                   
                  
                    
                  <div class="clr"></div>
                </div>
                
                
              	
              	
                
            </div>
            <div class="temple_content_right">
            	<div class="tmp_details">
                	<h2><img src="images/time-icon.png" alt="" />Time </h2>
                    <div class="tmp_description">
                    	<p>5.30 AM to 12.30 PM <br />4.00 PM to 9.30 PM</p>
                    </div>                    
                </div>
                <div class="tmp_details">
                	<h2><img src="images/bell-icon.png" alt="" /> Festival and Events  </h2>
                    <div class="tmp_description">
                    	<ul>
                            <li>Tiruchi Renganatthan Street</li>
                          <li>Malaikottai radha veethi</li>
                          <li>Tanjavur West Radha Veethi</li>
                          <li>Kuthu vizhakku Festival</li>
                      </ul>
                    </div>                    
                </div>
                <div class="tmp_details">
                	<h2><img src="images/near-temple-icon.png" alt="" /> Near By Temples </h2>
                    <div class="tmp_description nearby_temples">
                    	<p><img src="images/img1.jpg" alt="" /><img src="images/img2.jpg" alt="" /><img class="mright_n"  src="images/img3.jpg" alt="" /><img src="images/img4.jpg" alt="" /><img src="images/img5.jpg" alt="" /><img src="images/img6.jpg" class="mright_n" alt=""  /><img  src="images/img7.jpg" alt="" /><img src="images/img8.jpg" alt="" /><img src="images/img9.jpg" alt="" class="mright_n" /></p>
                  </div>                    
                </div> 
                
                
                                
            </div>
        </div>
    <div class="temple_content_right">
      <div class="tmp_details">
        <h2><img alt="Recent Artiles" src="<?php echo $layout_asset; ?>/images/bell-icon.png"> <?php echo t('Recent Articles'); ?> </h2>
        <div class="tmp_description">
          <ul>
            <a href="#">
            <li>Tiruchi Renganatthan Street</li>
            </a> <a href="#">
            <li>Malaikottai radha veethi</li>
            </a> <a href="#">
            <li>Tanjavur West Radha Veethi</li>
            </a> <a href="#">
            <li>Kuthu vizhakku Festival</li>
            </a>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
