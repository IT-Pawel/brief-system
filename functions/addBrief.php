<?php
session_start();
if (isset($_POST['sendbref'])) {
    require_once('../db/connection.php');

    $db = new mysqli('localhost', 'root', null, 'grotnet');

    $tytul =  $_POST['tytul'];
    $brief =  $_POST['brief'];

    $query = "INSERT INTO brief (tytul,tresc) VALUES ('".$tytul."','".$brief."')";


    $result = $db->query($query);


}


?>
<div class="brief">
<form action="" method="post" class="brief">
    <h1>Brief</h1>
    <input type="tytul" name="tytul" class="tytul" placeholder="Tytul" id="">
    <label for="brief">Brief</label>
    <textarea id="brief" name="brief" rows="10" cols="70"> </textarea>
    <input type="submit" name="sendbref" class="send" value="Wyślij">
</form>

</div>
