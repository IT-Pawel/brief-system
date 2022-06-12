<?php
include '../header.php';
print_r($_SESSION);

if( ! isset($_SESSION['logged'])) {
    header('Location: '.$baseUrl);
}