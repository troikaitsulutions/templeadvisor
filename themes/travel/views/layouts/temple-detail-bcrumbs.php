<div class="page-title-container detail-page-title-container">
  <div class="container">
	<ul class="breadcrumbs pull-right">
      <li><a href="/">HOME</a></li>
      <li><a href="<?php echo Yii::app()->createUrl('temples')?>">All Temples</a></li>
      <!-- <li><a href="#">SHORTCODES</a></li> -->
      <li class="active"><?php echo $meta->breadcrumbs; ?></li>
    </ul>
	
    <div class="page-title pull-left">
      <h1 class="box-title"><?php echo $meta->h1; ?>
        <?php  if ($Temple->sdeity) { echo ' of '.Diety::GetName($Temple->sdeity); }
		  if ($Temple->avatar) { echo ' in the form of '.Avatar::GetName($Temple->avatar); }
		  ?>
		<small>
		 <?php echo $Temple->address1; ?>,
                  <?php if( $Temple->address2 != '') { echo $Temple->address2.','; } ?>
                  <?php if( $Temple->town != 0) { echo Town::GetName($Temple->town); } ?>
				  <?php if( $Temple->zip != 0) { echo '-'.$Temple->zip.'<br />'; } ?>
                  <?php if( ($Temple->district != 0) && ( strcmp(trim(strtoupper(Town::GetName($Temple->town))),trim(strtoupper(District::GetName($Temple->district))))!=0) )   { echo District::GetName($Temple->district).','; } ?>
                  <?php if( $Temple->state != 0) { echo State::GetName($Temple->state).', IN'; } ?>
		</small>
      </h1>
    </div>
    
    <div class="col-xs-12">
      <p><?php echo $Temple->famous_for; ?></p>
    </div>
  </div>
</div>
