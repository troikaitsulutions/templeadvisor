<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeatfacilityController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add Attractions Type'), 'url'=>array('beattype/create'),'linkOptions'=>array('class'=>'btn btn-small')),
						array('label'=>t('Add Attractions'), 'url'=>array('beatlist/create'),'linkOptions'=>array('class'=>'btn btn-small')),
						array('label'=>t('Add Facility'), 'url'=>array('beatfacility/create'),'linkOptions'=>array('class'=>'btn btn-small')),
						array('label'=>t('Add Attraction Info'), 'url'=>array('beatinfo/create'),'linkOptions'=>array('class'=>'btn btn-small')),
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('atfacility_create');
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->render('atfacility_update');
	}
	
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
        $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		$this->render('atfacility_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('atfacility_admin');
	}
        
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Atfacility', $id);
	}
          
        
}