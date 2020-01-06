<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/my_account.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<script>
    function showEditForm()
    {
        var element = document.getElementById("edit_data");
        element.style.display = "flex";
        var element2 = document.getElementById("user_information");
        element2.style.display = "none";
    }

    function  closeEditForm()
    {
        var element = document.getElementById("edit_data");
        element.style.display = "none";
        var element2 = document.getElementById("user_information");
        element2.style.display = "flex";
    }

    function changeMusicIcon()
    {
            if(document.getElementById('play_icon').src.indexOf("/Public/img/pause_icon.png") === -1)
            {
                document.getElementById('play_icon').src="/Public/img/pause_icon.png";
            }
            else
            {
                document.getElementById('play_icon').src="/Public/img/play_icon.png";
            }
    }
</script>
<div class="container">
    <div class="upper_container">
        <div class="logo">Musicer</div>
        <div class="right_upper_container">
            <div class="nickname">NickName</div>
            <img src="/Public/img/anthony_friend.png">
            <button class="menu"><i class="fa fa-bars"></i></button>
        </div>
    </div>

    <div class="user_information" id="edit_data">
        <button class="exit_button" type="button" onclick="closeEditForm()"><img src="/Public/img/exit_icon.png"></button>
        <form class="edit_form" action="?page=board" method="POST">
            <div class="edit_description">
                <div>Opis</div>
                <div class="edit_description_content">
                    <input name="description" type="text" placeholder="Napisz coś o sobie...">
                </div>
            </div>
            <div>Wybierz zdjęcie</div>
            <input name="user_photo" id="user_photo" type="file" accept="image/*">
            <div>Wybierz nagranie</div>
            <input name="user_record" id="user_photo" type="file" accept="image/*">
            <button class="save_changes_button" name="save_changes" type="submit">ZAPISZ ZMIANY</button>
        </form>
    </div>

    <div class="user_information" id="user_information">
        <div class="upper_informations">
            <div class="band">
                <div class="band_photo">
                    <img src="/Public/img/image-5.png">
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
            <div class="record">
                <div class="record_panel"></div>
                <button class="play_button" type="button" onclick="changeMusicIcon()"><img src="/Public/img/play_icon.png" id="play_icon"></button>
            </div>
            <div class="edit">
                <button name="edit_button" onclick="showEditForm()">Edytuj</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>