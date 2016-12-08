 <div id="toolbar" class="clearfix">
			<div class="container_16">
				<div class="grid_16">
				<ul>
					<li class="phone"><a href="tel_3A+1 554 555 5555">Tel.: +91 44 42 11 99 06</a></li>
					<li class="rss"><a href="#"><i class="icon-rss"></i></a></li>
					<li class="contact"><a href="#"><i class="icon-envelope"></i></a></li>
					<li class="share"><a href="#"><i class="icon-share"></i></a>
						<ul class="share-items radius-bottom">
							<li class="share-item-fb radius"><a href="https://www.facebook.com/templeadviser" target="_blank"><i class="icon-facebook-sign"></i></a></li>
							<li class="share-item-tw radius"><a href="#"><i class="icon-twitter-sign"></i></a></li>
							<li class="share-item-gp radius"><a href="#"><i class="icon-google-plus-sign"></i></a></li>
						</ul>
					</li>
					<li class="search"><a href="#"><i class="icon-search"></i></a>
						<ul class="search-items radius-bottom">
							<li>
								<div class="search-form">
									<form method="get" id="searchform" action="">
										<div>
											<input class="radius" type="text" size="" name="s" id="s" value="Type your searching word" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
											<input type="submit" id="searchsubmit" value="Search" />
										</div>
									</form>
								</div>
							</li>
						</ul>
					</li>
				</ul>
				</div>
			</div>
		</div>
        
        
 <header id="branding" class="site-header" role="banner">
			<div id="sticky_navigation" >
				<div class="container_16">
					<hgroup class="fleft grid_5">
						<img src="<?php echo $layout_asset; ?>/images/temple_adviser_logo.jpg">	
					</hgroup>
<?php //if( (Yii::app()->controller->id!='site') && (Yii::app()->controller->action->id != 'index') ){ ?>
					<nav role="navigation" class="site-navigation main-navigation grid_11" id="site-navigation">
						<div class="menu-wplook-main-menu-container">
							<ul id="menu-wplook-main-menu" class="menu">
								<li class="menu-item "><a href="<?php echo FRONT_SITE_URL; ?>">Home</a></li>
								<li class="menu-item "><a href="<?php echo Yii::app()->createUrl('temples/list')?>">Temples</a></li>
								<li class="menu-item "><a href="#">Plan Your Trip</a></li>
								<li class="menu-item "><a href="<?php echo Yii::app()->createUrl('site/aboutus')?>">About us</a></li>
								
								<li class="menu-item "><a href="<?php echo Yii::app()->createUrl('site/contactus')?>">Contacts</a></li>
							</ul>
						</div>
					</nav>
 <?php //} ?>
					<!-- .site-navigation .main-navigation -->
					<div class="clear"></div>
				</div>
			</div>
		</header>