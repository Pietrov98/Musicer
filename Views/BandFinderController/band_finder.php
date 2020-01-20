<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/band_finder.css" />
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

    function showBand(id_band) {
        const apiUrl = "http://localhost:8001";
        const $list = $('.band_information');
        $.ajax({
            url: apiUrl + '/?page=get_bands',
            dataType: 'json'
        }).done((res) => {
            var el = res[id_band];
            $list.empty();
            var band_img_path = '../../Public/uploads/band_img/' + el.band_img;
            $list.append(`
                    <button class="exit_button" type="button" onclick="hideBand()"><img src="/Public/img/exit_icon.png"></button>
                <div class="upper_informations">
                    <div class="band_photo" id="band_photo">
                        <img id="band_photo_src" src="${band_img_path}">
                    </div>
                    <span id="band_name">${el.name}</span>
                </div>
                <div class="description">
                    <div class="description_content">
                        <span id="description_content">${el.description}</span>
                    </div>
                </div>
                <div class="send_application">
                    <form class="application_form" action="?page=find_band" method="POST">
                        <button name="" id="send_application" type="submit" onclick="return confirm('Czy na pewno chcesz dołączyć do tego zespołu?')">Zgłoś się</button>
                    </form>
                </div>
                    `);
            $('#send_application').attr('name', id_band);
        });
        var element = document.getElementById("band_information");
        element.style.display = "flex";
        var element2 = document.getElementById("message");
        element2.style.display = "none";
    }

    function  hideBand()
    {
        var element = document.getElementById("band_information");
        element.style.display = "none";
    }

    window.onload = function getBands()
    {
        const apiUrl = "http://localhost:8001";
        const $list = $('.bands_list');
        $.ajax({
            url : apiUrl + '/?page=get_bands',
            dataType : 'json'
        }) .done(function( data ) {
            $list.empty();
            $.each( data, function( key, val )
            {
                $list.append(`
                    <div class="band">
                    <button type="button" class="band_button" id="${val.ID}" onclick="showBand(this.id)">
                        <img src=/Public/uploads/band_img/${val.band_img}></button>
                    <p>${val.name}</p>
                    </div>`);
            });
        });
    }
</script>
<div class="container">
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
    <div class="bands_searcher">
        <div class="bands_title">Znajdź swój zespół</div>
    </div>
<!--    <div class="message" id="message">-->
<!--        <button class="exit_button" type="button" onclick="hideMessage()"><img src="/Public/img/exit_icon.png"></button>-->
<!--        <form class="message_form" action="?page=friends" method="POST">-->
<!--            <div class="message_description">-->
<!--                <div>Wpisz wiadomosc</div>-->
<!--                <div class="message_content">-->
<!--                    <textarea id="send_content" class=send_content" name="message_content" maxlength="250"></textarea>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="save_message">-->
<!--                <button  name="send_message" id="send_message" type="submit"> Wyślij wiadomość</button>-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->
    <div class="band_information" id="band_information" style="display: none; z-index: 1;">
        <!--        showFriend()-->
    </div>
    <div class="bands_container">
        <?php
        if($_SESSION['role'] != 'founder' && $_SESSION['role'] != 'czlonek')
            echo '<div class="bands_list"></div>'
        ?>

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
<body>