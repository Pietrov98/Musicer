function getFriends()
{
    console.log("dzialam");
    const apiUrl = "http://localhost:8001";
    const $list = $('.friends_list');

    $.ajax({
        url : apiUrl + '/?page=friends',
        dataType : 'json'
    }) .done((res) => {
        $list.empty();
        res.forEach(el => {
            $list.append(`
                <div class="friend">
                <button type="button" class="friend_button" id="${el.ID}" onclick="showFriend(this.id)"/>
                <img src=/Public/uploads/user_img/${el.user_img}"></button>
                <p>${el.name}</p>
                </div>`); });
    });
}