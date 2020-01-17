
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
<!--    <script src="/Public/scripts/getFriends.js"></script>-->
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
        const apiUrl = "http://localhost:8001";
        const $list = $('.user_information');
        $.ajax({
            url : apiUrl + '/?page=get_friends',
            dataType : 'json'
        }) .done((res) => {
            el = res[id_user];
            $list.empty();
            var img_path = '../../Public/uploads/user_img/' + el.user_img;
            var record_path = '../../Public/uploads/records/' + el.user_record;
            //$('#name').html(el.name);
            // $('#band_name').html(el.name);
            // $('#description_content').html(el.description);
            // $('#send_message').attr('name', id_user);
                    $list.append(`
                    <button class="exit_button" type="button" onclick="hideFriend()"><img src="/Public/img/exit_icon.png"></button>
                <div class="upper_informations">
                <div class="band">
                <div class="band_photo" id="band_photo">
                <img id="band_photo_src" src="${img_path}">
                </div>
                <span id="band_name">${el.name}</span>
                </div>
                <div class="photo_and_name">
                <div class="main_photo">
                <img id="main_photo_src" src="${img_path}">
                </div>
                <div class="name" >
                <span id="name">${el.name}</span>
                </div>
                </div>
                </div>
                <div class="description">
                <div class="description_content">
                <span id="description_content">${el.description}</span>
                </div>
                </div>
                <div class="bottom_informations">
                <div class="record" id="my_record">
                <audio id="my_record"  controls>
                <source id="record_src" src="${record_path}" type="audio/mp3">;
            </audio>
                </div>
                <div class="send_message">
                <button name="send_message_button" id="" onclick="showMessageForm()">Napisz wiadomość</button>
                </div>
                </div>
                    `);
                $('#send_message').attr('name', id_user);
                });
        var element = document.getElementById("user_information");
        element.style.display = "flex";
        var element2 = document.getElementById("message");
        element2.style.display = "none";

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
        //showFriend();
    }


    window.onload = function getFriends()
    {
        const apiUrl = "http://localhost:8001";
        const $list = $('.friends_list');
        $.ajax({
            url : apiUrl + '/?page=get_friends',
            dataType : 'json'
        }) .done(function( data ) {
                $list.empty();
                $.each( data, function( key, val )
                {
                    $list.append(`
                    <div class="friend">
                    <button type="button" class="friend_button" id="${val.ID}" onclick="showFriend(this.id)">
                        <img src=/Public/uploads/user_img/${val.user_img}></button>
                    <p>${val.name}</p>
                    </div>`);
                });
             });
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
<!--        showFriend()-->
    </div>

    <div class="friends_container">
        <div class="friends_list">
            <!--Reszte wyswietla funkcja    -->
        </div>
    </div>
</div>
<script>
    if ( window.history.replaceState )
    {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>