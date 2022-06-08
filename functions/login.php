<?php 
session_start();
require_once('../db/connection.php');

$db = new MYSQLConection('localhost','root',null,'grotnet');
$db = $db->connect();

$data = $_POST;






print_r($_SESSION);
?> 






