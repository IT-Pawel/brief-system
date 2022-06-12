<?php
    include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>
<div class="register-form__wrapper">
    <form action="" method="post" class="register-form">
        <h1>Zarejestruj się</h1>
        <input type="email" name="email" class="register-from__input email" require placeholder="Email">
        <input type="text" name="imie" class="register-from__input imie" placeholder="Imię">
        <input type="text" name="nazwisko" class="register-from__input nazwisko" placeholder="Nazwisko">
        <input type="password" class="register-from__input haslo" min="6" name="haslo" require placeholder="Haslo">
        <input type="submit" name="registercheck" class="send" value="Zajerestruj">
    </form>
    <div class="register-form__bottom">
        <p>Masz już konto? <a href="../">Zaloguj się!</a></p>
    </div>    
</div>


<script>
    $('.register-form').on('submit', (e) => {
        e.preventDefault();

        if( ! $('.haslo').val() && ! $('.email').val() ){
            $('.haslo').css('border-color','red');
            $('.email').css('border-color','red');
            alert("Uzupełnij potrzebne dane !");
            return;
        }

        if( $('.haslo').val().length < 6 ) {
            alert("Hasło musi mieć conajmniej 6 liter");
            return
        }

        $.ajax(
        {
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: { 
                function: 'registerToSys', 
                email: $('.email').val(),
                haslo: $('.haslo').val(),
                imie: $('.imie').val(),
                nazwisko: $('.nazwisko').val()
            },
            success:function(result){
                if(result.response == 400){
                    location.href = result.redirect;
                } else{
                    alert(result.response)
                }
            }
        }
        );
    })

    $('.send').on('click',(e) => {
        e.preventDefault();
        if( ! $('.haslo').val() && ! $('.email').val() ){
            $('.haslo').css('border-color','red');
            $('.email').css('border-color','red');
            alert("Uzupełnij potrzebne dane !");
            return;
        }

        if( $('.haslo').val().length < 6 ) {
            alert("Hasło musi mieć conajmniej 6 liter");
            return
        }

        $.ajax(
        {
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: { 
                function: 'registerToSys', 
                email: $('.email').val(),
                haslo: $('.haslo').val(),
                imie: $('.imie').val(),
                nazwisko: $('.nazwisko').val()
            },
            success:function(result){
                if(result.response == 400){
                    location.href = result.redirect;
                } else{
                    alert(result.response)
                }
            }
        }
        );
    })
</script>