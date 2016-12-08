<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BetimingController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		   $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; 
                 $this->menu=array(
                       array('label'=>t('Back to Temple'), 'url'=>array('betemples/view','id'=>$page_id),'linkOptions'=>array('class'=>'btn btn-mini')),
                      
                        array('label'=>t('Add Timing'), 'url'=>array('create','page_id'=>$page_id),'linkOptions'=>array('class'=>'btn btn-mini')),
                       
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{     
		$this->render('timing_create');
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
            
			    $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
			  $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; 
           
              $this->render('timing_update',array('id'=>$id));
	}
	
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
			   $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; 
			   
		$this->render('timing_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('timing_admin');
	}
        
    
	public function actionDelete($id)
	{                            
		
            GxcHelpers::deleteModel('Timing', $id);
	}
          
        
}