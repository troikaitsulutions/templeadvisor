<?php 
$this->pageTitle=t('Manage Enquiry Mails');
$this->pageHint=t('Here you can manage your Enquiries'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Enquiry')); ?>