function showLoginForm() {
    var element = document.getElementById("login_form");
    element.style.display = "flex";
    var element2 = document.getElementById("register_form");
    element2.style.display = "none";
    var element3 = document.getElementById("register");
    element3.style.display = "block";
    var element4 = document.getElementById("login");
    element4.style.display = "none";
}

function showRegisterForm() {
    var element = document.getElementById("register_form");
    element.style.display = "flex";
    var element2 = document.getElementById("login_form");
    element2.style.display = "none";
    var element4 = document.getElementById("login");
    element4.style.display = "block";
    var element3 = document.getElementById("register");
    element3.style.display = "none";
}

function closeLoginForm() {
    var element = document.getElementById("login_form");
    element.style.display = "none";
    var element2 = document.getElementById("login");
    element2.style.display = "block";
}

function closeRegisterForm() {
    var element = document.getElementById("register_form");
    element.style.display = "none";
    var element2 = document.getElementById("register");
    element2.style.display = "block";

}