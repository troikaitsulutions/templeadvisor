<?php 
$this->pageTitle=t('Manage Pooja List');
$this->pageHint=t('Here you can manage Pooja lists'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Poojalist')); ?>