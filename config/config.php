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
    public static ?string $Site_Name = 'twig1';
    public static ?string $Site_Baseurl = 'http://mere.jfa.lan';
    public static ?string $Site_Theme = 'twentytwenty';
    public static ?string $DateTime_Format = 'Y-m-d H:i:s';         //date('Y-m-d H:i:s')
    public static ?string $DateTime_Io = 'Ymd-His';                 //date('Ymd-His')
    public static ?string $Site_Key = '0qY4reOLFH4nPGahkDbWuUdXL6O2/8k8sulz91SE8MU=';
    // PATH
    public static ?string $DIR_Config = '/config';
    public static ?string $DIR_Themes = '/themes';
    public static ?string $DIR_Images = '/images';
    public static ?string $DIR_Pages = '/pages';
    public static ?string $DIR_Composer = '/vendor';
    // MAIL
    public static ?string $Mail_Type = 'smtp';
    public static ?string $Mail_Host = '';
    public static ?string $Mail_Port = '';
    public static ?string $Mail_Username = '';
    public static ?string $Mail_Password = '';
    public static ?string $Mail_Sendfrom = '';
    public static ?string $Mail_Supportemail = 'support@mach.us';
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
            case 'themes':
                return $root . self::$DIR_Themes . '/';
            break;
            case 'images':
                return $root . self::$DIR_Images . '/';
            break;
            case 'pages':
                return $root . self::$DIR_Pages . '/';
            break;
            case 'composer':
                return $root . self::$DIR_Composer . '/';
            break;
        }
        
    }

    public static function getThemePath($type='abs'){

        return self::getPath('themes',$type).self::$Site_Theme;

    }

}
?>
