<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class RegionController extends FeController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	
	public function actionIndex()
	{
		
		$id = isset($_GET['region']) ? $_GET['region'] : '' ;
		
		if($id) {
			
		$Seo = Seo::model()->find(array(
			'condition' => 'slug = :ID',
			'params' => array(':ID'=>$id)
		));
		
		
		
		if($Seo) {
			
		$Region = Reg::model()->find(array(
			'condition' => 'status = 1 AND uid = :UID',
			'params' => array( ':UID' => $Seo->uid)
		));
		
					
		$criteria = new CDbCriteria();
       	$criteria->condition = 'status = :st AND region = :ID';
       	$criteria->order = 'id ASC';
       	$criteria->params = array (':st'=>1,':ID' => $Region->id);
        $item_count = Temples::model()->count($criteria);
		
		$pag = new CPagination($item_count);	 
		$pag->setPageSize(10);
        $pag->applyLimit($criteria);  // the trick is here!
		$pag->setCurrentPage($id);
        
		$this->render('//temples/temple-list',array(
		        'Temples'=> Temples::model()->findAll($criteria),
                'item_count'=>$item_count,
                'page_size'=>'10',
                'items_count'=>$item_count,
                'pages'=>$pag
		));	
		Yii::app()->end();   
		
		} }
	}
	
	
	public function actionList()
	{
		
		$id=isset($_GET['page']) ? (int) ($_GET['page']) : 0 ;
		
		$criteria = new CDbCriteria();
       	$criteria->condition = 'status = :id';
       	$criteria->order = 'id ASC';
       	$criteria->params = array (':id'=>1);
        $item_count = Temples::model()->count($criteria);
		
		$pag = new CPagination($item_count);	 
		$pag->setPageSize(10);
        $pag->applyLimit($criteria);  // the trick is here!
		$pag->setCurrentPage($id);
        
		$this->render('temple-list',array(
		        'Temples'=> Temples::model()->findAll($criteria),
                'item_count'=>$item_count,
                'page_size'=>'10',
                'items_count'=>$item_count,
                'pages'=>$pag
		));	
		Yii::app()->end();         
	}
	
	
	
	public function actionInfo()
	{
		$id= isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		if($id) { 
		
			$Temple = Temples::GetItem($id);
			if($Temple) { $this->render('temple-detail',array('Temple'=>$Temple)); }
		
		}
               
	}
	
	public function actionGallery()
	{
		
		$id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		
		$criteria = new CDbCriteria();
		
		if( $id == 0 ) { 
			$criteria->condition = 'status = :id'; 
			$criteria->params = array (':id'=>1);
		} else {
			$criteria->condition = 'status = :id AND prop_id = :PID';
			$criteria->params = array (':id'=>1,':PID'=>$id);
		}
			
       	$criteria->order = 'id ASC';
       	
        $item_count = Gallery::model()->count($criteria);
		
		$pag = new CPagination($item_count);	 
		$pag->setPageSize(20);
        $pag->applyLimit($criteria);  // the trick is here!
		$pag->setCurrentPage($id);
        
		$this->render('gallery',array(
		        'Temples'=> Gallery::model()->findAll($criteria),
                'item_count'=>$item_count,
                'page_size'=>'20',
                'items_count'=>$item_count,
                'pages'=>$pag
		));	
		Yii::app()->end(); 
	}
	
	
}