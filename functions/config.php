<?php 

if( ! empty( $_POST)){
    call_user_func($_POST['function']);
}

if( ! empty( $_GET)){
    call_user_func($_GET['function']);
}

function test(){
    echo json_encode(["test"=>"jsonresponse"]);   
}
