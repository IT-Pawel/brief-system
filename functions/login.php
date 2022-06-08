<?php 
require_once('../db/connection.php');

$db = new MYSQLConection('localhost','root',null,'grotnet');
$db = $db->connect();

$data = $_POST;

$query ="SELECT * FROM user WHERE email = '".$data['email']."'";

$result = $db->query($query);


?> 






<?php $db->close(); ?>