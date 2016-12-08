<?php

/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
 
/**
 * This is the shortcut to Yii::app()
 */
function app()
{
    return Yii::app();
}
 
/**
 * This is the shortcut to Yii::app()->clientScript
 */
function cs()
{
    // You could also call the client script instance via Yii::app()->clientScript
    // But this is faster
    return Yii::app()->getClientScript();
}
 
/**
 * This is the shortcut to Yii::app()->user.
 */
function user() 
{
    return Yii::app()->getUser();
}
 
/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function url($route,$params=array(),$ampersand='&')
{
    return Yii::app()->createUrl($route,$params,$ampersand);
}
 
/**
 * This is the shortcut to CHtml::encode
 */
function h($text)
{
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}

/**
 * Set the key, value in Session
 * @param object $key
 * @param object $value
 * @return boolean 
 */
function setSession($key,$value){
    return Yii::app()->getSession()->add($key, $value);
}

/**
 * Get the value from key in Session
 * @param object $key
 *
 * @return object
 */
function getSession($key){
    return Yii::app()->getSession()->get($key);
}
 
/**
 * This is the shortcut to CHtml::link()
 */
function l($text, $url = '#', $htmlOptions = array()) 
{
    return CHtml::link($text, $url, $htmlOptions);
}
 
/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($message, $category = 'cms', $params = array(), $source = null, $language = null) 
{
    return Yii::t($category, $message, $params, $source, $language);
}


 
/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function bu($url=null) 
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}


/**
 * Get the right image of the current layout
 * 
 */
function img($image,$layout='')
{
    return $image;
}


 
/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function param($name) 
{
    return Yii::app()->params[$name];
}

/**
 * Return the settings Component
 * @return type 
 */
function settings()
{
    return Yii::app()->settings;
}
/**
 * var_dump($varialbe) and exit
 * 
 */
function dump($a){
    var_dump($a);
    exit;
}


/**
 * Convert local timestamp to GMT
 * 
 */
function local_to_gmt($time = '')
{
if ($time == '')
$time = time();
return mktime( gmdate("H", $time), gmdate("i", $time), gmdate("s", $time), gmdate("m", $time), gmdate("d", $time), gmdate("Y", $time));
}

/**
 * Get extension of a file
 * 
 */
function getExt($filename){
    return strtolower(substr(strrchr($fileName, '.'), 1));
}


/**
 * Get the current IP of the connection
 * 
 */
function ip() {
    if (isset($_SERVER)) {
    if(isset($_SERVER['HTTP_CLIENT_IP'])){
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(isset($_SERVER['HTTP_FORWARDED_FOR'])){
    $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    }
    elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
    $ip = $_SERVER['REMOTE_ADDR'];
    }
    }
    else
    {
    if (getenv( 'HTTP_CLIENT_IP')) {
    $ip = getenv( 'HTTP_CLIENT_IP' );
    }
    elseif (getenv('HTTP_FORWARDED_FOR')) {
    $ip = getenv('HTTP_FORWARDED_FOR');
    }
    elseif (getenv('HTTP_X_FORWARDED_FOR')) {
    $ip = getenv('HTTP_X_FORWARDED_FOR');
    }
    else {
    $ip = getenv('REMOTE_ADDR');
    }
    }
    return $ip;
}

/**
 * Generate Unique File Name for the File Upload
 * 
 */
function gen_uuid($len=8) {

    $hex = md5(param('salt-file') . uniqid("", true));

    $pack = pack('H*', $hex);
    $tmp =  base64_encode($pack);

    $uid = preg_replace("/[^A-Za-z0-9]/", "", $tmp);

    $len = max(4, min(128, $len));

    while (strlen($uid) < $len)
        $uid .= gen_uuid(22);

    $res=substr($uid, 0, $len);
    return $res;
}


