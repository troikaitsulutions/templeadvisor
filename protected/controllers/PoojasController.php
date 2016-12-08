<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class PoojasController extends FeController
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
	 
	
	public function actionList1()
	{
		
		$pooja = isset($_GET['pooja']) ? strtolower(trim($_GET['pooja'])) : '';
		$pcategory = isset($_GET['pcategory']) ? strtolower(trim($_GET['pcategory'])) : '';
		
		
		$BreadCrumbs[0]['label'] = 'Home';
		$BreadCrumbs[0]['url'] = FRONT_SITE_URL;
		
		$BreadCrumbs[1]['label'] = 'Online Pujas';
		$BreadCrumbs[1]['url'] = $this->createUrl('poojas/index',array('pooja' => $pooja));
		
		
		
		if ( ( isset($pcategory) && ($pcategory!='') ) && ($pooja=='online-pujas') ) { 
		
			$this->pageTitle = 'Meta Title';
			$this->description = 'Meta Desc';
			$this->keywords = 'Meta Keyword';	 
				
		
		$PcategorySeo = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$pcategory)));

		if( isset($PcategorySeo) && count($PcategorySeo)>0 ) { 
		
			$BreadCrumbs[2]['label'] = $PcategorySeo->breadcrumbs;
			$BreadCrumbs[2]['url'] = '#';
			$meta = $PcategorySeo;
						
			$PoojaSub = Purpose::model()->find(array('condition'=>'uid = :REGUID','params'=>array(':REGUID'=>$PcategorySeo->uid)));
		
				$criteria = new CDbCriteria();	
				$criteria->condition = 'status = 1 AND purpose ='.$PoojaSub->id; 
				$criteria->order=' name ASC'; 	
		}
		
		
		$item_count = Poojalist::model()->count($criteria);
				  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllPoojas = Poojalist::model()->findAll($criteria);
		
		$this->render('list',array(
							  'meta' => $meta,
							  'BreadCrumbs' => $BreadCrumbs,
							  'AllPoojas' => $AllPoojas, 
							  'item_count' => $item_count,
							  'page_size' => '10',
							  'items_count' => $item_count,
							  'pages' => $pag
							  ));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			
	           
               
	}
	
	public function actionList()
	{
		
		$pooja = isset($_GET['pooja']) ? strtolower(trim($_GET['pooja'])) : '';
		$pcategory = isset($_GET['pcategory']) ? strtolower(trim($_GET['pcategory'])) : '';
		
		$BreadCrumbs[0]['label'] = 'Home';
		$BreadCrumbs[0]['url'] = FRONT_SITE_URL;
		
		$BreadCrumbs[1]['label'] = "Puja's Home";
		$BreadCrumbs[1]['url'] = Yii::app()->createUrl('poojas/index',array('pooja'=>'online-pujas'));
		
		$PurposeSeo = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$pcategory)));
		
		if( isset($PurposeSeo) && count($PurposeSeo)>0 ) 
		{ 
			if ( ( isset($pcategory) && ($pcategory!='') ) ) 
			{ 
				$this->pageTitle = 'Meta Title';
				$this->description = 'Meta Desc';
				$this->keywords = 'Meta Keyword';	 
				
				$BreadCrumbs[2]['label'] = $PurposeSeo->breadcrumbs;
				$BreadCrumbs[2]['url'] = '#';
				$meta = $PurposeSeo;
						
				$Purpose = Pujapurpose::model()->find(array('condition'=>'uid = :REGUID','params'=>array(':REGUID'=>$PurposeSeo->uid)));
				$AllPujas = Poojalist::model()->findAll();
			
				$model = new Poojalistpurpose('search');
				$model->unsetAttributes();  // clear any default values
				if (isset($_GET['Poojalistpurpose'])) {
					$model->attributes = $_GET['Poojalistpurpose'];
				}
				$this->render('list',array(
							  'meta' => $meta,
							  'BreadCrumbs' => $BreadCrumbs,
							  'AllPujas' => $AllPujas, 
							  'model'=>$model,
							  'purpose' => $Purpose->id
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
	
	
	public function actionDetail()
	{
		$pooja = isset($_GET['pooja']) ? strtolower(trim($_GET['pooja'])) : '';
		$pcategory = isset($_GET['pcategory']) ? strtolower(trim($_GET['pcategory'])) : '';
		$pid = isset($_GET['pid']) ? strtolower(trim($_GET['pid'])) : '';
		
		if ( isset($pid) && ($pid!='') ) 
		{ 
			$PujaSeo = Seo::model()->find(array('condition'=>'slug = :SLG', 'params'=>array(':SLG'=>$pid)));
			if(isset($PujaSeo) && count($PujaSeo)>0 ) 
			{
				$PujaDetail = Poojalist::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$PujaSeo->uid)));
				$PujaPurpose = Pujapurpose::model()->findByPk($PujaDetail->purpose);
				$PurposeSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$PujaPurpose->uid)));
				if(isset($PurposeSeo) && count($PurposeSeo)>0 ) 
				{
					if($PurposeSeo->slug == $pcategory ) 
					{
							if(isset($PujaDetail) && count($PujaDetail)>0 ) 
							{
										//$Festivals = Festivalevent::model()->findAll(array('condition'=>'temples LIKE :TID','params'=>array(':TID'=>'%'.$Temple->id.'%')));
										//$Festivals = Festivalevent::model()->findAll();
										
										//$Reviews = Testimonials::model()->findAll(array('condition'=>'temple = :TID','params'=>array(':TID'=>$Temple->id)));
										//$Reviews = Testimonials::model()->findAll();
										
										//$Articles = Articles::model()->findAll(array('condition'=>'parent = :TID','params'=>array(':TID'=>$Temple->id)));
										//$Articles = Articles::model()->findAll(array('limit'=>5));
										
										//$model = new Testimonials;
										$Temple = Temples::model()->findByPk($PujaDetail->temple);
									 
										$this->pageTitle = $PujaSeo->title;
										$this->description = $PujaSeo->description;
										$this->keywords = $PujaSeo->keywords;	 
										
										$this->render('detail',array(
											'PujaDetail'=>$PujaDetail,
											'meta'=>$PujaSeo, 
											'Temple'=>$Temple, 
											/*'Festivals'=>$Festivals,
											'Reviews'=>$Reviews,
											'Articles' => $Articles,
											'model'=>$model*/
											)); 
								
							}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
					}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
				}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			} else { throw new CHttpException('404',t('Oops! Page not found!')); }
		} else { throw new CHttpException('404',t('Oops! Page not found!')); }
               
	}
	
	
	
	
}