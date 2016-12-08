<?php 
$this->pageTitle=t('Manage Subscribers');
$this->pageHint=t('Here you can manage all Subscribers'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Subscribers')); ?>