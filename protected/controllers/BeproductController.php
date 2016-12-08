<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeproductController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		  
                 $this->menu=array(
                        array('label'=>t('Manage Product'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-medium')),
                        array('label'=>t('Add Product'), 'url'=>array('selectcategory'),'linkOptions'=>array('class'=>'btn btn-medium')),
                        
                );
		 
	}
                 
     /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('product_create');
	}
	
	
	public function actionSelectcategory()
	{                
		$this->render('product_category');
	}
	
	
	
        
       
        
        /**
	 * The function that do Manage Page
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('product_admin');
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
                            array('label'=>t('Update this Product info'), 'url'=>array('update','id'=>$id),'linkOptions'=>array('class'=>'btn btn-medium')),
                        )
                    );
		$this->render('product_view');
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
                            
                            array('label'=>t('View this Product Info'), 'url'=>array('view','id'=>$id),'linkOptions'=>array('class'=>'btn btn-medium'))
                        )
                    );
		$this->render('product_update',array('id'=>$id));
	}
        
        
        /**
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Product', $id);          
	}
        
}