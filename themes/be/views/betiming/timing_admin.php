<?php 
$this->pageTitle=t('Manage Temple Timing');
$this->pageHint=t('Here you can manage the Timings of Temples'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Timing')); ?>