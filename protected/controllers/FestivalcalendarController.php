<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class FestivalcalendarController extends FeController
{
	 
	public function actionIndex()
	{
		
		$page = Page::model()->findByPk(60);
		if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
		$this->render('calendar',array( 'page'=>$page, 'meta'=>$meta ));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }  
	}
	
	
	public function actionFestivaldate()
	{
	if(isset($_POST['currentMonth'])) {
		$currentMonth = isset($_POST['currentMonth']) ? trim($_POST['currentMonth']) : '';
		$currentYear = isset($_POST['currentYear']) ? trim($_POST['currentYear']) : '';
		
		echo $currentMonth.','.$currentYear;
	}
	}
	 
	
}