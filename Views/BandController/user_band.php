<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/my_band.css" />
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
</script>
<div class="container">
    <!-- tutaj trzeba powyrzucać na zewnątrz i inny kontener dac zamiast right_upper -->
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
                <form class="menu_form" action="?page=user_band" method="POST">
                    <button name="mail_post" type="submit">Poczta</button>
                    <button name="my_account" type="submit">Mój profil</button> <!--Bedzie szukaj, ale jak bedziesz mial to nie mozesz dolaczyc-->
                    <button name="my_band" type="submit">Mój zespół</button>
                    <button name="find_band" type="submit">Szukaj zespołu</button>
                    <button name="logout" type="submit">Wyloguj</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Dodac funkcje odejdz z zespolu -->
    <div class="band">
        <div>RedHotChiliPeppers</div>
        <div class="logo_description">
            <div class="band_logo">
                <img src="/Public/img/guitar_img.png">
            </div>
            <div class="description">
                <div>Tutaj asdaspdokaspdokaspdkoaspdokaspodjapsijaspodkwpoaspdokapsdojkwpaojsdpoaskdpaosk</div>
            </div>
        </div>
        <div class="members">
            <div class="member">
                <div>Bass Guitar</div>
                <img src="/Public/img/sprawz_to.png">
                <div>TheFlea</div>
            </div>
            <div class="member">
                <div>Guitar</div>
                <img src="/Public/img/guitar_img.png">
                <div>Chris</div>
            </div>
            <div class="member">
                <div>Drums</div>
                <img src="/Public/img/chad_friend.png">
                <div>Chad</div>
            </div>
            <div class="member">
                <div>Vocal</div>
                <img src="/Public/img/vocal_img.png">
                <div>Anthony</div>
            </div>
            <div class="member">
                <div>Vocal</div>
                <img src="/Public/img/vocal_img.png">
                <div>Anthony</div>
            </div>
            <div class="member">
                <div>Vocal</div>
                <img src="/Public/img/vocal_img.png">
                <div>Anthony</div>
            </div>
            <div class="member">
                <div>Vocal</div>
                <img src="/Public/img/vocal_img.png">
                <div>Anthony</div>
            </div>
            <div class="member">
                <div>Vocal</div>
                <img src="/Public/img/vocal_img.png">
                <div>Anthony</div>
            </div>
        </div>
    </div>

</div>
</body>