<?php
session_start();

if(isset($_SERVER['HTTPS'])){
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
}
else{
    $protocol = 'http';
}
$baseUrl = $protocol . "://" . $_SERVER['HTTP_HOST']."/";

if ( isset($_GET['logout']) ){
    session_destroy();
    header( 'location:'.$baseUrl );
} 


?>

<head>
    <script src="../modules/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?php echo $baseUrl?>resources/style.css">
</head>
<?php if (isset($_SESSION['logged'])) { ?>
    <header class="header">
        <nav class="header__nav">
            <a href="<?php echo $baseUrl;?>/panel/moje-konto.php">Moje konto</a>
            <a href="<?php echo $baseUrl;?>/panel/briefy.php">Briefy</a>
            <a href="/?logout=true">Wyloguj</a>
        </nav>
    </header>
<?php } ?>