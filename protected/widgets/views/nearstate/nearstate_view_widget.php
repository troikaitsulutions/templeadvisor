 
<div class="row-fluid">
  <div class="span8">
    <div class="head">
      <div class="isw-grid"></div>
      <h1>Nearest States of <?php echo State::GetName($model->name).' - '.$model->id; ?></h1>
      <?php
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'buttons'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('/benearstate/update','id'=>$id),'visible'=>( (user()->isAgent) ) ? false : true,),
					
						),
					));
					?>
      <div class="clear"></div>
    </div>
  
     
      <div class="block">
        <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
          <tbody>
        
             <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('State Name'); ?></span></p></td>
              <td><p class="about"> <?php echo State::GetName($model->name); ?></p> </td>
             
            </tr>
            
          
             <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Nearest States'); ?></span> </p></td>
              <td><p class="about"> 
              <?php
						$Faci = State::model()->findAll(); 
						$avail = explode('|',$model->nearstate);
						if($Faci){
							foreach ($Faci as $Fa) {
								if (in_array($Fa->id, $avail)) {
    								echo $Fa->name.', ';
								
								}
								
							}
						}
                    ?>
              
               </p></td>
             
            </tr>
          
            
            
            
          
          </tbody>
        </table>
      </div>
      <div class="clear"></div>
      
    </div>
  </div>
  
</div>

