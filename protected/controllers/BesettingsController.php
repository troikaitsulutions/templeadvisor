<?php
/**
 * Backend Settings Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BesettingsController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
               
		 
	}
                 
        /**
	 * The function that do Manage System Settings
	 * 
	 */
	public function actionSystem()
	{                
		$this->render('settings_system');
	}
        
         /**
	 * The function that do Manage General Settings
	 * 
	 */
	public function actionGeneral()
	{                
		$this->render('settings_general');
	}
        
        
                    
}