<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

// ไว้ทดสอบ API ทำงานได้ปกติไหม
$app->get ('/hello',function(){
    echo 'ว่าไง';
});

$app->get ('/user/login',function(){
    echo 'LOGIN';
});

$app->get ('/user/register',function(){
    echo 'REGISTER';
});

$app->get ('/user/edit',function(){
    echo 'EDIT';
});

$app->get ('/user/detail',function(){
    echo 'DETAIL';
});

$app->get ('/user/history',function(){
    echo 'HISTORY';
});

$app->get ('/user/editpass',function(){
    echo 'EDITPASS';
});

$app->get ('/user/forgetpass',function(){
    echo 'FORGETPASS';
});

$app->get ('/dog/new-dog',function(){
    echo 'NEWDOG';
});

$app->get ('/dog/edit-dog',function(){
    echo 'EDITDOG';
});

$app->get ('/dog/delete-dog',function(){
    echo 'DELETEDOG';
});

$app->get ('/dog/search-dog',function(){
    echo 'SEARCHDOG';
});

$app->get ('/dog/view-dog',function(){
    echo 'VIEWDOG';
});

$app->get('/hello/{name}', function (Request $request, Response $response) {
    
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});


$app->run();