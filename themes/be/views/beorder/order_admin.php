<?php 
$this->pageTitle=t('Manage Order');
$this->pageHint=t('Here you can manage all Country Temples'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Order')); ?>