<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/mail.css" />
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
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
    <div class="post_container">
        <div class="upper_post_container">
            <div class="options_container">
                <button type="submit" name="option_button">Wszystkie</button>
                <button type="submit" name="option_button">Odebrane</button>
                <button type="submit" name="option_button">Wysłane</button>
                <button type="submit" name="option_button">Zaproszenia</button>
                <button type="submit" name="option_button">Chat</button>
                <div class="searcher">
                    <input name="mail_searcher" type="text">
                    <button name="mail_search_button">></button>
                </div>
            </div>
        </div>
        <div class="mail_list">
            <?php
            if(isset($messages)){
                foreach($messages as $message):
                    echo '<div class="mail">'.
                        '<div class="sender">'.$message->getSenderName().'</div>'.
                        '<div>'.$message->getContent().'</div>'.
                        '<div class="date">'.$message->getDate().'</div>'.
                        '</div>';
                endforeach;
            }
            ?>
<!--            <div class="mail">-->
<!--                <div class="sender">-->
<!--                    <h4>Adrian</h4>-->
<!--                </div>-->
<!--                <button class="mail_title_button"><h4>Cześć, wpadasz jutro?</h4></button>-->
<!--                <div class="date">-->
<!--                    <h4>19.11.1992</h4>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="mail">-->
<!--                <div class="sender">-->
<!--                    <h4>Adrian</h4>-->
<!--                </div>-->
<!--                <button class="mail_title_button"><h4>Cześć, wpadasz jutro?</h4></button>-->
<!--                <div class="date">-->
<!--                    <h4>19.11.1992</h4>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="mail">-->
<!--                <div class="sender">-->
<!--                    <h4>Adrian</h4>-->
<!--                </div>-->
<!--                <button class="mail_title_button"><h4>Cześć, wpadasz jutro?</h4></button>-->
<!--                <div class="date">-->
<!--                    <h4>19.11.1992</h4>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>
</body>
