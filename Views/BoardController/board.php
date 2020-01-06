<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Musicer</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/my_account.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/edit_data.css" />
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

    function startMusic()
    {
        var audio = document.getElementById("my_record");
        document.getElementById("my_record").innerHTML=("Seeking: " + x.seeking);
    }

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
<audio id="my_record">
    <source src="/Public/audio/bensound-buddy.mp3" type="audio/mpeg">
</audio>
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
                    <button name="find_band" type="submit">Szukaj zespołu</button>
                    <button name="logout" type="submit">Wyloguj</button>
                </form>
            </div>
        </div>
    </div>

    <div class="user_information" id="edit_data">
        <button class="exit_button" type="button" onclick="closeEditForm()"><img src="/Public/img/exit_icon.png"></button>
        <form class="edit_form" action="?page=board" method="POST">
            <div class="edit_description">
                <div>Wprowadź swój opis</div>
                <div class="edit_description_content">
                    <textarea id="edit_content" class=edit_description_content" name="description" maxlength="250"> </textarea>
                </div>
            </div>
            <div class="user_input">
                <div>Wybierz zdjęcie</div>
                <input name="user_photo" id="user_photo" type="file" accept="image/*">
            </div>
            <div class="user_input">
                <div>Wybierz nagranie</div>
                <input name="user_record" id="user_photo" type="file" accept="image/*">
            </div>
            <div class="save_changes">
                <button  name="save_changes" type="submit">ZAPISZ ZMIANY</button>
            </div>
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
            <div class="record" id="my_record">
<!--                <div class="record_panel"></div>-->
<!--                <button class="play_button" type="button" onclick="changeMusicIcon()"><img src="/Public/img/play_icon.png" id="play_icon"></button>-->
                <audio id="my_record" controls onseeking="startMusic()" onseeked="startMusic()">
                    <source src="/Public/audio/bensound-buddy.mp3" type="audio/mp3">
                </audio>
            </div>
            <div class="edit">
                <button name="edit_button" onclick="showEditForm()">Edytuj</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>