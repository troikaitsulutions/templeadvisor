<?php

/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BepinfoController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		 ((user()->isAgent) ) ? $style='display:none;' :$style= '' ;
                 $this->menu=array(
                        
                        array('label'=>t('Add Temples'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini','style'=>$style,)),
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{   
	$this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Show all Properties'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );              
		$this->render('pinfo_create');
	}
	
		public function actionTranslate()
	{   
	$this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Show all Properties'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );              
		$this->render('pinfo_translate');
	}
	
   	public function actionTransupdate()
	{   
	$this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Show all Properties'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );              
		$this->render('pinfo_transupdate');
	}
	
	public function actionImport()
	{                
		//$this->render('pinfo_import');
		
		$OldProp = Pinfo::model()->findAll(array(
			'condition'=>'old_id != 0'
		));
		
		if($OldProp) {
			
			foreach ($OldProp as $opr ) {
			
			$i=1;
			
			$prop = Oldavail::model()->findAll(array('condition'=>'IDUNIT=:IDU','params'=>array( ':IDU' => $opr->old_id ) ));
			
			if($prop) {
				foreach ($prop as $p) {
				
				$model = new Booking; 
	  
	
     
	 			$current_time=time();
				$model->created = $current_time;
				$model->crby = Yii::app()->user->getId();
				$model->cr_ip = ip();
				$model->booking_id = 'CIAO-'.$opr->id.'-IMPORT-'. $i++ .'-'.time();
				$model->prop_id = $opr->id;
				$model->customer_id = 1;
				if( $p->NOMEOPERATORE == 0 ) { $model->bsource = 5; }
				if( $p->NOMEOPERATORE == 2 ) { $model->bsource = 6; }
				if( $p->NOMEOPERATORE == 1 ) { $model->bsource = 1; }
				
				$model->confirm = 1;
				$model->status = 1;
				$model->fdate = $p->DATE1;
				$model->tdate = $p->DATE2;
                $model->save();  
	
				
				}
			}
			
		
			}
		}
		
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
          $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Seasons'), 'url'=>array('beseason/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							 array('label'=>t('Show all Properties'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							 array('label'=>t('Photos Gallery'), 'url'=>array('begallery/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Offer'), 'url'=>array('besoffer/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Availability'), 'url'=>array('beavail/create','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Additional Cost'), 'url'=>array('beadditionalcost/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Other Services'), 'url'=>array('beotherservices/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
              
              $this->render('pinfo_update');
	}
	
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
			  ((user()->isAgent) ) ? $style='display:none;' :$style= '' ;
			   $this->menu=array_merge($this->menu,                       
                        array(
                             array('label'=>t('Show all Properties'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Seasons'), 'url'=>array('beseason/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini','style'=>$style)),
							array('label'=>t('Photos Gallery'), 'url'=>array('begallery/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini','style'=>$style)),
							array('label'=>t('Offer'), 'url'=>array('besoffer/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini','style'=>$style)),
							array('label'=>t('Availability'), 'url'=>array('beavail/create','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini','style'=>$style)),
							array('label'=>t('Additional Cost'), 'url'=>array('beadditionalcost/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Other Services'), 'url'=>array('beotherservices/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
           
		$this->render('pinfo_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('pinfo_admin');
	}
	public function actionMailform()
	{                            	
			//GxcHelpers::deleteModel('Seo', $seo->id);
			$this->renderpartial('mail_form');
	}
	
	 public function actionSendmail()
	{                            	
			//GxcHelpers::deleteModel('Seo', $seo->id);
			
	
		    
			$name=$_GET['your_name'];
			$email= $_GET['your_email'];
			$template =$_GET['template'];
			$id_value =$_GET['id_value'];
			$result_data=Pinfo::model()->find(array('select'=>'group_concat(tt_name) as tt_name','condition'=>'id in ('.$id_value.')'));  
		    $tt_name=$result_data->tt_name;  

				$enquiry_body = '<table width="100%" border="0" cellspacing="0" cellpadding="1">
				  <tr>
					<td><table width="100%" border="0" cellspacing="0" cellpadding="1"> <tr>
					<td><table width="100%" border="0">';
					$enquiry_body.='</table></td>
				  </tr>
				  <tr>
					<td><table width="100%" border="0" cellspacing="0" cellpadding="1">
					  <tr>
						<td width="21%"><strong>Name</strong></td>
						<td width="3%">:</td>
						<td width="76%">'.$name.'</td>
					  </tr>
					  <tr>
						<td><strong>Template</strong></td>
						<td>:</td>
						<td>'.$template.'</td>
					  </tr>
					  <tr>
						<td><strong>Property Name</strong></td>
						<td>:</td>
						<td>'.$tt_name.'</td>
					  </tr>

					</table></td>
				  </tr>
				</table>';
				 
			            $subject ='Property Name List';
						$headers="From: ciaoitalyvillas\r\nReply-To: ciaoitalyvillas.com";
						$headers .= 'MIME-Version: 1.0' . "\n"; 
		                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

						if(mail($email,$subject,$enquiry_body,$headers))
						{
						echo "1";
						}
						else
						{
						echo "2";
						}

			
	}
    
	public function actionDelete($id)
	{                            
			GxcHelpers::deleteModel('Pinfo', $id);
	}
	
	public function actionPdf($id)
	{
		$model=Pinfo::model()->findByPk($id);
		$header = pdfHeader($id); 
		$footer = pdfFooter();

		$mPDF = Yii::app()->ePdf->mpdf('','A4');
		$mPDF->SetHTMLHeader($header); 
		$mPDF->SetHTMLFooter($footer); 
	    $mPDF->WriteHTML($this->renderPartial('admin_pdf', array('model'=>$model), true));
	    $mPDF->Output( toSlug($model->tt_name).'.pdf', 'I' );
	}
} ?>