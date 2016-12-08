<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class AstrologyCreateWidget extends CWidget
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
        $model = new Astrology;
		$mseo = new Seo;
		
		$this->performAjaxValidation(array($model, $mseo));
        
		
        // collect user input data
        if(isset($_POST['Astrology'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Astrology'];   
				$mseo->attributes=$_POST['Seo']; 
				$current_time = time();
				$mseo->created = $model->created = $current_time;  
				$mseo->cr_ip = $model->cr_ip = ip();
				$mseo->crby = $model->crby = Yii::app()->user->getId();                 
				$mseo->uid = $model->uid = uniqid();
				$mseo->layout = 'astrology';
				
				$valid=$model->validate();
      			$valid=$mseo->validate() && $valid;
				
				 if($valid)
        			{                    
                if($model->save() && $mseo->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('The Astrology has been Added Successfully!'));                                
                    $model=new Astrology;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }    
		      
        $this->render('cmswidgets.views.astrology.astrology_form_widget',array('model'=>$model,'mseo'=>$mseo));
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='astrology-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
