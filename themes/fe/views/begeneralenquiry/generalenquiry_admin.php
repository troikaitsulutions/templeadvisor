<?php 
$this->pageTitle=t('Manage General Enquirys');
$this->pageHint=t('Here you can manage all General Enquirys'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Generalenquiry')); ?>