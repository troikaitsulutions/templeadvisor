<?php 
$this->pageTitle=t('Manage Posture Information');
$this->pageHint=t('Here you can manage all Info for this Posture'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Posture')); ?>