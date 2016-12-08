<?php
	//Need to add the jwplayer for embedding video
		if(YII_DEBUG)
            $player_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.player'), false, -1, true);
         else 
            $player_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.player'), false, -1, false);
		 
		 $cs=Yii::app()->clientScript;
		 $cs->registerScriptFile($player_asset.'/jwplayer.js', CClientScript::POS_HEAD);	
?> 



<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAECEd3shLdcqQttP3WqzlQhRHK0uLEdVmrcgBOJ7PmfFITeKBPBSkjgb0z2unwtxjSiWgv5X0oOou2Q" type="text/javascript"></script>


<script type='text/javascript'>
		var player_path='<?php echo $player_asset; ?>';
		var media_count=1;
</script>	

	
<script type="text/javascript">

	
  
   $("#mapshow").click(function(){

		 if($("#map").is(":visible") ){
			$("#map").hide();
			$("#mapshow").html("Show map");
		 }else{
			$("#map").show();
			$("#mapshow").html("Hide map");
		 }

    });
 
</script>  




<script type="text/javascript">
 
 function load() {

      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng( <?php echo $gps->latitude; ?>, <?php echo $gps->longitude; ?>);
        map.setCenter(center, 8);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});
        map.addOverlay(marker);
        document.getElementById("latitude").value = center.lat().toFixed(5);
        document.getElementById("longitude").value = center.lng().toFixed(5);

      GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
       map.panTo(point);
       document.getElementById("latitude").value = point.lat().toFixed(5);
       document.getElementById("longitude").value = point.lng().toFixed(5);

        });


     GEvent.addListener(map, "moveend", function() {
          map.clearOverlays();
    var center = map.getCenter();
          var marker = new GMarker(center, {draggable: true});
          map.addOverlay(marker);
          document.getElementById("latitude").value = center.lat().toFixed(5);
       document.getElementById("longitude").value = center.lng().toFixed(5);


     GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
         map.panTo(point);
      document.getElementById("latitude").value = point.lat().toFixed(5);
         document.getElementById("longitude").value = point.lng().toFixed(5);

        });

        });

      }
    }

       function showAddress(address) {
       var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
       map.addControl(new GMapTypeControl());
       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
          document.getElementById("latitude").value = point.lat().toFixed(5);
       document.getElementById("longitude").value = point.lng().toFixed(5);
         map.clearOverlays()
            map.setCenter(point, 8);
   var marker = new GMarker(point, {draggable: true});
         map.addOverlay(marker);

        GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
         map.panTo(pt);
      document.getElementById("latitude").value = pt.lat().toFixed(5);
         document.getElementById("longitude").value = pt.lng().toFixed(5);
        });


     GEvent.addListener(map, "moveend", function() {
          map.clearOverlays();
    var center = map.getCenter();
          var marker = new GMarker(center, {draggable: true});
          map.addOverlay(marker);
          document.getElementById("latitude").value = center.lat().toFixed(5);
       document.getElementById("longitude").value = center.lng().toFixed(5);

     GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
        map.panTo(pt);
    document.getElementById("latitude").value = pt.lat().toFixed(5);
       document.getElementById("longitude").value = pt.lng().toFixed(5);
        });

        });

            }
          }
        );
      }
    }

    load();
</script>
	
