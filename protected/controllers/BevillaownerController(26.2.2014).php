<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BevillaownerController extends BeController
{
    public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        array('label'=>t('Add People'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini'),'visible'=>((user()->isAgent)||(user()->isVillaOwner) )?false :true),
                );
	}
	
	public function actionBevillaownerpdf()
	{   
		ini_set('memory_limit', '-1');
		ini_set('MAX_EXECUTION_TIME', -1);
		$mPDF = Yii::app()->ePdf->mpdf1('','A4',0,'',0,0,0,0,0,0,'P');
		$mPDF->WriteHTML($this->renderPartial('bevillaownerpdf',array('model'=>new People),true));
		$mPDF->Output('People Report.pdf', 'I');
	}
        
		public function actionPdf()
	{   
		ini_set('memory_limit', '-1');
		ini_set('MAX_EXECUTION_TIME', -1);
		$mPDF = Yii::app()->ePdf->mpdf1('','A4',0,'',0,0,0,0,0,0,'P');
		$mPDF->WriteHTML($this->renderPartial('bevillaownerviewpdf',array('model'=>new People),true));
		$mPDF->Output('People Report.pdf', 'I');
	}
	
	public function actionBevillaownerexcel()
	{   
		$model = new People('search');
		$model->unsetAttributes();
		$production = 'export';
		$this->render('villaowner_excel', array('model' => $model, 'production' => $production));
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('List All Peoples'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
                            
                        )
                    );
		$this->render('villaowner_create');
	}
	
	public function actionCahngestatus()
	{                
	 $doc_id=$_GET['doc_id'];
	  $user_id=$_GET['user_id'];
	  
	echo  $update_auction_status="update tt_user_agreement_status set  received_status='1' where user_id='$user_id' and doc='$doc_id'";
 	   $commandacd = Yii::app()->db->createCommand($update_auction_status);
	   $commandacd->execute();
	  
	}
	/*
	public function actionImport()
	{                
		
		$prp = Customer::model()->findAll();
		
		if($prp) {
			foreach ($prp as $prop) {
			
		$model = new Villaowner2;
			
		$model->name = $prop->NAME.' '.$prop->SURNAME;
		$model->display_name = $prop->SURNAME;
		$model->address1 = $prop->ADDRESS;
		$model->address2 = $prop->ADDRESS;
		$model->town = $prop->TOWN;
  		$model->province = $prop->STATE;
		$model->country = $prop->COUNTRY;
		$model->zip = $prop->ZIP;
		$model->tele = $prop->TEL1;
		$model->tele2 = $prop->TEL2;
		$model->mobile = $prop->TEL_MOBILE;
		$model->fax = $prop->FAX;
		$model->email = $prop->EMAIL;
		$model->email2 = $prop->EMAIL;
		$model->note = $prop->NOTES;
		$model->company = $prop->COMPANY;
		$model->category = 100;
		$model->code = 'CI-'.time();
		$model->old_id = $prop->ID;
		$model->created = time();
		$model->modified = time();
		$model->lang = 2;
		$model->uid = uniqid();
		$model->cr_ip = ip();
		if($model->save()){ 
		
		echo "Saved";
		 
		} }
		}
		
		
		
		
	}
     */   
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
			  $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('List All Peoples'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
                            
                        )
                    );
              $this->render('villaowner_update');
	}
	 public function actionMyinfo()
	{            
            $this->render('villaowner_update');
	}
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
        $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		$this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('List All Peoples'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
                            
                        )
                    );
		$this->render('villaowner_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('villaowner_admin');
	}

	public function actionTaadmin()
	{   
		$this->menu = array();
		$model=new Villaowner;
        if(isset($_GET['Villaowner'])){
            
            $model=new Villaowner('tasearch');            
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Villaowner']))
                    $model->attributes=$_GET['Villaowner'];  
		}               
		$this->render('villaowner_taadmin',array('model'=>$model));
	}
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Villaowner', $id);
	}
          
        
}