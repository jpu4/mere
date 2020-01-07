<?php
/**
 * Site configuration file 
 * Usage: $config::$var;
 * Usage: $config->Method();
 */

class config {

    public static bool $Debug = true;
    public static ?string $Env = 'dev';
    // SITE
    public static ?string $Site_Name = 'A Mere site';
    public static ?string $Site_Author = 'James Ussery';
    public static ?string $Site_Descr = 'A Mere site';
    public static ?string $Site_Baseurl = 'http://mere.jfa.lan';
    public static ?string $DateTime_Format = 'Y-m-d H:i:s';         //date('Y-m-d H:i:s')
    public static ?string $DateTime_Io = 'Ymd-His';                 //date('Ymd-His')
    public static ?string $Site_Key = '0qY4reOLFH4nPGahkDbWuUdXL6O2/8k8sulz91SE8MU=';
    // TRACKING CODES
    public static ?string $Track_GAnalytics = '';
    public static ?string $Track_FBPixel = '';
    // OWNER
    public static ?string $Owner_Address1 = '123 Fiscal St';
    public static ?string $Owner_Address2 = 'BLDG A';
    public static ?string $Owner_CityStateZip = 'Dallas, TX 77777';
    public static ?string $Owner_Phone = '123.123.1234';
    public static ?string $Owner_Mobile = '123.123.1234';
    public static ?string $Owner_Hours = 'Monday - Friday: 9:00 AM to 5:00 PM';
    // PATH
    public static ?string $DIR_Config = '/config';
    public static ?string $DIR_Images = '/assets';
    public static ?string $DIR_Composer = '/vendor';
    // MAIL
    public static ?string $Mail_Type = 'smtp';
    public static ?string $Mail_Host = '';
    public static ?string $Mail_Port = '';
    public static ?string $Mail_Username = '';
    public static ?string $Mail_Password = '';
    public static ?string $Mail_SendTo = 'emailme@domain.com';
    public static ?string $Mail_Sendfrom = 'contactform@domain.com';
    public static ?string $Mail_Supportemail = 'support@domain.com';
    // BACKUP
    public static ?string $Backup_Host = '';
    public static ?string $Backup_Username = '';
    public static ?string $Backup_Password = '';

    public static function getOwnerInfo(){
        $owner_info = array(
            'address1' => self::$Owner_Address1,
            'address2' => self::$Owner_Address2,
            'citystatezip' => self::$Owner_CityStateZip,
            'phone' => self::$Owner_Phone,
            'mobile' => self::$Owner_Mobile,
            'hours' => self::$Owner_Hours,
            'email' => self::$Mail_SendTo
        );
        return $owner_info;
    }
    
    public static function getSiteInfo(){
        $site_info = array(
            'name' => self::$Site_Name,
            'author' => self::$Site_Author,
            'description' => self::$Site_Descr,
            'baseurl' => self::$Site_Baseurl,
            'key' => self::$Site_Key
        );
        return $site_info;
    }

    public static function getPath($which,$type='http'){
        $root='';
        if ($type=='http'){
            $root = self::$Site_Baseurl;
        } else {
            $root = $_SERVER['DOCUMENT_ROOT'];
        }
        switch ($which){
            case 'config':
                return $root . self::$DIR_Config . '/';
            break;
            case 'assets':
                return $root . self::$DIR_Images . '/';
            break;
            case 'composer':
                return $root . self::$DIR_Composer . '/';
            break;
        }
        
    }


}
?>
