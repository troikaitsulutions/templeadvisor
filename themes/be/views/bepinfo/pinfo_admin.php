<?php 
$this->pageTitle=t('Manage Properties');
$this->pageHint=t('Here you can manage all Info for Properties'); ?>

<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Pinfo')); ?>