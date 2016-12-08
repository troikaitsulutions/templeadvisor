<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class VillaownerImportWidget extends CWidget
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
        $model = new Villaowner;
		//$mseo = new Seo;
		//$mseo1 = new Pageseo;
                        
        

        // if it is ajax validation request
        $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Villaowner']))
        {
                $model->attributes=$_POST['Villaowner'];  
								
				$current_time=time();
				$model->created = $current_time;
                $model->modified = $current_time;
				$model->cr_ip = ip();
				$model->lang = 2;                  
				$model->uid = uniqid();
				  
				$valid=$model->validate();
				 
				  
				   if($valid)
        			{
                		if($model->save()){     
					
					$del = Prop::model()->find(array('order'=>'id'));	
					Prop::model()->deleteAll("id=".$del->id);      
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('People Added Successfully!'));                                                            
                    $model=new Villaowner;
					$prop=new Prop;
                    //Yii::app()->controller->redirect(array('admin'));
                } }
        }   
		
		$prop = Prop::model()->find(array('order'=>'id'));
		
		$model->name = $prop->name.' '.$prop->surname;
		$model->display_name = $prop->surname;
		$model->address1 = $prop->address;
		$model->town = $prop->town;
  		$model->province = $prop->state;
		$model->country = $prop->country;
		$model->zip = $prop->zip;
		$model->tele = $prop->tel1;
		$model->mobile = $prop->tel2;
		$model->fax = $prop->fax;
		$model->email = $prop->email;
		$model->email2 = $prop->email;
		$model->user_url = $prop->user_url;
		$model->bank_details = $prop->bank_details;
		$model->note = $prop->note;
		$model->company = $prop->company;
		$model->category = 101;
		
		
		             
        $this->render('cmswidgets.views.villaowner.villaowner_form_widget',array('model'=>$model));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='villaowner-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
