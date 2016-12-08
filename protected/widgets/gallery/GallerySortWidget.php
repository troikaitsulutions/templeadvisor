<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class GallerySortWidget extends CWidget
{
    
    public $visible=true;
	
     
 
    public function init()
    {
        
    }
 
    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
        }
    }
 
    protected function renderContent()
    {
		if (isset($_POST['items']) && is_array($_POST['items'])) {
        $i = 0;
        foreach ($_POST['items'] as $item) {
            $project = Gallery::model()->findByPk($item);
            $project->img_order = $i;
			$project->mod_by = Yii::app()->user->getId();
			$project->modified = time();
			$project->mod_ip = ip();
            $project->save();
            $i++;
        }
    }
	}   
}
