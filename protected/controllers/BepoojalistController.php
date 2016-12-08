<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BepoojalistController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		  
                 $this->menu=array(
                       
                        array('label'=>t('Add Pooja'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                        
                );
		 
	}
                 
     /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('poojalist_create');
	}
        
       
        
        /**
	 * The function that do Manage Page
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('poojalist_admin');
	}
        
        /**
	 * The function that view Page details
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Update this Pooja info'), 'url'=>array('update','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
                        )
                    );
		$this->render('poojalist_view');
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
                            
                            array('label'=>t('View this Pooja Info'), 'url'=>array('view','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
		$this->render('poojalist_update',array('id'=>$id));
	}
        
        
        /**
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Poojalist', $id);          
	}
	
	public function actionLoadmaster()
	{  
		
	if(isset($_GET['pujatype'])) {
		
		$data = Pujatype::model()->findByPk((int) $_GET['pujatype']); 
				
            // return data (JSON formatted)
            echo CJSON::encode(array(
              'packing_cost' => $data->packing_cost,
			  'transportation_cost' => $data->transportation_cost,
			  'profit_margin' => $data->profit_margin,
			  'service_tax' => $data->service_tax,
			  'pg_charge' => $data->pg_charge,
			  'int_packing_extra' => $data->int_packing_extra
            ));           
	}
		
	}
        
}