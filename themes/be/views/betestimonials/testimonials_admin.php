<?php 
$this->pageTitle=t('Manage Testimonials');
$this->pageHint=t('Here you can manage all Testimonials'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Testimonials')); ?>