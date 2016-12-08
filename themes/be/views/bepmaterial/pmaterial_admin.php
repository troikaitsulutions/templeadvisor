<?php 
$this->pageTitle=t('Manage Material Information');
$this->pageHint=t('Here you can manage all Info for this Material'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Pmaterial')); ?>