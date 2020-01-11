<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Musicer</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/my_account.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/edit_data.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div class="upper_container">
        <div class="logo"><p>Musicer</p></div>
    </div>
    <div class="user_information" id="edit_data" style="display: flex">
        <form class="edit_form" action="?page=end_register" method="POST" enctype="multipart/form-data">
            <div class="edit_description">
                <div>Wprowadź swój opis</div>
                <div class="edit_description_content">
                    <textarea id="edit_content" class=edit_description_content" name="description" maxlength="250"> </textarea>
                </div>
            </div>
            <div class="user_input">
                <div>Wybierz zdjęcie</div>
                <input name="user_photo" id="user_photo" type="file" accept="image/*">
            </div>
            <div class="user_input">
                <div>Wybierz nagranie (plik nie może przekraczać 2MB)</div>
                <input name="user_record" id="user_record" type="file" accept="audio/*">
            </div>
            <div class="save_changes">
                <button  name="save_changes" type="submit">ZAPISZ ZMIANY</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>