# System obsługi brief
Uczelniany projekt na laboratorium z przedmiotu Inżynieria Oprogramowania z mg Łukasz Kopania

## To Do
- [x] Obsługa użytkowników
- [x] Obsługa briefów


# Stack technologicznny

Do stworzenia aplikacji użyto:

- Języki:
    - PHP 7.4.19
    - mysql 5.7.33
- Moduły:
    - Node.js 12.22.11
    - npm 6.14.16
    - Git
- Biblioteki:
    - Sass
    - jQuery 3.6.0

Aby działało tworzenie stylów należy w terminalu projektu wpisać
``` 
npm run sass 
``` 

## Instalacja projektu
Aby projekt działał z domeną należy zainstalować program laragon i sklonować projekt do folderu www
za pomocą komenty
```
git clone https://github.com/Wero233/brief-system.git
```
Następnie zresetować program i wejść na stronę 
```
brief-system.test
```

## Jak zrobić zapytanie Ajax

W projekcie możliwe jest do stworzenia zapytanie AJAX.
Czyli asynchroniczne zapytanie potrzebne do ładniejszego/płynniejszego działania strony.

```
<script>
    $.ajax(
        {
            method: 'POST',
            dataType: 'JSON',
            url: "/functions/functions.php",
            data: { function: 'test' },
            success:function(result){
                console.log(result);
            }
        }
    );
</script>

```