function get_subfolders_name($path,$file=false){
    
    $list=array();    
    $results = scandir($path);
    foreach ($results as $result) {    	
        if ($result === '.' or $result === '..' or $result === '.svn') continue;
		if(!$file) {
	        if (is_dir($path . '/' . $result)) {
	            $list[]=trim($result);
	        }
	    }
		else {			
			if (is_file($path . '/' . $result)) {
	            $list[]=trim($result);
	        }
	    }
    }
    
    return $list;
}



 function InternetCombineUrl($absolute, $relative) {
 		if(substr($absolute, strlen($absolute)-1)!='/'){        		        		
        		$absolute.='/';
        	}
        $p = parse_url($relative);
        if(isset($p["scheme"]))return $relative;
        
        extract(parse_url($absolute));
        
        //$path = dirname($path); 
    	
    	
        if($relative{0} == '/') {
            $cparts = array_filter(explode("/", $relative));
        }
        else {
            $aparts = array_filter(explode("/", $path));
            $rparts = array_filter(explode("/", $relative));
            $cparts = array_merge($aparts, $rparts);
            foreach($cparts as $i => $part) {
                if($part == '.') {
                    $cparts[$i] = null;
                }
                if($part == '..') {
                    $cparts[$i - 1] = null;
                    $cparts[$i] = null;
                }
            }
            $cparts = array_filter($cparts);
        }
        
        $path = implode("/", $cparts);
        $url = "";
        if(isset($scheme)) {
            $url = "$scheme://";
        }
      
        if(isset($host)) {
            $url .= "$host/";
        }
        $url .= $path;
        return $url;
    }
    
function rel2abs($rel, $base)
    {
        /* return if already absolute URL */
        if (parse_url($rel, PHP_URL_SCHEME) != '') return $rel;

        /* queries and anchors */
        if ($rel[0]=='#' || $rel[0]=='?') return $base.$rel;

        /* parse base URL and convert to local variables:
         $scheme, $host, $path */
        extract(parse_url($base));

        /* remove non-directory element from path */
        $path = preg_replace('#/[^/]*$#', '', $path);

        /* destroy path if relative url points to root */
        if ($rel[0] == '/') $path = '';

        /* dirty absolute URL */
        $abs = "$host$path/$rel";

        /* replace '//' or '/./' or '/foo/../' with '/' */
        $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
        for($n=1; $n>0; $abs=preg_replace($re, '/', $abs, -1, $n)) {}

        /* absolute URL is ready! */
        return $scheme.'://'.$abs;
}
  
function stripVietnamese($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ứ|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        
       foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
       }
		return $str;
}

function toSlug($string, $force_lowercase = true, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "â€”", "â€“", ",", "<", ">", "?","/");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}

function clean($var){
    return trim(strip_tags($var));
}

function fn_clean_input($data)
{
    if(defined('QUOTES_ENABLED')) {
        $data = fn_strip_slashes_deep($data);
    }
    
    return $data;
}

function fn_strip_slashes_deep($data) {
    $data = is_array($data) ?
                array_map('fn_strip_slashes_deep', $data) :
                stripslashes($data);

    return $data;
}

function hashPassword($password,$salt)
{
       return md5($password.$salt);
}

function get_youtube_id($url,$need_curl=true) {
   $url_modified=strtolower(str_replace('www.', '', $url));
   if(strpos($url_modified,'http://youtube.com')!==false) {
   		parse_str(parse_url($url,PHP_URL_QUERY));
	
	    /** end split the query string into an array**/
	    if(! isset($v)) return false; //fast fail for links with no v attrib - youtube only
	
		if($need_curl){
		    $checklink = 'http://gdata.youtube.com/feeds/api/videos/'. $v;
			
			
		    //** curl the check link ***//
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL,$checklink);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		    $result = curl_exec($ch);
		    curl_close($ch);
		
		    $return = $v;
		    if(trim($result)=="Invalid id") $return = false; //you tube response
		    return $return; //the stream is a valid youtube id.
		}
		
		return $v;
	
	   
   }
   
   	return false;
   		
}

