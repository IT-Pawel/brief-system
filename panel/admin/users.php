<?php
include $_SERVER['DOCUMENT_ROOT'].'/header.php';



if( $_SESSION['user_id']!=1) header( 'location:'.$baseUrl.'panel/moje-konto.php' );

$db = new mysqli('localhost', 'root', null, 'grotnet');
$query = "SELECT * FROM user";
$query = $db->query($query);


while($row = mysqli_fetch_assoc($query))
{

$rows[] = $row;

}
echo "<pre>";
print_r($rows);
echo "</pre>";