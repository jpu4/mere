<?php

// Load Twig Environment
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$config = new config;
$pagename='';

$uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$user_request = $uri[0];
// send data to pages
if ($user_request=='/'){ 
    $pagename='Home';
} else {
    $pagename = ucwords(str_replace('_',' ',str_replace('-',' ',trim($user_request,'/'))));  // converts "/about-us" to "About Us"
};

function renderTemplate($file, array $params = array()){
	$loader = new \Twig\Loader\FilesystemLoader('/');
	//$twig = new Environment($loader, array('cache' => __DIR__ . '/cache'));
	$twig = new Environment($loader, array('cache' => FALSE));
    echo $twig->render($file, $params);
}

function pageExists($url){
    // Find files that match url request from user
    if ($url == '/'){ $url='/home'; }
    $url = trim($url,'/');

    foreach (array('.php','.htm','.html','.twig') as $ext){
        if (file_exists($url.$ext)){
            return $url.$ext;
        } 
    }
}

if (is_null(pageExists($user_request))){ 
    // Content page was not found, show 404
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    renderTemplate(pageExists('/404'),[
        'page' => array('name' => '404'), 
        'site' => array('name' => $config::$Site_Name)
        ]
    );
    die;

} else {
    // Load Content pages as twig templates and share data
    renderTemplate(pageExists($user_request), [
        'page' => array('name' => $pagename),
        'site'=>$config->getSiteInfo(),
        'owner'=>$config->getOwnerInfo()
        ]
    );
    
}
