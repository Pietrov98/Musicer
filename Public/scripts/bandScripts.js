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

function showMemberForm()
{
    var create_band = document.getElementById("find_member");
    create_band.style.display = "block";
}

function hideMemberForm()
{
    var create_band = document.getElementById("find_member");
    create_band.style.display = "none";
}