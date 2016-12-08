<?php 
$this->pageTitle=t('Manage Belief Information');
$this->pageHint=t('Here you can manage all Info for this Belief/Faith'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Belief')); ?>