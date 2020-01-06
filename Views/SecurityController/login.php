<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="../../Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../../Public/css/login.css" />
    <link rel="stylesheet" type="text/css" href="../../Public/css/register.css" />
    <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
</head>
<body>
<script>
    function showLoginForm()
    {
        var element = document.getElementById("login_form");
        element.style.display = "flex";
        var element2 = document.getElementById("register_form");
        element2.style.display = "none";
        var element3 = document.getElementById("register");
        element3.style.display = "block";
        var element4 = document.getElementById("login");
        element4.style.display = "none";
    }

    function showRegisterForm()
    {
        var element = document.getElementById("register_form");
        element.style.display = "flex";
        var element2 = document.getElementById("login_form");
        element2.style.display = "none";
        var element4 = document.getElementById("login");
        element4.style.display = "block";
        var element3 = document.getElementById("register");
        element3.style.display = "none";
    }
    
    function  closeLoginForm()
    {
        var element = document.getElementById("login_form");
        element.style.display = "none";
        var element2 = document.getElementById("login");
        element2.style.display = "block";
    }

    function  closeRegisterForm()
    {
        var element = document.getElementById("register_form");
        element.style.display = "none";
        var element2 = document.getElementById("register");
        element2.style.display = "block";

    }
</script>
<div class="container" id="container" onclick="hideForms()">
    <div class="motto">
        Twórz Udostępniaj Szukaj
    </div>
    <div class="register" id="register">
        <button type="submit" onclick="showRegisterForm()">ZAREJESTRUJ SIĘ</button>
    </div>
    <div class="register_div" id="register_form">
        <button class="exit_button" type="button" onclick="closeRegisterForm()"><img src="/Public/img/exit_icon.png"></button>
        <form class="register_form" action="?page=login" method="POST">
            <p>Login</p>
            <input name="login" type="text" placeholder="login">
            <p>E-mail</p>
            <input name="email" type="text" placeholder="email@email.com">
            <p>Hasło</p>
            <input name="password" type="text" placeholder="......">
            <p>Powtórz hasło</p>
            <input name="password" type="text" placeholder="......">
<!--            <input name="user_photo" id="user_photo" type="file" accept="image/*">-->
            <button class="button_next" name="register_button">ZAREJESTRUJ SIĘ</button>
        </form>
    </div>
    <div class="footage">
        <p>PODZIEL SIĘ TYM CO POTRAFISZ</p>
    </div>
    <div class="logo">
        Musicer
    </div>
    <div class="login" id="login">
        <button type="button" onclick="showLoginForm()">ZALOGUJ SIĘ</button>
    </div>
    <div class="login_div"  id="login_form">
        <button class="exit_button" type="sumbit" onclick="closeLoginForm()"><img src="/Public/img/exit_icon.png"></i></button>
        <form class="login_form" action="?page=login" method="POST">
            <div class="login_input">
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="text" placeholder="........">
            </div>
            <button name="login_button">ZALOGUJ SIĘ</button>
        </form>
    </div>
</div>
</body>
</html>