<?php
session_start();
if (isset($_GET['logout'])) session_destroy();

if(isset($_SERVER['HTTPS'])){
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
}
else{
    $protocol = 'http';
}
$baseUrl = $protocol . "://" . $_SERVER['HTTP_HOST']."/";

?>

<head>
    <script src="../modules/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?php echo $baseUrl?>resources/style.css">
</head>
<?php if (isset($_SESSION['logged'])) { ?>
    <header class="header">
        <nav class="header__nav">
            <a href=".../panel/moje-konto.php">Moje konto</a>
            <a href=".../panel/briefy.php">Briefy</a>
            <a href="/?logout">Wyloguj</a>
        </nav>
    </header>
<?php } ?>