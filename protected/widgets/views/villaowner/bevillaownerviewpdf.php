<?php     
       if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
?>

<body  style="background-color:#FFFAD5;">
<div class="row-fluid"  >
  <div class="span8">
    <div class="head">
      <div class="isw-users"></div>
       <?php
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'buttons'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('/bevillaowner/update','id'=>$id)),
					
						),
					));
					?>
          <h1  ><?php echo $model->name;?></h1>
      <?php
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'buttons'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('/bevillaowner/update','id'=>$id)),
					
						),
					));
					?>
      <div class="clear"></div>
    </div>
    <div class="headInfo" style="border:#00000 1px solid">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="21%" align="center" valign="top"><div class="image" style="margin-bottom:-100px"> <a ><?php echo $model->name; ?></a> 
      <?php if($model->avatar==''){?><a><img src="<?php echo $backend_asset.'/images/user.png'; ?>" class="img-polaroid"/></a><?php }else{ ?><a><img src="http://tt-prop-photos.s3.amazonaws.com/peoples/thumb/<?php echo $model->avatar; ?>" class="img-polaroid"/></a><?php } ?>
    </div></td>
    <td width="79%" colspan="3"><div class="info">
        <address>
        <strong> <?php echo Category::GetName($model->category); ?> </strong><br>
        <?php echo $model->address1.', '.$model->address2; ?><br>
        <?php echo $model->town.', '.$model->province.' , '.$model->town; ?><br>
        <?php echo Countrylist::GetName($model->country).' - '.$model->zip; ?><br>
        <abbr title="Phone">Phone:</abbr> <?php echo $model->tele.'/'.$model->mobile; ?> FAX : <?php echo $model->fax; ?><br>
        <a href="mailto:<?php echo $model->email; ?>">Email : <?php echo $model->email; ?></a>
        </address>
       <div class="info">
        <address>
        <strong><?php echo t('Bank Information'); ?></strong>
        <?php echo '<br>'.$model->bank_details; ?><br>
        <strong><?php echo t('Notes'); ?></strong>
        <?php echo '<br>'.$model->note; ?><br>
        </address>
      </div>
        </div>&nbsp;</td>
  </tr>
