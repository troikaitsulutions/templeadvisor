<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
?>

<body class="home blog two-column right-sidebar" data-twttr-rendered="true">
<div id="page">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset,'seo' => $seo)); ?>
 
  
  
  <div id="main" class="site-main container_16">
    <div class="inner">
    	
      	<div class="theme-page">
        	<div class="theme-slogan">
            	<div class="theme-slogan-left">
                	<ul>
                    	<li><span><a href="#">Home</a></span></li>
                        <li><span><a href="#">Temples</a></span></li>
                        <li><span><a href="#">Theme</a></span></li>
                        <div class="clr"></div>
                    </ul>
                    <div class="clr"></div>
                </div>
                <div class="theme-slogan-right">
                	<span>
                    	<a href="#"><img src="assets/5b7d812e/images/temp/region.jpg" alt="" title="" /></a>
                        <a href="#"><img src="assets/5b7d812e/images/temp/map.jpg" alt="" title="" /></a>
                    </span>
                	<div class="menu">
                        <nav class="nav">
                        	<div class="nav-list">
                            	<h3>Refine Your Results</h3>
                                <ul>
                                    <li><a href="#"><span><input name="" type="checkbox" value="" /></span> &gt; 1000 Years</a></li>
                                    <li><a href="#"><span><input name="" type="checkbox" value="" /></span> &lt; 1000 Years</a></li>
                                    <li><a href="#"><span><input name="" type="checkbox" value="" /></span> Asi Sites</a></li>
                                </ul>
                                <select>
                                    <option>Region</option>
                                    <option>Region</option>
                                    <option>Region</option>
                                    <option>Region</option>
                                    <option>Region</option>
                                </select>
                                <select>
                                    <option>State</option>
                                    <option>State</option>
                                    <option>State</option>
                                    <option>State</option>
                                    <option>State</option>
                                </select>
                                <select>
                                    <option>District</option>
                                    <option>District</option>
                                    <option>District</option>
                                    <option>District</option>
                                    <option>District</option>
                                </select>
                            </div>
                        </nav>
                        <div class="clr"></div>
                    </div>
                    <script>
		(function () {
		
		    // Create mobile element
		    var mobile = document.createElement('div');
		    mobile.className = 'nav-mobile';
			
		    document.querySelector('.nav').appendChild(mobile);
		
		    // hasClass
		    function hasClass(elem, className) {
		        return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
		    }
		
		    // toggleClass
		    function toggleClass(elem, className) {
		        var newClass = ' ' + elem.className.replace(/[\t\r\n]/g, ' ') + ' ';
		        if (hasClass(elem, className)) {
		            while (newClass.indexOf(' ' + className + ' ') >= 0) {
		                newClass = newClass.replace(' ' + className + ' ', ' ');
		            }
		            elem.className = newClass.replace(/^\s+|\s+$/g, '');
		        } else {
		            elem.className += ' ' + className;
		        }
		    }
		
		    // Mobile nav function
		    var mobileNav = document.querySelector('.nav-mobile');
		    var toggle = document.querySelector('.nav-list');
		    mobileNav.onclick = function () {
		        toggleClass(this, 'nav-mobile-open');
		        toggleClass(toggle, 'nav-active');
		    };
		})();
		</script>
                	
                </div>
                <div class="clr"></div>
            </div>
            <div class="theme-part">
            	<div class="theme-part-left">
                	<h3>Refine Your Results</h3>
                    <ul>
                    	<li><a href="#"><span><input name="" type="checkbox" value="" /></span> &gt; 1000 Years</a></li>
                        <li><a href="#"><span><input name="" type="checkbox" value="" /></span> &lt; 1000 Years</a></li>
                        <li><a href="#"><span><input name="" type="checkbox" value="" /></span> Asi Sites</a></li>
                    </ul>
                    <select>
                    	<option>Region</option>
                        <option>Region</option>
                        <option>Region</option>
                        <option>Region</option>
                        <option>Region</option>
                    </select>
                    <select>
                    	<option>State</option>
                        <option>State</option>
                        <option>State</option>
                        <option>State</option>
                        <option>State</option>
                    </select>
                    <select>
                    	<option>District</option>
                        <option>District</option>
                        <option>District</option>
                        <option>District</option>
                        <option>District</option>
                    </select>
                </div>
                <div class="theme-part-right">
                    <div class="theme-god">
                    	<div id="horizontalTab">
                            <ul class="resp-tabs-list">
                                <li>Deity</li>
                                <li>History / Heritage</li>
                                <li>Events / Rituals / Beliefs</li>
                                <li>Family / Ancestral</li>
                            </ul>
                            <div class="resp-tabs-container">
                                <div>
                                    <div class="theme-god-row">
                    		<ul>
                        	<li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                        </ul>
                        	<div class="clr"></div>
                        </div>
                        			<div class="hic-temp">
                        	<h4>Historical Temples</h4>
                            <ul>
                            	<li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                
                            </ul>
                            <div class="clr"></div>
                        </div>
                                </div>
                                <div>
                                    <div class="theme-god-row">
                    		<ul>
                        	<li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                        </ul>
                        	<div class="clr"></div>
                        </div>
                        			<div class="hic-temp">
                        	<h4>Historical Temples</h4>
                            <ul>
                            	<li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                
                            </ul>
                            <div class="clr"></div>
                        </div>
                                </div>
                                <div>
                                    <div class="theme-god-row">
                    		<ul>
                        	<li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                        </ul>
                        	<div class="clr"></div>
                        </div>
                        			<div class="hic-temp">
                        	<h4>Historical Temples</h4>
                            <ul>
                            	<li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                
                            </ul>
                            <div class="clr"></div>
                        </div>
                                </div>
                                <div>
                                    <div class="theme-god-row">
                    		<ul>
                        	<li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                            <li>
                            	<a href="#">
                                	<span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                    <strong>Dwarkadish Temple</strong>
                                </a>
                            </li>
                        </ul>
                        	<div class="clr"></div>
                        </div>
                        			<div class="hic-temp">
                        	<h4>Historical Temples</h4>
                            <ul>
                            	<li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                <li>
                                    <a href="#">
                                        <span><img src="assets/5b7d812e/images/temp/theme-god01.jpg" alt="" title="" /></span>
                                        <strong>Dwarkadish Temple</strong>
                                    </a>
                            	</li>
                                
                            </ul>
                            <div class="clr"></div>
                        </div>
                                </div>
                            </div>
                        </div>
                    	 
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
        
        
        
    </div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
