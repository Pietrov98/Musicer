
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

    function showFriend(id_user)
    {
        var element = document.getElementById("user_information");
        element.style.display = "flex";
        var element2 = document.getElementById("message");
        element2.style.display = "none";
        // $('#main_photo_src').attr('src','../../Public/uploads/user_img/nobody_img.jpg');
        // console.log(id_user);
        $.getJSON( "friends.json", function( data ) {
            var items = [];
            $.each( data, function( key, val ) {
                if(val.ID === id_user)
                {
                    var img_path = '../../Public/uploads/user_img/' + val.user_img;
                    $('#main_photo_src').attr('src', img_path);

                    var record_path = '../../Public/uploads/records/' + val.user_record;
                    //nie dziala
                    $('#record_src').attr('src', record_path);

                    $('#name').html(val.name);
                    $('#band_name').html(val.name);
                    $('#description_content').html(val.description);
                    $('#send_message').attr('name', id_user);
                }
            });
        });

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
                <button  name="send_message" id="send_message" type="submit"> Wyślij wiadomość</button>
            </div>
        </form>
    </div>

    <div class="user_information" id="user_information" style="display: none; z-index: 1;">
        <button class="exit_button" type="button" onclick="hideFriend()"><img src="/Public/img/exit_icon.png"></button>
        <div class="upper_informations">
            <div class="band">
                <div class="band_photo" id="band_photo">
                    <img src="../../Public/uploads/user_img/www.YTS.LT.jpg">
                </div>
                <span id="band_name"></span>
            </div>
            <div class="photo_and_name">
                <div class="main_photo">
                    <img id="main_photo_src">
                </div>
                <div class="name" >
                    <span id="name"></span>
                </div>
            </div>
        </div>
        <div class="description">
            <div>Opis</div>
            <div class="description_content">
                <span id="description_content"></span>
            </div>
        </div>
        <div class="bottom_informations">
            <div class="song_title">Can't stop</div>
            <div class="record" id="my_record">
                <audio id="my_record"  controls>
                    <source id="record_src" src="../../Public/uploads/records/punch%20(online-audio-converter.com).wav" type="audio/mp3">;
                </audio>
            </div>
            <div class="send_message">
                <button name="send_message_button" id="" onclick="showMessageForm()">Napisz wiadomość</button>
            </div>
        </div>
    </div>

    <div class="friends_container">
        <div class="friends_list">
            <form method="post">
<!--        Poprawic wyswietlanie, bo sie rozjezdza-->
            <?php
            if(isset($friends)){
                foreach($friends as $friend):
                    echo '<div class="friend">'.
                        '<button type="button" class="friend_button" id="'.$friend->getID().'" onclick="showFriend(this.id)"/>'.
                        "<img src=/Public/uploads/user_img/" .$friend->getUserImg().">".'</button>'.
                        '<p>'.$friend->getName().'</p>'.
                        '</div>';
                endforeach;
            }
            ?>
            </form>
        </div>
    </div>
</div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>