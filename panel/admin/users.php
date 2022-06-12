<?php
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

if ($_SESSION['userId'] != 1) header('location:' . $baseUrl . 'panel/moje-konto.php');

$db = new mysqli('localhost', 'root', null, 'grotnet');
$query = "SELECT usertype.id AS idType, usertype.nazwa, user.*  FROM user INNER JOIN usertype ON usertype.id = user.typUsera WHERE user.id != " . $_SESSION['userId'] . "";
$query = $db->query($query);

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
    <br>
    <a href="./add-user.php" class="btn" style="text-align:center;">Dodaj usera</a>
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