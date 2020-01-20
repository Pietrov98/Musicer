<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/mail.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    function  hideApplication()
    {
        var element = document.getElementById("application_information");
        element.style.display = "none";
    }

    window.onload = function getReceivedMessages() {

        const apiUrl = "http://localhost:8001";
        const $list = $('.mail_list');
        $.ajax({
            url: apiUrl + '/?page=received_messages',
            dataType: 'json'
        }).done(function (data) {
            $list.empty();
            $.each(data, function (key, val) {
                $list.append(`
                        <div class="mail">
                            <div class="sender">${val.sender_name}</div>
                            <div>${val.content}</div>
                            <div class="date">${val.date}</div>
                        </div>`);
            });
        });
    }

    function getReceivedMessages2()
    {

        const apiUrl = "http://localhost:8001";
        const $list = $('.mail_list');
        $list.empty();
        $.ajax({
            url : apiUrl + '/?page=received_messages',
            dataType : 'json'
        }) .done(function( data ) {
            $list.empty();
            $.each( data, function( key, val )
            {
                $list.append(`
                    <div class="mail">
                        <div class="sender">${val.sender_name}</div>
                        <div>${val.content}</div>
                        <div class="date">${val.date}</div>
                    </div>`);
            });
        });
    }

    function getSentMessages()
    {
        const apiUrl = "http://localhost:8001";
        const $list = $('.mail_list');
        $list.empty();
        $.ajax({
            url : apiUrl + '/?page=sent_messages',
            dataType : 'json'
        }) .done(function( data ) {
            $.each( data, function( key, val )
            {
                $list.append(`
                    <div class="mail">
                        <div class="sender">${val.recipient_name}</div>
                        <div>${val.content}</div>
                        <div class="date">${val.date}</div>
                    </div>`);
            });
        });
    }

    function getApplications()
    {
        const apiUrl = "http://localhost:8001";
        const $list = $('.mail_list');
        $list.empty();
        $.ajax({
            url : apiUrl + '/?page=get_applications',
            dataType : 'json'
        }).done((res) => {
            res.forEach(el => {
                $list.append(`
                    <div class="mail">
                        <div class="sender">${el.user_name}</div>
                        <div>${el.ID}</div>
                        <div class="date">${el.user_description}</div>
                        <div class="showApplication">
                            <button id="${el.ID}" onclick=showApplication(this.id)>Zobacz zgłoszenie</button>
                        </div>
                    </div>`);
            });
        });
    }

    function showApplication(id_application) {
        const apiUrl = "http://localhost:8001";
        const $list = $('.application_information');
        $.ajax({
            url: apiUrl + '/?page=get_applications',
            dataType: 'json'
        }).done((res) => {
            res.forEach(el => {
                if(el.ID === id_application)
                {
                    $list.empty();
                    var user_img_path = '../../Public/uploads/user_img/' + el.user_img;
                    var user_record_path = '../../Public/uploads/records/' + el.user_record;
                    $list.append(`
                            <button class="exit_button" type="button" onclick="hideApplication()"><img src="/Public/img/exit_icon.png"></button>
                    <div class="upper_informations">
                        <div class="user_photo" id="user_photo">
                            <img id="user_photo_src" src="${user_img_path}">
                        </div>
                        <span id="user_name">${el.user_name}</span>
                    </div>
                    <div class="description">
                        <div class="description_content">
                            <span id="description_content">${el.user_description}</span>
                        </div>
                    </div>
                    <div class="record" id="my_record">
                        <audio id="my_record" controls onseeking="startMusic()" onseeked="startMusic()">
                            <source src="${user_record_path}" type="audio/mp3">
                        </audio>
                    </div>
                    <div class="send_application">
                        <form class="application_form" action="?page=mail_post" method="POST">
                            <button name="" id="send_application_y" type="submit")">Przyjmij</button>
                            <button name="" id="send_application_n" type="submit")">Odrzuć</button>
                        </form>
                    </div>`);
                    $('#send_application_y').attr('name', "y" + id_application);
                    $('#send_application_n').attr('name', "n" + id_application);
                }
            });
            $('#send_application').attr('name', id_application);
        });
        var element = document.getElementById("application_information");
        element.style.display = "flex";
        // var element2 = document.getElementById("message");
        // element2.style.display = "none";
    }

    function getFriendsToMessage()
    {
        var element = document.getElementById("message");
        element.style.display = "block";
        const apiUrl = "http://localhost:8001";
        const $list = $('.friend_select');
        $.ajax({
            url : apiUrl + '/?page=get_message_friends',
            dataType : 'json'
        }).done(function( data ) {
            $list.empty();
            $.each( data, function( key, val )
            {
                $list.append(`
                        <option value=${val.ID}>${val.name}</option>
                    `);
            });
        });

    }

    function hideMessageForm()
    {
        var element = document.getElementById("message");
        element.style.display = "none";
    }

</script>
<div class="container">
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
    <div class="post_container">
        <div class="upper_post_container">
            <div class="options_container">
                <button type="submit" name="option_button" onclick=getReceivedMessages2()>Odebrane</button>
                <button type="submit" onclick=getSentMessages()>Wysłane</button>
                <button type="submit" name="option_button" onclick=getApplications()>Zaproszenia</button>
                <button name="mail_search_button" onclick="getFriendsToMessage()">Napisz wiadomość</button>
            </div>
        </div>
        <div class="mail_list">
<!--       Wyswietlane dynamicznie JS-->
        </div>
    </div>
    <div class="application_information" id="application_information" style="display: none; z-index: 1;">
        <!--        showFriend()-->
    </div>
    <div class="message" id="message">
        <button class="exit_button" type="button" onclick="hideMessageForm()"><img src="/Public/img/exit_icon.png"></button>
        <form class="message_form" action="?page=send_message" method="POST">
            <div class="friends_list">
                <select name="friend_select" class="friend_select" id="friend_select">
                    <!--                       js code-->
                </select>
            </div>
            <div class="message_description">
                <div class="message_content">
                    <textarea id="send_content" class=send_content" name="message_content" maxlength="250"></textarea>
                </div>
            </div>
            <div class="save_message">
                <button  name="send_message" id="send_message" type="submit"> Wyślij wiadomość</button>
            </div>
        </form>
    </div>
</div>
<script>
    if ( window.history.replaceState )
    {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
