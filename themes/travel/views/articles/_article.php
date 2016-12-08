	<?php
		//$ArticleSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$data->uid)));
		$ArticleSeo = Seo::GetPageSeo($data->uid);
		
		$Slug = '#';
		if( isset($ArticleSeo)  ) {
			$Slug = Yii::app()->createUrl('articles/articleread',array('article' => $ArticleSeo->slug));
			
			//$Slug = $ArticleSeo->slug;
			
		}
	?>
	<div class="post">
	    <div class="post-content-wrapper">
		    <div class="details">
	            <h2 class="entry-title"><a href="<?php echo $Slug; ?>">
					<?php echo $data->heading; ?></a></h2>
	                <div class="excerpt-container">
						<p><?php echo substr( trim (strip_tags($data->content1,'a')),0,300); ?>,..</p>
	                </div>
	                <div class="post-meta">
	                    <div class="entry-author fn">
	                        <i class="icon soap-icon-user"></i> Posted By:
	                        <a href="#" class="author"><?php echo $data->name; ?></a>
	                    </div>
	                    <div class="entry-action">
	                        <a href="#" class="button entry-comment btn-small"><i class="soap-icon-calendar-1"></i><span><?php echo date("M d,Y h:i A",$data->created); ?></span></a>
	                    </div>
	                </div>
	        </div>
	    </div>
	</div>