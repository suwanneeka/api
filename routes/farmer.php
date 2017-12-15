<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/farmer',function (Request $request, Response $response) {
   
    $db = $this->db;
   
    $statement = $db->prepare("SELECT * FROM farmer");
    $statement->execute();
    $results = $statement->fetchAll();

     echo json_encode($results);
   // echo var_dump($results);
    // echo '/room ok';
      
    });

    $app->post('/farmer/new' ,function (Request $request, Response $response){
        $data = $request->getParsedBody();
        $idno = $data['idno'];
        $fname = $data['fname'];
        $lname = $data['lname'];
        $province = $data['province'];
        

        $db = $this->db;
        $statement = $db->prepare("INSERT INTO farmer(idno,fname,lname,province) VALUES(:idno,:fname,:lname,:province)");
        $statement->execute(array(':idno' => $idno, ':fname' => $fname, ':lname' => $lname, ':province' => $province));
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
        echo '/farmer/new post' .$idno;
    })

?>