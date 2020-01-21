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

function  hideApplication()
{
    var element = document.getElementById("application_information");
    element.style.display = "none";
}

window.onload = function getReceivedMessages() {

    const apiUrl = "http://localhost:8001";
    const $list = $('.mail_list');
    $.ajax({
        url: apiUrl + '/?page=received_messages',
        dataType: 'json'
    }).done(function (data) {
        $list.empty();
        $.each(data, function (key, val) {
            $list.append(`
                        <div class="mail">
                            <div class="sender">${val.sender_name}</div>
                            <div class="mail_content">${val.content}</div>
                            <div class="date">${val.date}</div>
                        </div>`);
        });
    });
}

function getReceivedMessages2()
{

    const apiUrl = "http://localhost:8001";
    const $list = $('.mail_list');
    $list.empty();
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
                        <div class="mail_content">${val.content}</div>
                        <div class="date">${val.date}</div>
                    </div>`);
        });
    });
}

function getSentMessages()
{
    const apiUrl = "http://localhost:8001";
    const $list = $('.mail_list');
    $list.empty();
    $.ajax({
        url : apiUrl + '/?page=sent_messages',
        dataType : 'json'
    }) .done(function( data ) {
        $.each( data, function( key, val )
        {
            $list.append(`
                    <div class="mail">
                        <div class="sender">${val.recipient_name}</div>
                        <div class="mail_content">${val.content}</div>
                        <div class="date">${val.date}</div>
                    </div>`);
        });
    });
}

function getApplications()
{
    const apiUrl = "http://localhost:8001";
    const $list = $('.mail_list');
    $list.empty();
    $.ajax({
        url : apiUrl + '/?page=get_applications',
        dataType : 'json'
    }).done((res) => {
        res.forEach(el => {
            $list.append(`
                    <div class="mail">
                        <div class="sender">${el.user_name}</div>
                         <div class="mail_content">${el.user_name} Chce dołączyć do twojego zespołu</div>
                        <div class="showApplication">
                            <button id="${el.ID}" onclick=showApplication(this.id)>Zobacz zgłoszenie</button>
                        </div>
                    </div>`);
        });
    });
}

function showApplication(id_application) {
    const apiUrl = "http://localhost:8001";
    const $list = $('.application_information');
    $.ajax({
        url: apiUrl + '/?page=get_applications',
        dataType: 'json'
    }).done((res) => {
        res.forEach(el => {
            if(el.ID === id_application)
            {
                $list.empty();
                var user_img_path = '../../Public/uploads/user_img/' + el.user_img;
                var user_record_path = '../../Public/uploads/records/' + el.user_record;
                $list.append(`
                            <button class="exit_button_app" type="button" onclick="hideApplication()"><img src="/Public/img/exit_icon.png"></button>
                    <div class="upper_informations">
                        <div class="user_photo" id="user_photo">
                            <img id="user_photo_src" src="${user_img_path}">
                        </div>
                        <span id="user_name">${el.user_name}</span>
                    </div>
                    <div class="description">
                        <div class="description_content">
                            <span id="description_content">${el.user_description}</span>
                        </div>
                    </div>
                    <div class="record" id="my_record">
                        <audio id="my_record" controls onseeking="startMusic()" onseeked="startMusic()">
                            <source src="${user_record_path}" type="audio/mp3">
                        </audio>
                    </div>
                    <div class="send_application">
                        <form class="application_form" action="?page=mail_post" method="POST">
                            <button name="" id="send_application_y" type="submit")">Przyjmij</button>
                            <button name="" id="send_application_n" type="submit")">Odrzuć</button>
                        </form>
                    </div>`);
                $('#send_application_y').attr('name', "y" + id_application);
                $('#send_application_n').attr('name', "n" + id_application);
            }
        });
        $('#send_application').attr('name', id_application);
    });
    var element = document.getElementById("application_information");
    element.style.display = "flex";
    // var element2 = document.getElementById("message");
    // element2.style.display = "none";
}

function getFriendsToMessage()
{
    var element = document.getElementById("message");
    element.style.display = "block";
    const apiUrl = "http://localhost:8001";
    const $list = $('.friend_select');
    $.ajax({
        url : apiUrl + '/?page=get_message_friends',
        dataType : 'json'
    }).done(function( data ) {
        $list.empty();
        $.each( data, function( key, val )
        {
            $list.append(`
                        <option value=${val.ID}>${val.name}</option>
                    `);
        });
    });

}

function hideMessageForm()
{
    var element = document.getElementById("message");
    element.style.display = "none";
}