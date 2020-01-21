function showEditForm()
{
    var element = document.getElementById("edit_data");
    element.style.display = "flex";
    var element2 = document.getElementById("user_information");
    element2.style.display = "none";
}

function  closeEditForm()
{
    var element = document.getElementById("edit_data");
    element.style.display = "none";
    var element2 = document.getElementById("user_information");
    element2.style.display = "flex";
}

function startMusic()
{
    var audio = document.getElementById("my_record");
    document.getElementById("my_record").innerHTML=("Seeking: " + x.seeking);
}

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