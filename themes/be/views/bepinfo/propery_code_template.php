<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="<?php  echo Yii::app()->request->baseUrl;?>/pdf/default-styles.css" type="text/css" rel="stylesheet" />

<title>Property Code</title>
</head>

<body>
  <div id="tt_wrapper-main"> <!-- Wrapper for all elements -->
    <div id="header_pcode">
      <div id="tt_title">
        <div id="tt_logo-place-holder"><img src="<?php echo Gallery::GetPropThumbnail($model->id); ?>" width="100px" class="img-polaroid"/></div>
        <h1 class="tt_property-code">Property Code -<?php  echo $model->name;?></h1>
        
      </div>
      <h1 id="tt_header-location">Location Location</h1>
      <h1 id="tt_header-price">From nnnn Euros per week</h1>
    </div>
    <div id="tt_wrapper-content">
      <div id="tt_splash-image">807px x 500px</div>
      <h1 class="tt_intro-heading">Dolor Amet Ipsum</h1>
      <p class="tt_intro">
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque venenatis, leo sit amet facilisis dictum, pede arcu posuere ipsum, ut luctus dui sapien sed neque. Quisque velit augue, dapibus non, sollicitudin at, semper eu, orci. Phasellus elementum ligula eget urna. Vestibulum massa. Nam aliquam justo ac diam. Vivamus in felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas ligula leo, convallis id, rhoncus sed, dignissim in, magna. Donec ornare metus quis ligula. Nunc lorem nulla, pulvinar at, egestas vel, adipiscing non, tellus. Integer hendrerit porttitor libero. Cras dignissim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris vehicula turpis placerat mi. Quisque ac ligula imperdiet purus suscipit ornare.<br />
<br />
Vivamus dolor ante, laoreet sed, molestie ac, sollicitudin id, ligula. Donec porttitor hendrerit mauris. Vestibulum vel augue. Maecenas at metus. Phasellus arcu massa, iaculis vitae, eleifend et, adipiscing vitae, metus. Donec rutrum. Fusce sit amet quam nec sem egestas tristique. Donec vitae magna. Vestibulum gravida. Nullam malesuada, odio sit amet sodales blandit, felis purus condimentum metus, ac cursus mauris tellus eget eros. Nullam nibh dui, euismod in, tristique vitae, pellentesque id, justo.<br />
<br />
Nam porttitor tempor velit. Suspendisse erat pede, sagittis id, luctus vitae, consequat nec, velit. Fusce sit amet sem imperdiet nisl lobortis egestas. Morbi molestie imperdiet erat. Quisque varius neque sit amet tellus. Etiam et ipsum. Mauris sit amet ante a dolor dictum eleifend. Vivamus tellus. Nam viverra. Aenean nisl. Nunc vitae nisi eu metus ultrices fringilla. Duis neque ipsum, lobortis quis, congue in, ornare at, orci. Phasellus pede leo, scelerisque sit amet, ullamcorper eget, faucibus at, quam. Nulla non ipsum vitae neque ullamcorper tincidunt.      
      </p>
    </div>
    <div id="footer" class="tt_is-hidden">
      <p>
