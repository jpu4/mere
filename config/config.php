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
    public static ?string $Mail_Supportemail = 'support@mach.us';
    // OWNER
    public static ?string $Owner_Address1 = '';
    public static ?string $Owner_Address2 = '';
    public static ?string $Owner_CityStateZip = '';
    public static ?string $Owner_Phone = '';
    public static ?string $Owner_Mobile = '';
    public static ?string $Owner_Hours = '';

    // BACKUP
    public static ?string $Backup_Host = '';
    public static ?string $Backup_Username = '';
    public static ?string $Backup_Password = '';

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
