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
                          <div id="calendar"></div>  
                        </div>
                    </div>
        <div class="sidebar col-sm-4 col-md-3">
          <?php $this->renderPartial('//layouts/recent-article-right-pane',array('layout_asset'=>$layout_asset)); ?>
        </div>
                </div>
            </div>
        </section>
<?php
Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery.event.calendar.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery.event.calendar.en.js',CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile($layout_asset.'/css/jquery.event.calendar.css');		


	
    $cal_js = "$(document).ready(function () {
		
		$('#calendar').eCalendar({
	    ajaxDayLoader	: 'festivalcalendar/festivaldate',
	    ajaxEventLoader	: 'ajax/hb-events.php',
	    eventsContainer	: '#hb-event-list',
	    currentMonth	: 10,
	    currentYear		: 2014,
	    startMonth		: 1,
	    startYear		: 2014,
	    endMonth		: 12,
	    endYear			: 2015,
	    firstDayOfWeek	: 1,
	    onBeforeLoad	: function() {},
	    onAfterLoad		: function() {},
	    onClickMonth	: function() {},
	    onClickDay		: function() {}
	});
		
    });";
	
	Yii::app()->clientScript->registerScript('calendar', $cal_js);
?>

   
