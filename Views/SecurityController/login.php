<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="../../Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../../Public/css/login.css" />
    <link rel="stylesheet" type="text/css" href="../../Public/css/register.css" />
    <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <script src="/Public/scripts/login_functions.js"></script>
</head>
<!--jquery string content string includes-->

<div class="container" id="container">
    <div class="motto">
        Twórz Udostępniaj Szukaj
    </div>
    <div class="register" id="register">
        <button type="submit" onclick="showRegisterForm()">ZAREJESTRUJ SIĘ</button>
    </div>
    <div class="register_div" id="register_form">
            <button class="exit_button" type="button" onclick="closeRegisterForm()"><img src="/Public/img/exit_icon.png"></button>
            <?php
            if(isset($register_posts))
            {
                echo '<p style="margin: 0; font-size: 50%; color: darkred">'.$register_posts[0].'</p>';
            }
            ?>
        <form class="register_form" action="?page=register" method="POST">
            <p>Login</p>
            <input name="login" type="text" placeholder="login">
            <p>E-mail</p>
            <input name="email" type="text" placeholder="email@email.com">
            <p>Hasło</p>
            <input name="password1" type="password">
            <p>Powtórz hasło</p>
            <input name="password2" type="password">
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
                <input name="password" type="password" placeholder="........">
            </div>
                <?php
                if(isset($login_posts))
                {
                    echo '<p style="margin: 0; font-size: 70%; color: darkred"">'.$login_posts[0].'</p>';
                }
                ?>
            <button name="login_button">ZALOGUJ SIĘ</button>
        </form>
    </div>
</div>
</body>
</html>