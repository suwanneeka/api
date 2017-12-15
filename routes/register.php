<?php
$app->get ('/register',function(){
    $data=(object) array(
        'username'=>'111111111111',
        'password'=>'suwannee'
         );
    echo json_encode($data);
});


?>