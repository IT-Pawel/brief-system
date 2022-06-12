<?php
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
if (!isset($_SESSION['logged'])) {
    header('Location: ' . $baseUrl);
}
$db = new mysqli('localhost', 'root', null, 'grotnet');

$query = "SELECT  brief.id, brief.tytul,brief.status, brief.tresc, statusbrief.nazwa FROM brief INNER JOIN statusbrief ON statusbrief.id = brief.status WHERE brief.id = " . $_GET['id'];
$result = $db->query($query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['sendbref'])) {

    $tytul =  $_POST['tytul'];
    $brief =  $_POST['brief'];
    $status =  $_POST['status'];
    $userId = $_SESSION['userId'];

    $queryadd = "UPDATE brief SET tytul = '$brief', tresc='$brief',status='$status'";
    $db->query($queryadd);
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="brief__wrapper login-from__wrapper">
    <form action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']; ?>" method="post" class="brief login-form">
        <h1>Brief</h1>
        <input type="tytul" name="tytul" class="tytul" value="<?php echo $row['tytul']; ?>" id="">
        <label for="brief">Brief</label>
        <textarea id="brief" name="brief" rows="10" cols="70"><?php echo $row['tresc']; ?> </textarea>
        <?php
        if ($_SESSION['userType_id'] != 3) { ?>
            <select name="status" id="status" data-id="<?php echo $row['status'] ?>">
                <option value="1">wysłane</option>
                <option value="2">przyjęte</option>
            </select>
        <?php } ?>

        <input type="submit" name="sendbref" class="send" value="Wyślij">
    </form>

</div>
<script>
    $(document).ready(function() {
        let id = $('#status').data('id');
        $('#status').val(id);
        $('#status').val(id).change();
        $('#status option[value=' + id + ']').attr('selected', 'selected');
    });
</script>