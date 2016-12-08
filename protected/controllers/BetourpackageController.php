<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BetourpackageController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		  
                 $this->menu=array(
                        
                        array('label'=>t('Add Tour/List Tour'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-medium')),
                );
		 
	}
                 
     /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('tourpackage_create');
	}
        
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Update this Tour info'), 'url'=>array('update','id'=>$id),'linkOptions'=>array('class'=>'btn btn-medium')),
							
							array('label'=>t('Itinerary'), 'url'=>array('beitinerary/create','tid'=>$id),'linkOptions'=>array('class'=>'btn btn-medium')),
							/*array('label'=>t('Vehicle Cost'), 'url'=>array('bevehicle/create','tid'=>$id),'linkOptions'=>array('class'=>'btn btn-medium')),
							array('label'=>t('Hotel Cost'), 'url'=>array('beaccomodation/create','tid'=>$id),'linkOptions'=>array('class'=>'btn btn-medium')),*/
                        )
                    );
		$this->render('tourpackage_view');
	}
        
        /**
	 * The function that update Page
	 * 
	 */
	public function actionUpdate()
	{                
                $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; 
				     
                $this->menu=array_merge($this->menu,                       
                        array(
                            
                            array('label'=>t('View this Tour Info'), 'url'=>array('view','id'=>$id),'linkOptions'=>array('class'=>'btn btn-medium')),
							array('label'=>t('Itinerary'), 'url'=>array('beitinerary/create','tid'=>$id),'linkOptions'=>array('class'=>'btn btn-medium')),
							
                        )
                    );
		$this->render('tourpackage_update',array('id'=>$id));
	}
        
        
        /**
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Tourpackage', $id);          
	}
        
}