<?php 
$this->pageTitle=t('Manage Puja Purposes');
$this->pageHint=t('Here you can manage all Purposes'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Pujapurpose')); ?>