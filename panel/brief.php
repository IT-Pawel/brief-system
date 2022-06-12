<?php 
include $_SERVER['DOCUMENT_ROOT'].'/header.php';

if (!isset($_SESSION['logged'])) {
    header('Location: ' . $baseUrl);
}
$db = new mysqli('localhost', 'root', null, 'grotnet');
// To jest dla admnia pracownika
if ($_SESSION['userType_id'] != 3){
    $query = "SELECT user.email ,statusbrief.nazwa, brief.* FROM brief INNER JOIN user on brief.userSend = user.id INNER JOIN statusbrief on statusbrief.id = brief.status";
    $result = $db->query($query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}else{
// to jest klienta
    $query = "SELECT user.email ,statusbrief.nazwa, brief.* FROM brief INNER JOIN user on brief.userSend = user.id INNER JOIN statusbrief on statusbrief.id = brief.status WHERE userSend = ".$_SESSION['userId'];
    $result = $db->query($query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
};
echo "<pre>";
print_r($rows);
echo "</pre>";