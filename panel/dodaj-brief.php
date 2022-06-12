<?php 

include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

if (isset($_POST['sendbref'])) {
$db = new mysqli('localhost', 'root', null, 'grotnet');

$tytul =  $_POST['tytul'];
$brief =  $_POST['brief'];
$userId = $_SESSION['userId'];
$query = "INSERT INTO brief (tytul,tresc,status,userSend) VALUES ('".$tytul."','".$brief."','1','".$_SESSION['userId']."')";

$result = $db->query($query);

echo "<h1 style='text-align:center;color:green'>Dodano brief</h1>";
}
?>

<div class="brief__wrapper login-from__wrapper">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="brief login-form">
    <h1>Brief</h1>
    <input type="tytul" name="tytul" class="tytul" >
    <label for="brief">Brief</label>
    <textarea id="brief" name="brief" rows="10" cols="70"></textarea>
    <input type="submit" name="sendbref" class="send" value="Wyślij">
</form>

</div>