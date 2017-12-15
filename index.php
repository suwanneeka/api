<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'vendor/autoload.php';
require 'setting.php';
$app = new \Slim\App(["settings" => $config]);

// สร้าง container 
$container = $app->getContainer();
require 'pdo.php';

require 'routes/hello.php';
require 'routes/user.php';
require 'routes/register.php';
require 'routes/room.php';
require 'routes/animal.php';
require 'routes/farmer.php';
require 'routes/give.php';

// ไว้ทดสอบ API ทำงานได้ปกติไหม





$app->get('/hello/{name}', function (Request $request, Response $response) {
    
    $message = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
//test api
$app->run();
?>