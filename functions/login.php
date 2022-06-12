<?php 
include "../header.php";


if($_SESSION['userType_id']==3){
    header('Location: '.$baseUrl.'panel/moje-konto.php');
}else{
    Echo "Work in progress";
}
?> 