function recursive_remove_directory($directory, $empty=FALSE)
{
	// if the path has a slash at the end we remove it here
	if(substr($directory,-1) == '/')
	{
		$directory = substr($directory,0,-1);
	}

	// if the path is not valid or is not a directory ...
	if(!file_exists($directory) || !is_dir($directory))
	{
		// ... we return false and exit the function
		return FALSE;

	// ... if the path is not readable
	}elseif(!is_readable($directory))
	{
		// ... we return false and exit the function
		return FALSE;

	// ... else if the path is readable
	}else{

		// we open the directory
		$handle = opendir($directory);

		// and scan through the items inside
		while (FALSE !== ($item = readdir($handle)))
		{
			// if the filepointer is not the current directory
			// or the parent directory
			if($item != '.' && $item != '..')
			{
				// we build the new path to delete
				$path = $directory.'/'.$item;

				// if the new path is a directory
				if(is_dir($path)) 
				{
					// we call this function with the new path
					recursive_remove_directory($path);

				// if the new path is a file
				}else{
					// we remove the file
					unlink($path);
				}
			}
		}
		// close the directory
		closedir($handle);

		// if the option to empty is not set to true
		if($empty == FALSE)
		{
			// try to delete the now empty directory
			if(!rmdir($directory))
			{
				// return false if not possible
				return FALSE;
			}
		}
		// return success
		return TRUE;
	}
}


function isConsoleApp() {
    return get_class(Yii::app())=='CConsoleApplication';
}


function create_URL( $seo_uid ) {
	$slug = '';
	if($seo_uid != 'home') {
	$seo = Seo::model()->find(array(
    		"condition"=>"uid='".$seo_uid."'",
			));  
		
	if ( $seo->layout == 'province' ) {
		
		$reg = Region::model()->findByPk((Province::GetParent($seo->uid)));
		$seo1 = Seo::GetPageNameByUid(Region::GetUID($reg->guid));
		
		$slug = $seo1->slug.'/'.$seo->slug;
	}
	
	if ( $seo->layout == 'town' ) {
		
		$reg = Region::model()->findByPk((Town::GetParent($seo->uid)));
		$seo1 = Seo::GetPageNameByUid(Region::GetUID($reg->guid));
		
		$slug = $seo1->slug.'/'.$seo->slug;
	}

	if ( $seo->layout == 'tourtype' ) {
		
		
		$menu1 = Page::GetPageNameByGuidWithLang('5193952a0a751');		
		if($menu1!=null) { $seo1 = Seo::GetPageNameByUid($menu1->uid); }
		
		$slug = $seo1->slug.'/'.$seo->slug;
	}
	
	if ( $seo->layout == 'tour' ) {
		
		
		$menu1 = Page::GetPageNameByGuidWithLang('5193952a0a751');		
		if($menu1!=null) { $seo1 = Seo::GetPageNameByUid($menu1->uid); }
		
		$parent = Tour::model()->find(array(
			'condition'=>'uid = :UID',
			'params' =>array(':UID'=> $seo->uid)
		));
		
		$EngTourType = Tourtype::model()->findByPk($parent->source);
		
		$LangTour = Tourtype::model()->find(array(
			'condition'=>'guid = :GUID AND lang = :LANG',
			'params'=>array(':GUID'=>$EngTourType->guid, ':LANG'=> CurrentLangID() ),
			));
		
		$seo2 = Seo::model()->find(array(
    		"condition"=>"uid='".$LangTour->uid."'",
			)); 
		
		$slug = $seo1->slug.'/'.$seo2->slug.'/'.$seo->slug;
	}
	
	if ( $seo->layout == 'tag' ) {	
	
	$page = Page::model()->find(array(
		'condition'=>'uid = :UID AND status = 1',
		'params'=>array(':UID'=> '523165f9735ea' ),
		));	
	
	$menu1 = Page::GetPageNameByGuidWithLang($page->guid);		
	if($menu1!=null) { $seo1 = Seo::GetPageNameByUid($menu1->uid); }
	
	
		$slug = $seo1->slug.'/'.$seo->slug;
		
		
	}
	
	if ( ($seo->layout == 'page') || ($seo->layout == 'region') ) {
		
		$slug = $seo->slug;
	}
	}
    if (Language::CurrentLangId(Yii::app()->Language) == 2) {
			return FRONT_SITE_URL.$slug; 
		} else {
			return FRONT_SITE_URL.Yii::app()->Language.'/'.$slug;
		}
	
}


