<?php 
$this->pageTitle=t('Manage Featured Event Information');
$this->pageHint=t('Here you can manage all Info for this Event'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Fevents')); ?>