<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BymapController extends FeController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	
	public function actionIndex()
	{
					
		$this->render('map');
               
	}
	
	
	
	
}