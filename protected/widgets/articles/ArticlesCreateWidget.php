<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class ArticlesCreateWidget extends CWidget
{
    
    public $visible=true;     
    
  
     
 
    public function init()
    {
        
    }
 
    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
        }
    }
 
    protected function renderContent()
    {       
        $model = new Articles;
		$mseo = new Seo;
		
		
		
      
		
		$this->performAjaxValidation(array($model, $mseo));
	
		
        
        
        // collect user input data
        if(isset($_POST['Articles'], $_POST['Seo']))
        {
                                           
                
                $model->attributes=$_POST['Articles'];   
				$mseo->attributes=$_POST['Seo']; 
				
				 
				
			   $current_time=time();
			   $mseo->created = $model->created = $current_time;
			   
			   $model->email_id = User::GetUserEmail(Yii::app()->user->getId());
				
			   $model->uid = uniqid();
			   $mseo->cr_ip = $model->cr_ip = ip();
			   $mseo->uid = $model->uid;
			   $mseo->crby = $model->crby = Yii::app()->user->getId(); 
			   $mseo->layout = 'articles';
				 
				
				  
				  $valid=$model->validate();
      			  $valid=$mseo->validate() && $valid;
				
				 if($valid)
        			{
				                    
                if($model->save() && $mseo->save() ){           
                    
                   
                    //Start to save the Page Block
                    user()->setFlash('success',t('Create new Article Successfully!'));                                                            
                    $model=new Articles;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        } 
		
				               
        $this->render('cmswidgets.views.articles.articles_form_widget',array('model'=>$model,'mseo'=>$mseo));            
   
    }
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='articles-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
