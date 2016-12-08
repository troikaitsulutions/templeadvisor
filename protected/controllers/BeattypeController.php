<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeattypeController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add Attractions Type'), 'url'=>array('beattype/create'),'linkOptions'=>array('class'=>'btn btn-small')),
						array('label'=>t('Add Attractions'), 'url'=>array('beatlist/create'),'linkOptions'=>array('class'=>'btn btn-small')),
						array('label'=>t('Add Attraction Info'), 'url'=>array('beatinfo/create'),'linkOptions'=>array('class'=>'btn btn-small')),
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('attype_create');
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->render('attype_update');
	}
	
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
        $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		$this->render('attype_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('attype_admin');
	}
        
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Attype', $id);
	}
          
        
}