<?php
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';



if ($_SESSION['user_id'] != 1) header('location:' . $baseUrl . 'panel/moje-konto.php');

$db = new mysqli('localhost', 'root', null, 'grotnet');
$query = "SELECT usertype.id AS idType, usertype.nazwa, user.*  FROM user INNER JOIN usertype ON usertype.id = user.typUsera WHERE user.id != " . $_SESSION['user_id'] . "";
$query = $db->query($query);

if(isset($_POST['registercheck'])){
    $request = $_POST;
    $queryadd = "SELECT * FROM user WHERE email = '" . $request['email'] . "'";
    $result = $db->query($queryadd);

    if (!$result->num_rows) {
        $queryadd = "INSERT INTO user (email,haslo,imie,nazwisko,typUsera) VALUES ('" . $request['email'] . "','" . md5($request['haslo']) . "','" . $request['imie'] . "','" . $request['nazwisko'] . "','".$request['rola']."')";
        $db->query($queryadd);
    }else{
        echo "<h1 style='text-align:center;color:red'>User istnieje</h1>";
    }
}

while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
}
?>
<main class="users">
    <table class="users-table">
        <tr>
            <th>
                Imie
            </th>
            <th>
                Nazwisko
            </th>
            <th>
                Email
            </th>
            <th>
                Typ Usera
            </th>
            <th>
                Akcja
            </th>
        </tr>
        <?php
        if (!empty($rows)) :
            foreach ($rows as $row) :
        ?>
                <tr>
                    <td>
                        <?php echo $row['imie']; ?>
                    </td>
                    <td>
                        <?php echo $row['nazwisko']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['nazwa']; ?>
                    </td>
                    <td>
                        <form action="" method="post" class="remove-user">
                            <input type="submit" class="remove" data-id=<?php echo $row['id']; ?> value="Usuń">
                        </form>
                    </td>
                </tr>
        <?php endforeach;
        endif; ?>
    </table> 
    <div class="register-form__wrapper">
    <form action="" method="post" class="register-form">
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
</main>



<script>
    $('.remove').on('click', (e) => {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: {
                function: 'usunUsera',
                id: $(e.target).data('id'),
            },
            success: function(result) {
                alert(result.response);
            }
        }).then(() => {
            $(e.target).parent().parent().parent().remove();
        });
    })
</script>