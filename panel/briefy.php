<?php
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

$db = new mysqli('localhost', 'root', null, 'grotnet');

if ($_SESSION['userType_id'] != 3 ) {
    $query = "SELECT user.email ,statusbrief.nazwa, brief.* FROM brief INNER JOIN user on brief.userSend = user.id INNER JOIN statusbrief on statusbrief.id = brief.status";
    $result = $db->query($query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
} else {
    $query = "SELECT user.email ,statusbrief.nazwa, brief.* FROM brief INNER JOIN user on brief.userSend = user.id INNER JOIN statusbrief on statusbrief.id = brief.status WHERE userSend = " . $_SESSION['userId'];
    $result = $db->query($query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
};


?>
<main class="brief">
    <table class="brief-table">
        <tr>
            <th>
                Tytul
            </th>
            <th>
                Email
            </th>
            <th>
                Status
            </th>
            <?php if ($_SESSION['userType_id'] != 3 && $_SESSION['userType_id'] != 2) : ?>
                <th>
                    Akcja
                </th>
            <?php endif; ?>
        </tr>
        <?php
        if (!empty($rows)) :
            foreach ($rows as $row) :
        ?>
                <tr>
                    <td>
                        <a href="./brief.php?id=<?php echo $row['id']; ?>"><?php echo $row['tytul']; ?></a>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['nazwa']; ?>
                    </td>
                    <td>
                        <?php if ($_SESSION['userType_id'] != 3 && $_SESSION['userType_id'] != 2) : ?>
                            <form action="" method="post" class="remove-brief">
                                <input type="submit" class="remove" data-id=<?php echo $row['id']; ?> value="Usuń">
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
        <?php endforeach;
        endif; ?>
    </table>
    <br>
    <a href="./dodaj-brief.php" class="btn" style="text-align:center;">Dodaj brief</a>
    <?php if ($_SESSION['userType_id'] != 3 && $_SESSION['userType_id'] != 2) : ?>
        <script>
            $('.remove').on('click', (e) => {
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    dataType: 'JSON',
                    url: "/functions/functions.php",
                    data: {
                        function: 'usunBrief',
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
    <?php endif; ?>