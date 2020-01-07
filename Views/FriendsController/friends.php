<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/friends.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/my_account.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/friend_information.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/edit_data.css" />
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

    function showFriend()
    {
        var element = document.getElementById("user_information");
        element.style.display = "flex";
        var element = document.getElementById("message");
        element.style.display = "none";
    }

    function  hideFriend()
    {
        var element = document.getElementById("user_information");
        element.style.display = "none";
    }

    function showMessageForm()
    {
        var element = document.getElementById("message");
        element.style.display = "flex";
        hideFriend();
    }

    function hideMessage()
    {
        var element = document.getElementById("message");
        element.style.display = "none";
        showFriend();
    }
</script>
<div class="container">
    <div class="upper_container">
        <div class="logo">
            <p>Musicer</p>
        </div>
        <div class="right_upper_container">
            <div class="name_photo_menu">
                <div class="nickname">NickName</div>
                <img src="/Public/img/anthony_friend.png">
                <div class="menu">
                    <button id="menu_button" onclick="showMenu()"><i class="fa fa-bars"></i></button>
                </div>
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
    <div class="friends_searcher">
        <div class="friends_title">Znajomi</div>
        <div class="searcher">
            <input name="find_friend_input" type="text" placeholder="Dodaj znajomego">
            <button name="new_friends_button"><img src="/Public/img/find_icon.png"</button>
        </div>
    </div>

    <div class="message" id="message">
        <button class="exit_button" type="button" onclick="hideMessage()"><img src="/Public/img/exit_icon.png"></button>
        <form class="message_form" action="?page=friends" method="POST">
            <div class="message_description">
                <div>Wpisz wiadomosc</div>
                <div class="message_content">
                    <textarea id="send_content" class=send_content" name="message_content" maxlength="250"></textarea>
                </div>
            </div>
            <div class="save_message">
                <button  name="send_message" type="submit"> Wyślij wiadomość</button>
            </div>
        </form>
    </div>

    <div class="user_information" id="user_information" style="display: none; z-index: 1;">
        <button class="exit_button" type="button" onclick="hideFriend()"><img src="/Public/img/exit_icon.png"></button>
        <div class="upper_informations">
            <div class="band">
                <div class="band_photo">
                    <img src="/Public/img/chad_friend.png">
                </div>
                RedHotChiliPeppers<br/>
            </div>
            <div class="photo_and_name">
                <div class="main_photo">
                    <img src="/Public/img/vocal_img.png">
                </div>
                <div class="name">
                    TheFlea<br/>
                </div>
            </div>
        </div>
        <div class="description">
            <div>Opis</div>
            <div class="description_content">OpisTutaj jakiś opis postaci asdasdas d asd asd asd asd as as dasd asd asd asd
                pisTutaj jakiś opis postaci asdasdas d asd asd asd asd as as dasd asd asd asd
                pisTutaj jakiś opis postaci asdasdas d asd asd asd asd as as dasd asd asd asd
            </div>
        </div>
        <div class="bottom_informations">
            <div class="song_title">Can't stop</div>
            <div class="record" id="my_record">
                <!--                <div class="record_panel"></div>-->
                <!--                <button class="play_button" type="button" onclick="changeMusicIcon()"><img src="/Public/img/play_icon.png" id="play_icon"></button>-->
                <audio id="my_record" controls onseeking="startMusic()" onseeked="startMusic()">
                    <source src="/Public/audio/bensound-buddy.mp3" type="audio/mp3">
                </audio>
            </div>
            <div class="send_message">
                <button name="send_message_button" onclick="showMessageForm()">Napisz wiadomość</button>
            </div>
        </div>
    </div>

    <div class="friends_container">
        <div class="friends_list">
            <?php
            for ($i = 0; $i < 5 ; $i++) {
                $name = strval($i);
                echo '<div class="friend">';
                echo '<button class="friend_button" name="'.$name.'" onclick="showFriend()"/><img src="/Public/img/anthony_friend.png"></button>';
                echo '<p>Anthony</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
<body>