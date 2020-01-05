<?php

// Load Twig Environment
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$config = new config;
$Path_Theme = $config->getThemePath();
$Path_Pages = $config->getPath('pages','abs');
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
        'name' => $pagename
    ),
    'config' => array(
        'path_activetheme' => $config->getThemePath('http')
    )
);

function renderTemplate($file, array $params = array()){
    global $Path_Theme;
	$loader = new \Twig\Loader\FilesystemLoader($Path_Theme);
	//$twig = new Environment($loader, array('cache' => __DIR__ . '/cache'));
	$twig = new Environment($loader, array('cache' => FALSE));
    echo $twig->render($file, $params);
}

function pageExists($path='',$url){
    if ($url == '/'){ $url='/index'; }
    $thisurl = $path . $url;
    
    foreach (array('.php','.htm','.html','.twig') as $ext){
        if (file_exists($thisurl.$ext)){
            return $thisurl.$ext;
        } 
    }
}

if (is_null(pageExists($Path_Pages,$user_request))){ 
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    require_once(pageExists($Path_Pages,'/404'));
    die;
} else {
    renderTemplate('base.twig', $twigvars);
    
}
