validirajUsername = function () {
    var username = document.getElementById("username");

    if (username.value.length < 2) {
        username.style.backgroundColor = "red";
    }
    else {
        username.style.backgroundColor = "white";
    }
}

validirajPw = function () {
    var pw = document.getElementById("pw");

    if (pw.value.length < 5) {
        pw.style.backgroundColor = "red";
    }
    else {
        pw.style.backgroundColor = "white";
    }
}

validiraj = function () {
    var username = document.getElementById("username");
    var pw = document.getElementById("pw");

    if (username.value.length < 3) {
        alert("Username mora imati barem 3 karaktera");
        return;
    }
    else if (pw.value.length < 5) {
        alert("Password mora imati barem 3 karaktera");
        return;
    }
}