<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/mail.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<script>
    function showMenu()
    {
        var menu = document.getElementById("drop_down_content");
        if(menu.style.display === "block")
        {
            menu.style.display = "none";
        }
        else if((menu.style.display === "none") || !menu.style.display)
        {
            menu.style.display = "block";
        }
    }
</script>
<div class="container">
    <div class="upper_container">
        <div class="logo"><p>Musicer</p></div>
        <div class="right_upper_container">
            <div class="name_photo_menu">
                <div class="nickname">NickName</div>
                <img src="/Public/img/anthony_friend.png">
                <div class="menu">
                    <button id="menu_button" onclick="showMenu()"><i class="fa fa-bars"></i></button>
                </div>
            </div>
            <div class="drop_down_content" id="drop_down_content">
                <form class="menu_form" action="?page=board" method="POST">
                    <button name="mail_post" type="submit">Poczta</button>
                    <button name="my_account" type="submit">Mój profil</button> <!--Bedzie szukaj, ale jak bedziesz mial to nie mozesz dolaczyc-->
                    <button name="my_band" type="submit">Mój zespół</button>
                    <button name="friends" type="submit">Znajomi</button>
                    <button name="find_band" type="submit">Szukaj zespołu</button>
                    <button name="logout" type="submit">Wyloguj</button>
                </form>
            </div>
        </div>
    </div>
    <div class="post_container">
        <div class="upper_post_container">
            <div class="options_container">
                <button type="submit" name="option_button">Wszystkie</button>
                <button type="submit" name="option_button">Odebrane</button>
                <button type="submit" name="option_button">Wysłane</button>
                <button type="submit" name="option_button">Zaproszenia</button>
                <button type="submit" name="option_button">Chat</button>
                <div class="searcher">
                    <input name="mail_searcher" type="text">
                    <button name="mail_search_button">></button>
                </div>
            </div>
        </div>
        <div class="mail_list">
            <?php
            for ($i = 0; $i < 5 ; $i++) {
                $name = "Tutaj jakiś testowy tekst";
                echo '<div class="mail">';
                echo '<div class="sender">Adrian</div>';
                echo '<div>Cześć, wpadasz jutro?</div>';
                echo '<div class="date">19.01.2010</div>';
                echo '</div>';
            }
            ?>
<!--            <div class="mail">-->
<!--                <div class="sender">-->
<!--                    <h4>Adrian</h4>-->
<!--                </div>-->
<!--                <button class="mail_title_button"><h4>Cześć, wpadasz jutro?</h4></button>-->
<!--                <div class="date">-->
<!--                    <h4>19.11.1992</h4>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="mail">-->
<!--                <div class="sender">-->
<!--                    <h4>Adrian</h4>-->
<!--                </div>-->
<!--                <button class="mail_title_button"><h4>Cześć, wpadasz jutro?</h4></button>-->
<!--                <div class="date">-->
<!--                    <h4>19.11.1992</h4>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="mail">-->
<!--                <div class="sender">-->
<!--                    <h4>Adrian</h4>-->
<!--                </div>-->
<!--                <button class="mail_title_button"><h4>Cześć, wpadasz jutro?</h4></button>-->
<!--                <div class="date">-->
<!--                    <h4>19.11.1992</h4>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>
</body>
