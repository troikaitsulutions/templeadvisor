<?php 
$this->pageTitle=t('Manage Town Information');
$this->pageHint=t('Here you can manage all Info for Towns'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Town')); ?>