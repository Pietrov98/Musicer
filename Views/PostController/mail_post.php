<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/mail.css" />
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

    window.onload = function getReceivedMessages()
    {
        const apiUrl = "http://localhost:8001";
        const $list = $('.mail_list');
        $.ajax({
            url : apiUrl + '/?page=received_messages',
            dataType : 'json'
    }) .done(function( data ) {
            $list.empty();
            $.each( data, function( key, val )
            {
                $list.append(`
                    <div class="mail">
                        <div class="sender">${val.sender_name}</div>
                        <div>${val.content}</div>
                        <div class="date">${val.date}</div>
                    </div>`);
            });
        });
    }

    function gerReceivedMessages2()
    {
        const apiUrl = "http://localhost:8001";
        const $list = $('.mail_list');
        $.ajax({
            url : apiUrl + '/?page=received_messages',
            dataType : 'json'
        }) .done(function( data ) {
            $list.empty();
            $.each( data, function( key, val )
            {
                $list.append(`
                    <div class="mail">
                        <div class="sender">${val.sender_name}</div>
                        <div>${val.content}</div>
                        <div class="date">${val.date}</div>
                    </div>`);
            });
        });
    }

    function getSentMessages()
    {
        const apiUrl = "http://localhost:8001";
        const $list = $('.mail_list');
        $.ajax({
            url : apiUrl + '/?page=sent_messages',
            dataType : 'json'
        }) .done(function( data ) {
            $list.empty();
            $.each( data, function( key, val )
            {
                $list.append(`
                    <div class="mail">
                        <div class="sender">${val.recipient_name}</div>
                        <div>${val.content}</div>
                        <div class="date">${val.date}</div>
                    </div>`);
            });
        });
    }
</script>
<div class="container">
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
    <div class="post_container">
        <div class="upper_post_container">
            <div class="options_container">
                <button type="submit" name="option_button" onclick=gerReceivedMessages2()>Odebrane</button>
                <button type="submit" onclick=getSentMessages()>Wysłane</button>
                <button type="submit" name="option_button">Zaproszenia</button>
                <button type="submit" name="option_button">Chat</button>
                <div class="searcher">
                    <input name="mail_searcher" type="text">
                    <button name="mail_search_button">></button>
                </div>
            </div>
        </div>
        <div class="mail_list">
<!--            --><?php
//            if(isset($messages)){
//                foreach($messages as $message):
//                    echo '<div class="mail">'.
//                        '<div class="sender">'.$message->getSenderName().'</div>'.
//                        '<div>'.$message->getContent().'</div>'.
//                        '<div class="date">'.$message->getDate().'</div>'.
//                        '</div>';
//                endforeach;
//            }
//            ?>
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
