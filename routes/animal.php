<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/animal',function (Request $request, Response $response) {
   
    $db = $this->db;
   
    $statement = $db->prepare("SELECT * FROM animal");
    $statement->execute();
    $results = $statement->fetchAll();

     echo json_encode($results);
   // echo var_dump($results);
    // echo '/room ok';
      
    });

    $app->post('/animal/new' ,function (Request $request, Response $response){
        $data = $request->getParsedBody();
        $anicode = $data['anicode'];
        $aniname = $data['aniname'];
        $anibreed = $data['anibreed'];
        $aniage = $data['aniage'];
        

        $db = $this->db;
        $statement = $db->prepare("INSERT INTO animal(anicode,aniname,anibreed,aniage) VALUES(:anicode,:aniname,:anibreed,:aniage)");
        $statement->execute(array(':anicode' => $anicode, ':aniname' => $aniname, ':anibreed' => $anibreed, ':aniage' => $aniage));
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
        echo '/animal/new post' .$anicode;
    })

?>