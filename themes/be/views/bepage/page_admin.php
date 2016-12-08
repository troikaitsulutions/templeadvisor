<?php 
$this->pageTitle=t('Manage Web page Information');
$this->pageHint=t('Here you can manage all Info for this Web page'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Page')); ?>