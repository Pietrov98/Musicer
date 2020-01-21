
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/friends.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/my_account.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/friend_information.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/edit_data.css" />
    <link href='http://fonts.googleapis.com/css?family=Alata&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<script src="/Public/scripts/getFriends.js"></script>
<div class="container">
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
    <div class="friends_searcher">
        <div class="friends_title">Znajomi</div>
    </div>

    <div class="message" id="message">
        <button class="exit_button" type="button" onclick="hideMessage()"><img src="/Public/img/exit_icon.png"></button>
        <form class="message_form" action="?page=friends" method="POST">
            <div class="message_description">
                <div>Wpisz wiadomosc</div>
                <div class="message_content">
                    <textarea id="send_content" class=send_content" name="message_content" maxlength="250"></textarea>
                </div>
            </div>
            <div class="save_message">
                <button  name="send_message" id="send_message" type="submit"> Wyślij wiadomość</button>
            </div>
        </form>
    </div>

    <div class="user_information" id="user_information" style="display: none; z-index: 1;">
    </div>

    <div class="friends_container">
        <div class="friends_list">
        </div>
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