function create_flag_URL( $seo_uid, $lang_short ) {
	
	
	$slug = '';
	
	
	$seo = Seo::model()->find(array(
    		"condition"=>"uid='".$seo_uid."'",
			));  
	
		
	if ( $seo->layout == 'province' ) {
		
		$reg = Region::model()->findByPk((Province::GetParent($seo->uid)));
		$seo1 = Seo::GetPageNameByUid(Region::GetLangUID( $reg->guid, Language::CurrentLangId($lang_short) ));
		
		$slug = $seo1->slug.'/'.$seo->slug;
		//$slug = $reg->guid.'=='.Language::CurrentLangId($lang_short);
	}
	
	if ( $seo->layout == 'tourtype' ) {
		
		
		$menu1 = Page::GetPageNameByGuidWithLang('51d5892a57c7f');		
		if($menu1!=null) { $seo1 = Seo::GetPageNameByUid($menu1->uid); }
		
		$slug = $seo1->slug.'/'.$seo->slug;
	}
	
	if ( $seo->layout == 'tour' ) {
		
		
		$menu1 = Page::GetPageNameByGuidWithLang('51d5892a57c7f');		
		if($menu1!=null) { $seo1 = Seo::GetPageNameByUid($menu1->uid); }
		
		$parent = Tour::model()->find(array(
			'condition'=>'uid = :UID',
			'params' =>array(':UID'=> $seo->uid)
		));
		
		$EngTourType = Tourtype::model()->findByPk($parent->source);
		
		$LangTour = Tourtype::model()->find(array(
			'condition'=>'guid = :GUID AND lang = :LANG',
			'params'=>array(':GUID'=>$EngTourType->guid, ':LANG'=> CurrentLangID() ),
			));
		
		$seo2 = Seo::model()->find(array(
    		"condition"=>"uid='".$LangTour->uid."'",
			)); 
		
		$slug = $seo1->slug.'/'.$seo2->slug.'/'.$seo->slug;
	}
	
	if ( $seo->layout == 'tag' ) {	
	
	$page = Page::model()->find(array(
		'condition'=>'uid = :UID AND status = 1',
		'params'=>array(':UID'=> '523165f9735ea' ),
		));	
		
	$pageLang = Page::model()->find(array(
		'condition'=>'guid = :GUID AND lang = :LANG',
		'params'=>array(':GUID'=> $page->guid,':LANG'=> Language::CurrentLangId($lang_short) ),
		));		
				
	if($pageLang!=null) { $seo1 = Seo::GetPageNameByUid($pageLang->uid); }
	
	
		$slug = $seo1->slug.'/'.$seo->slug;
		
		
	}
	
	if ( ($seo->layout == 'page') || ($seo->layout == 'region') ) {
		
		$page = Page::model()->find(array(
		'condition'=>'uid = :UID AND status = 1',
		'params'=>array(':UID'=> $seo->uid ),
		));	
		
		if($page) {
		if($page->guid == '51933070417bd') { $slug = ''; }
		else { $slug = $seo->slug; }
		
		} else {
			$slug = $seo->slug;
		}
	}
	
    
	if ($lang_short == 'en') {
			return FRONT_SITE_URL.$slug; 
		} else {
			return FRONT_SITE_URL.$lang_short.'/'.$slug;
		}
	
}


