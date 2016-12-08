<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PoojalistCreateWidget extends CWidget
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
        $model = new Poojalist;
		$mseo = new Seo;
		
		$this->performAjaxValidation(array($model, $mseo));
        
		
        // collect user input data
        if(isset($_POST['Poojalist'], $_POST['Seo']))
        {
                $model->attributes=$_POST['Poojalist'];   
				$mseo->attributes=$_POST['Seo']; 
				$current_time = time();
				$mseo->created = $model->created = $current_time;  
				$mseo->cr_ip = $model->cr_ip = ip();
				$mseo->crby = $model->crby = Yii::app()->user->getId();  
				
				$PujaType = Pujatype::model()->findByPk($model->puja_type);
				
				if($model->puja_type != 1415)
				{
					$MarginProfit = $model->pooja_cost * ($PujaType->profit_margin/100.00);
					$ServiceTax = ( $model->pooja_cost + $PujaType->packing_cost + $PujaType->transportation_cost + $MarginProfit ) * ($PujaType->service_tax/100.00);
					$PgCost = ( $model->pooja_cost + $PujaType->packing_cost + $PujaType->transportation_cost + $MarginProfit + $ServiceTax ) * ($PujaType->pg_charge/100.00);
					$TotalCost = $model->pooja_cost + $PujaType->packing_cost + $PujaType->transportation_cost +  $MarginProfit + $ServiceTax + $PgCost;
					$model->total = $TotalCost;
				} 
				
				$mseo->uid = $model->uid = uniqid();
				$mseo->layout = 'poojalist';
				
				 if(isset($model->icon_file)) {  
				$IconFile = CUploadedFile::getInstance($model,'icon_file');
				
				
				if( isset($IconFile) ) {
					
					$temp_name = toSlug($model->name).'_'.time().'.'.$IconFile->getExtensionName();
					$IconFile->saveAs(RESOURCES_FOLDER.'/'.$temp_name);
					
					$img1 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img2 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img3 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img4 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img5 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					$img6 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name);
					
					$img1->resize(270,160);
					$img1->save(RESOURCES_FOLDER.'/270x160_'.$temp_name);
					
					$img2->resize(127,75);
					$img2->save(RESOURCES_FOLDER.'/127x75_'.$temp_name);
					
					$img3->resize(210,124);
					$img3->save(RESOURCES_FOLDER.'/210x124_'.$temp_name);
					
					$img4->resize(150,89);
					$img4->save(RESOURCES_FOLDER.'/150x89_'.$temp_name);
					
					$img5->resize(240,143);
					$img5->save(RESOURCES_FOLDER.'/240x143_'.$temp_name);
					
					$img6->resize(870,468);
					$img6->save(RESOURCES_FOLDER.'/870x468_'.$temp_name);
					
					
					if (Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/270x160_'.$temp_name, AWS_S3_BUCKET, 'poojas/list/270x160/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) )) 						
						{  
							Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/127x75_'.$temp_name, AWS_S3_BUCKET, 'poojas/list/127x75/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					 
					 		Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/210x124_'.$temp_name, AWS_S3_BUCKET, 'poojas/list/210x124/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					 
					 		Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/150x89_'.$temp_name, AWS_S3_BUCKET, 'poojas/list/150x89/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
				
					 Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/240x143_'.$temp_name, AWS_S3_BUCKET, 'poojas/list/240x143/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					
					 Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/870x468_'.$temp_name, AWS_S3_BUCKET, 'poojas/list/870x468/'.$temp_name, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					
					
					$model->icon_file =   $temp_name;
    				unlink(RESOURCES_FOLDER.'/'.$temp_name);
					
				} }
				}  
				
				$valid=$model->validate();
      			$valid=$mseo->validate() && $valid;
				
				 if($valid)
        			{                    
                if($model->save() && $mseo->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('The Pooja has been Added Successfully!'));                                
                    $model=new Poojalist;
                    Yii::app()->controller->redirect(array('create'));
                } }
        }    
		      
        $this->render('cmswidgets.views.poojalist.poojalist_form_widget',array('model'=>$model,'mseo'=>$mseo));
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='poojalist-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}   
}
