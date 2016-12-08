<?php $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; ?>
<?php     
       if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
?>
<?php if(Yii::app()->controller->action->id!='pdf'){?>

<div class="row-fluid"  >
  <div class="span8">
    <div class="head">
      <div class="isw-users"></div>
      <?php if(Yii::app()->controller->action->id!='view'){?>
      <h1  >About People View</h1>
      <?php }else{?>
          <h1  >About <?php $model->name; ?></h1><?php }?>
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
    <div class="headInfo" <?php if(Yii::app()->controller->action->id!='view'){?>style="border:#00000 1px solid"<?php }?>>
      <div class="image"> <a ><?php echo $model->name; ?></a> 
      <?php if($model->avatar==''){?><a><img src="<?php echo $backend_asset.'/images/user.png'; ?>" class="img-polaroid"/></a><?php }else{ ?><a><img src="http://temples.s3.amazonaws.com/peoples/thumb/<?php echo $model->avatar; ?>" class="img-polaroid"/></a><?php } ?>
      </div>
      <div class="info">
        <address>
        <strong> <?php echo Category::GetName($model->category); ?> </strong><br>
        <?php echo $model->address1.', '.$model->address2; ?><br>
        <?php echo $model->town.', '.$model->province.' , '.$model->town; ?><br>
        <?php echo Countrylist::GetName($model->country).' - '.$model->zip; ?><br>
        <abbr title="Phone">Phone:</abbr> <?php echo $model->tele.'/'.$model->mobile; ?> FAX : <?php echo $model->fax; ?><br>
        <a href="mailto:<?php echo $model->email; ?>">Email : <?php echo $model->email; ?></a><br>
        </address>
      </div>
      <div class="info">
        <address>
        <strong><?php echo t('Bank Information'); ?></strong>
        <?php echo '<br>'.$model->bank_details; ?><br>
        <strong><?php echo t('Notes'); ?></strong>
        <?php echo '<br>'.$model->note; ?><br>
        </address>
      </div>
      <div class="clear"></div>
    </div>
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
  <div class="span4" <?php if(Yii::app()->controller->action->id!='view'){?>style="border:#00000 1px solid"<?php }?>>
    <div class="head">
      <div class="isw-grid"></div>
      <h1><?php echo $model->name; ?> Agreement Document List </h1>
      <div class="clear"></div>
    </div>
    <div class="block messages scrollBox">
      <div class="scroll">
         <?php $get_user_details = UserAgreementStatus::model()->findAll(array('select'=>'*','condition'=>'user_id='.$user_id.''));
 	foreach($get_user_details as $get_user_details_noew)
	{?>
        <div class="item" style="width:400px">
        <div    style="position:absolute; margin-left:250px;">
           <?php if($get_user_details_noew->received_status==0){?> <input name="status_change" type="button" id="status_change<?php echo  $get_user_details_noew->id?>" value="Received" class="btn btn-large"  onclick="setTop(<?php echo $get_user_details_noew->doc?>,<?php echo $user_id?>,<?php echo $get_user_details_noew->id;?>)"  style="width:60px; float:left; font-size:10px; padding-left:8px; margin-bottom:-5px  " /><?php }?></div>
          <div class="info" style="padding: 0px 0px 0px 0px;">
         
            
             
            <p>
           <?php $get_doc_name = Docagrrement::model()->find(array('select'=>'doc_name','condition'=>'id='.$get_user_details_noew->doc.''));
 	echo "Doc Name :".$doc_name=$get_doc_name->doc_name;?>
              
            </p>
            <span><?php echo date('d-M-Y H:m:s',$get_user_details_noew->created); 
			?></span> </div> <div class="clear" id="dat_after"  style="color:#000000; font-size:10px"></div>
        </div><?php }?>
      
         
      
      </div>
    </div>
  </div>
  <?php } }?>
  
  
  <div class="span4" style="border:#00000 1px solid;background: none repeat scroll 0% 0% rgba(0, 0, 255, 0.3);" >
    <div class="head">
      <div class="isw-grid"></div>
      <h1><?php echo $model->name; ?> <?php echo t("Login History"); ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block messages scrollBox">
      <div class="scroll" style="height: 320px;">
        <?php
	    $history = LoginHistory::model()->with('User','User.People')->findAll(array('condition'=>"People.id='$model->id'",'order' => 't.id'));
	    if($history) {
		foreach($history as $h){
		?>
        <div class="item">
            <div class="info_lh"><p>
              Login Time : <?php echo ($h->login_time)?date_format(date_create($h->login_time),'m-d-Y H:i:s'):''; ?><br>
              Logout Time : <?php echo ($h->logout_time)?date_format(date_create($h->logout_time),'m-d-Y H:i:s'):''; ?><br>
              OS : <?php echo $h->os; ?><br>
              Browser : <?php echo $h->browser; ?><br>
              IP : <?php echo $h->ip; ?><br>
            </p></div>
          <div class="clear"></div>
        </div>
        <?php }} ?>
      </div>
    </div>
  </div>
  <?php 
  if(Yii::app()->controller->action->id=='viewowner')
  {
  $user_login_pass = User::model()->findAll(array(
  	'condition'=>"people_id='$model->id'",
  	'order' => 'people_id',
  ));
  
 
  ?>
  <div class="span4"  >
    <div class="head">
      <div class="isw-grid"></div>
      <h1> Id and Password <?php echo t("Details"); ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block messages scrollBox" >
      <div class="scroll" style="height: 320px;">
        <?php
		foreach($user_login_pass as $user_pass){
			
		?>
        <div class="item"  >
         <strong>User Name :</strong> <?php echo $user_pass->username; ?><br/>
         <strong>Password :</strong> <?php echo $user_pass->password; ?>
          
          
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php }?>


</div>





<?php }else if(Yii::app()->controller->action->id=='pdf')
{?>

<body  style="background-color:#FFFAD5;">
<div class="row-fluid"  >
  <div class="span8">
    <div class="head">
      <div class="isw-users"></div>
      <?php if(Yii::app()->controller->action->id!='view'){?>
      <h1  >About People View</h1>
      <?php }else{?>
          <h1  >About <?php $model->name; ?></h1><?php }?>
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
    <div class="headInfo" <?php if(Yii::app()->controller->action->id!='view'){?>style="border:#00000 1px solid"<?php }?>>
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
<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="border-bottom: #000000 1px solid;">
  <tr>
    <td colspan="4">
     <?php if(Yii::app()->controller->action->id!='view'){?>
      <h1><?php echo $model->name; ?> owned <?php echo t("Properties"); ?></h1>
      <?php }?>
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
  <br/>
  
  <table width="100%"  style="border:#000000 1px solid">
    <tr>
      <td>
       <?php if(Yii::app()->controller->action->id!='view'){?>
        <h1><?php echo $model->name; ?> Agreement Document List</h1> <?php }?>   </td>
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
   <br/>

<table width="100%"  cellspacing="0" cellpadding="0"  style="border:#000000 1px solid">
  <tr>
    <td width="42%"> 
      <?php if(Yii::app()->controller->action->id!='view'){?>
      <h1><?php echo $model->name; ?> <?php echo t("Login History"); ?></h1><?php }?>    </td>
      
     
  </tr>
   <?php
	    $history = LoginHistory::model()->with('User','User.People')->findAll(array('condition'=>"People.id='$model->id'",'order' => 't.id'));
	    if($history) {
		foreach($history as $h){
		?>
        <tr>
        
    <td   style=" border:#000000 1px solid;">
        <div class="item">
            <div class="info_lh"><p>
              Login Time : <?php echo ($h->login_time)?date_format(date_create($h->login_time),'m-d-Y H:i:s'):''; ?><br>
              Logout Time : <?php echo ($h->logout_time)?date_format(date_create($h->logout_time),'m-d-Y H:i:s'):''; ?><br>
              OS : <?php echo $h->os; ?><br>
              Browser : <?php echo $h->browser; ?><br>
              IP : <?php echo $h->ip; ?><br>
              <br><br>
             
            </p></div>
          <div class="clear"></div>
        </div>
        </td>
    
  </tr>
        <?php }} ?>&nbsp;
</table>



</div></body><?php }?>
<script>
function setTop(doc_id,user_id,id)
{

		jQuery.get("../../bevillaowner/cahngestatus", {doc_id:doc_id,user_id:user_id} , function(data)
		{ 
		
		
			document.getElementById('status_change'+id).style.display = 'none';
		});
		
}

</script>

