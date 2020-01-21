<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/mail.css" />
    <link href='http://fonts.googleapis.com/css?family=Alata&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<script src="/Public/scripts/mailPostScripts.js"></script>
<div class="container">
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
    <div class="post_container">
        <div class="upper_post_container">
            <div class="options_container">
                <button type="submit" name="option_button" onclick=getReceivedMessages2()>Odebrane</button>
                <button type="submit" onclick=getSentMessages()>Wysłane</button>
                <button type="submit" name="option_button" onclick=getApplications()>Zaproszenia</button>
                <button name="mail_search_button" onclick="getFriendsToMessage()">Napisz wiadomość</button>
            </div>
        </div>
        <div class="mail_list">
        </div>
    </div>
    <div class="application_information" id="application_information" style="display: none; z-index: 1;">
    </div>
    <div class="message" id="message">
        <button class="exit_button" type="button" onclick="hideMessageForm()"><img src="/Public/img/exit_icon.png"></button>
        <form class="message_form" action="?page=send_message" method="POST">
            <div class="friends_list">
                <select name="friend_select" class="friend_select" id="friend_select">
                </select>
            </div>
            <div class="message_description">
                <div class="message_content">
                    <textarea id="send_content" class=send_content" name="message_content" maxlength="250"></textarea>
                </div>
            </div>
            <div class="save_message">
                <button  name="send_message" id="send_message" type="submit"> Wyślij wiadomość</button>
            </div>
        </form>
    </div>
</div>
<script>
    if ( window.history.replaceState )
    {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
