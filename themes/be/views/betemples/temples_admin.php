<?php 
$this->pageTitle=t('Manage Temples');
$this->pageHint=t('Here you can manage all Info for Temples'); ?>

<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Temples')); ?>