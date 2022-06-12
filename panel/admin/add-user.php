<?php
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

if ($_SESSION['userId'] != 1) header('location:' . $baseUrl . 'panel/moje-konto.php');

$db = new mysqli('localhost', 'root', null, 'grotnet');

if (isset($_POST['registercheck'])) {
    $request = $_POST;
    $queryadd = "SELECT * FROM user WHERE email = '" . $request['email'] . "'";
    $result = $db->query($queryadd);

    if (!$result->num_rows) {
        $queryadd = "INSERT INTO user (email,haslo,imie,nazwisko,typUsera) VALUES ('" . $request['email'] . "','" . md5($request['haslo']) . "','" . $request['imie'] . "','" . $request['nazwisko'] . "','" . $request['rola'] . "')";
        $db->query($queryadd);
        echo "<h1 style='text-align:center;color:green'>User dodany</h1>";
    } else {
        echo "<h1 style='text-align:center;color:red'>User istnieje</h1>";
    }
}

?>
<div class="register-form__wrapper">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="register-form">
        <h2>Dodaj usera</h2>
        <input type="email" name="email" class="register-from__input email" require placeholder="Email">
        <input type="text" name="imie" class="register-from__input imie" placeholder="Imię">
        <input type="text" name="nazwisko" class="register-from__input nazwisko" placeholder="Nazwisko">
        <input type="password" class="register-from__input haslo" min="6" name="haslo" require placeholder="Haslo">
        <select name="rola" id="" require>
            <option> Wybierz role</option>
            <option value="1">Admin</option>
            <option value="2">Pracownik</option>
            <option value="3">Klient</option>
        </select>
        <input type="submit" name="registercheck" class="send" value="Zajerestruj">
    </form>