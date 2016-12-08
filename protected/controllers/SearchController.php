<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class SearchController extends FeController
{
	
	public function actionIndex()
	{
		
		$q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : ''; 
		$BreadCrumbs = array();
		
		$BreadCrumbs[0]['label'] = 'Home';
		$BreadCrumbs[0]['url'] = FRONT_SITE_URL;
		
		if( isset($q) && ($q != '') ) 
		{ 
			$BreadCrumbs[1]['label'] = $q;
			$BreadCrumbs[1]['url'] = '#';
		
			$this->pageTitle = 'Meta Title';
			$this->description = 'Meta Desc';
			$this->keywords = 'Meta Keyword';	 
			
			$model = new Alltemples('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Alltemples'])) {
				$model->attributes = $_GET['Alltemples'];
			}
			$this->render('index',array(
							  'BreadCrumbs' => $BreadCrumbs,
							  'model'=>$model,
							  ));
		
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	}
	
	public function actionSearch()
	{
		
		$page = Page::model()->findByPk(83);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
		if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
				
		$q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : ''; 
		
		
		$Stname = 0;
		$SDeity = 0;
		$Scity = 0;
		
		$condition[]='';
		
		$TempleNames = Temples::model()->findAll(array('condition'=>"name LIKE '%".$q."%' OR content1 LIKE '%".$q."%' OR famous_for LIKE '%".$q."%'"));
		if( isset($TempleNames) && count($TempleNames)>0 ) { $Stname = 1;  $condition[] = "name LIKE '%".$q."%' OR content1 LIKE '%".$q."%' OR famous_for LIKE '%".$q."%'";  } 
		
		$DeitySearches = Diety::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		
		if(isset($DeitySearches) && count($DeitySearches)>0 ) {
		  $SDeity = 1;
		  foreach ($DeitySearches as $DeitySearch) {
				$condition[] = "sdeity = ".$DeitySearch->id;
		  }
		}
		
		$TownSearches = Town::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		
		if(isset($TownSearches) && count($TownSearches)>0 ) {
		  $Scity = 1;
		  foreach ($TownSearches as $TownSearch) {
				$condition[] = "town = ".$TownSearch->id;
		  }
		}
		
		$DistrictSearches = District::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		
		if(isset($DistrictSearches) && count($DistrictSearches)>0 ) {
		  foreach ($DistrictSearches as $DistrictSearch) {
				$condition2[] = "district = ".$DistrictSearch->id;
		  }
		}	
		
		$StateSearches = State::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		
		if(isset($StateSearches) && count($StateSearches)>0 ) {
		  foreach ($StateSearches as $StateSearch) {
				$condition2[] = "state = ".$StateSearch->id;
		  }
		}		
		
		//print_r($condition);
		
		if( isset($condition) && count($condition)>0 ) {
			$search_query = implode(' OR ',$condition);	
		}
		
		//echo $search_query;
			
		//if($q != '') { if( $condition != '' ) { $condition .= "status = 1 AND ".$condition ; }	}
		
		
		//echo $condition;
		
		$criteria = new CDbCriteria();	
		
		if($search_query != '') { $criteria->condition = "status = 1 AND (".substr($search_query, 3).")"; }  else { $criteria->condition = "status = 4"; }
		$criteria->order='name ASC'; 	
		
		$item_count = Temples::model()->count($criteria);	  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllTemples = Temples::model()->findAll($criteria);
		
		$this->render('search-theme',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples, 
							  'item_count'=>$item_count,
							  'page_size'=>'10',
							  'items_count'=>$item_count,
							  'pages'=>$pag,
							  'q'=> $q ));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	
	
}