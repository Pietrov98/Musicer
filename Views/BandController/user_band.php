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

    function showBandForm()
    {
        console.log('dziala');
        var create_band = document.getElementById("band_create");
        create_band.style.display = "block";

        var create_button = document.getElementById("create_button");
        create_button.style.display = "none";

        var find_band = document.getElementById("find_button");
        find_band.style.display = "none";

    }

    function hideBandForm()
    {
        console.log('dziala');
        var create_band = document.getElementById("band_create");
        create_band.style.display = "none";

        var create_button = document.getElementById("create_button");
        create_button.style.display = "block";

        var find_band = document.getElementById("find_button");
        find_band.style.display = "block";
    }

</script>
<div class="container">
    <!-- tutaj trzeba powyrzucać na zewnątrz i inny kontener dac zamiast right_upper -->
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
    <!-- Dodac funkcje odejdz z zespolu -->
    <div class="band">
        <div class = "band_create" id = "band_create">
            <button class="exit_button" type="button" onclick="hideBandForm()"><img src="/Public/img/exit_icon.png"></button>
            <form class="band_form" action="?page=user_band" method="POST" enctype="multipart/form-data">
                <p>Nazwa zespołu</p>
                <input name="band_name" type="text">
                <p>Opisz swój zespół, np. co gracie</p>
                <div class="description_content">
                    <textarea name="band_description" maxlength="250"> </textarea>
                </div>
                <div class="user_input">
                    <div>Wybierz zdjęcie</div>
                    <input name="band_photo" type="file" accept="image/*">
                </div>
                <div class="save_changes">
                    <button  name="save_changes" type="submit">ZAPISZ ZMIANY</button>
                </div>
            </form>
        </div>
        <?php
        if(isset($band) && isset($_SESSION['band_id'])) //nie zapomniec zmienic
        {
            echo  "<div>".$band->getBandName()."</div>".
                  '<div class="logo_description">'.
                      '<div class="band_logo">'.
                          "<img src=/Public/uploads/band_img/" .$band->getBandImg().">".
                        '</div>'.
                      '<div class="description">'.
                         "<div>".$band->getBandDescription()."</div>".
                      '</div>'.
                  '</div>'.
                  '<div class="members">';
                     foreach($band->getMembers() as $member):
                         echo '<div class="member">'.
                             "<img src=/Public/uploads/user_img/" .$member->getUserImg().">".
                             '<div>'.$member->getName().'</div>'.
                             '</div>';
                     endforeach;
                    echo '</div>'.
                        '<form class="leave_band_form" action="?page=user_band" method="POST">'.
                            '<button name="leave_band">Opuść zespół'.
                            '</button>'.
                        '</form>';

        }
        else
            echo '<div class = "band_buttons">'.
                '<button id="create_button" onclick="showBandForm()">Załóż zespół</button>'.
                 '<form method="POST" >'.
                    '<a type="submit" id="find_button" href="?page=find_band">Znajdź zespół</a>'.
                 '</form>'.
                    '</div>';
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