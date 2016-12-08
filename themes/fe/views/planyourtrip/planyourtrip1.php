<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
			
		
		
		//Yii::app()->clientScript->registerScriptFile('http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery-bootstrap-modal-steps.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerCssFile($layout_asset.'/css/bootstrap.min.css', CClientScript::POS_HEAD);			
?>

<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
    <div class="theme-slogan">
      <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle'); ?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="Contribute an Article" title="Contribute an Article"><?php echo t('Contribute an Article'); ?></a> <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"><?php echo t('Rate & Review Temples'); ?></a> </span> </div>
      <div class="clr"></div>
    </div>
    <div class="temple_content_section">
      <div class="tasite-tourpackage">
        <h1><?php echo $meta->h1; ?></h1>
        <div class="w100p fleft">
          <div class="plan-image"><a href="#" data-toggle="modal" data-target="#myModal"><img src="<?php echo $layout_asset; ?>/images/plan-your-trip.jpg" alt=""></a></div>
          <ul>
            <li>
              <div class="air">
                <div> <img src="<?php echo $layout_asset; ?>/images/north-india.jpg" alt="" class="fleft"> <span class="fleft w50p">
                  <h1>North Package</h1>
                  <p>IRCTC Tourism offers a fantastic range of affordable all inclusive holidays and family...</p>
                  <a href="#">Read more</a></span> </div>
              </div>
            </li>
            <li>
              <div class="wildlife">
                <div> <img src="<?php echo $layout_asset; ?>/images/north-east.jpg" alt="" class="fleft"> <span class="fleft w50p">
                  <h1>North East Package</h1>
                  <p>IRCTC Tourism offers Indian Wildlife holiday tour packages...</p>
                  <a href="#">Read more</a></span> </div>
              </div>
            </li>
            <li>
              <div class="beaches">
                <div> <img src="<?php echo $layout_asset; ?>/images/regilious.jpg" alt="" class="fleft"> <span class="fleft w50p">
                  <h1>religious</h1>
                  <p>IRCTC Tourism offers experience of a lifetime on religious tours...</p>
                  <a href="#">Read more</a> </span> </div>
              </div>
            </li>
            <li>
              <div class="religious">
                <div> <img src="<?php echo $layout_asset; ?>/images/south.jpg" alt="" class="fleft"> <span class="fleft w50p">
                  <h1>South Package</h1>
                  <p>IRCTC Tourism offers experience of LTC Tours...</p>
                  <a href="#">Read more</a> </span> </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="js-title-step"></h4>
            </div>
            <div class="modal-body">
              <div class="row hide" data-step="1" data-title="Sort By Temple">
                <div class="well">
                  <input type="checkbox" value="" name="">
                  All Temples <br>
                  <input type="checkbox" value="" name="">
                  Hindu Deity <br>
                  <input type="checkbox" value="" name="">
                  History <br>
                  <input type="checkbox" value="" name="">
                  Jain <br>
                  <input type="checkbox" value="" name="">
                  Buddhist <br>
                  <input type="checkbox" value="" name="">
                  Sikh <br>
                </div>
              </div>
              <div class="row hide" data-step="2" data-title="Sort By Location">
                <div class="well"> Region &nbsp;
                  <select name="region_filter" id="region_filter">
                    <option value="">None</option>
                    <option value="1001">East</option>
                    <option value="1004">North</option>
                    <option value="1003">South</option>
                    <option value="1002">West</option>
                  </select>
                  &nbsp;State &nbsp;
                  <select name="state_filter" id="state_filter">
                    <option value="">None</option>
                    <option value="1029">Andaman &amp; Nicobar Islands</option>
                    <option value="1002">Andhra Pradesh</option>
                    <option value="1003">Arunachal Pradesh</option>
                    <option value="1004">Assam</option>
                    <option value="1005">Bihar</option>
                    <option value="1030">Chandigarh</option>
                    <option value="1006">Chhattisgarh</option>
                    <option value="1031">Dadra &amp; Nagar Haveli</option>
                    <option value="1032">Daman &amp; Diu</option>
                    <option value="1035">Delhi</option>
                    <option value="1007">Goa</option>
                    <option value="1008">Gujarat</option>
                    <option value="1009">Haryana</option>
                    <option value="1010">Himachal Pradesh</option>
                    <option value="1011">Jammu &amp; Kashmir</option>
                    <option value="1012">Jharkhand</option>
                    <option value="1013">Karnataka</option>
                    <option value="1014">Kerala</option>
                    <option value="1033">Lakshadweep</option>
                    <option value="1015">Madhya Pradesh</option>
                    <option value="1016">Maharashtra</option>
                    <option value="1017">Manipur</option>
                    <option value="1018">Meghalaya</option>
                    <option value="1019">Mizoram</option>
                    <option value="1020">Nagaland</option>
                    <option value="1021">Odisha</option>
                    <option value="1034">Puducherry</option>
                    <option value="1022">Punjab</option>
                    <option value="1023">Rajasthan</option>
                    <option value="1024">Sikkim</option>
                    <option value="1025">Tamil Nadu</option>
                    <option value="1036">Telangana (TS)</option>
                    <option value="1026">Tripura</option>
                    <option value="1027">Uttar Pradesh</option>
                    <option value="1037">Uttarakhand (UK)</option>
                    <option value="1028">West Bengal</option>
                  </select>
                  &nbsp;
                  City &nbsp;
                  <select name="region_filter" id="region_filter">
                    <option value="">None</option>
                    <option value="1001">Madurai</option>
                    <option value="1004">Chennai</option>
                    <option value="1003">South</option>
                    <option value="1002">West</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default js-btn-step pull-left" data-orientation="cancel" data-dismiss="modal"></button>
              <button type="button" class="btn btn-warning js-btn-step" data-orientation="previous"></button>
              <button type="button" class="btn btn-success js-btn-step" data-orientation="next"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
<?php $js_modal = "$('#myModal').modalSteps();";

	Yii::app()->clientScript->registerScript('Js_modal', $js_modal);
?>
