<?php

/**
 * Class defined all the Constant value of the CMS.
 * 
 * 
 * @author Tuan Nguyen
 * @version 1.0
 * @package common.components
 */

class ConstantDefine{
    	
	
	const AMAZON_SES_ACCESS_KEY='AKIAJGDENSYQ6TFPJABA';
	const AMAZON_SES_SECRET_KEY='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';
	
	const AMAZON_SES_EMAIL='';	
	const SUPPORT_EMAIL='';
	
	
	/**
     * Constant related to Upload File Size
     */   
	const UPLOAD_MAX_SIZE=10485760; //10mb
    const UPLOAD_MIN_SIZE=1; //1 byte
    
    public static function fileTypes(){
        return array(
            'image'=>array('jpg','gif','png','bmp','jpeg'),
            'audio'=>array('mp3','wma','wav'),
            'video'=>array('flv','wmv','avi','mp4','mov','3gp'),
            'flash'=>array('swf'),
            'file'=>array('*'),           
            );
    }
	
	public static function chooseFileTypes(){
		return array(
			'auto'=>t('Auto detect'),
			'image'=>t('Image'),
			'video'=>t('Video'),
			'audio'=>t('Audio'),
			'file'=>t('File'),
		);
	}
	
	
    
    /**
     * Constant related to User
     */
    const USER_ERROR_NOT_ACTIVE=3;    
    const USER_STATUS_DISABLED=0;
    const USER_STATUS_ACTIVE=1;
    
    
    
    public static function getUserStatus(){
        return array(
            self::USER_STATUS_DISABLED=>t("Disabled"),
            self::USER_STATUS_ACTIVE=>t("Active"));
    }
                                     
    
    
    const USER_GROUP_ADMIN='Admin';
    const USER_GROUP_EDITOR='Editor';
    const USER_GROUP_REPORTER='Reporter';
    
    
    
    /**
     * Constant related to Object
     * 
     */
    
    const OBJECT_STATUS_PUBLISHED=1;
    const OBJECT_STATUS_DRAFT=2;
    const OBJECT_STATUS_PENDING=3;
    const OBJECT_STATUS_HIDDEN=4;
    
    public static function getObjectStatus(){
        return array(
                 self::OBJECT_STATUS_PUBLISHED=>t("Published"),
                 self::OBJECT_STATUS_DRAFT=>t("Draft"),
                 self::OBJECT_STATUS_PENDING=>t("Pending"),
                 self::OBJECT_STATUS_HIDDEN=>t("Hidden")
                );
    }
        
    const OBJECT_ALLOW_COMMENT=1;
    const OBJECT_DISABLE_COMMENT=2;
    
    public static function getObjectCommentStatus(){
        return array(
                 self::OBJECT_ALLOW_COMMENT=>t("Allow"),
                 self::OBJECT_DISABLE_COMMENT=>t("Disable"),                 
                );
    }
   
    /**
     * Constant related to Transfer
     *         
     */
    const TRANS_ROLE=1;
    const TRANS_PERSON=2;
    const TRANS_STATUS=3;
    
    
     /**
     * Constant related to Menu
     *         
     */
    const MENU_TYPE_PAGE=1;
    const MENU_TYPE_TERM=2;
	const MENU_TYPE_CONTENT=5;
    const MENU_TYPE_URL=3;	
    const MENU_TYPE_STRING=4;
    
    public static function getMenuType(){
        return array(
                 self::MENU_TYPE_URL=>t("Link to URL"),                 
                 self::MENU_TYPE_PAGE=>t("Link to Page"),
                 self::MENU_TYPE_CONTENT=>t("Link to a Content Object"),
                 self::MENU_TYPE_TERM=>t("Link to a Term Page"),                                 
                 self::MENU_TYPE_STRING=>t("String"),
                );
    }
    
    
    /**
     * Constant related to Content List
     *         
     */
    const CONTENT_LIST_TYPE_MANUAL=1;
    const CONTENT_LIST_TYPE_AUTO=2;
   
    
    public static function getContentListType(){
        return array(
                 self::CONTENT_LIST_TYPE_MANUAL=>t("Manual"),                 
                 self::CONTENT_LIST_TYPE_AUTO=>t("Auto"),
                 
                );
    }
    
