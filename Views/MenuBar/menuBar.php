<div class="upper_container">
    <div class="logo">
        <p>Musicer</p>
    </div>
    <div class="right_upper_container">
        <div class="name_photo_menu">
            <?php
                echo '<div class="nickname">'.$_SESSION['name']."</div>".
                    "<img src=/Public/uploads/user_img/" .$_SESSION['user_img'].">";
            ?>
            <div class="menu">
                <button id="menu_button" onclick="showMenu()"><i class="fa fa-bars"></i></button>
            </div>
        </div>
    </div>
    <div class="drop_down_content" id="drop_down_content">
        <div>
            <a type="submit" href="?page=mail_post">Poczta</a>
            <a type="submit" href="?page=board">Mój profil</a> <!--Bedzie szukaj, ale jak bedziesz mial to nie mozesz dolaczyc-->
            <a type="submit" href="?page=user_band">Mój zespół</a>
            <a type="submit" href="?page=friends">Znajomi</a>
            <a type="submit" href="?page=find_band">Szukaj zespołu</a>
            <a type="submit" href="?page=logout">Wyloguj</a>
        </div>
    </div>
</div>