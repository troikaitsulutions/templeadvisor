<div class="gray-area">
    <div class="block temple-list">
        <a href="<?php echo Yii::app()->createUrl('temples/byreligion',array('country'=>'temples-in-india', 'religion' => 'hindu-temples')); ?>" class="button btn-medium yellow">ALL HINDU</a> 
		<a href="<?php echo Yii::app()->createUrl('temples/byreligion',array('country'=>'temples-in-india', 'religion' => 'jain-temples')); ?>" class="button btn-medium yellow">ALL JAIN</a> 
		<a href="<?php echo Yii::app()->createUrl('temples/byreligion',array('country'=>'temples-in-india', 'religion' => 'buddhist-temples')); ?>" class="button btn-medium yellow">ALL BUDDHIST</a> 
		<a href="<?php echo Yii::app()->createUrl('temples/byreligion',array('country'=>'temples-in-india', 'religion' => 'sikh-temples')); ?>" class="button btn-medium yellow">ALL SIKH</a> 
		<a href="<?php echo Yii::app()->createUrl('temples/bytheme',array('country'=>'temples-in-india', 'theme' => 'list-by-heritage-historical')); ?>" class="button btn-medium yellow">ALL HISTORICAL</a> 
		<a href="<?php echo Yii::app()->createUrl('temples/bytheme',array('country'=>'temples-in-india', 'theme' => 'list-by-beliefs')); ?>" class="button btn-medium yellow">ALL BELIEFS</a> 
	</div>
</div>
		  
<div class="sort-by-section clearfix">
    <h4 class="sort-by-title block-sm">Sort results by:</h4>
    <ul class="sort-bar clearfix block-sm">
        <li class="sort-by-name" id='name'><a class="sort-by-container" href="#"><span>Name</span></a></li>
        <li class="sort-by-popularity" id='state'><a class="sort-by-container" href="#"><span>State</span></a></li>
    </ul>
</div>