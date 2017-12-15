<?php
$app->get ('/login',function(){
    $data=(object) array(
        'username'=>'111111111',
        'password'=>'suwannee'
   );
    echo json_encode($data);
})
?>
