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
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
    <!-- Dodac funkcje odejdz z zespolu -->
    <div class="band">
        <div>RedHotChiliPeppers</div>
        <div class="logo_description">
            <div class="band_logo">
                <img src="/Public/img/main_background.png">
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