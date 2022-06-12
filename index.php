<?php
include 'header.php';

if( isset($_SESSION['logged'])) {
    header('Location: '.$baseUrl.'panel/moje-konto.php');
}
?>
<div class="login-form__wrapper">
    <form action="" method="post" class="login-form">
        <h1>Logowanie</h1>
        <input type="email" name="email" class="email" placeholder="Email">
        <input type="password" class="haslo" name="haslo" placeholder="Haslo">
        <input type="submit" name="logincheck" class="send" value="Zaloguj">
    </form>
    <div class="login-form__bottom">
        <p>Nie posiadasz konta <a href="/rejestracja.php">Zajerjestruj się!</a></p>
    </div>

</div>


<script>
    $('.login-form').on('submit', (e) => {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: {
                function: 'loginToSys',
                email: $('.email').val(),
                haslo: $('.haslo').val()
            },
            success: function(result) {
                if (result.response == 400) {
                    location.href = result.redirect;
                } else {
                    alert(result.response)
                }
            }
        });
    })

    $('.send').on('click', (e) => {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: {
                function: 'loginToSys',
                email: $('.email').val(),
                haslo: $('.haslo').val()
            },
            success: function(result) {
                if (result.response == 400) {
                    location.href = result.redirect;
                } else {
                    alert(result.response)
                }
            }
        });
    })
</script>