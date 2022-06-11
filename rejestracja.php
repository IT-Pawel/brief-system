<?php
    require_once 'header.php';
?>
<div class="register-form__wrapper">
    <form action="" method="post" class="register-form">
        <h1>Zarejestruj się</h1>
        <input type="email" name="email" class="email" placeholder="Email">
        <input type="password" class="haslo" name="haslo" placeholder="Haslo">
                <input type="submit" name="registercheck" class="send" value="Zajerestruj">
    </form>
    <div class="register-form__bottom">
        <p>Masz już konto ?<a href="../">Zaloguj się!</a></p>
    </div>    
</div>


<script>
    $('.register-form').on('submit', (e) => {
        e.preventDefault();
        $.ajax(
        {
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: { 
                function: 'registerToSys', 
                email: $('.email').val(),
                haslo: $('.haslo').val()
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
        $.ajax(
        {
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: { 
                function: 'registerToSys', 
                email: $('.email').val(),
                haslo: $('.haslo').val()
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