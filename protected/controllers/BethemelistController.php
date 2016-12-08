<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BethemelistController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add Theme Sub List'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('themelist_create');
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->render('themelist_update');
	}
	
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
        $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		$this->render('themelist_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('themelist_admin');
	}
        
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Themelist', $id);
	}
          
        
}