    const CONTENT_LIST_CRITERIA_NEWEST=1;
    const CONTENT_LIST_CRITERIA_MOST_VIEWED_ALLTIME=2;
   
    
    public static function getContentListCriteria(){
        return array(
                 self::CONTENT_LIST_CRITERIA_NEWEST=>t("Newsest"),                 
                 self::CONTENT_LIST_CRITERIA_MOST_VIEWED_ALLTIME=>t("Most viewed all time"),                 
                );
    }
	
	const CONTENT_LIST_RETURN_DATA_PROVIDER=1;
	const CONTENT_LIST_RETURN_ACTIVE_RECORD=2;
	
	public static function getContentListReturnType(){
        return array(
                 self::CONTENT_LIST_RETURN_DATA_PROVIDER=>t("Data Provider"),                 
                 self::CONTENT_LIST_RETURN_ACTIVE_RECORD=>t("Active Record"),                 
                );
    }
    
    /**
     * Constant related to Page
     *         
     */
    const PAGE_ACTIVE=1;
    const PAGE_DISABLE=2;
    
    public static function getPageStatus(){
        return array(
                 self::PAGE_ACTIVE=>t("Active"),
                 self::PAGE_DISABLE=>t("Disable"),                 
                );
    }
	
	public static function getValue(){
        return array(
                 0=>"0",1=>"1",2=>"2",3=>"3", 4=>"4", 5=>"5", 6=>"6", 7=>"7",8=>"8",9=>"9",10=>"10", 11=>"11", 12=>"12", 13=>"13", 14=>"14",15=>"15",16=>"16",17=>"17", 18=>"18", 19=>"19", 20=>"20", 21=>"21",22=>"22",23=>"23",24=>"24", 25=>"25", 26=>"26", 27=>"27", 28=>"28",29=>"29",30=>"30", 31=>"31",32=>"32",33=>"33",34=>"34", 35=>"35", 36=>"36", 37=>"37", 38=>"38",39=>"39",40=>"40",41=>"41",42=>"42",43=>"43",44=>"44", 45=>"45", 46=>"46", 47=>"47", 48=>"48",49=>"49",50=>"50",
                                  
                );
    }
    
	
	
	public static function getRankCategory(){
		
			return array(
			
					0 => "--Select--",
					1 => "Famous",
					2 => "Historical",
					3 => "Famous & Historical"
					
			);
	}
	
	
	
	
	public static function getTiming1(){
		return array(
		
		0=>"--Select--",
		1=>"00:30",
		2=>"01:00",
		3=>"01:30",
		4=>"02:00",
		5=>"02:30",
		6=>"03:00",
		7=>"03:30",
		8=>"04:00",
		9=>"04:30",
		10=>"05:00",
		11=>"05:30",
		12=>"06:00",
		13=>"06:30",
		14=>"07:00",
		15=>"07:30",
		16=>"08:00",
		17=>"08:30",
		18=>"09:00",
		19=>"09:30",
		20=>"10:00",
		21=>"10:30",
		22=>"11:00",
		23=>"11:30",
		24=>"12:00",
		25=>"12:30",
		26=>"13:00",
		27=>"13:30",
		28=>"14:00",
		29=>"14:30",
		30=>"15:00",
		31=>"15:30",
		32=>"16:00",
		33=>"16:30",
		34=>"17:00",
		35=>"17:30",
		36=>"18:00",
		37=>"18:30",
		38=>"19:00",
		39=>"19:30",
		40=>"20:00",
		41=>"20:30",
		42=>"21:00",
		43=>"21:30",
		44=>"22:00",
		45=>"22:30",
		46=>"23:00",
		47=>"23:30",
		48=>"24:00"
		
		);
	}
	public static function getTiming2(){
		return array(
		
		0=>"--Select--",
		1=>"00:30",
		2=>"01:00",
		3=>"01:30",
		4=>"02:00",
		5=>"02:30",
		6=>"03:00",
		7=>"03:30",
		8=>"04:00",
		9=>"04:30",
		10=>"05:00",
		11=>"05:30",
		12=>"06:00",
		13=>"06:30",
		14=>"07:00",
		15=>"07:30",
		16=>"08:00",
		17=>"08:30",
		18=>"09:00",
		19=>"09:30",
		20=>"10:00",
		21=>"10:30",
		22=>"11:00",
		23=>"11:30",
		24=>"12:00",
		25=>"12:30",
		26=>"13:00",
		27=>"13:30",
		28=>"14:00",
		29=>"14:30",
		30=>"15:00",
		31=>"15:30",
		32=>"16:00",
		33=>"16:30",
		34=>"17:00",
		35=>"17:30",
		36=>"18:00",
		37=>"18:30",
		38=>"19:00",
		39=>"19:30",
		40=>"20:00",
		41=>"20:30",
		42=>"21:00",
		43=>"21:30",
		44=>"22:00",
		45=>"22:30",
		46=>"23:00",
		47=>"23:30",
		48=>"24:00"
		
		);
	}
	
