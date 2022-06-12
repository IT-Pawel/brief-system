<?php
include $_SERVER['DOCUMENT_ROOT'].'/header.php';

if (!isset($_SESSION['logged'])) {
    header('Location: ' . $baseUrl);
}

$db = new mysqli('localhost', 'root', null, 'grotnet');


if( isset($_POST['usunkonto'])){
    $query = "DELETE  FROM user WHERE id = '" . $_POST['userId'] . "'";
    $result = $db->query($query);
    header( 'location:'.$baseUrl.'?logout=true' );
}

$query = "SELECT * FROM user WHERE id = '" . $_SESSION['userId'] . "'";
$result = $db->query($query);
$result = mysqli_fetch_assoc($result);
?>

<main class="account">
    <h1> Witaj <?php echo $result['imie'] . " " . $result['nazwisko']; ?>!</h1>

    <h2> Edyduj swoje dane </h2>
    <form action="" method="post" class="update-form dane">
        <fieldset>
            <legend>Zmień dane</legend>
            <input type="hidden" class="id" name="userId" value="<?php echo $_SESSION['userId'];?>">
            <input type="text" name="imie" class="imie" value="<?php echo $result['imie'] ?>">
            <input type="text" name="nazwisko" class="nazwisko" value="<?php echo $result['nazwisko'] ?>">
        </fieldset>
        <input type="submit" name="updateuser" class="send-dane" value="Zmien">
    </form>

    <form action="" method="post" class="update-form haslo">
    <fieldset>
            <legend>Zmień hasło</legend>
            <input type="hidden" class="id" name="userId" value="<?php echo $_SESSION['userId'];?>">
            <input type="password" class="hasloold" name="haslo"  placeholder="Stare haslo">
            <input type="password" class="haslonew" min="6" name="haslo" placeholder="Haslo">
        </fieldset>
        <input type="submit" name="updateuserpassword" class="send-haslo" value="Zmien haslo">
    </form>



    <form action="" method="post">
        <input type="hidden" class="id" name="userId" value="<?php echo $_SESSION['userId'];?>">
        <input type="submit" name="usunkonto" class="usunkonto" value="USUŃ KONTO">
    </form>


</main>



<script>
    $('.update-form.dane').on('submit', (e) => {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: {
                function: 'updateUserDane',
                id: $('.id').val(),
                imie: $('.imie').val(),
                nazwisko: $('.nazwisko').val()
            },
            success: function(result) {
                alert(result.response)
            }
        });
    })

    $('.send-dane').on('click', (e) => {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: {
                function: 'updateUserDane',
                id: $('.id').val(),
                imie: $('.imie').val(),
                nazwisko: $('.nazwisko').val()
            },
            success: function(result) {
                alert(result.response)
            }
        });
    })


    $('.update-form.haslo').on('submit', (e) => {
        e.preventDefault();

        if( $('.haslonew').val().length < 6 ) {
            alert("Hasło musi mieć conajmniej 6 liter");
            $('.haslonew').css('border-color','red');
            return
        }


        $.ajax({
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: {
                function: 'updateUserHaslo',
                id: $('.id').val(),
                hasloold: $('.hasloold').val(),
                haslonew: $('.haslonew').val()
            },
            success: function(result) {
                alert(result.response)
                }
        });
    })

    $('.send-haslo').on('click', (e) => {
        e.preventDefault();

        if( $('.haslonew').val().length < 6 ) {
            alert("Hasło musi mieć conajmniej 6 liter");
            $('.haslonew').css('border-color','red');
            return
        }

        $.ajax({
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: {
                function: 'updateUserHaslo',
                id: $('.id').val(),
                hasloold: $('.hasloold').val(),
                haslonew: $('.haslonew').val()
            },
            success: function(result) {
                alert(result.response)
            }
        });
    })
</script>