<?php
require './vendor/autoload.php';
include './api/Route/Route.php';

$route = new Route();

$route->add('/post','Post', 'PostController/index');
$route->add('/post/edit','Post', 'PostController/edit');
$route->add('/test','Test', 'TestController/test');

echo '<pre>';
// print_r($route);

print_r($route->submit());
