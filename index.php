<link rel="stylesheet" href="resources/style.css">
<?php
if (isset($_POST['logincheck'])) {
    require_once('db/connection.php');

    $db = new MYSQLConection('localhost', 'root', null, 'grotnet');
    $db = $db->connect();

    $data = $_POST;

    $query = "SELECT * FROM user WHERE email = '" . $data['email'] . "'";

    $result = $db->query($query);

    if ($result->num_rows) {
        if (mysqli_fetch_assoc($result)['haslo'] == md5($_POST['haslo'])) {
            header('Location: ./functions/login.php?id=' . mysqli_fetch_assoc($result)['typUsera']);
        } else {
            echo "<div class='warning'>Błędne hasło/brak hasła</div>";
        }
    } else {
        echo "<div class='warning'>User nie istnieje skontaktuj się z adminem</div>";
    }

    $db->close();
}
?>
<div class="login-from__wrapper">
    <form action="" method="post" class="login-form">
        <h1>Logowanie</h1>
        <input type="email" name="email" class="email" placeholder="Email" id="">
        <input type="password" class="haslo" name="haslo" placeholder="Haslo" id="">
        <input type="submit" name="logincheck" class="send" value="Zaloguj">
    </form>

</div>