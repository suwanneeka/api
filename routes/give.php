<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/give',function (Request $request, Response $response) {
   
    $db = $this->db;
   
    $statement = $db->prepare("SELECT * FROM give");
    $statement->execute();
    $results = $statement->fetchAll();

     echo json_encode($results);
   // echo var_dump($results);
    // echo '/room ok';
      
    });

    $app->post('/give/new' ,function (Request $request, Response $response){
        $data = $request->getParsedBody();
        $fname = $data['fname'];
        $lname = $data['lname'];
        $province = $data['province'];
        

        $db = $this->db;
        $statement = $db->prepare("INSERT INTO give(fname,lname,province) VALUES(:fname,:lname,:province)");
        $statement->execute(array(':fname' => $fname, ':lname' => $lname, ':province' => $province));
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
        //echo '/give/new post' .$idno;
    })

?>