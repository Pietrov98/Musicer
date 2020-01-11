<div class="upper_container">
    <div class="logo">
        <p>Musicer</p>
    </div>
    <div class="right_upper_container">
        <div class="name_photo_menu">
            <?php
            if(isset($user))
            {
                echo '<div class="nickname">'.$user->getName()."</div>".
                    "<img src=/Public/uploads/user_img/" .$user->getUserImg().">";
            }
            ?>
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