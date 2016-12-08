<?php 
$this->pageTitle=t('Manage Avatar Information');
$this->pageHint=t('Here you can manage all Info for this Avatar'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Avatar')); ?>