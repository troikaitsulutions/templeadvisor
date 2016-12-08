<?php 
$this->pageTitle=t('Manage State Information');
$this->pageHint=t('Here you can manage all Info for this State'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'State')); ?>