<?php 
$this->pageTitle=t('Add new Review');
$this->pageHint=t('Here you can add new Review for your Site'); 

?>

<?php $this->widget('cmswidgets.review.ReviewCreateWidget',array()); ?>