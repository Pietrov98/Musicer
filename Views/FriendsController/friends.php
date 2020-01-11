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
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
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
<!--        Poprawic wyswietlanie, bo sie rozjezdza-->
            <?php
            if(isset($friends)){
                foreach($friends as $friend):
                    echo '<div class="friend">'.
                        '<button class="friend_button" name="przyjaciel" onclick="showFriend()"/>'.
                        "<img src=/Public/uploads/user_img/" .$friend->getUserImg().">".'</button>'.
                        '<p>'.$friend->getName().'</p>'.
                        '</div>';
                endforeach;
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
<body>