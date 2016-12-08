<?php 
$this->pageTitle=t('Manage Reviews');
$this->pageHint=t('Here you can manage your Reviews'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Review')); ?>