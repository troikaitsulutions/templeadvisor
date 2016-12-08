<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
?>

<body class="home blog two-column right-sidebar" data-twttr-rendered="true">
<div id="page">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
  <div id="main" class="site-main container_16">
    <div class="inner">
      <div id="primary" class="grid_11 suffix_1">
        <article class="single">
          <h3>
            <?php 
		  
		  echo $Temple->name.', '; 
		  if ($Temple->sdeity) { echo Diety::GetName($Temple->sdeity).' Temple  '; }
		  if ($Temple->avatar) { echo 'Form of '.Avatar::GetName($Temple->avatar); }
		  ?>
          </h3>
          <div class="event-info radius"> <span class="event-address fleft"> <span class="event-location fleft"> <i class="icon-map-marker"></i> </span>
            <?php if($Temple->address1) { echo $Temple->address1.','; } ?>
            <?php if($Temple->address2) { echo $Temple->address2.','; } ?>
            <?php if($Temple->town != 0) { echo Town::GetName($Temple->town).','; } ?>
            <?php if($Temple->district != 0) { echo District::GetName($Temple->district).','; } ?>
            <?php if($Temple->state !=0 ) { echo State::GetName($Temple->state).','; } ?>
            <?php if($Temple->country != 0) { echo Country::GetName($Temple->country); } ?>
            </span> <a class="buttons bookplace fright radius"><i class="icon-check-sign"></i> Check the Trip Plan</a> <a class="buttons facebook fright radius" href="#"><i class="icon-facebook-sign"></i> Facebook</a>
            <div class="clear"></div>
            <div class="event-map">
              <h3><?php echo t('Browse map'); ?></h3>
              <br />
              <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=%C8%98tefan+Cel+Mare+%C8%99i+Sf%C3%AEnt,+Chi%C5%9Fin%C4%83u,+Moldova&amp;aq=2&amp;oq=Stefan+cel+Mare+si+s&amp;sll=37.0625,-95.677068&amp;sspn=58.598104,135.263672&amp;t=m&amp;ie=UTF8&amp;hq=%C8%98tefan+Cel+Mare+%C8%99i+Sf%C3%AEnt,&amp;hnear=Chisinau,+Moldova&amp;ll=47.025931,28.830556&amp;spn=0.026413,0.037752&amp;output=embed"></iframe>
            </div>
            <div class="book-your-place">
              <h3><?php echo t('Check the Trip Plan'); ?>:</h3>
              <br />
              <form action="processForm.php" id="reservation-form" method="post">
                <p>
                  <label for="contactName"></label>
                  <input class="radius"  type="text" name="contactName" id="contactName" value="" placeholder="Name*" required/>
                </p>
                <p>
                  <label for="email"></label>
                  <input class="radius" type="email" name="email" id="email" value="" placeholder="Email Adress*" required/>
                </p>
                <p>
                  <label for="commentsText"></label>
                  <textarea class="contactme-text required requiredField radius" name="message" cols="20" rows="5" placeholder="Do you have smth to say?" required></textarea>
                </p>
                <p>
                  <input  class="buttons radius send" value="Send !" type="submit">
                  </input >
                  <input type="hidden" name="submitted" id="submitted" value="true" />
                </p>
              </form>
            </div>
          </div>
          <div class="entry-content">
            <div class="temple-photo">
            <figure> 
            	<img width="848" height="352" src="<?php echo Gallery::GetPropLargeImg($Temple->id); ?>" class="wp-post-image" alt="<?php echo $Temple->name; ?>"> 
               
            </figure>
             <div class="clear"></div>
             </div>
            <div class="long-description">
              <p><?php echo $Temple->content1; ?></p>
            </div>
            <?php if ( $Temple->famous_for != '' ) { ?>
            <h4> <?php echo t('This Temple Famous For'); ?> </h4>
            <div class="long-description">
              <p><?php echo $Temple->famous_for; ?></p>
            </div>
            <?php } ?>
            <?php if ( $Temple->festival != '' ) { ?>
            <h4> <?php echo t('Festival'); ?> </h4>
            <div class="long-description">
              <p><?php echo $Temple->festival; ?></p>
            </div>
            <?php } ?>
            <?php $BSeason = Bestseason::model()->findAll(array(
			'condition' => 'prop_id = :PID AND status = 1',
			'params' => array(':PID' => $Temple->id ),
		)); ?>
            <?php if( isset($BSeason) && count($BSeason) > 0 ) { ?>
            <h3><?php echo t('Best Season'); ?></h3>
            <div class="long-description">
              <ul>
                <?php foreach ($BSeason as $bs) { ?>
                <li> <?php echo $bs->name.' - from '.$bs->from_date.' to '.$bs->to_date.' '.$bs->comment; ?> </li>
                <?php } ?>
              </ul>
            </div>
            <?php } ?>
            <?php $Events = Events::model()->findAll(array(
			'condition' => 'prop_id = :PID AND status = 1',
			'params' => array(':PID' => $Temple->id ),
		)); ?>
            <?php if( isset($Events) && count($Events) > 0 ) { ?>
            <h4><?php echo t('Special Events'); ?></h4>
            <div class="long-description">
              <ul>
                <?php foreach ($Events as $ev) { ?>
                <li> <?php echo $ev->name.' - from '.date('d-M-Y',$ev->from_date).' to '.date('d-M-Y',$ev->to_date).' '.$ev->comment; ?> </li>
                <?php } ?>
              </ul>
            </div>
            <?php } ?>
          </div>
          <div class="clear"></div>
        </article>
      </div>
      <div id="secondary" class="grid_4 widget-area" role="complementary">
        <?php if($Temple->other_deity != '') { ?>
        <aside id="archives" class="widget">
          <div class="widget-title">
            <h3><?php echo t('Other Deity'); ?></h3>
            <div class="clear"></div>
          </div>
          <p> <?php echo $Temple->other_deity; ?> </p>
        </aside>
        <?php } ?>
        <?php if($Temple->thirtham_sthalavruksham != '') { ?>
        <aside id="archives" class="widget">
          <div class="widget-title">
            <h3><?php echo t('Thirtham & Sthalavruksham'); ?></h3>
            <div class="clear"></div>
          </div>
          <p> <?php echo $Temple->thirtham_sthalavruksham; ?> </p>
        </aside>
        <?php } ?>
        <?php if($Temple->timing != '') { ?>
        <aside id="archives" class="widget">
          <div class="widget-title">
            <h3><?php echo t('Timing'); ?></h3>
            <div class="clear"></div>
          </div>
          <p> <?php echo $Temple->timing; ?> </p>
        </aside>
        <?php } ?>
        <?php $Nearest = Nearest::model()->findAll(array(
			'condition' => 'prop_id = :PID AND status = 1',
			'params' => array(':PID' => $Temple->id ),
		)); ?>
        <?php if( isset($Nearest) && count($Nearest) > 0 ) { ?>
        <aside id="archives" class="widget">
          <div class="widget-title">
            <h3><?php echo t('Nearest Attractions'); ?></h3>
            <div class="clear"></div>
          </div>
          <ul>
            <?php foreach ($Nearest as $nt) { ?>
            <li> <?php echo $nt->name.'('.Nthings::GetName($nt->things).')'.Town::GetName($nt->town).'-'.$nt->distant; ?> </li>
            <?php } ?>
          </ul>
        </aside>
        <?php } ?>
        <?php $Directions = Direction::model()->findAll(array(
			'condition' => 'prop_id = :PID AND status = 1',
			'params' => array(':PID' => $Temple->id ),
		)); ?>
        <?php if( isset($Directions) && count($Directions) > 0 ) { ?>
        <aside id="archives" class="widget">
          <div class="widget-title">
            <h3><?php echo t('Direction To Reach'); ?></h3>
            <div class="clear"></div>
          </div>
          <ul>
            <?php foreach ($Directions as $dr) { ?>
            <li> <?php echo $dr->name.'('.Vehicle::GetName($dr->vehicle).') from '.Town::GetName($dr->town).' '.$dr->travel_time; ?> </li>
            <?php } ?>
          </ul>
        </aside>
        <?php } ?>
        <?php 
		
		$themes = explode('|', $Temple->themelist );
		if ( isset($themes) && count($themes)>0 ) {
		?>
        <aside id="tag_cloud-2" class="widget widget_tag_cloud">
          <div class="widget-title">
            <h3><?php echo t('Tags'); ?></h3>
            <div class="clear"></div>
          </div>
          <div class="tagcloud">
            <?php foreach ($themes as $key) {  ?>
            <a href="#" class="tag-link-27" title="63 topics"><?php echo Themelist::GetName($key); ?></a>
            <?php } ?>
          </div>
        </aside>
        <?php } ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