	public static function getNaturalOfBusiness(){
		return array(
		
		0=>"--Select--",
		1=>"Hotel",
		2=>"Restaurants",
		3=>"Travel Operator",
		4=>"Tour Operator & Guide",
		5=>"Others"
		);
		
	}
	
	public static function getEnquiryPurpose(){
		return array(
		
		0=>"--Select--",
		1=>"Travel arrangement & Booking",
		2=>"For Advertisement",
		3=>"Other Business",
		
		
		);
	}
	
	public static function getPoojaPurpose(){
		return array(
		
		0=>"--Select--",
		1=>"Education",
		2=>"Marriage",
		3=>"Health",
		4=>"Wealth",
		5=>"General",
		6=>"Children"
		);
	}
	
	public static function getMonth(){
		return array(
		
		0=>"--Select--",
		1=>"January",
		2=>"February",
		3=>"March",
		4=>"April",
		5=>"May",
		6=>"June",
		7=>"July",
		8=>"August",
		9=>"September",
		10=>"October",
		11=>"November",
		12=>"December"
		
		);
		
	}
	
	  public static function getDays(){
	 
	return array(
		
		0=>"--Select--",
		1=>"Sunday",
		2=>"Monday",
		3=>"Tuesday",
		4=>"Wednesday",
		5=>"Thursday",
		6=>"Friday",
		7=>"Saturday",
	
	 );
	}
		  
	
	public static function getTimingUnit(){
		return array(
		0=>"--",
		1=>"AM",
		2=>"PM"
		
		);
	}
		
    const PAGE_ALLOW_INDEX=1;
    const PAGE_NOT_ALLOW_INDEX=2;
    
    public static function getPageIndexStatus(){
        return array(
                 self::PAGE_ALLOW_INDEX=>t("Allow index"),
                 self::PAGE_NOT_ALLOW_INDEX=>t("Not allow Index"),                 
                );
    }
    
    const PAGE_ALLOW_FOLLOW=1;
    const PAGE_NOT_ALLOW_FOLLOW=2;
    
    public static function getPageFollowStatus(){
        return array(
                 self::PAGE_ALLOW_FOLLOW=>t("Allow follow"),
                 self::PAGE_NOT_ALLOW_FOLLOW=>t("Not allow follow"),                 
                );
    }
    
    
    const PAGE_BLOCK_ACTIVE=1;
    const PAGE_BLOCK_DISABLE=2;
    
    public static function getPageBlockStatus(){
        return array(
                 self::PAGE_BLOCK_ACTIVE=>t("Active"),
                 self::PAGE_BLOCK_DISABLE=>t("Disable"),                 
                );
    }
    
    /**
     * Constant related to Avatar Size
     */    
    
    const AVATAR_SIZE_96=96;
    const AVATAR_SIZE_23=23;
          
    public static function getAvatarSizes(){
        return array(
            self::AVATAR_SIZE_23=>t("23"),
            self::AVATAR_SIZE_96=>t("96"));
    }
	
	
	
    
}

?>
