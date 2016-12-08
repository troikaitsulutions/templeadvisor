<?php 
$this->pageTitle=t('Manage Businness Enquirys');
$this->pageHint=t('Here you can manage all Busines Enquirys'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Businessenquiry')); ?>