<?php 
session_start();
require_once('../db/connection.php');

$db = new MYSQLConection('localhost','root',null,'grotnet');
$db = $db->connect();

$data = $_POST;

if($_SESSION['userType_id']==3){
    header('Location: ./addBrief.php');
}else{
    Echo "Work in progress";
}





?> 






