<?php



$url=rtrim($_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],'/');
$url=(parse_url($url));
$rep= (explode('/', $url['path']));
$root=$rep[1];
$wwwroot= rtrim($_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].'/'.$root.'/');

echo $wwwroot;


