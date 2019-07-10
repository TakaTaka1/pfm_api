<?php
require './vendor/autoload.php';
include './api/Route/Route.php';
header("Access-Control-Allow-Origin: *");
$route = new Route();
$route->add('/','Post', 'PostController/index');
$route->add('/post/edit','Post', 'PostController/edit');
$route->add('/test','Test', 'TestController/test');
$route->submit();
