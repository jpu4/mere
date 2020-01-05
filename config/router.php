<?php

// Load Twig Environment
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$config = new config;
//$Path_Theme = $config->getThemePath();
//$Path_Pages = $config->getPath('pages','abs');
$pagename='';

$uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$user_request = $uri[0];
// send data to pages
if ($user_request=='/'){ 
    $pagename='Home';
} else {
    $pagename = ucwords(str_replace('_',' ',str_replace('-',' ',trim($user_request,'/'))));  // converts "/about-us" to "About Us"
};

$twigvars = array(
    'page' => array(
        'sitename' => $config::$Site_Name,
        'name' => $pagename
    )
);

function renderTemplate($file, array $params = array()){
	$loader = new \Twig\Loader\FilesystemLoader('/');
	//$twig = new Environment($loader, array('cache' => __DIR__ . '/cache'));
	$twig = new Environment($loader, array('cache' => FALSE));
    echo $twig->render($file, $params);
}

function pageExists($url){
    if ($url == '/'){ $url='/home'; }
    
    $url = trim($url,'/');

    foreach (array('.php','.htm','.html','.twig') as $ext){
        if (file_exists($url.$ext)){
            return $url.$ext;
        } 
    }
}

echo pageExists($user_request);
if (is_null(pageExists($user_request))){ 
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    require_once(pageExists('/404'));
    die;
} else {
    renderTemplate(pageExists($user_request), $twigvars);
    
}