function GetTownURL( $id, $lang_redirect ) {
	
	$town = Town::model()->findByPk( $id );
	
	$tslug='';
	
	if($town) {
	$TownLang = Town::model()->find(array( 
		'condition'=>"guid = '".$town->guid."' AND lang = ".$lang_redirect,
	));
	}
	
	if( isset($TownLang) && ($TownLang) ) {
	
	$SeoURL = Seo::model()->find(array(
		'condition'=>"uid = '".$TownLang->uid."'",
	)); 
	 
	  if( (isset($SeoURL)) && ($SeoURL) ) { return $SeoURL->slug; } else { return $tslug; }
 	
	} else {
	
	return '#'; }
	
}

function GetProvinceURL( $id, $lang_redirect ) {
	
	$province = Province::model()->findByPk( $id );
	
	$ProvinceLang = Province::model()->find(array( 
		'condition'=>"guid = '".$province->guid."' AND lang = ".$lang_redirect,
	));
	
	$SeoURL = Seo::model()->find(array(
		'condition'=>"uid = '".$ProvinceLang->uid."'",
	));
	
	return $SeoURL->slug;
	
}

function GetRegionURL( $id, $lang_redirect  ) {
	
	$region = Region::model()->findByPk( $id );
	
	$RegionLang = Region::model()->find(array( 
		'condition'=>"guid = '".$region->guid."' AND lang = ".$lang_redirect,
	));
	
	$SeoURL = Seo::model()->find(array(
		'condition'=>"uid = '".$RegionLang->uid."'",
	));
	
	return $SeoURL->slug;
	
}


function GetPropertyURL( $id  ) {
	
	$slug = '';
	
	$prop = Pinfo::model()->findByPk( $id );
	 
	if(  isset($prop) && (count($prop)>0) ) {
		
				$lang_redirect = CurrentLangID();
			  			  
			    $flang = Translate::model()->findAll(array(
					'condition'=>'prop_id = :PID AND lang = :LID',
					'params'=>array(':PID'=>$act_list[3], ':LID'=>$lang_redirect )
				));
				
			   if ( isset($flang) && count($flang) == 0 ) { $lang_redirect = 2; }
	 
		
	
    $slug = GetRegionURL($prop->region, $lang_redirect).'/'.GetProvinceURL($prop->province, $lang_redirect).'/'.GetTownURL($prop->town, $lang_redirect).'/'.$id;
	
	
     if ( $lang_redirect == 2 ) {
			return FRONT_SITE_URL.$slug; 
		} else {
			return FRONT_SITE_URL.Yii::app()->Language.'/'.$slug;
		}
		
	} else {
	  return '#';
	}
}


/*

function create_URL( $seo_uid ) {
	$slug = '';
	if($seo_uid != 'home') {
	$seo = Seo::model()->find(array(
    		"condition"=>"uid='".$seo_uid."'",
			));  
		
	if ( $seo->layout == 'province' ) {
		
		$reg = Region::model()->findByPk((Province::GetParent($seo->uid)));
		$seo1 = Seo::GetPageNameByUid(Region::GetUID($reg->guid));
		
		$slug = $seo1->slug.'/'.$seo->slug;
	}
	
	if ( $seo->layout == 'tag' ) {		
		$slug = 'tags/'.$seo->slug;
	}
	
	if ( ($seo->layout == 'page') || ($seo->layout == 'region') ) {
		
		$slug = $seo->slug;
	}
	}
    if (Language::CurrentLangId(Yii::app()->Language) == 2) {
			return FRONT_SITE_URL.$slug; 
		} else {
			return FRONT_SITE_URL.Yii::app()->Language.'/'.$slug;
		}
	
}

function GetTownURL( $id ) {
	
	$town = Town::model()->findByPk( $id );
	
	$TownLang = Town::model()->find(array( 
		'condition'=>"guid = '".$town->guid."' AND lang = ".CurrentLangId(),
	));
	
	$SeoURL = Seo::model()->find(array(
		'condition'=>"uid = '".$TownLang->uid."'",
	));
	
	return $SeoURL->slug;
	
}

function GetProvinceURL( $id ) {
	
	$province = Province::model()->findByPk( $id );
	
	$ProvinceLang = Province::model()->find(array( 
		'condition'=>"guid = '".$province->guid."' AND lang = ".CurrentLangId(),
	));
	
	$SeoURL = Seo::model()->find(array(
		'condition'=>"uid = '".$ProvinceLang->uid."'",
	));
	
	return $SeoURL->slug;
	
}

function GetRegionURL( $id ) {
	
	$region = Region::model()->findByPk( $id );
	
	$RegionLang = Region::model()->find(array( 
		'condition'=>"guid = '".$region->guid."' AND lang = ".CurrentLangId(),
	));
	
	$SeoURL = Seo::model()->find(array(
		'condition'=>"uid = '".$RegionLang->uid."'",
	));
	
	return $SeoURL->slug;
	
}


function GetPropertyURL( $id ) {
	
	$slug = '';
	
	$prop = Pinfo::model()->findByPk( $id );
		
	$slug = GetRegionURL($prop->region).'/'.GetProvinceURL($prop->province).'/'.GetTownURL($prop->town).'/'.$id;
	
    if (Language::CurrentLangId(Yii::app()->Language) == 2) {
			return FRONT_SITE_URL.$slug; 
		} else {
			return FRONT_SITE_URL.Yii::app()->Language.'/'.$slug;
		}
	
}
*/
function CurrentLangID()
{
	return Language::CurrentLangId(Yii::app()->Language);
}


