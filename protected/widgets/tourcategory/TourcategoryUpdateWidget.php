<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class TourcategoryUpdateWidget extends CWidget
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
        
       $id=isset($_GET['id']) ? (int)$_GET['id'] : 0;
       $model =  GxcHelpers::loadDetailModel('Tourcategory', $id);
	   	
		    
			
			$mseo=Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
			
			if(  count($mseo) == 0 ) { $mseo = new Seo; $mseo->uid = $model->uid;  } 
			
			if( isset($mseo) && count($mseo)>0 ) 
		
         $this->performAjaxValidation(array($model,$mseo));
        
        // collect user input data
        if(isset($_POST['Tourcategory'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Tourcategory'];  
				$mseo->attributes=$_POST['Seo'];
				
				
								
				$current_time=time();
				$mseo->modified = $model->modified = $current_time;
				$mseo->mod_by = $model->mod_by = Yii::app()->user->getId(); 
				$mseo->mod_ip = $model->mod_ip = ip(); 
				$mseo->layout = 'tourcategory';
				  
				  $valid=$model->validate();
       			  $valid=$mseo->validate() && $valid;
       			 
				  
				   if($valid)
        			{
                	if($model->save() && $mseo->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Tour Category information has been updated Successfully!'));                                                            
                    $model=new Tourcategory;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }                
        $this->render('cmswidgets.views.tourcategory.tourcategory_form_widget',array('model'=>$model,'mseo'=>$mseo));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='tourcategory-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
