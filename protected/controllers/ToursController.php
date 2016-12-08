<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class ToursController extends FeController
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
					
		$this->render('home',array( 'page'=>$page, 'meta'=>$meta ));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	 
	/*
	public function actionList()
	{
		
		
		
		$page = Page::model()->findByPk(78);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
		if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	
				
				 
				
				
				$this->render('list',array( 'page'=>$page, 'meta'=>$meta ));
				
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	*/
	
	public function actionList()
	{
		
		$country = isset($_GET['country']) ? strtolower(trim($_GET['country'])) : '';
		$scategory = isset($_GET['scategory']) ? strtolower(trim($_GET['scategory'])) : '';
		
		
		$BreadCrumbs[0]['label'] = 'Home';
		$BreadCrumbs[0]['url'] = FRONT_SITE_URL;
		
		$BreadCrumbs[1]['label'] = 'Tours Around India';
		$BreadCrumbs[1]['url'] = $this->createUrl('temples/index',array('country' => $country));
		
		
		
		if ( ( isset($scategory) && ($scategory!='') ) && ($country=='tours-around-india') ) { 
		
			$this->pageTitle = 'Meta Title';
			$this->description = 'Meta Desc';
			$this->keywords = 'Meta Keyword';	 
				
		
		$ScategorySeo = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$scategory)));

		if( isset($ScategorySeo) && count($ScategorySeo)>0 ) { 
		
			$BreadCrumbs[2]['label'] = $ScategorySeo->breadcrumbs;
			$BreadCrumbs[2]['url'] = '#';
			$meta = $ScategorySeo;
						
			$TourSub = Toursubcategory::model()->find(array('condition'=>'uid = :REGUID','params'=>array(':REGUID'=>$ScategorySeo->uid)));
		
				$criteria = new CDbCriteria();	
				$criteria->condition = 'status = 1 AND subcategory ='.$TourSub->id; 
				$criteria->order=' name ASC'; 	
		}
		
		
		$item_count = Tourpackage::model()->count($criteria);
				  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllTours = Tourpackage::model()->findAll($criteria);
		
		$this->render('list',array(
							  'meta' => $meta,
							  'BreadCrumbs' => $BreadCrumbs,
							  'AllTours' => $AllTours, 
							  'item_count' => $item_count,
							  'page_size' => '10',
							  'items_count' => $item_count,
							  'pages' => $pag
							  ));
		
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