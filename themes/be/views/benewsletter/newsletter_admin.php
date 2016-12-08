<?php 
$this->pageTitle=t('Manage Newsletter');
$this->pageHint=t('Here you can manage all Newsletters'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Newsletter')); ?>