<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BetemplesController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add Temple'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('temples_create');
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
          $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
          $this->menu=array_merge($this->menu,                       
                        array(
                           
							array('label'=>t('Show all Temples'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Photos Gallery'), 'url'=>array('begallery/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
						//	array('label'=>t('Nearest Things'), 'url'=>array('benearest/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Direction'), 'url'=>array('bedirection/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Timing'), 'url'=>array('betiming/create','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Best Season'), 'url'=>array('bebestseason/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Special Events'), 'url'=>array('beevents/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
			  
              $this->render('temples_update');
	}
	
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
        $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		
		 $this->menu=array_merge($this->menu,                       
                        array(
                           
							 array('label'=>t('Show all Temples'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							 array('label'=>t('Photos Gallery'), 'url'=>array('begallery/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
						//	array('label'=>t('Nearest Things'), 'url'=>array('benearest/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Direction'), 'url'=>array('bedirection/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Timing'), 'url'=>array('betiming/create','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Best Season'), 'url'=>array('bebestseason/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Special Events'), 'url'=>array('beevents/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
		
		$this->render('temples_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('temples_admin');
	}
        
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Temples', $id);
	}
          
        
}