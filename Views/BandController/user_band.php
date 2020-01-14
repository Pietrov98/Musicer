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
                <?php
                if(isset($band))
                {
                    echo  "<img src=/Public/uploads/user_img/" .$band->getBandImg().">";
                }
                ?>
            </div>
            <div class="description">
                <?php
                if(isset($band))
                {
                    echo "<div>".$band->getBandDescription()."</div>";
                }
                ?>
            </div>
        </div>
        <div class="members">
            <?php
            if(isset($band))
            {
                foreach($band->getMembers() as $member):
                    echo '<div class="member">'.
                            "<img src=/Public/uploads/user_img/" .$member->getUserImg().">".
                            '<div>'.$member->getName().'</div>'.
                        '</div>';
                endforeach;
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>