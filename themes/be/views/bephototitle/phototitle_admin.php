<?php 
$this->pageTitle=t('Manage Photo Titles');
$this->pageHint=t('Here you can manage all Photo Titles'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Phototitle')); ?>