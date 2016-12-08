<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BesubscribersController extends BeController{
    
       
     public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 
				$this->menu=array(
                
				array('label'=>t('Manage Subscribers'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
                       
                );
		 
	}
                 
  
        
     /**
	 * The function that do Manage Page
	 * 
	 */
	 
	public function actionAdmin()
	{                
		$this->render('subscribers_admin');
	}
        
     
     /**
	 * The function is to Delete Page
	 * 
	 */
	 
	public function actionDelete($id)
	{                            
        GxcHelpers::deleteModel('Subscribers', $id);          
	}
        
      
        
}