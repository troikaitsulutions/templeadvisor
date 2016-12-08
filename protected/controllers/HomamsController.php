<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class HomamsController extends FeController
{
	 
	
	 
	
	public function actionList()
	{
		
		$page = Page::model()->findByPk(78);
		
		if( isset($page) && count($page)>0 ) { 
			
			$BreadCrumbs[0]['label'] = 'Home';
			$BreadCrumbs[0]['url'] = FRONT_SITE_URL;
		 
			$meta = Seo::GetPageSeo($page->uid);
		if(isset($meta) && count($meta)>0) {
				
			$this->pageTitle = 'Meta Title';
			$this->description = 'Meta Desc';
			$this->keywords = 'Meta Keyword'; 
			
			$model = new Homamlist('search');
			$model->unsetAttributes();  // clear any default values
			
			if (isset($_GET['Homamlist'])) {
				$model->attributes = $_GET['Homamlist'];
			}
			
			$this->render('list',array(
							  'meta' => $meta,
							  'BreadCrumbs' => $BreadCrumbs,
							  'model'=>$model
							  ));
				
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	public function actionInfo()
	{
		$id= isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		
		if($id) { 
		
			$Temple = Temples::GetItem($id);
			if( isset($Temple) && count($Temple)>0 ) {
			$meta = Seo::GetPageSeo($Temple->uid);
			
			if( isset($meta) && count($meta)>0 ) { 
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
			$this->render('detail',array('Temple'=>$Temple,'meta'=>$meta )); 
			
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			
			
		}
               
	}
	
	
	
	
	
	
	
}