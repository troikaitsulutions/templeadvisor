<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class TestimonialsreadController extends FeController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	 public function actionIndex()
	{
		$model = new Testimonials;
		$page = Page::model()->findByPk(66);
		if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
	
		
		
		
			if(isset($meta) && count($meta)>0) {
				
				
					$this->pageTitle = $meta->title;
					$this->description = $meta->description; 
					$this->keywords = $meta->keywords;	 
				
				
				
				
			 if(isset($_POST['ajax']) && $_POST['ajax']==='testimonials-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // collect user input data
        if(isset($_POST['Testimonials']))
        {
                $model->attributes=$_POST['Testimonials'];   
								
				$current_time=time();
				$model->created = $current_time;
				$model->status = 2;
				$model->cr_ip = ip();
				
				
				   if($model->save()){           
                    user()->setFlash('success',t('The Testimonials has been Added Successfully!'));                                                            
                	$model = new Testimonials;
					Yii::app()->controller->redirect(array('testimonialsread/index'));
                }
        }
		
		$model = new Testimonials('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Testimonials'])) {
				$model->attributes = $_GET['Testimonials'];
			}
		
        
		$this->render('testimonials',array(
				'model' => $model,
				'meta'=>$meta,
				'page'=>$page
		));	
				
					
			//	$this->render('review-list',array('page'=>$page,'meta'=>$meta,'Writeyourreviews'=>$Writeyourreviews));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	  }  else { throw new CHttpException('404',t('Oops! Page not found!')); }           
	}
}