<?php
    if(!isset($_SESSION['id']))
    {
        die('You are not logged in!');
    }
?>

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
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
    <div class="user_information" id="edit_data">
        <button class="exit_button" type="button" onclick="closeEditForm()"><img src="/Public/img/exit_icon.png"></button>
        <form class="edit_form" action="?page=board" method="POST"  enctype="multipart/form-data">
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
                <input name="user_record" id="user_record" type="file" accept="audio/*">
            </div>
            <div class="save_changes">
                <button  name="save_changes" type="submit">ZAPISZ ZMIANY</button>
            </div>
        </form>
    </div>

    <div class="user_information" id="user_information">
        <div class="upper_informations">
            <div class="band">
<!--                <div class="band_photo">-->
<!--                    <img src="/Public/img/image-5.png">-->
<!--                </div>-->
<!--                RedHotChiliPeppers<br/>-->
                <?php
                if(isset($user))
                {
                    echo '<div class="band_photo">'.
                       "<img src=/Public/uploads/band_img/" .$_SESSION['band_img'].">".
                        '</div>'.
                        $_SESSION['band_name'].'<br/>';
                }
                ?>
            </div>
            <div class="photo_and_name">
                <div class="main_photo">
                    <?php
                    if(isset($user))
                    {
                        echo "<img src=/Public/uploads/user_img/" .$user->getUserImg().">";
                    }
                    ?>
                </div>
                <div class="name">
                    <?php
                    if(isset($user))
                    {
                        echo $user->getName()."<br/>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="description">
            <div class="description_content">
                <?php
                if(isset($user))
                {
                    echo $user->getDescription();
                }
                ?>
            </div>
        </div>
        <div class="bottom_informations">
            <div class="record" id="my_record">
                <audio id="my_record" controls onseeking="startMusic()" onseeked="startMusic()">
                    <?php
                        echo '<source src="/Public/uploads/records/'.$user->getUserRecord().'" type="audio/mp3">';
                    ?>
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