<script type="text/javascript">

	$(document).ready(function () {
	var config =
	    {
		height: 300,
		width : '100%',
		resize_enabled : false,
		
		toolbar :
		[
		['Source','-','Bold','Italic','Underline','Strike','-','Subscript','Superscript','-','SelectAll','RemoveFormat'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['BidiLtr', 'BidiRtl'],
		['Link','Unlink','Anchor'],
		['Image', 'Media','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe','-','Save','NewPage','Preview','-','Templates','-','Cut','Copy','Paste','PasteText','PasteFromWord'],
		'/',
		['Undo','Redo','-','Find','Replace','-','Styles','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks','-','About']
		]
	};
	
        //Set for the CKEditor
		$('#ckeditor_content').ckeditor(config);
        
        //Set for the Content Box
        $('.content-box .content-box-content div.tab-content').hide(); // Hide the content divs
        $('ul.content-box-tabs li a.default-tab').addClass('current'); // Add the class "current" to the default tab
        $('.content-box-content div.default-tab').show(); // Show the div with class "default-tab"

        $('.content-box ul.content-box-tabs li a').click( // When a tab is clicked...
                function() { 
                        $(this).parent().siblings().find("a").removeClass('current'); // Remove "current" class from all tabs
                        $(this).addClass('current'); // Add class "current" to clicked tab
                        var currentTab = $(this).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
                        $(currentTab).siblings().hide(); // Hide all content divs
                        $(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
                        return false; 
                }
        );

        //Minimize the Box
        $(".content-box-header h3").css({ "cursor":"s-resize" }); // Give the h3 in Content Box Header a different cursor
		$(".closed-box .content-box-content").hide(); // Hide the content of the header if it has the class "closed"
		$(".closed-box .content-box-tabs").hide(); // Hide the tabs in the header if it has the class "closed"
		
		$(".content-box-header h3").click( // When the h3 is clicked...
			function () {
			  $(this).parent().next().toggle(); // Toggle the Content Box
			  $(this).parent().parent().toggleClass("closed-box"); // Toggle the class "closed-box" on the content box
			  $(this).parent().find(".content-box-tabs").toggle(); // Toggle the tabs
			}
		);
        
        
        
    });
    
    CopyString('#txt_name','#txt_slug','slug');
    CopyString('#txt_name','#txt_mainmenu','');
    CopyString('#txt_name','#txt_breadcrumbs','');
	CopyString('#txt_name','#txt_h1','');
     <?php if($model->isNewRecord) : ?>
   	 CopyString('#txt_name','#txt_title','');
    <?php endif; ?>
    
    $('ul.content-box-tabs li:first a:first').addClass('default-tab');
    $('ul.content-box-tabs li:first a:first').addClass('current');
    
    $('#resource-box-content div.tab-content:first').addClass('default-tab').show();
    
    function insertFileToContent(file_type){    			    	
    	$.prettyPhoto.open('<?php echo bu();?>/beresource/createframe?parent_call=true&ckeditor='+file_type+'&iframe=true&height=400','<?php echo t('Upload Resource');?>','');    	
    }
    
    
			
    function afterUploadResourceWithEditor(resource_id,resource_path,file_type,insert_type,width,height,alt){
    	var add_width='';
    	var add_height='';
    	var add_alt='';
    	if(width!='0') add_width='width="'+width+'"';
    	if(height!='0') add_height='height="'+height+'"';
    	if(alt!='') add_alt='alt="'+alt+'"';   
    	if(file_type=='image'){
    		CKEDITOR.instances['ckeditor_content'].insertHtml('<img '+add_width+' '+add_height+' '+ add_alt+' src="'+resource_path+'"/>');	
    	}
    	if(file_type=='video'){
    		/*
    		if(width!='0') add_width="'width': '"+width+"',";
    		if(height!='0') add_height="'height': '"+height+"',";
    		
			var video_insert="<div id='mediaplayer"+media_count+"'></div>"+			
			 '<script type="text/javascript" src="\'+player_path+\'/jwplayer.js"><'+'/script>'+'<script type="text/javascript">'+
			  "jwplayer('mediaplayer"+media_count+"').setup({"+
			    "'flashplayer': '\"+player_path+\"/player.swf',"+
			    "'id': 'playerID"+media_count+"',"+
			    add_width+
			    add_height+
			    "'file': '"+resource_path+"'"+
			  '});'+'<'+'/script>';			 
			  CKEDITOR.instances['ckeditor_content'].insertHtml(video_insert);
			  media_count++;	
			  */		
    	}
    		
    	
    	$.prettyPhoto.close();
    }
  
</script>  