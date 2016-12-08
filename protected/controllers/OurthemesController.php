<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class OurthemesController extends FeController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	
	public function actionIndex()
	{
					
		$this->render('theme');
               
	}
	
	public function actionList()
	{
					
		$this->render('article-photos-list');
               
	}
	
	public function actionInfo()
	{
					
		//$this->render('temple-list');
		$id= isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		if($id) { 
		
			$Temple = Temples::GetItem($id);
			if($Temple) { $this->render('temple-detail',array('Temple'=>$Temple)); }
		
		}
               
	}
	
	
}