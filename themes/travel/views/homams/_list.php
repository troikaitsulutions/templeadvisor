              
			  <div class="col-sms-6 col-sm-6 col-md-4">
                <article class="homam box">
                  <figure> <a href="#"> 
				  <img src="<?php echo Homamlist::GetThumbnail($data->icon_file); ?>" alt="<?php echo $data->name; ?>"> </a> </figure>
                  <div class="details"> 
                    <h4 class="box-title"><?php echo $data->name; ?></h4>
                    <h5 class="price">Rs.<?php echo $data->total; ?></h5>
                    <hr>
                    <p class="homam description"><?php echo substr ($data->comment,0,45); ?>...</p>
                    <hr>
                    <a href="#" class="button btn-small full-width"><?php echo t('GET DETAILS'); ?></a> </div>
                </article>
              </div>
              
			 
