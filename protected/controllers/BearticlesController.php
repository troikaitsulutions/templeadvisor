<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BearticlesController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add Article'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
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
                           
							array('label'=>t('Show all Articles'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							/*array('label'=>t('Photos'), 'url'=>array('begallery/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
							array('label'=>t('Nearest Things'), 'url'=>array('benearest/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Direction'), 'url'=>array('bedirection/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Best Season'), 'url'=>array('bebestseason/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Special Events'), 'url'=>array('beevents/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))*/
                        )
                    );
					         
		$this->render('articles_create');
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
                           
							array('label'=>t('Show all Articles'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Photos'), 'url'=>array('begallery/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
							/*array('label'=>t('Nearest Things'), 'url'=>array('benearest/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Direction'), 'url'=>array('bedirection/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Best Season'), 'url'=>array('bebestseason/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Special Events'), 'url'=>array('beevents/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))*/
                        )
                    );
			  
              $this->render('articles_update');
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
                           
							array('label'=>t('Show all Articles'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Photos'), 'url'=>array('begallery/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
							/*array('label'=>t('Nearest Things'), 'url'=>array('benearest/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Direction'), 'url'=>array('bedirection/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Best Season'), 'url'=>array('bebestseason/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Special Events'), 'url'=>array('beevents/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')) */
                        )
                    );
		
		$this->render('articles_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('articles_admin');
	}
        
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Articles', $id);
	}
          
        
}