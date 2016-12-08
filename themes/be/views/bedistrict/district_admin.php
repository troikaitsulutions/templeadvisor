<?php 
$this->pageTitle=t('Manage District Information');
$this->pageHint=t('Here you can manage all Info for this District'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'District')); ?>