<?php
require './vendor/autoload.php';
include './api/Route/Route.php';

header("Access-Control-Allow-Origin: *");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	header("Content-Type: application/json; charset=utf-8");
}
$route = new Route();
$route->add('/','Post', 'PostController/index');
$route->add('/post/edit','Post', 'PostController/edit');
$route->add('/test','Test', 'TestController/test_method');

// echo '<pre>';
// print_r($route);

$route->submit();
