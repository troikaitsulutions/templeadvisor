<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class ReviewsController extends FeController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	public function actionIndex()
	{
		
		$page = Page::model()->findByPk(81);
		if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		$page_no = isset($_GET['page']) ? (int) ($_GET['page']) : 0 ;
		
		
		
			if(isset($meta) && count($meta)>0) {
				
				if( $page_no == 0 ) {
					$this->pageTitle = $meta->title;
					$this->description = $meta->description; 
				} else { 
					$this->pageTitle = $meta->title.' - Page '.$page_no;
					$this->description = $meta->description.' - Page '.$page_no;
				}
				$this->keywords = $meta->keywords;	 
				
				$criteria = new CDbCriteria();
				$criteria->order = 'created DESC';
				$criteria->condition = 'status = 1';
        		$item_count = Writeyourreviews::model()->count($criteria);
		
				$pag = new CPagination($item_count);	 
				$pag->setPageSize(5);
				$pag->pageVar='page';
				$pag->applyLimit($criteria);  // the trick is here!
		
        
		$this->render('review-list',array(
		        'Writeyourreviews'=> Writeyourreviews::model()->findAll($criteria),
                'item_count'=>$item_count,
                'page_size'=>'5',
                'items_count'=>$item_count,
                'pages'=>$pag,
				'meta'=>$meta,
				'page'=>$page
		));	
				
					
			//	$this->render('review-list',array('page'=>$page,'meta'=>$meta,'Writeyourreviews'=>$Writeyourreviews));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	  }  else { throw new CHttpException('404',t('Oops! Page not found!')); }         
	}
	
	

				
		public function actionArticleread()
	{
		$id= isset($_GET['aid']) ? (int) ($_GET['aid']) : 0 ;
		if($id) { 
		
			$Contributemyarticle = Contributemyarticle::GetItem($id);
			if( isset($Contributemyarticle) && count($Contributemyarticle)>0 ) {
			$meta = Seo::GetPageSeo($Contributemyarticle->uid);
			
			if( isset($meta) && count($meta)>0 ) { 
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
			$this->render('article-read',array('Contributemyarticle'=>$Contributemyarticle,'meta'=>$meta )); 
			
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			
			
		}
               
	}
	
	

	
}