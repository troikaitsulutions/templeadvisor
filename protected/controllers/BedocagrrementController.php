<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BedocagrrementController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add Document Agreement'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
	$this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Show all Document Agreement'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );    
		$this->render('docagrrement_create');
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
          
              
              $this->render('docagrrement_update');
	}
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
           
		$this->render('docagrrement_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('docagrrement_admin');
	}
        
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Docagrrement', $id);
	}
}