</table>   
    </div>
     <br/>
   <!-- <div class="block-fluid accordion">
      <h3>Invoices</h3>
      <div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
          <thead>
            <tr>
              <th width="60">Date</th>
              <th>Products</th>
              <th width="60">Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="date">Nov 6</span><span class="time">12:35</span></td>
              <td><a href="#">Product #1</a></td>
              <td><span class="price">$400.12</span></td>
            </tr>
            <tr>
              <td><span class="date">Nov 8</span><span class="time">18:42</span></td>
              <td><a href="#">Product #2</a></td>
              <td><span class="price">$800.00</span></td>
            </tr>
            <tr>
              <td><span class="date">Nov 15</span><span class="time">8:21</span></td>
              <td><a href="#">Product #3</a></td>
              <td><span class="price">$879.24</span></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" align="right"><button class="btn btn-small">More...</button></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <h3>Comments</h3>
      <div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
          <thead>
            <tr>
              <th width="60">Date</th>
              <th>Comment</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="date">Oct 6</span><span class="time">12:35</span></td>
              <td>Phasellus ut diam quis dolor mollis tristique. Suspendisse vestibulum convallis felis vitae facilisis.</td>
            </tr>
            <tr>
              <td><span class="date">Oct 8</span><span class="time">18:42</span></td>
              <td>Donec mauris sapien, pellentesque at porta id, varius eu tellus.</td>
            </tr>
            <tr>
              <td><span class="date">Oct 15</span><span class="time">8:21</span></td>
              <td>Praesent eu nisi vestibulum erat lacinia sollicitudin. Cras nec risus dolor, ut tristique neque.</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" align="right"><button class="btn btn-small">More...</button></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <h3>Friends</h3>
      <div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
          <tbody>
            <tr>
              <td width="40"><img src="img/users/alexander.jpg" class="img-polaroid" width="30"/></td>
              <td><a href="#">Aqvatarius</a><span>aqvatarius@domain.com</span></td>
            </tr>
            <tr>
              <td><img src="img/users/alexey.jpg" class="img-polaroid" width="30"/></td>
              <td><a href="#">Alexey</a><span>alexey@domain.com</span></td>
            </tr>
            <tr>
              <td><img src="img/users/helen.jpg" class="img-polaroid" width="30"/></td>
              <td><a href="#">Helen</a><span>helen@domain.com</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div> -->
  </div>

 <?php 
  $prop = Pinfo::model()->findAll(array(
  	'condition'=>'owner='.$model->id,
  	'order' => 'id',
  ));
  
  if($prop) {
  
		foreach($prop as $p){
  } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="border-bottom: #000000 1px solid;">
  <tr>
    <td colspan="4">
     
        <h1><?php echo $model->name; ?> owned <?php echo t("Properties"); ?></h1>

   

     
      </td>
  </tr>
<?php 
  $prop = Pinfo::model()->findAll(array(
  	'condition'=>'owner='.$model->id,
  	'order' => 'id',
  ));
  
  if($prop) {
  
		foreach($prop as $p){
			
		
  ?>  <tr>
    <td width="6%" align="center"><img src="<?php echo Gallery::GetPropThumbnail($p->id); ?>" width="50px" class="img-polaroid"/> </td>
    <td width="94%" colspan="3">
  <div class="span4"    >
    
    <div class="block messages scrollBox"  >
      <div class="scroll" >
       
        <div class="item"   >
          
          <div class="info"> <a class="name" href="#"><?php echo $p->name.'('.$p->tt_name.')'; ?></a>
            <p>
              
              Sleeps : <?php echo $p->sleep; ?><br>
              Bedrooms : <?php echo $p->bedroom; ?><br>
              Town : <?php echo Town::GetName($p->town); ?><br>
              Provice : <?php echo Province::GetName($p->province); ?><br>
              
            </p>
            <span><?php echo date('d-M-Y H:m:s',$p->created); ?></span> </div>
          <div  style="border:1px  #000000 solid"></div>
        </div>
       
      </div>
    </div>
  </div>
  </td>
  </tr>
  <?php } }?>
  &nbsp;
</table>
 <?php }?>
  <br/>
  
  
  <?php 
  $doc_af = User::model()->find(array('select'=>'user_id',
  	'condition'=>'people_id='.$model->id,
  	'order' => 'people_id',
  ));
  if($doc_af)
  {
  $user_id=$doc_af->user_id;
    
   $doc_af_aggrement = UserAgreementStatus::model()->findAll(array('select'=>'*',
  	'condition'=>'user_id='.$user_id,
  	'order' => 'user_id',
  ));
  
  if($doc_af_aggrement) {
  ?>
  <table width="100%"  style="border:#000000 1px solid">
    <tr>
      <td>
             

        <h1><?php echo $model->name; ?> Agreement Document List</h1>  </td>
    </tr>
    <tr>
       <?php 
  $doc_af = User::model()->find(array('select'=>'user_id',
  	'condition'=>'people_id='.$model->id,
  	'order' => 'people_id',
  ));
  if($doc_af)
  {
  $user_id=$doc_af->user_id;
    
   $doc_af_aggrement = UserAgreementStatus::model()->findAll(array('select'=>'*',
  	'condition'=>'user_id='.$user_id,
  	'order' => 'user_id',
  ));
  
  if($doc_af_aggrement) {
  ?>
  

      <td >           <?php $get_user_details = UserAgreementStatus::model()->findAll(array('select'=>'*','condition'=>'user_id='.$user_id.''));
 	foreach($get_user_details as $get_user_details_noew)
	{?> 
            <br/>
            
          
           <?php $get_doc_name = Docagrrement::model()->find(array('select'=>'doc_name','condition'=>'id='.$get_user_details_noew->doc.''));
 	echo "Doc Name :".$doc_name=$get_doc_name->doc_name;?>
           <br/>
           
			<?php echo date('d-M-Y H:m:s',$get_user_details_noew->created); ?>
        <br/>       
        <?php }?>
        <?php }?>     
     <div style="border-bottom:#000000 1px solid"></div>
<?php  }?>      </td> 
      </tr>
  </table>
  <?php }}?>
   <br/>



 <?php
	    $history = LoginHistory::model()->with('User','User.People')->findAll(array('condition'=>"People.id='$model->id'",'order' => 't.id'));
	    if($history) {
		foreach($history as $h){
		}?>
<table width="100%"  cellspacing="0" cellpadding="0"  style="border:#000000 1px solid; font-size:12px">
  <tr>
    <td width="42%" colspan="3"> 
      <?php if(Yii::app()->controller->action->id!='view'){?>
        
      <h1><?php echo $model->name; ?> <?php echo t("Login History"); ?></h1><?php }?>    </td>
      
     
  </tr>
   <tr>
   <?php
	    $history = LoginHistory::model()->with('User','User.People')->findAll(array('condition'=>"People.id='$model->id'",'order' => 't.id'));
	    if($history) {
		$odd_r_even=0;
		foreach($history as $h){
	echo	$odd_r_even++;
		?>
       
        
        
    <td   style=" border:#000000 1px solid;">
        <div class="item">
            <div class="info_lh"><br/><p>
        
              &nbsp;Login Time : <?php echo ($h->login_time)?date_format(date_create($h->login_time),'m-d-Y H:i:s'):''; ?><br>
              &nbsp;Logout Time : <?php echo ($h->logout_time)?date_format(date_create($h->logout_time),'m-d-Y H:i:s'):''; ?><br>
              &nbsp;OS : <?php echo $h->os; ?><br>
              &nbsp;Browser : <?php echo $h->browser; ?><br>
              &nbsp;IP : <?php echo $h->ip; ?><br>
                     

              <br><br>
             
            </p></div>
          <div class="clear"></div>
        </div>
           
        </td>
    
 
        <?php if($odd_r_even%3 == 0) {  ?></tr><tr><?php   }?> 
		<?php   }} ?> </tr>&nbsp;
</table>

<?php }?>

</div></body>
<script>
function setTop(doc_id,user_id,id)
{
		jQuery.get("../../bevillaowner/cahngestatus", {doc_id:doc_id,user_id:user_id} , function(data)
		{ 
			document.getElementById('status_change'+id).style.display = 'none';
		});
}
</script>