function replaceTags($startPoint, $endPoint, $newText, $source) {
    return preg_replace('#('.preg_quote($startPoint).')(.*)('.preg_quote($endPoint).')#si', '${1}'.$newText.'${3}', $source);
}


function prop_min_price( $id ) {
	

	 $sql = 'SELECT
    	tt_rate.price_week 
    	, tt_rate.people 
		, tt_pinfo.uid
	FROM
    `ciaosite_db`.tt_pinfo
    INNER JOIN `ciaosite_db`.tt_season 
        ON (tt_pinfo.id = tt_season.prop_id)
    INNER JOIN `ciaosite_db`.tt_sdate 
        ON (tt_season.id = tt_sdate.season_id)
    INNER JOIN `ciaosite_db`.tt_rate 
        ON (tt_season.id = tt_rate.season_id) where to_date >= '.time().' AND  tt_pinfo.id = "'.$id.'" ORDER BY tt_rate.price_week DESC';
			$minr	=	0;
			$mins	=	0;
			$list= Yii::app()->db->createCommand($sql)->queryAll();
					if($list) {
					foreach($list as $item){
						$minr=$item['price_week'];
					} }
			$page = Pinfo::model()->findByPk($id);		
			$comm = Payment::model()->find(array(
				  	'condition'=>'uid = :UID',
					'params'=>array(':UID'=>$page->uid),
				  ));
				  
			 if( ($comm) && ($comm->commission>0) ) { $minr =  $minr + ($minr*($comm->commission/100)); }   
				  	
			return round($minr);

}

function xml_clear( $w )
{
	
	$text = str_replace('&','and',$w);
	
	$text = strip_tags($text);

	$text = str_replace(
	 array("\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\xa6"),
	 array("'", "'", '"', '"', '-', '--', '...'),
	 $text);
	// Next, replace their Windows-1252 equivalents.
	 $text = str_replace(
	 array(chr(145), chr(146), chr(147), chr(148), chr(150), chr(151), chr(133)),
	 array("'", "'", '"', '"', '-', '--', '...'),
	 $text);
	 
	 $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
	 
	 $text = str_replace( array('à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'), array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'), $text); 
	 
	 $text = preg_replace("/\n\r|\r\n/", " ", $text);  
	 $text =  str_replace(array("\r\n", "\r", "\n"), " ", $text);
 
	//$data = trim(htmlentities($data));
	
	$text = @trim($text);
	if(get_magic_quotes_gpc()) {
		$text = stripslashes($text);
	}
	
	return $text;
}

?>