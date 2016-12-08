<?php

/**
 * This is the Widget for Suggesting a Block for a Page
 * 
 
 * @package  cmswidgets.page
 *
 *
 */
class BlockSuggestWidget extends CWidget
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
        
        Yii::app()->controller->layout='clean';
        $this->render('cmswidgets.views.block.block_suggest_widget',array());                        
        
    }   
    
    
}
