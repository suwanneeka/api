<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/room',function (Request $request, Response $response) {
   
    $db = $this->db;
   
    $statement = $db->prepare("SELECT * FROM Room");
    $statement->execute();
    $results = $statement->fetchAll();

     echo json_encode($results);
   // echo var_dump($results);
    // echo '/room ok';
      
    });

    $app->post('/room/new' ,function (Request $request, Response $response){
        $data = $request->getParsedBody();
        $roomName = $data['roomName'];

        $db = $this->db;
        $statement = $db->prepare("INSERT INTO room(name) VALUES(':roomName')");
        $statement->execute(array(':roomName' => $roomName));
        $affected_rows = $statement->rowCount();   
        
        if ($statement->rowCount() > 0 ){
            $results = (object) array(
                "message" => "Insert Success",
                "insert status" => 1
            );
            echo json_encode($results);
        } else {
            $results = (object) array(
                "message" => "Insert nothing",
                "insert status" => 0
            );
            echo json_encode($results);
        } 
        echo '/room/new post' .$roomName;
    })

?>