<?php

include 'config.php';

/**
 *  Function for login to system
 * 
 *  JSON response
 */
function loginToSys()
{
    session_start();
    $db = new mysqli('localhost', 'root', null, 'grotnet');

    $request = $_POST;

    $query = "SELECT * FROM user WHERE email = '" . $request['email'] . "'";

    $result = $db->query($query);

    if ($result->num_rows) {
        $data = mysqli_fetch_assoc($result);
        if ($data['haslo'] == md5($_POST['haslo'])) {
            $_SESSION['userType_id'] = $data['typUsera'];
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['logged'] = true;
            echo json_encode([
                            "response" => 400,
                            "redirect" => "/functions/login.php"
                        ]);
        } else {
            echo json_encode(["response" => "Błędne hasło/brak hasła"]);
        }
    } else {
        echo json_encode(["response" => "User nie istnieje zajerestruj się"]);
    }
}
