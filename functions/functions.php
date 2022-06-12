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
            $_SESSION['userId'] = $data['id'];
            $_SESSION['logged'] = true;
            echo json_encode([
                "response" => 400,
                "redirect" => "/panel/moje-konto.php"
            ]);
        } else {
            echo json_encode(["response" => "Błędne hasło/brak hasła"]);
        }
    } else {
        echo json_encode(["response" => "User nie istnieje zajerestruj się"]);
    }
}


/**
 *  Function for register to system
 * 
 *  JSON response
 */
function registerToSys()
{
    session_start();
    $db = new mysqli('localhost', 'root', null, 'grotnet');

    $request = $_POST;

    $query = "SELECT * FROM user WHERE email = '" . $request['email'] . "'";

    $result = $db->query($query);

    if (!$result->num_rows) {
        $query = "INSERT INTO user (email,haslo,imie,nazwisko,typUsera) VALUES ('" . $request['email'] . "','" . md5($request['haslo']) . "','" . $request['imie'] . "','" . $request['nazwisko'] . "','3')";
        $db->query($query);
        $newUserId  = $db->insert_id;
        $_SESSION['userType_id'] = 3;
        $_SESSION['userId'] = $newUserId;
        $_SESSION['logged'] = true;
        echo json_encode([
            "response" => 400,
            "redirect" => "/panel/moje-konto.php"
        ]);
    } else {
        echo json_encode(["response" => "User istnieje. Zaloguj się na konto"]);
    }
}


function updateUserDane(){

    $db = new mysqli('localhost', 'root', null, 'grotnet');

    $request = $_POST;

    $query = "UPDATE user SET imie = '" . $request['imie'] . "', 
    nazwisko = '" . $request['nazwisko'] . "'
    WHERE id = '" . $request['id'] . "'";

    $db->query($query);

    echo json_encode([
        "response" => "Dane zaktualizowane",
    ]);
}




function updateUserHaslo(){

    $db = new mysqli('localhost', 'root', null, 'grotnet');

    $request = $_POST;

    $query = "SELECT * FROM user WHERE id = '" . $request['id'] . "'";

    $result = $db->query($query);
    $result = mysqli_fetch_assoc($result);


    if( $result['haslo'] != md5($request['hasloold'])) echo json_encode(['response'=>"Stare hasło nie pasuje. Nie zaktualizowano hasła"]);
    else if( $result['haslo'] == md5($request['haslonew'])) echo json_encode(['response'=>"Nowe hasło nie może być takie jak stare"]);
    else if( $result['haslo'] == md5($request['hasloold'])){
        $query = "UPDATE user SET haslo = '" . md5($request['haslonew']) . "' WHERE id = '" . $request['id'] . "'";
        $db->query($query);
        echo json_encode(['response'=>"Hasło zaktualizowane"]);
    };
}

function usunUsera(){

    $db = new mysqli('localhost', 'root', null, 'grotnet');

    $request = $_POST;

    $query = "DELETE FROM user WHERE id = '" . $request['id'] . "'";
    $db->query($query);
    echo json_encode(['response'=>"User usunięty"]);
}


function usunBrief(){

    $db = new mysqli('localhost', 'root', null, 'grotnet');

    $request = $_POST;

    $query = "DELETE FROM brief WHERE id = '" . $request['id'] . "'";
    $db->query($query);
    echo json_encode(['response'=>"Brief usunięty"]);
}