<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PinfoTranslateWidget extends CWidget
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
        $model = new Translate;
		$mseo = new Seo;
                        
        //If it has guid, it means this is a translated version
                                            
        //List of language that should exclude not to translate       
        //List of translated versions
        // If the guid is not empty, it means we are creating a translated version of a content
        // We will exclude the translated language and include the name of the translated content to $versions

		
		$this->performAjaxValidation(array($model, $mseo));
	
		
        
        
        // collect user input data
        if(isset($_POST['Translate']))
        {    
            $model->attributes=$_POST['Translate'];   
	 		$mseo->attributes=$_POST['Seo'];
				
			 $current_time=time();
			 $pinfo_id = isset($_GET['id']) ? strtolower(trim($_GET['id'])) : ''; 
			 $lang_id = isset($_GET['language']) ? strtolower(trim($_GET['language'])) : ''; 
			 
			 $model->prop_id = $pinfo_id;
			 $model->lang = $lang_id; 
			 $mseo->crby = $model->crby = Yii::app()->user->getId(); 
			 $mseo->created = $model->created = $current_time;
			 $mseo->uid = $model->uid = uniqid();
			 $mseo->cr_ip = $model->cr_ip = ip();
			 $mseo->layout = 'prop';
				 			  
			 $valid=$model->validate();
      		 $valid=$mseo->validate() && $valid;
				
				 if($valid)
        			{
				                    
                if( $model->save() && $mseo->save() ){           
                    
                   
                    //Start to save the Page Block
                    user()->setFlash('success',t('Translate The Property Successfully!'));                                                            
                    $model=new Pinfo;
                    Yii::app()->controller->redirect(array('admin'));
                } }
        } 
		
				               
        $this->render('cmswidgets.views.pinfo.pinfo_trans_widget',array('model'=>$model,'mseo'=>$mseo,'gps'=>$gps,'payment'=>$payment, 'lang_exclude'=>$lang_exclude,'versions'=>$versions));            
   
    }
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='trans-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