<strong>CIAO ITALY PTY LTD</strong> ABN # 64163065192 Level 1, 1 West Terrace Bankstown NSW 2200 Australia<br />
Ph & Fax USA - +1 415 3662939 &nbsp;  Ph & Fax Australia - +61 294755353<br />
<span class="tt_is-url">www.traveltuscany.net</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="tt_is-webmail">info@traveltuscany.net</span>
      </p>
    </div>
  </div>
  <div id="tt_wrapper-main"> <!-- Wrapper for all elements -->
    <div id="header_pcode">
      <div id="tt_title">
        <div id="tt_logo-place-holder">80px x 80px</div>
        <h1 class="tt_property-code">Property Code - xxxxnnnn</h1>
        
      </div>
      <h1 id="tt_header-location">Location Location</h1>
      <h1 id="tt_header-price">From nnnn Euros per week</h1>
    </div>
    <div id="tt_wrapper-content">
      <div id="tt_p2-left-column"> <!-- Left Column Information goes here -->
      	<h1>Information</h1>
        <h3>Location</h3>
        <ul>
          <li>Tuscany</li>
        </ul>
        <h3>Bedrooms</h3>
        <ul>
          <li>Sleeps: nn</li>
          <li>Bedrooms: nn</li>
          <li>Double Rooms: nn</li>
          <li>Twin Rooms: nn</li>
          <li>Single Rooms: nn</li>
          <li>Sofa Beds: nn</li>
          <li>Extra Beds: nn</li>
        </ul>
        <h3>Bathrooms</h3>
        <ul>
          <li>Total Bathrooms: nn</li>
          <li>Bathrooms with Tub: nn</li>
          <li>Bathrooms with Shower: nn</li>
        </ul>
        <h3>Location and Facilities</h3>
        <ul>
          <li>Town Places: xxxx</li>
          <li>Area: xxxx</li>
          <li>Country: xxxx</li>
          <li>Property Type: xxxx</li>
          <li>Surface Area: nnnn</li>
          <li>Property View: xxxx</li>
        </ul>
        <h3>Features &amp; Accessories</h3>
        <?php $ammenties_array=explode('|',$model->amenities); 
		
	$amtt_array=array('1362','1202','1242','1217','1197','1162','1114','1137','1109','1182','1157','1132','1103','1412','1024','1048','1017','1070','1042','1092','1065','1035','1007','1029','1397','1377','1402','1382');
		if(!empty($ammenties_array))
		{

		foreach($amtt_array as $amant_value){?>
        <?php if (in_array($amant_value, $ammenties_array)) {?>
      <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/<?php echo $amant_value;?>-1.png"/>
      <?php } else{?>
       <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/<?php echo $amant_value;?>-0.png"/>
       <?php }?>

        <?php } } else
		{ foreach($amtt_array as $amant_value){?>?>
        <img src="<?php  echo Yii::app()->request->baseUrl;?>/pdf/images/<?php echo $amant_value;?>-0.png"/>
		<?php }}?>
        
      </div>
      
      <div id="tt_p2-right-column"> <!-- Right Column Information goes here -->
        <div class="tt_p2-feature-image">525px x 379px (832px x 600px ratio)</div>
        <h3>Other Services Available</h3>
        <p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque venenatis, leo sit amet facilisis dictum, pede arcu posuere ipsum, ut luctus dui sapien sed neque. Quisque velit augue, dapibus non, sollicitudin at, semper eu, orci.<br />
<br />
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque venenatis, leo sit amet facilisis dictum, pede arcu posuere ipsum, ut luctus dui sapien sed neque. Quisque velit augue, dapibus non, sollicitudin at, semper eu, orci.
        </p>
        <h3>Tourist Sites and/or Other Activities in the Area</h3>
		<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque venenatis, leo sit amet facilisis dictum, pede arcu posuere ipsum, ut luctus dui sapien sed neque. Quisque velit augue, dapibus non, sollicitudin at, semper eu, orci.<br />
<br />
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque venenatis, leo sit amet facilisis dictum, pede arcu posuere ipsum, ut luctus dui sapien sed neque. Quisque velit augue, dapibus non, sollicitudin at, semper eu, orci.
        </p>
      </div>
      
    </div>
    <div id="footer" class="tt_is-hidden">
      <p>
<strong>CIAO ITALY PTY LTD</strong> ABN # 64163065192 Level 1, 1 West Terrace Bankstown NSW 2200 Australia<br />
Ph & Fax USA - +1 415 3662939 &nbsp;  Ph & Fax Australia - +61 294755353<br />
<span class="tt_is-url">www.traveltuscany.net</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="tt_is-webmail">info@traveltuscany.net</span>
      </p>
    </div>
  </div>
  <div id="tt_wrapper-main"> <!-- Wrapper for all elements -->
    <div id="header_pcode">
      <div id="tt_title">
        <div id="tt_logo-place-holder">80px x 80px</div>
        <h1 class="tt_property-code">Property Code - xxxxnnnn</h1>
        
      </div>
      <h1 id="tt_header-location">Location Location</h1>
      <h1 id="tt_header-price">From nnnn Euros per week</h1>
    </div>
    <div id="tt_wrapper-content">
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
      <div class="tt_gallery-img">IMG 256px x 192px</div>
    </div>
    <div id="footer">
      <p>
<strong>CIAO ITALY PTY LTD</strong> ABN # 64163065192 Level 1, 1 West Terrace Bankstown NSW 2200 Australia<br />
Ph & Fax USA - +1 415 3662939 &nbsp;  Ph & Fax Australia - +61 294755353<br />
<span class="tt_is-url">www.traveltuscany.net</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="tt_is-webmail">info@traveltuscany.net</span>
      </p>
    </div>
  </div>
</body>
</html>
